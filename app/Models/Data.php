<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'datas';
    protected $fillable = [
        'kategori',
        'uraian',
        'nominal',
    ];

    protected $casts = [
        'nominal' => 'decimal:2', // Simpan 2 angka desimal di database
    ];

    public function getFormattedNominalAttribute()
    {
        return number_format($this->nominal, 0, ',', '.');
    }
}
