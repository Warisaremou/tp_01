@extends('layout')

@section('title', '- Ajouter Logement')

@section('content')
    <div class="container" style="max-width: 50rem;">
        @include('logement.breadcrumb')

        <div class="card">
            <div class="card-body">
                <h3 class="card-title fw-medium mb-5 text-center">Ajouter un logement</h3>

                <form method="POST" action="{{ route('logement.ajouter') }}" enctype="multipart/form-data"
                    class="card-text">
                    @csrf
                    <div class="row mb-3">
                        <label for="nom" class="col-md-4 col-form-label text-start">Nom:</label>

                        <div class="col-md-6">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                name="nom" autofocus>
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
                                class="form-control @error('capacite') is-invalid @enderror" name="capacite" autofocus>
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
                                name="type" autofocus>
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
                                name="lieu" autofocus>
                            @error('lieu')
                                <span class="invalid-feedback text-start" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
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
                    </div>

                    <div>
                        <div class="form-check form-switch col-3 mx-auto">
                            <input type="hidden" value="non" name="disponibilite">
                            <input @checked($value ?? false)
                                class="form-check-input @error('disponibilite') is-invalid @enderror" type="checkbox"
                                role="switch" id="disponibilite" value="oui" name="disponibilite">
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
                            Ajouter
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
