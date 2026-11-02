<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}