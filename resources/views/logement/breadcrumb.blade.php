 @php
     $routeName = request()
         ->route()
         ->getName();
 @endphp

 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('logement.index') }}">Logement</a></li>
         <li class="breadcrumb-item active" aria-current="page">
             @if ($routeName == 'logement.nouveau')
                 Ajouter un logement
             @else
                 Modifier un logement
             @endif
         </li>
     </ol>
 </nav>
