<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';

    protected $guarded = ['id'];

    public function keluhan()
    {
        return $this->belongsTo(Keluhan::class, 'id_keluhan');
    }
}
