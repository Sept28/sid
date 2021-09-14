<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familiar extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'villager_id', 'family_card_id', 'kinship'
    ];

    protected $hidden = [

    ];

    public function villager()
    {
        return $this->belongsTo(Villager::class);
    }

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class);
    }
}
