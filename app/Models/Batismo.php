<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batismo extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_batismo',
        'membro_id',
        'batizado_por'
    ];

    public function User() {
        return $this->hasOne(User::class);
    }
}
