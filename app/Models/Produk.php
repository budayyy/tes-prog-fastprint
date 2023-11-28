<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['id_produk', 'nama_produk', 'harga', 'kategori_id', 'status_id'];

    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'id_kategori', 'kategori_id');
    }

    public function status()
    {
        return $this->hasMany(Status::class, 'id_status', 'status_id');
    }
}
