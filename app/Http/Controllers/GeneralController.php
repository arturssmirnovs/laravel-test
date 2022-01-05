<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInspectionRequest;
use App\Http\Requests\UpdateInspectionRequest;
use App\Http\Resources\PersonInspectionCollection;
use App\Http\Resources\PersonInspectionResource;
use App\Models\Almond;
use App\Models\Mucosa;
use App\Models\NasalBreathingThroughtNose;
use App\Models\NasalPassage;
use App\Models\NasalSeptum;
use App\Models\PersonInspection;
use App\Models\Separation;
use App\Models\Throat;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        $data = [
            'almonds' => Almond::query()->where('type', 1)->get(),
            'almonds_2' => Almond::query()->where('type', 2)->get(),
            'mucosas' => Mucosa::query()->where('type', 1)->get(),
            'mucosas_2' => Mucosa::query()->where('type', 2)->get(),
            'nasal_breathing_throught_noses' => NasalBreathingThroughtNose::query()->get(),
            'nasal_passages' => NasalPassage::query()->get(),
            'nasal_septums' => NasalSeptum::query()->get(),
            'throats' => Throat::query()->where('type', 1)->get(),
            'throats_2' => Throat::query()->where('type', 2)->get(),
            'separations' => Separation::query()->get(),
            'forms' => [
                'sin' => 'Taisna',
                'dxt' => 'Deformēta',
            ],
        ];

        return new JsonResource($data);
    }
}
