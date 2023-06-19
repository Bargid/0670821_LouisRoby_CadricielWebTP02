<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use App\Models\User;
use App\Models\Villes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all(); // equivalent de Select * From blog_posts
        return view('user.index', ['user' => $user]); // le dossier blog et ensuite index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all(); // Ou all, dans ce cas-ci

        return view('user.create', ['user' => $user]);
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
