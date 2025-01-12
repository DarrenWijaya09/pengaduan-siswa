<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasi';
    protected $fillable = ['status', 'feedback', 'inputaspirasi_id'];

    public function inputAspirasi()
    {
        return $this->belongsTo(InputAspirasi::class, 'inputaspirasi_id');
    }
    protected $attributes = [
        'status' => 'Menunggu',
    ];

}
