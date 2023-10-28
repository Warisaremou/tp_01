@extends('layout')

@section('title', '- Logement')

@section('content')
    <div>
        {{-- @dump($logements) --}}
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-semibold fs-3">Liste des logements</h4>
            <a href="{{ route('logement.nouveau') }}" class="btn btn-outline-primary">Ajouter un logement</a>
        </div>

        <div class="mt-5 d-flex colum-gap-4 gap-4 mb-4">
            @forelse ($logements as $logement)
                <div class="card" style="width: 20rem;">
                    <div class="over" style="overflow: hidden; height: 15rem; width: 100%">
                        <img src="/storage/{{ $logement->photo }}" class="card-img-top" alt=" {{ $logement->nom }}-photo"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $logement->nom }} </h5>
                        <div class="card-text">
                            <h4 class="font-medium">Type: {{ $logement->type }}</h4>
                            <p>Lieu: {{ $logement->lieu }}</p>
                        </div>
                        <div class="d-flex justify-content-center gap-4">
                            <a href="{{ route('logement.modification', $logement->code) }}"
                                class="btn btn-primary">Modifier</a>
                            <form method="POST" action="{{ route('logement.supprimer', $logement->code) }}">
                                {{ method_field('delete') }}
                                @csrf
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>

            @empty
                <h5 class="col-5 mx-auto text-danger ">Vous n'avez aucun logement disponible !</h5>
            @endforelse
        </div>

        @if (session('delete'))
            <div class="alert alert-danger col-md-5 mx-auto fw-light mb-5" role="alert">
                {{ session('delete') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success col-md-5 mx-auto fw-light mb-5" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{ $logements->links() }}

    </div>
@endsection
