<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\LevelModel;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('level.index');
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);

        // return 'Insert data baru berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate : ' . $row . 'baris';

        // $row = DB::delete('delete from m_level where level_kode = ? ', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus : ' . $row . 'baris';

        // $data = DB::select('select * from m_level');
        // return view('level', ['data' => $data]);
    }

    public function create(): Response
    {
        return response()->view('level.index');
    }

    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validated();

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);

        return redirect('/level')->with('success', 'Level berhasil ditambahkan.');
    }
    public function edit($id): Response
    {
        $level = LevelModel::find($id);
        if (!$level) {
            return redirect()->back()->with('error', 'Level tidak ditemukan.');
        }
        return response()->view('level.edit', compact('level'));
    }

    public function update($id, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'level_kode' => 'required',
            'level_nama' => 'required',
        ]);

        $level = LevelModel::find($id);
        if (!$level) {
            return redirect()->back()->with('error', 'Level tidak ditemukan.');
        }

        $level->level_kode = $request->level_kode;
        $level->level_nama = $request->level_nama;
        $level->save();

        return redirect('/level')->with('success', 'Level berhasil diperbarui.');
    }

    public function destroy($id)
    {
        LevelModel::destroy($id);
        return redirect('/level')->with('success', 'Level berhasil dihapus.');
    }

}
