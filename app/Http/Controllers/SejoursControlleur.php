<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSejourRequest;
use App\Models\Logement;
use App\Models\Sejour;
use App\Models\Voyageur;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SejoursControlleur extends Controller
{
    public function index(): View
    {
        // dd(Sejour::all());
        return view('sejour.index', [
            'sejours' => Sejour::paginate(6),
            'voyageurs' => Voyageur::all(),
            'logements' => Logement::all()
        ]);
    }

    public function afficherSejour(int $sejourID): View
    {
        // Sejour::where("id_sejour", $sejourID)->get();

        return view("/sejour/afficher", [
            "sejour" => Sejour::where('id_sejour', $sejourID)->get(),
            'voyageurs' => Voyageur::all(),
            'logements' => Logement::all()
        ]);
    }

    public function nouveauSejour(): View
    {
        return view('sejour.nouveau', [
            'voyageurs' => Voyageur::all(),
            'logements' => Logement::all()
        ]);
    }

    public function ajouterSejour(CreateSejourRequest $request)
    {
        // dd($request->validated());
        $sejour = new Sejour;

        $sejour->id_voyageur = $request->id_voyageur;
        $sejour->code_logement = $request->code_logement;
        $sejour->debut = $request->debut;
        $sejour->fin = $request->fin;

        $sejour->save();
        return redirect()->route('sejour.nouveau')->with('success', "Le séjour a été enrégistré avec succès");
    }

    public function supprimerSejour(int $sejourID)
    {
        Sejour::where("id_sejour", $sejourID)->delete();
        return redirect()->route("sejour.index")->with('delete', "Le séjour à été supprimé avec succès");
    }

    public function modificationSejour(int $sejourID)
    {
        // $sejour = Sejour::where('id_sejour', $sejourID)->get();
        // dd($sejour);
        return
            view('sejour.modification', [
                'sejour' => Sejour::where('id_sejour', $sejourID)->get(),
                'voyageurs' => Voyageur::all(),
                'logements' => Logement::all()
            ]);
    }

    public function modifierSejour(int $sejourID, CreateSejourRequest $request)
    {
        // dd($request->validated());
        Sejour::where("id_sejour", $sejourID)->update([
            'id_voyageur' => $request->id_voyageur,
            'code_logement' => $request->code_logement,
            'debut' => $request->debut,
            'fin' => $request->fin,
        ]);
        return redirect()->route('sejour.index')->with('success', 'Le séjour à été modifié avec succès');
    }
}
