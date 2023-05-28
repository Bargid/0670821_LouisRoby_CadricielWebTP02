<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use App\Models\Villes;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiants::all(); // equivalent de Select * From blog_posts
        return view('etudiants.index', ['etudiant' => $etudiants]); // le dossier blog et ensuite index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants = Etudiants::all(); // Ou all, dans ce cas-ci

        return view('etudiants.create', ['etudiant' => $etudiants]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPost = Etudiants::create ([
            'prenom'       => $request->prenom,
            'nom'        => $request->nom,
            'birthdate' => $request->birthdate,
            'courriel'  => $request->courriel,
            'telephone'  => $request->telephone,
            'ville_id'     => $request->ville_id
        ]);

        return redirect(route('etudiants.index', $newPost->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiants $etudiants)
    {
        return view('etudiants.show', ['etudiant' => $etudiants]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiants $etudiants)
    {
        $villes = Villes::all(); // Retrieve all Villes

        return view('etudiants.edit', ['etudiant' => $etudiants, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiants $etudiants)
    {
        $etudiants->update([
            'prenom'       => $request->prenom,
            'nom'        => $request->nom,
            'birthdate' => $request->birthdate,
            'courriel'  => $request->courriel,
            'telephone'  => $request->telephone,
            'ville_id'     => $request->ville_id
         ]);

        return redirect(route('etudiant.show', $etudiants->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiants $etudiants)
    {
        $etudiants->delete();

        return redirect(route('etudiants.index'));
    }
}
