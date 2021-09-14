<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'villager_id',
        'arrival_date',
        'id_number',
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
    ];

    protected $hidden = [];

    public function villager()
    {
        return $this->belongsTo(Villager::class);
    }
}
