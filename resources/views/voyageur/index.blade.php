@extends('layout')

@section('title', '- RechercherInfoVoyageur')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="fw-semibold">Rechercher des informations de séjour d'un client</h5>
        <form method="GET" action="{{ route('voyageur.rechercherInfoSejour') }}" class="d-flex justify-content-end gap-5">
            {{-- @csrf --}}
            <div class="d-flex gap-2">
                <div>
                    <select name="id_voyageur"
                        class="form-select ms-2 form-control @error('id_voyageur') is-invalid @enderror"
                        aria-label="Select option">
                        <option>Nom du client</option>
                        @foreach ($voyageurs as $voyageur)
                            <option
                                @isset($input['id_voyageur'])
                            {{ $input['id_voyageur'] && $input['id_voyageur'] == $voyageur->id_voyageur ? 'selected' : '' }}
                            @endisset
                                name="{{ $voyageur->nom }}" value="{{ $voyageur->id_voyageur }}">
                                {{ $voyageur->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_voyageur')
                        <span class="invalid-feedback text-start" role="alert">
                            <p>Veuillez sélectionner le nom du client</p>
                        </span>
                    @enderror
                </div>

                {{-- <div>
                    <select name="prenom" class="form-select ms-2 form-control @error('prenom') is-invalid @enderror"
                        aria-label="Select option">
                        <option>Prénom du client</option>
                        @foreach ($voyageurs as $voyageur)
                            <option name="{{ $voyageur->prenom }}" value="{{ $voyageur->prenom }}">
                                {{ $voyageur->prenom }}
                            </option>
                        @endforeach
                    </select>
                    @error('prenom')
                        <span class="invalid-feedback text-start" role="alert">
                            <p>Veuillez sélectionner le prénom du client</p>
                        </span>
                    @enderror
                </div> --}}
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary">
                    Rechercher
                </button>
            </div>
        </form>
    </div>

    @if (isset($clientsSejoursInfo))
        @forelse ($clientsSejoursInfo as $sejourInfo)
            {{-- @dump($sejourInfo) --}}
            <div class="mt-3 p-2" style="background-color: aliceblue">
                <div class="d-flex gap-2">
                    <h5>Séjour n°{{ $sejourInfo->id_sejour }} :</h5>
                    <h5> Du {{ $sejourInfo->debut }} au {{ $sejourInfo->debut }} </h5>
                </div>
                <div>
                    @foreach ($logements as $logement)
                        @if ($logement->code == $sejourInfo->code_logement)
                            <h5>Nom du logement: {{ $logement->nom }} </h5>
                        @endif
                    @endforeach
                </div>
            </div>
        @empty
            <h4 class="text-danger mt-3">Le client n'a effectué aucun séjour</h4>
        @endforelse
    @endif

@endsection
