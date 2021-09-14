<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mover extends Model
{
    use HasFactory;

    protected $fillable = [
        'villager_id', 'date', 'cause'
    ];

    protected $hidden = [];
    
    public function villager()
    {
        return $this->belongsTo(Villager::class);
    }
}
