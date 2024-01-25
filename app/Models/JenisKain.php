<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKain extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details_kpk () {
        return $this->hasMany(DetailKpk::class, 'jenis_id');
    }

}
