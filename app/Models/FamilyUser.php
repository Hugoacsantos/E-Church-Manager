<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyUser extends Model
{
    protected $table = 'family_user';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'familia_id'
    ];





}
