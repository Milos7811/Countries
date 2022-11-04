<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountryRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Countrie;

class CountriesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CreateCountryRequest $request) : Countrie
    {
        $display_order = DB::table('countries')->max('display_order');

        return Countrie::create([
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'full_name' => $request->input('full_name'),
                'iso3' => $request->input('iso3'),
                'number' => $request->input('number'),
                'continent_code' => $request->input('continent_code'),
                'display_order' => $display_order +1
            ]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(string $id) : Countrie
    {
        return Countrie::where('country_id', $id)->first();
    }
}
