<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Création d'offre</title>
</head>
<body>
    <form action="{{route('offers.update', $offer->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Titre</label>
            <input type="text" name="title" id="title" value="{{$offer->title}}" required placeholder="titre" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('title')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Localité</label>
            <select name="city" id="city" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @foreach ($cities as $city)
                    <option @if ($loop->first) selected @endif value="{{$city}}">{{$city}}</option>
                @endforeach
            </select>
            @error('city')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Durée</label>
            <input type="text" name="duration" id="duration" required placeholder="durée" value="{{$offer->duration}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            <p id="duration-error" style="color: red;"></p>
            @error('duration')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Rémunération</label>
            <input type="number" name="remuneration" id="remuneration" required placeholder="remuneration" value="{{$offer->remuneration}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            <p id="remuneration-error" style="color: red;"></p>
            @error('remuneration')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Date de début</label>
            <input type="text" name="date_offer" id="date_offer" required placeholder="jj/mm/aaaa" value="{{$offer->date_offer}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            <p id="date_offer-error" style="color: red;"></p>
            @error('date_offer')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nombre de place</label>
            <input type="number" name="place_offered" id="place_offered" required value="{{$offer->place_offered}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <p id="place_offered-error" style="color: red;"></p>
                @error('place_offered')
                    <p style="color: red;">{{$message}}</p>
                @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Entreprise</label>
            <select name="company_id" id="company_id" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @foreach ($companies as $company)
                    <option @if ($loop->first) selected @endif data-name="{{ $company->name }}" title="{{ $company->name }}">{{$company->id}}</option>
                @endforeach
            </select>
            @error('company_id')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Description</label>
            <textarea type="text" rows="20" cols="100" name="description" id="description" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">{{$offer->description}}</textarea>
            @error('description')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
            Annuler
        </button>
    </a>
    @if ($errors->any()) {
        <div>
            <div style="font-style: italic; color:red;">Something went wrong</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    }
    @endif
    <script>
        // Convertir le titre en majuscules
        document.getElementById('title').addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });

        document.getElementById('remuneration').addEventListener('input', function() {
            var value = parseInt(this.value, 10);
            if (isNaN(value)) {
                document.getElementById('remuneration-error').innerText = 'La rémunération doit être un nombre';
            } else {
                document.getElementById('remuneration-error').innerText = '';
            }
        });


        document.getElementById('place_offered').addEventListener('input', function() {
            if (isNaN(this.value)) {
                document.getElementById('place_offered-error').innerText = 'Le nombre de places doit être un nombre';
            } else {
                document.getElementById('place_offered-error').innerText = '';
            }
        });

        document.getElementById('duration').addEventListener('input', function() {
            var durationRegex = /^\d+\s(weeks|months)$/i;
            var durationError = document.getElementById('duration-error');
            var value = this.value.trim();
            if (!durationRegex.test(value) && value !== '') {
                durationError.textContent = 'La durée doit être composée d\'un chiffre suivi de "semaines" ou "mois".';
            } else {
                durationError.textContent = '';
            }
        });


        // Vérifier que la description n'est pas vide
        document.getElementById('description').addEventListener('input', function() {
            if (this.value.trim() === '') {
                document.getElementById('description-error').innerText = 'La description ne peut pas être vide';
            } else {
                document.getElementById('description-error').innerText = '';
            }
        });

        document.getElementById('date_offer').addEventListener('input', function() {
            var dateOfferRegex = /^\d{2}\/\d{2}\/\d{4}$/;
            var dateOfferError = document.getElementById('date_offer-error');
            var dateParts = this.value.split('/');
            var dateOffer = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            if (!dateOfferRegex.test(this.value) && this.value !== '') {
                dateOfferError.textContent = 'La date doit être au format jj/mm/aaaa.';
            } else if (dateOffer < today) {
                dateOfferError.textContent = 'La date de début doit être dans le futur.';
            } else {
                dateOfferError.textContent = '';
            }
        });
    </script>
</body>
</html>