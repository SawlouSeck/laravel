<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Secteur;
use App\Models\Candidat;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programme = Programme::all();
        return view ('programmes.liste', compact('programme'));


    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programme = new Programme();

        $user = auth()->user();
    $isAdmin = $user->isAdmin();

    // Si l'utilisateur n'est pas admin, redirigez-le ou affichez un message d'erreur
    if (!$isAdmin) {
        // Redirection avec message d'erreur (vous pouvez personnaliser cela selon vos besoins)
        return redirect()->route('home')->with('error', 'Vous n\'avez pas la permission d\'ajouter un progamme.');

    }

    // Sinon, continuez avec la logique normale

        $candidat = Candidat::all();
        $secteur = Secteur::all();
        return view('programmes.add', compact('programme','candidat','secteur'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'=> 'required',
            'contenu' => 'required',
            'document'=> 'required',
            'candidat_id'=>'required',
            'secteur_id' => 'required',
        ]);
        $programme = new Programme();
        $programme -> titre = $request->titre;
        $programme->contenu = $request->contenu;
        $programme->candidat_id = $request->candidat_id;
        $programme->secteur_id = $request->secteur_id;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "document";
            // $filename = time().'.'.$extension;
            $file->move($destination,$filename);
            $programme->document=$filename;
        }else{
            $programme->document='';
            return $request;
        }


        $programme->save();
        return redirect()->route('programme.index')->with('success','Programme created successfully.');




    }




    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programme = Programme::find($id);
        $candidats = Candidat::all();  // Charger tous les candidats pour la liste déroulante
        $secteurs = Secteur::all();   // Charger tous les secteurs pour la liste déroulante

        return view('programmes.edit', compact('programme', 'candidats', 'secteurs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $programme = Programme::find($id);
        $programme->titre = $request->titre;
        $programme->contenu = $request->contenu;
        $programme->document = $request->document;
        $programme->candidat_id = $request->candidat_id;
        $programme->secteur_id = $request->secteur_id;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "document";
            // $filename = time().'.'.$extension;
            $file->move($destination,$filename);
            $programme->document=$filename;
        }else{
            $programme->document = '';
            $programme->secteur_id = 1; // Remplacez 1 par la valeur par défaut que vous souhaitez
            return $request;}
        $programme-> update();
        return redirect()->route('programme.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $programme = Programme::find($id);
        $user = auth()->user();
        $isAdmin = $user->isAdmin();

        // Si l'utilisateur n'est pas admin, redirigez-le ou affichez un message d'erreur
        if (!$isAdmin) {
            // Redirection avec message d'erreur (vous pouvez personnaliser cela selon vos besoins)
            return redirect()->route('home')->with('error', 'Vous n\'avez pas la permission d\'ajouter un candidat.');

        }

        $programme->delete();
        return redirect()->back();
    }
    // ProgrammeController.php
public function vote(Programme $programme)
{$programme = Programme::find(1);
    $votes = $programme->votes;

    return view('livewire.programm-vote', ['program' => $programme]);
}

}
