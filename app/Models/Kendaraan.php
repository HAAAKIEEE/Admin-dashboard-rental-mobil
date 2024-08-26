<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'jenis', 'plat', 'penumpang', 'harga','file'
    ];
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
