<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function toId():BelongsTo{
        return $this->belongsTo(User::class,'to_id');
    }

    public function fromId():BelongsTo{
        return $this->belongsTo(User::class,'from_id');
    }
}
