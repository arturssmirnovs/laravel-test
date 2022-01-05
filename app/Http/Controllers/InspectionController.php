<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInspectionRequest;
use App\Http\Requests\UpdateInspectionRequest;
use App\Http\Resources\PersonInspectionCollection;
use App\Http\Resources\PersonInspectionResource;
use App\Models\PersonInspection;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PersonInspectionCollection
     */
    public function index(Request $request)
    {
        return new PersonInspectionCollection(PersonInspection::query()
            ->with(['person'])
            ->personalCode($request->get('q'))
            ->orderBy('person_inspections.created_at', 'DESC')
            ->paginate(10)
            ->withQueryString()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInspectionRequest $request
     * @return PersonInspectionResource
     */
    public function store(StoreInspectionRequest $request)
    {
        $person = Person::query()->firstOrCreate([
            'personal_code' => $request->post('personal_code'),
        ], [
            'personal_code' => $request->post('personal_code'),
            'surname' => $request->post('surname'),
            'name' => $request->post('name'),
        ]);

        return new PersonInspectionResource($person->personInspections()->create([
            'date' => Carbon::parse($request->post('date'))->toDate(),
            'complaints' => $request->post('complaints'),
            'comorbidities' => $request->post('comorbidities'),
            'allergies' => $request->post('allergies'),
            'form' => $request->post('form'),
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInspectionRequest $request
     * @param string $id
     * @return PersonInspectionResource
     */
    public function update(UpdateInspectionRequest $request, string $id)
    {
        $inspection = PersonInspection::where('id', $id)->firstOrFail();

        if ($request->post('almonds'))
        {
            $inspection->inspectionAlmonds()->create([
                'almond_id' => $request->post('almonds')
            ]);
        }

        if ($request->post('almonds_2'))
        {
            $inspection->inspectionAlmonds()->create([
                'almond_id' => $request->post('almonds_2')
            ]);
        }

        if ($request->post('has_separations'))
        {
            foreach ($request->post('separations') as $separation)
            {
                $inspection->inspectionSeparations()->create([
                    'separation_id' => $separation
                ]);
            }
        }

        if ($request->post('mucosas'))
        {
            $inspection->inspectionMucosas()->create([
                'mucosa_id' => $request->post('mucosas')
            ]);
        }

        if ($request->post('mucosas_2'))
        {
            $inspection->inspectionMucosas()->create([
                'mucosa_id' => $request->post('mucosas_2')
            ]);
        }

        if ($request->post('nasal_breathing_throught_noses'))
        {
            $inspection->inspectionNasalBreathingThroughtNose()->create([
                'nasal_breathing_throught_nose_id' => $request->post('nasal_breathing_throught_noses')
            ]);
        }

        if ($request->post('nasal_septums'))
        {
            $inspection->inspectionNasalSeptums()->create([
                'nasal_septum_id' => $request->post('nasal_septums')
            ]);
        }

        if ($request->post('nasal_passages'))
        {
            foreach ($request->post('nasal_passages') as $nasalPassage)
            {
                $inspection->inspectionNasalPassages()->create([
                    'nasal_passage_id' => $nasalPassage
                ]);
            }
        }

        if ($request->post('throats'))
        {
            foreach ($request->post('throats') as $throat)
            {
                $inspection->inspectionThroats()->create([
                    'throat_id' => $throat
                ]);
            }
        }

        if ($request->post('throats_2'))
        {
            foreach ($request->post('throats_2') as $throat)
            {
                $inspection->inspectionThroats()->create([
                    'throat_id' => $throat
                ]);
            }
        }

        return new PersonInspectionResource($inspection);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return bool
     */
    public function destroy(string $id)
    {
        $inspection = PersonInspection::where('id', $id)->firstOrFail();

        $inspection->inspectionAlmonds()->delete();
        $inspection->inspectionSeparations()->delete();
        $inspection->inspectionMucosas()->delete();
        $inspection->inspectionNasalBreathingThroughtNose()->delete();
        $inspection->inspectionNasalSeptums()->delete();
        $inspection->inspectionNasalPassages()->delete();
        $inspection->inspectionThroats()->delete();

        return $inspection->delete();
    }

    /**
     * Remove fully the specified resource from storage.
     *
     * @param string $id
     * @return bool
     */
    public function destroyForce(string $id)
    {
        $inspection = PersonInspection::where('id', $id)->firstOrFail();

        $inspection->inspectionAlmonds()->forceDelete();
        $inspection->inspectionSeparations()->forceDelete();
        $inspection->inspectionMucosas()->forceDelete();
        $inspection->inspectionNasalBreathingThroughtNose()->forceDelete();
        $inspection->inspectionNasalSeptums()->forceDelete();
        $inspection->inspectionNasalPassages()->forceDelete();
        $inspection->inspectionThroats()->forceDelete();

        return $inspection->forceDelete();
    }
}
