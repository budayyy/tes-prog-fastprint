<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = ['nama_status'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'status_id', 'id_status');
    }
}
