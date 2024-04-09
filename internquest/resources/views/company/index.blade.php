@extends('accueil')

@section('title', 'Entreprises')

@section('content')
    <div class="flex justify-center">
        
        <div class="w-full max-w-4xl">
            @auth
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
                    <a href="{{route('companies.create')}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium"><ion-icon name="add-outline"></ion-icon>Créer</button></a>
                @endif
            @endauth
            
            <div class="flex justify-center">
                <form action="{{ route('companies.filter') }}" method="GET">
                    <div class="flex space-x-2">
                        <input type="text" name="name" placeholder="Nom de l'entreprise" value="{{ request('name') }}">
                        <input type="text" name="area" placeholder="Secteur d'activité" value="{{ request('area') }}">
                        <input type="text" name="location" placeholder="Localité" value="{{ request('location') }}">
                        <input type="number" name="internsCount" placeholder="Nombre de stagiaires" value="{{ request('internsCount') }}">
                        <input type="number" name="evaluation" placeholder="Évaluation minimum" value="{{ request('evaluation') }}">
                        <button type="submit">Filtrer</button>
                    </div>
                </form>
            </div>                

            <div class="flex flex-col w-full">
                @foreach ($companies as $company)
                <div class="company bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                    <strong><h1 class="text-xl font-bold">{{$company->name}}</h1></strong>
                    <p class="text-gray-900 text-lg font-semibold">Secteur {{$company->area}}</p>
                    <p class="text-gray-900 text-lg font-semibold">data-interns={{ $company->interns_count }}</p>
                    <p class="text-gray-900 text-lg font-semibold">Vous pouvez nous trouver sur {{$company->website}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Note: <span class="stars" data-evaluation="{{$company->evaluation}}"></span></p>
                    <div class="mt-4">
                        <a href="{{route('companies.show', $company->id)}}">
                            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus</button>
                        </a>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        var starsContainers = document.querySelectorAll('.stars');
        starsContainers.forEach(function(starContainer) {

          var evaluation = parseInt(starContainer.getAttribute('data-evaluation'));

          if (evaluation == 0) {
                starContainer.innerHTML = 'N/A';
          } else {
                for (var i = 0; i < evaluation; i++) {
                starContainer.innerHTML += '<ion-icon name="star"></ion-icon>';
                }
                for (var j = evaluation; j < 5; j++) {
                starContainer.innerHTML += '<ion-icon name="star-outline"></ion-icon>';
            }
          }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('input[type="text"]');
        
            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    input.value = input.value.toUpperCase();
                });
            });
        });
    </script>
@endsection()
