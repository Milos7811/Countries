<?php

namespace App\Http\Controllers;

use App\Models\Countrie;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
       return Countrie::orderBy('name', request()->direction)
        ->paginate('10');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(string $continent_code)
    {
        return Countrie::where('continent_code', $continent_code)
            ->orderBy('name', request()->direction)
            ->paginate('10');
    }
}
