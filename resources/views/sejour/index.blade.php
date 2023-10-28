@extends('layout')

@section('title', '- Sejour')

@section('content')
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-semibold fs-3">Liste des séjours</h4>
            <a href="{{ route('sejour.nouveau') }}" class="btn btn-outline-primary">Ajouter un séjour</a>
        </div>

        <table class="table table-hover table-bordered mt-3 mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom logement</th>
                    <th scope="col">Nom et prénom voyageur</th>
                    {{-- <th scope="col">Prenom voyageur</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sejours as $sejour)
                    <?php
                    $sejour_voyageur_id = $sejour->id_voyageur;
                    $sejour_logement_id = $sejour->code_logement;
                    ?>
                    <tr>
                        <td> {{ $sejour->id_sejour }} </td>
                        <td>
                            @foreach ($logements as $logement)
                                @if ($sejour_logement_id == $logement->code)
                                    <a href="{{ route('sejour.afficher', $sejour->id_sejour) }}">
                                        {{ $logement->nom }}
                                    </a>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($voyageurs as $voyageur)
                                @if ($sejour_voyageur_id == $voyageur->id_voyageur)
                                    {{ $voyageur->nom }} {{ $voyageur->prenom }}
                                @endif
                            @endforeach
                        </td>
                        {{-- <td>
                            @foreach ($voyageurs as $voyageur)
                                @if ($sejour_voyageur_id == $voyageur->id_voyageur)
                                    {{ $voyageur->prenom }}
                                @endif
                            @endforeach
                        </td> --}}
                        <td class="dropdown">
                            <button class="btn border-secondary border-1 dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            {{-- @dump($sejour) --}}
                            <ul class="dropdown-menu">
                                <button class="dropdown-item text-primary">
                                    <a class="nav-link"
                                        href="{{ route('sejour.modification', $sejour->id_sejour) }}">Modifier</a>
                                </button>
                                <form method="POST" action="{{ route('sejour.supprimer', $sejour->id_sejour) }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Supprimer</button>
                                </form>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (session('delete'))
            <div class="alert alert-danger col-md-5 mx-auto fw-light" role="alert">
                {{ session('delete') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success col-md-5 mx-auto fw-light" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{ $sejours->links() }}
    </div>
@endsection
