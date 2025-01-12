<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    protected $table = 'input_aspirasi';
    protected $fillable = ['nis', 'kategori_id', 'lokasi', 'keterangan', 'foto'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function aspirasi()
    {
        return $this->hasOne(Aspirasi::class, 'inputaspirasi_id');
    }
    public function statusColor()
    {
        return match ($this->status) {
            'Menunggu' => 'yellow-400',
            'Proses' => 'blue-400',
            'Selesai' => 'green-400',
            default => 'gray-400',
        };
    }

}
