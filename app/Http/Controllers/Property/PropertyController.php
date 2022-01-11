<?php

namespace App\Http\Controllers\Property;

use App\Models\Property\Property;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\PropertyUpdateRequest;
use App\Http\Resources\Property\PropertyResource;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $relationship = ['currency', 'author', 'city'];

        $properties = QueryBuilder::for(Property::class)
            ->with($relationship)
            ->allowedFilters('title')
            ->allowedSorts('user_id')
            ->paginate(5);

        return PropertyResource::collection($properties);
    }

    
    public function store(PropertyRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->safe()->title);
        $property = Property::create($validated);

        return new PropertyResource($property);
    }

    
    public function show(Property $property)
    {
        $relationship = ['currency', 'author', 'city'];

        return new PropertyResource($property->load($relationship));
    }


    public function update(PropertyUpdateRequest $request, Property $property)
    {
        $relationship = ['currency', 'author', 'city'];

        $property->update($request->all());

        return new PropertyResource($property->load($relationship));
    }

    public function destroy(Property $property)
    {
        return $property->delete();
    }
}
