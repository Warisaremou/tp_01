@extends('layout')

@section('title', '- Sejour')

@section('content')
    <div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sejour.index') }}">Sejour</a></li>
                <li class="breadcrumb-item active" aria-current="page">séjour {{ $sejour[0]->id_sejour }} </li>
            </ol>
        </nav>

        <div class="d-flex gap-5">
            @foreach ($logements as $logement)
                @if ($logement->code == $sejour[0]->code_logement)
                    <div class="over" style="overflow: hidden; height: 25rem; width: 50%">
                        <img src="/storage/{{ $logement->photo }}" class="card-img-top" alt=" {{ $logement->nom }} -photo"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endif
            @endforeach

            <div>
                {{-- VOYAGEUR --}}
                @foreach ($voyageurs as $voyageur)
                    @if ($voyageur->id_voyageur == $sejour[0]->id_voyageur)
                        <h3>Nom du voyageur: {{ $voyageur->nom }} </h3>
                        <h3>Prénom du voyageur: {{ $voyageur->prenom }} </h3>
                    @endif
                @endforeach

                {{-- LOGEMENT --}}
                @foreach ($logements as $logement)
                    @if ($logement->code == $sejour[0]->code_logement)
                        <h4>Nom du logement: {{ $logement->nom }}</h4>
                        <h4>Capacite du logement: {{ $logement->capacite }}</h4>
                        <h4>Type du logement: {{ $logement->type }}</h4>
                        <h4>Lieu du logement: {{ $logement->lieu }}</h4>
                    @endif
                @endforeach

                <h5>
                    Du {{ $sejour[0]->debut }} au {{ $sejour[0]->fin }}
                </h5>
            </div>
        </div>
    </div>
@endsection
