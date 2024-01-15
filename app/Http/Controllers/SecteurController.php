<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secteur = Secteur::all();
        return view('secteurs.liste', compact('secteur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $secteur = new Secteur();
        return view('Secteurs.add', compact('secteur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'libelle' => 'required',


        ]);
        $secteur = new Secteur();
        $secteur->libelle = $request->libelle;

             $secteur->save();
             return redirect('secteur')->with('status','le secteur a ete ajouter avec succes');
    }



    /**
     * Display the specified resource.
     */
    public function show(Secteur $secteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secteur = Secteur::find($id);
        return view('secteurs.edit', compact('secteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secteur = new Secteur();
        $secteur->libelle = $request->libelle;


             $secteur->update();
             return redirect('secteur')->with('status','le secteur a ete ajouter avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $secteur = Secteur::find($id);
        $secteur -> delete();
        return redirect()->back();
    }
}
