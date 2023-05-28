<?php

namespace App\Http\Controllers;

use App\Models\Villes;
use App\Models\Etudiants;
use Illuminate\Http\Request;

class VillesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villes = Villes::all();
        return view('etudiants.create')->with('villes', $villes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Villes $villes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Villes $villes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Villes $villes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Villes $villes)
    {
        //
    }
}
