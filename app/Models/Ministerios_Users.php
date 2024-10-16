<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministerios_Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_usuario',
        'user_id',
        'ministerios_id',
        'status'
    ];




}
