<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinistryUser extends Model
{
    protected $table = 'ministry_user';
    use HasFactory;

    protected $fillable = [
        'tipo_usuario',
        'user_id',
        'ministerios_id',
        'status'
    ];




}
