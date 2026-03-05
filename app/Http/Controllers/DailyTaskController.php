<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Models\Report;
use Illuminate\Http\Request;

class DailyTaskController extends Controller
{
    public function store(Request $request, Report $report)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'scope_id' => 'nullable|exists:scopes,id', // Bisa kosong kalau cuti/libur
            'deskripsi_pekerjaan' => 'required|string',
            'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi file gambar
        ]);

        // Simpan kegiatan harian
        $task = $report->dailyTasks()->create([
            'tanggal' => $request->tanggal,
            'scope_id' => $request->scope_id,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
        ]);

        // Proses upload banyak foto sekaligus
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                // Simpan ke folder storage/app/public/tasks
                $path = $foto->store('tasks', 'public');

                // Simpan path ke database
                $task->taskImages()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('success', 'Kegiatan berhasil ditambahkan!');
    }
}
