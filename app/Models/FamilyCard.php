<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyCard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'family_number',
        'villager_id',
        'kinship',
        'address',
        'village',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'family_photo'
    ];

    protected $hidden = [

    ];

    public function villagers()
    {
        return $this->hasMany(Villager::class, 'family_card_id', 'id');
    }
    
    public function villager()
    {
        return $this->belongsTo(Villager::class);
    }
    
    public function births()
    {
        return $this->hasMany(Birth::class, 'family_card_id', 'id');
    }

    public function familiars()
    {
        return $this->hasMany(Familiar::class, 'family_card_id', 'id');
    }
}
