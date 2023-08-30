<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Resources\Patient\Resource;
use App\Http\Requests\Patient\UpdateRequest;
use App\Http\Requests\Patient\StoreRequest;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return Resource::collection($patients);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        $patient = Patient::create([
            'name' => $validated['name'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender_id' => $validated['gender_id'],
            'service_id' => $validated['service_id'],
            'comments' => $validated['comments'],
        ]);

        return new Resource($patient);
    }

    public function show($id)
    {
        return new Resource(Patient::findOrFail($id));
    }

    public function update(UpdateRequest $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $validated = $request->validated();

        $patient->update([
            'name' => $validated['name'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender_id' => $validated['gender_id'],
            'service_id' => $validated['service_id'],
            'comments' => $validated['comments'],
        ]);

        return new Resource($patient);
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return response()->json(null, 204);
    }
}
