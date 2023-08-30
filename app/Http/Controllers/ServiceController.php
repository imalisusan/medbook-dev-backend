<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Resources\Service\Resource;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return Resource::collection($services);
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        
        $service = Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return new Resource($service);
    }

    public function show($id)
    {
        return new Resource(Service::findOrFail($id));
    }

    public function update(UpdateRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $validated = $request->validated();

        $service->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return new Resource($service);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(null, 204);
    }
}
