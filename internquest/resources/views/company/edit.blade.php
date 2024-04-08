<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Modifier entreprise</title>
</head>
<body>

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
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-xl bg-white p-10 rounded-lg shadow-lg">
            <form action="{{route('companies.update', $company->id)}}" method="POST" enctype>
                @csrf
                @method('PUT')
                <div class="relative mb-2 flex flex-col">
                    <label class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Nom</label>
                    <input type="text" name="name" id="name" required placeholder="Nom" value="{{$company->name}}" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('name')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-2 flex flex-col">
                    <label required class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Secteur</label>
                    <select name="area" id="area" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @foreach ($areas as $area)
                            <option value="{{$area->name}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                    @error('area')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-2 flex flex-col">
                    <label class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Site</label>
                    <input type="text" name="website" id="website" required placeholder="example.fr" value="{{$company->website}}" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('website')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-2 flex flex-col">
                    <label class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Code postal</label>
                    <input type="text" name="postal_code" id="postal_code" value="{{$location->postal_code}}" required placeholder="Code Postal" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('postal_code')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                    <span class="error-message" id="error-postal_code"></span><br>
                </div>
                <div class="relative mb-2 flex flex-col">
                    <label required class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Ville</label>
                    <input type="text" name="cities" id="cities" value="{{$location->city}}" placeholder="Ville" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <input type="hidden" name="city" id="city" required value="">
                    <select name="select_city" id="select_city" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400 disabled">
                        <option id="opt"></option>
                    </select>
                    @error('city')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-2 flex flex-col">
                    <label class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Adresse</label>
                    <input type="text" name="location" id="location" required placeholder="Adresse de l'entreprise" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('location')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("postal_code").addEventListener("input", function() {
            var postalCode = this.value;
            var errorPostalCode = document.getElementById("error-postal_code");
    
            if (!/^\d{5}$/.test(postalCode)) {
                errorPostalCode.innerHTML = "Veuillez entrer un code postal valide (5 chiffres)";
            } else {
                errorPostalCode.innerHTML = "";
            }
            fetchCitiesAndPopulateSelect(postalCode);
        });
    
        document.getElementById("name").addEventListener("input", function() {
            this.value = this.value.toUpperCase();
        });

        document.getElementById("city").addEventListener("input", function() {
            this.value = this.value.toUpperCase();
        });

        document.getElementById("cities").addEventListener("input", async function() {
            var cityName = this.value.trim();
            var selectCity = document.getElementById("select_city");
            if (this.value.trim() !== "") {
                selectCity.disabled = true;
            } else {
                selectCity.disabled = false;
            }
            if (cityName.length < 3) return; // Ne pas faire de requête si moins de 3 caractères
            var postalCodeInput = document.getElementById("postal_code");
            var errorElement = document.getElementById('error-postal_code');
            errorElement.innerHTML = ""; // Vider le message d'erreur précédent
    
            try {
                var postalCode = await fetchCPbycity(cityName);
                postalCodeInput.value = postalCode; // Remplir le champ de saisie du code postal
            } catch (error) {
                console.error('Error fetching postal code:', error);
                errorElement.innerHTML = "Code postal introuvable pour la ville saisie";
            }
            document.getElementById("city").value = cityName
            this.value = this.value.toUpperCase();
        });
    
        document.getElementById("select_city").addEventListener("change", async function() {
            var selectedCity = this.value;
            var postalCodeInput = document.getElementById("postal_code");
            var errorElement = document.getElementById('error-postal_code');
            errorElement.innerHTML = ""; // Vider le message d'erreur précédent
            var inputCities = document.getElementById("cities");
            if (this.value !== "") {
                inputCities.value = ""; // Clear input value
                inputCities.disabled = true; // Disable input
            } else {
                inputCities.disabled = false; // Enable input
            }
            try {
                var postalCode = await fetchCPbycity(selectedCity);
                postalCodeInput.value = postalCode; // Remplir le champ de saisie du code postal
            } catch (error) {
                console.error('Error fetching postal code:', error);
                errorElement.innerHTML = "Code postal introuvable pour la ville sélectionnée";
            }
            document.getElementById("city").value = selectedCity;
            this.value = this.value.toUpperCase();
        });
    
        document.querySelector('form').addEventListener('submit', function() {
            var inputCities = document.getElementById("cities");
            var selectCity = document.getElementById("select_city");
            inputCities.disabled = false;
            selectCity.disabled = false;
        });

        async function fetchCPbycity(city) {
            const apiUrl = `https://vicopo.selfbuild.fr/cherche/${encodeURIComponent(city)}`;
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                if (data && data.cities && data.cities.length) {
                    // Supposons que le premier élément du tableau est la ville correspondante
                    return data.cities[0].code; // Notez que la propriété est 'code', pas 'codePostal'
                } else {
                    throw new Error("Aucun code postal trouvé pour la ville");
                }
            } catch (error) {
                throw error;
            }
        }
    
        async function fetchCitiesByPostalCode(code) {
            const apiUrl = `https://vicopo.selfbuild.fr/cherche/${encodeURIComponent(code)}`;
    
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
    
                // Check if data is not empty
                if (data && data.cities && data.cities.length > 1) {
                    // Ignore the first element of the cities array
                    return data.cities; //data.cities.slice(1);
                } else {
                    return []; // Return an empty array if no cities found or only one city
                }
                } catch (error) {
                    console.error('Error fetching data:', error);
                    throw error; // Throw the error to be caught by the caller
            }
        }
    
        async function fetchCitiesAndPopulateSelect(postalCode) {
            const selectElement = document.getElementById('select_city');
            const inputCities = document.getElementById("cities");

            // Clear previous options and disable select while loading
            selectElement.innerHTML = '<option value="" disabled selected>Loading...</option>';
            selectElement.disabled = true;

            try {
                const cities = await fetchCitiesByPostalCode(postalCode);

                // Populate select element with cities and enable it
                selectElement.innerHTML = '';
                if (cities.length > 0) {
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.city;
                        option.textContent = city.city;
                        selectElement.appendChild(option);
                    });
                    selectElement.disabled = false; // Enable select after loading cities
                    inputCities.disabled = true; // Disable input if select has options
                } else {
                    // If no cities found, display a message and enable input
                    selectElement.innerHTML = '<option value="" disabled selected>No cities found</option>';
                    inputCities.disabled = false;
                }
            } catch (error) {
                console.error('Error populating cities:', error);
                // Display error message and enable input
                selectElement.innerHTML = '<option value="" disabled selected>Error loading cities</option>';
                inputCities.disabled = false;
            }
        }
    </script>
</body>
</html>