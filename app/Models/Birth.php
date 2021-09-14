<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Birth extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'family_card_id', 'name', 'birth_date'
    ];

    protected $hidden = [];

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class);
    }
}
