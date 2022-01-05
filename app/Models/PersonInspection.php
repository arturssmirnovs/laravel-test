<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonInspection extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = ['id'];

    /**
     * @param $query
     * @param $q
     * @return mixed
     */
    public function scopePersonalCode($query, $q)
    {
        if ($q)
        {
            return $query
                ->leftJoin('persons', 'persons.id', '=', 'person_inspections.person_id')
                ->where('persons.personal_code', 'like', $q.'%');
        }

        return $query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionAlmonds()
    {
        return $this->hasMany(InspectionAlmond::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionSeparations()
    {
        return $this->hasMany(InspectionSeparation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionMucosas()
    {
        return $this->hasMany(InspectionMucosa::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionNasalBreathingThroughtNose()
    {
        return $this->hasMany(InspectionNasalBreathingThroughtNose::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionNasalSeptums()
    {
        return $this->hasMany(InspectionNasalSeptum::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionNasalPassages()
    {
        return $this->hasMany(InspectionNasalPassage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inspectionThroats()
    {
        return $this->hasMany(InspectionThroat::class);
    }
}
