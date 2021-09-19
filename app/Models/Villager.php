<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Villager extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = "villagers";
    protected $fillable = [
        'id_number',
        'family_card_id',
        'name',
        'age',
        'birth_date',
        'birth_place',
        'gender',
        'blood_type',
        'address',
        'religion',
        'marital_status',
        'citizenship',
        'education',
        'parent',
        'id_photo',
        'kinship'
    ];

    protected $hidden = [

    ];

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class);
    }

    public function families()
    {
        return $this->hasMany(FamilyCard::class, 'villager_id', 'id');
    }

    public function comers()
    {
        return $this->hasMany(Comer::class, 'villager_id', 'id');
    }

    public function movers()
    {
        return $this->hasMany(Mover::class, 'villager_id', 'id');
    }

    public function deaths()
    {
        return $this->hasMany(Death::class, 'villager_id', 'id');
    }

    public function familiars()
    {
        return $this->hasMany(Familiar::class, 'villager_id', 'id');
    }
}
