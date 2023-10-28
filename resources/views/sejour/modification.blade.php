@extends('layout')

@section('title', '- Modifier Sejour')

@section('content')
    <div class="container" style="max-width: 50rem;">
        @include('sejour.breadcrumb')
        <div class="card">
            {{-- @dump($sejour) --}}
            <div class="card-body">
                <h3 class="card-title fw-medium mb-5 text-center">Modifier un séjour</h3>

                <form method="POST" action="{{ route('sejour.modifier', $sejour[0]->id_sejour) }}" class="card-text">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row my-3">
                        <label for="id_voyageur" class="col-md-4 col-form-label">Voyageur:</label>
                        <div class="col-md-6">
                            <select name="id_voyageur"
                                class="form-select ms-2 form-control @error('id_voyageur') is-invalid @enderror"
                                aria-label="Select option">
                                <option>Sélectionner le voyageur</option>
                                @foreach ($voyageurs as $voyageur)
                                    <option
                                        {{ old('id_voyageur', $sejour[0]->id_voyageur) == $voyageur->id_voyageur ? 'selected' : '' }}
                                        name="{{ $voyageur->nom }} {{ $voyageur->prenom }}"
                                        value="{{ $voyageur->id_voyageur }}">
                                        {{ $voyageur->nom }} {{ $voyageur->prenom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_voyageur')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>Veuillez sélectionner le voyageur</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row my-3">
                        <label for="code_logement" class="col-md-4 col-form-label">Logement:</label>
                        <div class="col-md-6">
                            <select name="code_logement"
                                class="form-select ms-2 form-control @error('code_logement') is-invalid @enderror"
                                aria-label="Select option">
                                <option>Sélectionner le logement</option>
                                @foreach ($logements as $logement)
                                    <option
                                        {{ old('code_logement', $sejour[0]->code_logement) == $logement->code ? 'selected' : '' }}
                                        name="{{ $logement->nom }}" value="{{ $logement->code }}">
                                        {{ $logement->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('code_logement')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>Veuillez sélectionner le logement</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="debut" class="col-md-4 col-form-label">Date de début:</label>
                        <div class="col-md-6">
                            <input id="debut" type="date" class="form-control @error('debut') is-invalid @enderror"
                                name="debut" autofocus value="{{ old('debut', $sejour[0]->debut) }}">
                            @error('debut')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fin" class="col-md-4 col-form-label">Date de fin:</label>
                        <div class="col-md-6">
                            <input id="fin" type="date" class="form-control @error('fin') is-invalid @enderror"
                                name="fin" autofocus value="{{ old('fin', $sejour[0]->fin) }}">
                            @error('fin')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="col-4 btn btn-primary">
                            Modifier
                        </button>
                    </div>

                </form>
            </div>
            @if (session('success'))
                <div class="alert alert-success col-md-5 mx-auto" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
