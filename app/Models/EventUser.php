<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $table = 'event_user';

    protected $fillable = ['user_id','evento_id'];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function eventos() {
        return $this->hasMany(Event::class);
    }

}
