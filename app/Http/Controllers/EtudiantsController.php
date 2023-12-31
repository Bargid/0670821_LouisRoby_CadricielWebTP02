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
        $etudiants = Etudiants::all(); // Retrieve all etudiants with their associated user
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants = Etudiants::all(); // Ou all, dans ce cas-ci

        return view('etudiants.create', ['etudiants' => $etudiants]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'birthdate' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|string',
            'ville_id' => 'required|exists:villes,id',
            'password' => 'required|min:6'
        ]);
    
        
        // Création du User en relation avec l'étudiant, dans la BD
        $user = new User([
            'prenom' => $validatedData['prenom'],
            'nom' => $validatedData['nom'],
            'birthdate' => $validatedData['birthdate'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $user->save();
        
        // Création de l'étudiant dans la BD

        $etudiant = new Etudiants;
        $etudiant->id = $user->id;
        $etudiant->ville_id = $validatedData['ville_id'];
        
        $etudiant->save();

        return redirect(route('login'));
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
            'email'  => $request->email,
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
