 @php
     $routeName = request()
         ->route()
         ->getName();
 @endphp

 <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{ route('sejour.index') }}">Sejour</a></li>
         <li class="breadcrumb-item active" aria-current="page">
             @if ($routeName == 'sejour.nouveau')
                 Ajouter un séjour
             @else
                 Modifier un séjour
             @endif
         </li>
     </ol>
 </nav>
