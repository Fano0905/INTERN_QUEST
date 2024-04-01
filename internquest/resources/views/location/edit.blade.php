@extends('base')

<form action="{{route('locations.update', $location->id)}}" method="POST" enctype>
    @csrf
    <div class="relative mb-6">
        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">postal code</label>
        <input type="text" name="postal_code" id="postal_code" required placeholder="Code Postal" value="{{$location->postal_code}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        @error('postal_code')
            <p style="color: red;">{{$message}}</p>
        @enderror
        <span class="error-message" id="error-postal_code"></span><br>
    </div>
    <div class="relative mb-6">
        <label required class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">City</label>
        <select name="city" id="city" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            <option id="opt" value="{{$location->city}}">{{$location->city}}</option>
        </select>
        @error('city')
            <p style="color: red;">{{$message}}</p>
        @enderror
    </div>
    <div class="relative mb-6">
        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Location</label>
        <input type="text" name="location" id="location" required placeholder="Adresse de l'entreprise" value="{{$location->location}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        @error('location')
            <p style="color: red;">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Enregistrer Adresse</button>
    </div>
</form>

<script>
    document.getElementById("postal_code").addEventListener("input", function() {
        var postalCode = this.value;
        var errorPostalCode = document.getElementById("error-postal_code");
        const ville_i = document.getElementById("ville_i");

        if (!/^\d{5}$/.test(postalCode)) {
            errorPostalCode.innerHTML = "Veuillez entrer un code postal valide (5 chiffres)";
        } else {
            errorPostalCode.innerHTML = "";
        }
        fetchCitiesAndPopulateSelect(postalCode);
    });

    document.getElementById("city").addEventListener("change", async function() {
        var selectedCity = this.value;
        var postalCodeInput = document.getElementById("postal_code");

        try {
            var postalCode = await fetchCPbycity(selectedCity);
            postalCodeInput.value = postalCode; // Remplir le champ de saisie du code postal
        } catch (error) {
            console.error('Error fetching postal code:', error);
        }
    });

    async function fetchCPbycity(city) {
        const apiUrl = `https://vicopo.selfbuild.fr/cherche/${city}`;

        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            if (data && data.cities && data.cities.length > 0) {
                return data.cities[0].codePostal; // Retourner le code postal
            } else {
                throw new Error("Aucun code postal trouvé pour la ville");
            }
        } catch (error) {
            document.getElementById('error-postal_code').innerHTML = "Code postal introuvable pour la ville sélectionnée";
            throw error;
        }
    }

    async function fetchCitiesByPostalCode(postalCode) {
        const apiUrl = `https://vicopo.selfbuild.fr/cherche/${postalCode}`;

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
        const selectElement = document.getElementById('city');
        
        // Clear previous options
        selectElement.innerHTML = '<option value="" disabled selected>Loading...</option>';
        
        try {
            const cities = await fetchCitiesByPostalCode(postalCode);
            
            // Populate select element with cities
            selectElement.innerHTML = '';
            if (cities.length > 0) {
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.city;
                    option.textContent = city.city;
                    selectElement.appendChild(option);
                });
            } else {
                // If no cities found, display a message
                selectElement.innerHTML = '<option value="" disabled selected>No cities found</option>';
            }
        } catch (error) {
            console.error('Error populating cities:', error);
            // Display error message
            selectElement.innerHTML = '<option value="" disabled selected>Error loading cities</option>';
        }
    }
</script>