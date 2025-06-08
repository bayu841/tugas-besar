<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";
    protected $fillable = ['pembeli_id','kasir_id','tanggal_pesan'];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }
    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }
}