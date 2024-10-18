<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $table = 'type_user';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo'
    ];

    public function usuario() {
        return $this->hasOne(User::class);
    }
}
