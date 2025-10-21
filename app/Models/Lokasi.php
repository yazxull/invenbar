<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lokasi extends Model
{
    protected $fillable = ['nama_lokasi'];
    
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'lokasi_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'lokasi_id');
    }

    public function petugas()
    {
        return $this->users()->role('petugas');
    }
}