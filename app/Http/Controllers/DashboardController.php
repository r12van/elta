<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\DailyTask;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bulanSekarang = date('n');
        $tahunSekarang = date('Y');

        // 1. DATA KARTU STATISTIK UMUM
        $totalLaporan = Report::where('user_id', $user->id)->count();
        $kegiatanBulanIni = DailyTask::whereHas('report', function($query) use ($user, $bulanSekarang, $tahunSekarang) {
            $query->where('user_id', $user->id)
                  ->where('bulan', $bulanSekarang)
                  ->where('tahun', $tahunSekarang);
        })->count();

        // 2. KONTRAK AKTIF & TARGET AKTIVITAS
        $activeContract = $user->activeContract;
        $targetAktivitas = $activeContract && $activeContract->jobPackage ? $activeContract->jobPackage->scopes()->count() : 0;

        // 3. LOGIKA KALKULATOR CUTI (Tahun Berjalan)
        // Hitung total jatah cuti dari SEMUA kontrak di tahun ini
        $totalJatahCuti = $user->contracts()
                               ->whereYear('tanggal_mulai', $tahunSekarang)
                               ->sum('kuota_cuti');

        // Hitung cuti yang sudah diambil di tahun ini
        $cutiTerpakai = $user->leaves()
                             ->whereYear('tanggal_cuti', $tahunSekarang)
                             ->count();

        $sisaCuti = $totalJatahCuti - $cutiTerpakai;

        // 4. DATA 5 AKTIVITAS TERAKHIR
        $recentTasks = DailyTask::with(['scope', 'report'])
            ->whereHas('report', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })->orderBy('tanggal', 'desc')->take(5)->get();

        // 5. DATA GRAFIK
        $chartQuery = DailyTask::whereHas('report', function($query) use ($user, $bulanSekarang, $tahunSekarang) {
                $query->where('user_id', $user->id)
                      ->where('bulan', $bulanSekarang)
                      ->where('tahun', $tahunSekarang);
            })
            ->selectRaw('DATE(tanggal) as tgl, count(*) as total')
            ->groupBy('tgl')->orderBy('tgl', 'asc')->get();

        $chartLabels = []; $chartData = [];
        foreach ($chartQuery as $row) {
            $chartLabels[] = Carbon::parse($row->tgl)->format('d M');
            $chartData[] = $row->total;
        }

        return view('dashboard', compact(
            'totalLaporan', 'kegiatanBulanIni', 'targetAktivitas', 'activeContract',
            'totalJatahCuti', 'cutiTerpakai', 'sisaCuti', 'tahunSekarang',
            'recentTasks', 'chartLabels', 'chartData'
        ));
    }
}
