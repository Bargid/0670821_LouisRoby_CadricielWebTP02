<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authentification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('authentification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:user',
            'password'  => 'min:6|max:20'
        ]);

        // Ce que le required fait -- if true, redirect()->back()->withErrors() 

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password); // Hash le password a l'aide du module Facades importé en haut
        $user->save(); // Fonctionne seulement si le nom dans le input est le meme que celui dans la Base de Donnée

        // return redirect()->back()->withSuccess('Utilisateur Enregistré!');
        return redirect(route('login'))->withSuccess(trans('lang.text_success_user'));
    }

    public function authentication(Request $request) {
        // dd($request->all());
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        // dd($request->all()); // it works, tu te rends ici
        $credentials = $request->only('email', 'password');

        // if (!Auth::attempt($credentials)) {
        //     dd(Auth::attempt($credentials));
        //     return redirect()->back()->withErrors(trans('auth.failed'));
        // }

        if(!Auth::validate($credentials)) {
            // dd(Auth::attempt($credentials));
            return redirect()->back()->withErrors(trans('authentification.failed'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->intended(route('etudiants.index')); // va retourner l'utilisateur vers la page qu'il essayait d'acceder. Si je vais sur blog-create, ca va me redirectionner sur login, et une fois logged in, je retourne vers blog-create
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }

    public function userList() {

        $user = User::select('id', 'name')
            ->orderby ('name')
            ->paginate (5);

        return view ('authentification.userList', ['user' => $user]);
    }
}
