<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InspectionThroat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function throat()
    {
        return $this->hasOne(Throat::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inspection()
    {
        return $this->hasOne(PersonInspection::class);
    }
}
