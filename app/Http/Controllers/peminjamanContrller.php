<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class peminjamanContrller extends Controller
{
    public function index(Request $request)
    {
        $peminjamans = Peminjaman::with('buku')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return response()->json([
            'message' => 'Riwayat peminjaman berhasil diambil.',
            'data' => $peminjamans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => ['required', 'integer', 'exists:bukus,id'],
        ]);

        $peminjaman = DB::transaction(function () use ($request, $validated) {
            $buku = Buku::whereKey($validated['buku_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($buku->stok < 1) {
                throw ValidationException::withMessages([
                    'buku_id' => ['Stok buku sedang habis.'],
                ]);
            }

            $masihDipinjam = Peminjaman::where(
                'user_id',
                $request->user()->id
            )
                ->where('buku_id', $buku->id)
                ->where('status', 'dipinjam')
                ->exists();

            if ($masihDipinjam) {
                throw ValidationException::withMessages([
                    'buku_id' => ['Buku ini masih kamu pinjam.'],
                ]);
            }

            $buku->decrement('stok');

            return Peminjaman::create([
                'user_id' => $request->user()->id,
                'buku_id' => $buku->id,
                'tanggal_pinjam' => now()->toDateString(),
                'status' => 'dipinjam',
            ]);
        });

        return response()->json([
            'message' => 'Peminjaman berhasil dibuat.',
            'data' => $peminjaman->load('buku'),
        ], 201);
    }

    public function show(Request $request, Peminjaman $peminjaman)
    {
        abort_unless(
            $peminjaman->user_id === $request->user()->id,
            403,
            'Kamu tidak memiliki akses ke peminjaman ini.'
        );

        return response()->json([
            'message' => 'Detail peminjaman berhasil diambil.',
            'data' => $peminjaman->load('buku'),
        ]);
    }

    public function kembalikan(Request $request, Peminjaman $peminjaman)
    {
        abort_unless(
            $peminjaman->user_id === $request->user()->id,
            403,
            'Kamu tidak memiliki akses ke peminjaman ini.'
        );

        DB::transaction(function () use ($peminjaman) {
            $peminjaman = Peminjaman::whereKey($peminjaman->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($peminjaman->status !== 'dipinjam') {
                throw ValidationException::withMessages([
                    'status' => ['Buku ini sudah dikembalikan.'],
                ]);
            }

            $peminjaman->update([
                'status' => 'dikembalikan',
                'tanggal_kembali' => now()->toDateString(),
            ]);

            Buku::whereKey($peminjaman->buku_id)
                ->increment('stok');
        });

        return response()->json([
            'message' => 'Buku berhasil dikembalikan.',
            'data' => $peminjaman->fresh()->load('buku'),
        ]);
    }
}
