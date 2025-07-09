<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipationHistory extends Model
{
    protected $table = 'participation_histories';
    public function member() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function event() : BelongsTo {
        return $this->belongsTo(Event::class);
    }

}
