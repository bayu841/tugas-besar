<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_penjualan extends Model
{
    use HasFactory;
    protected $table = "detail_penjualan";
    protected $fillable = ['penjualan_id','barang_id','jumlah','total_harga'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}