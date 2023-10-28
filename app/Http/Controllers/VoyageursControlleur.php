<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchClientSejourInfoRequest;
use App\Models\Logement;
use App\Models\Sejour;
use App\Models\Voyageur;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VoyageursControlleur extends Controller
{
    public function index(): View
    {
        return view("voyageur.index", [
            "voyageurs" => Voyageur::all(),
        ]);
    }

    public function rechercherInfoSejour(SearchClientSejourInfoRequest $request)
    {
        $clientsSejoursInfo = Sejour::where('id_voyageur', $request->id_voyageur)->get();

        // dd($clientsSejoursInfo);
        return view('voyageur.index', [
            "voyageurs" => Voyageur::all(),
            'clientsSejoursInfo' => $clientsSejoursInfo,
            "sejours" => Sejour::all(),
            "logements" => Logement::all(),
            'input' => $request->validated(),
        ]);
    }
}
