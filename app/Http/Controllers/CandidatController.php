<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidat = Candidat::all();
        return view('candidats.liste', compact('candidat'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidat = new Candidat();

        $user = auth()->user();
    $isAdmin = $user->isAdmin();

    // Si l'utilisateur n'est pas admin, redirigez-le ou affichez un message d'erreur
    if (!$isAdmin) {
        // Redirection avec message d'erreur (vous pouvez personnaliser cela selon vos besoins)
        return redirect()->route('home')->with('error', 'Vous n\'avez pas la permission d\'ajouter un candidat.');

    }

    // Sinon, continuez avec la logique normale
    return view('candidats.add');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Parti' => 'required',
            'Biographie' => 'required',
            'Validate' => 'required',
            'photo' => 'nullable',
        ]);
        $candidat = new Candidat();
        $candidat->Nom = $request->Nom;
        $candidat->Prenom = $request->Prenom;
        $candidat->Parti = $request->Parti;
        $candidat->Biographie = $request->Biographie;
        $candidat->Validate = $request->Validate;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            $file->move($destination, $file->getClientOriginalName());
            // $filename = time().'.'.$extension;
            // $file->move('downloads',$filename);
            $candidat->Photo=$filename;
            }else{
                return $request;
                $candidat->photo = '';
             }
             $candidat->save();
             return redirect()->route('home'); // Redirige vers la route d'accueil
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $candidat = Candidat::find($id);
        $user = auth()->user();
        $isAdmin = $user->isAdmin();

        // Si l'utilisateur n'est pas admin, redirigez-le ou affichez un message d'erreur
        if (!$isAdmin) {
            // Redirection avec message d'erreur (vous pouvez personnaliser cela selon vos besoins)
            return redirect()->route('home')->with('error', 'Vous n\'avez pas la permission d\'ajouter un candidat.');

        }

        // Sinon, continuez avec la logique normale
        return view('candidats.edit', compact('candidat'));;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $candidat =  Candidat::find($id);
        $candidat->Nom = $request->Nom;
        $candidat->Prenom = $request->Prenom;
        $candidat->Parti = $request->Parti;
        $candidat->Biographie = $request->Biographie;
        $candidat->Validate = $request->Validate;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            $file->move($destination, $file->getClientOriginalName());
            // $filename = time().'.'.$extension;
            // $file->move('downloads',$filename);
            $candidat->photo=$filename;
        }
            else{
                return $request;
                $candidat->photo = '';
             }
        $candidat->update();
        return redirect()->route('candidat.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $candidat = Candidat::find($id);
        $user = auth()->user();
        $isAdmin = $user->isAdmin();

        // Si l'utilisateur n'est pas admin, redirigez-le ou affichez un message d'erreur
        if (!$isAdmin) {
            // Redirection avec message d'erreur (vous pouvez personnaliser cela selon vos besoins)
            return redirect()->route('home')->with('error', 'Vous n\'avez pas la permission d\'ajouter un candidat.');

        }

        $candidat -> delete();
        return redirect()->back();
    }
    public function showProgramme($id)
    {



    // Récupérez le candidat par son ID
    $candidat = Candidat::find($id);

    // Récupérez tous les programmes associés à ce candidat
    $programmes = $candidat->programmes;

    // Retournez la vue du programme avec les données du candidat et ses programmes
    return view('candidats.programme', compact('candidat', 'programmes'));
    }
}
