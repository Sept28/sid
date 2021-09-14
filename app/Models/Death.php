<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Death extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'villager_id', 'obit', 'cause'
    ];

    protected $hidden = [];

    public function villager()
    {
        return $this->belongsTo(Villager::class);
    }
}
