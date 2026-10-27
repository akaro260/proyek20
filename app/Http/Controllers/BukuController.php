<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
                $bukus = Buku::query()
            ->orderBy('judul')
            ->paginate(10);

        return response()->json([
            'message' => 'Daftar buku berhasil diambil.',
            'data' => $bukus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
                $buku = Buku::findOrFail($id);
                return response()->json([
            'message' => 'Detail buku berhasil diambil.',
            'data' => $buku,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
