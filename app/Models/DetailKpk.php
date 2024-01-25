<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKpk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis () {
        return $this->belongsTo(JenisKain::class);
    }

    public function kpk () {
        return $this->belongsTo(kpk::class);
    }
}
