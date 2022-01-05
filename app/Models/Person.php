<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public $table = 'persons';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personInspections()
    {
        return $this->hasMany(PersonInspection::class);
    }
}
