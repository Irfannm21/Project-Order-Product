<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kpk extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'harga' => MoneyCast::class,
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function details() {
        return $this->belongsTo(Customer::class, 'kpk_id');
    }


}
