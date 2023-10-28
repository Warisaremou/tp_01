@extends('layout')

@section('title', '- Modifier Logement')

@section('content')
    <div class="container" style="max-width: 50rem;">
        @include('logement.breadcrumb')
        <div class="card">
            <div class="card-body">
                <h3 class="card-title fw-medium mb-5 text-center">Modifier un logement</h3>

                <form method="POST" action="{{ route('logement.modifier', $logement[0]->code) }}"
                    enctype="multipart/form-data" class="card-text">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row mb-3">
                        <label for="nom" class="col-md-4 col-form-label text-start">Nom:</label>

                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                name="nom" autofocus value="{{ old('nom', $logement[0]->nom) }}">
                            @error('nom')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="capacite" class="col-md-4 col-form-label text-start">Capacité:</label>

                        <div class="col-md-6">
                            <input id="capacite" type="number"
                                class="form-control @error('capacite') is-invalid @enderror" name="capacite" autofocus
                                value="{{ old('capacite', $logement[0]->capacite) }}">
                            @error('capacite')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="type" class="col-md-4 col-form-label text-start">Type:</label>
                        <div class="col-md-6">
                            <input id="type" type="texte" class="form-control @error('type') is-invalid @enderror"
                                name="type" autofocus value="{{ old('type', $logement[0]->type) }}">
                            @error('type')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="lieu" class="col-md-4 col-form-label text-start">Lieu:</label>
                        <div class="col-md-6">
                            <input id="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror"
                                name="lieu" autofocus value="{{ old('lieu', $logement[0]->lieu) }}">
                            @error('lieu')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- @dump($logement[0]->photo) --}}
                    {{-- <div class="over" style="overflow: hidden; height: 15rem; width: 100%">
                        <img src="/storage/{{ $logement[0]->photo }}" class="card-img-top"
                            alt=" {{ $logement[0]->nom }}-photo" style="width: 100%; height: 100%; object-fit: cover;">
                    </div> --}}
                    <div class="row mb-3">
                        <label for="photo" class="col-md-4 col-form-label text-start">Photo:</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                name="photo" autofocus value="{{ old('photo', $logement[0]->photo) }}">
                            @error('photo')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <label for="photo" class="col-md-4 col-form-label text-start">Photo:</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                name="photo" autofocus>
                            @error('photo')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="row mb-3">
                        <label for="current_photo" class="col-md-4 col-form-label text-start">Photo actuelle:</label>
                        <div class="col-md-6">
                            <input id="current_photo" type="text" class="form-control" value="{{ $logement[0]->photo }}"
                                readonly>
                        </div>
                    </div> --}}

                    <div>
                        <div class="form-check form-switch col-3 mx-auto">
                            <input type="hidden" value="non" name="disponibilite">
                            <input @checked(old('disponibilite', $logement[0]->disponibilite) == 'oui' ? true : false)
                                class="form-check-input @error('disponibilite')
is-invalid
@enderror" type="checkbox"
                                role="switch" id="disponibilite"
                                value="{{ old('disponibilite', $logement[0]->disponibilite) }}" name="disponibilite">
                            <label class="form-check-label" for="disponibilite">
                                Disponible ?
                            </label>
                        </div>
                        @error('disponibilite')
                            <span class="invalid-feedback text-start" role="alert">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="col-4 btn btn-primary">
                            Modifier
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
