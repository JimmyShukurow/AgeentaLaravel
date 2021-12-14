<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = QueryBuilder::for(Property::class)
            ->allowedFilters('title')
            ->allowedSorts('user_id')
            ->get();

        return $properties;
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
