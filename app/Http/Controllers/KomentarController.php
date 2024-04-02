<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_post' => 'required|exists:posts,id',
            'id_creator' => 'required|exists:users,id',
            'content' => 'required',
        ]);

        DB::table('komentar')->insert([
            'id_post' => $validatedData['id_post'],
            'id_creator' => $validatedData['id_creator'],
            'content' => $validatedData['content'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $komentar = DB::table('komentar')->where('id', $id)->first();
        return view('komentar.edit', compact('komentar'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        DB::table('komentar')->where('id', $id)->update([
            'content' => $validatedData['content'],
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('komentar')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus');
    }
}
