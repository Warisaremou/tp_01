<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class LogementsControlleur extends Controller
{
    public function index(): View
    {
        return view('logement.index', [
            'logements' => Logement::where('disponibilite', 'oui')->paginate(4)
        ]);
    }

    // public function voirLogement(string $logementCode): RedirectResponse | Logement
    // {
    //     $logement = Logement::find($logementCode);
    //     dd($logement);

    //     if (!$logement) {
    //         return abort(404);
    //     }
    //     return $logement;
    // }

    public function nouveauLogement(): View
    {
        return view('logement.nouveau');
    }

    public function ajouterLogement(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'min:2', 'max:50'],
            'capacite' => ['required', 'integer', 'min:0'],
            'type' => ['required'],
            'lieu' => ['required', 'min:3', 'max:50'],
            'photo' => ['image', 'max:2000', 'required'],
            'disponibilite' => ['required', 'min:3', 'max:3'],
        ]);

        /** @var UploadedFile  $photo */
        $logement = new Logement;

        $logement->nom = $request->input('nom');
        $logement->capacite = $request->input('capacite');
        $logement->type = $request->input('type');
        $logement->lieu = $request->input('lieu');
        $logement->photo = $request->file('photo')->store('logement', 'public');
        $logement->disponibilite = $request->input('disponibilite');

        $logement->save();

        return redirect()->route('logement.nouveau')->with('success', "Le logement a été enrégistré avec succès");
    }

    public function modificationLogement(int $logementCode)
    {
        $logement = Logement::where('code', $logementCode)->get();
        // dd($logement);
        return
            view('logement.modification', [
                'logement' => $logement,
            ]);
    }

    public function modifierLogement(int $logementCode, Request $request)
    {
        $request->validate([
            'nom' => ['required', 'min:2', 'max:50'],
            'capacite' => ['required', 'integer', 'min:0'],
            'type' => ['required'],
            'lieu' => ['required', 'min:3', 'max:50'],
            'photo' => ['image', 'max:2000', 'required'],
            'disponibilite' => ['required', 'min:3', 'max:3'],
        ]);
        // dd($request->all());

        /** @var UploadedFile  $photo */

        Logement::where("code", $logementCode)->update([
            'nom' => $request->input('nom'),
            'capacite' => $request->input('capacite'),
            'type' => $request->input('type'),
            'lieu' => $request->input('lieu'),
            'photo' => $request->file('photo')->store('logement', 'public'),
            'disponibilite' => $request->input('disponibilite'),
        ]);

        return redirect()->route('logement.index')->with('success', 'Le logement à été modifié avec succès');
    }

    public function supprimerLogement(int $logementCode)
    {
        Logement::where("code", $logementCode)->delete();
        return redirect()->route("logement.index")->with('delete', "Le logement à été supprimé avec succès");
    }
}
