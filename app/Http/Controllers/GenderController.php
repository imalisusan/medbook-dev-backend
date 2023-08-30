<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Resources\Gender\Resource;
use App\Http\Requests\Gender\StoreRequest;
use App\Http\Requests\Gender\UpdateRequest;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::all();

        return Resource::collection($genders);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        $gender = Gender::create([
            'name' => $validated['name'],
        ]);

        return new GenderResource($gender);
    }

    public function show($id)
    {
        return new Resource(Gender::findOrFail($id));
    }

    public function update(UpdateRequest $request, $id)
    {
        $gender = Gender::findOrFail($id);
        $validated = $request->validated();

        $gender->update([
            'name' => $validated['name'],
        ]);

        return new Resource($gender);
    }

    public function destroy($id)
    {
        $gender = Gender::findOrFail($id);
        $gender->delete();
        return response()->json(null, 204);
    }
}
