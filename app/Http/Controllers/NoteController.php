<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Menampilkan halaman utama
     */
    public function index()
    {
        $notes = session()->get('notes', []);

        return view('notes.index', compact('notes'));
    }

    /**
     * Menyimpan catatan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|max:255'
        ]);

        $notes = session()->get('notes', []);

        $notes[] = $request->note;

        session()->put('notes', $notes);

        return redirect('/');
    }

    /**
     * Menampilkan halaman edit
     */
    public function edit($id)
    {
        $notes = session()->get('notes', []);

        if (!isset($notes[$id])) {
            return redirect('/');
        }

        return view('notes.edit', [
            'id' => $id,
            'note' => $notes[$id]
        ]);
    }

    /**
     * Menyimpan hasil edit
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|max:255'
        ]);

        $notes = session()->get('notes', []);

        if (isset($notes[$id])) {
            $notes[$id] = $request->note;
        }

        session()->put('notes', $notes);

        return redirect('/');
    }

    /**
     * Menghapus catatan
     */
    public function destroy($id)
    {
        $notes = session()->get('notes', []);

        if (isset($notes[$id])) {

            unset($notes[$id]);

            $notes = array_values($notes);

            session()->put('notes', $notes);
        }

        return redirect('/');
    }
}