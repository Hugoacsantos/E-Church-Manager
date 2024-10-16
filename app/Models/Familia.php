<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomefamilia',
        'status',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
