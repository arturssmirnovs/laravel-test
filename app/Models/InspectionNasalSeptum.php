<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InspectionNasalSeptum extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = ['id'];

    public $table = 'inspection_nasal_septums';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nasalSeptum()
    {
        return $this->hasOne(NasalSeptum::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inspection()
    {
        return $this->hasOne(PersonInspection::class);
    }
}
