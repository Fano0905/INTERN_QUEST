<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body style="height: 200dvh">
    <div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">
        <nav class="bg-gray-100" id ="nav_admin">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex ">   
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <div class="py-3 px-1 hover:text-black">
                                <a href="{{route('internquest')}}">
                                <ion-icon name="home"></ion-icon>
                                Accueil</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black">
                                <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                    Offres</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black"><a href="{{route('companies.index')}}">
                                <ion-icon name="business"></ion-icon>
                                Entreprises</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black">
                                <ion-icon name="person-circle"></ion-icon>
                                <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                            </div>
                            <form action="{{route('auth.logout')}}" method="POST">
                                @method('delete')
                                @csrf
                                <div class="py-3 px-1 hover:text-black">
                                    <ion-icon name="log-out"></ion-icon>
                                    <button>Se deconnecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script>
        function addressing(){
            console.log("Adding new location");
            const signin_dialog = document.getElementById("AddAddress");
            signin_dialog.style.display = "flex";
        };
        function close_addressing(){
            console.log("closing address process");
            const signin_dialog = document.getElementById("AddAddress");
            signin_dialog.style.display = "none";
        };
        document.getElementById("centre").addEventListener("input", function() {
            this.value = this.value.toUpperCase();
        });
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
        
        document.getElementById("cities").addEventListener("input", async function() {
            var cityName = this.value.trim();
            if (cityName.length < 3) return; 
            var postalCodeInput = document.getElementById("postal_code");
            var errorElement = document.getElementById('error-postal_code');
            errorElement.innerHTML = ""; 
        
            try {
                var postalCode = await fetchCPbycity(cityName);
                postalCodeInput.value = postalCode; 
            } catch (error) {
                console.error('Error fetching postal code:', error);
                errorElement.innerHTML = "Code postal introuvable pour la ville saisie";
            }
            document.getElementById("city").value = cityName
        });
        
        document.getElementById("select_city").addEventListener("change", async function() {
            var selectedCity = this.value;
            var postalCodeInput = document.getElementById("postal_code");
            var errorElement = document.getElementById('error-postal_code');
            errorElement.innerHTML = ""; 
        
            try {
                var postalCode = await fetchCPbycity(selectedCity);
                postalCodeInput.value = postalCode; 
            } catch (error) {
                console.error('Error fetching postal code:', error);
                errorElement.innerHTML = "Code postal introuvable pour la ville sélectionnée";
            }
            document.getElementById("city").value = selectedCity;
        });
        
        async function fetchCPbycity(city) {
            const apiUrl = `https://vicopo.selfbuild.fr/cherche/${encodeURIComponent(city)}`;
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                if (data && data.cities && data.cities.length) {
                    
                    return data.cities[0].code; 
                } else {
                    throw new Error("Aucun code postal trouvé pour la ville");
                }
            } catch (error) {
                throw error;
            }
        }
        
        async function fetchCitiesByPostalCode(postalCode) {
            const apiUrl = `https://vicopo.selfbuild.fr/cherche/${postalCode}`;
        
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
        
                
                if (data && data.cities && data.cities.length > 1) {
                    
                    return data.cities; 
                } else {
                    return []; 
                } catch (error) {
                    console.error('Error fetching data:', error);
                    throw error; 
                }
            }
        }
        
        async function fetchCitiesAndPopulateSelect(postalCode) {
            const selectElement = document.getElementById('select_city');
            
            
            selectElement.innerHTML = '<option value="" disabled selected>Loading...</option>';
            
            try {
                const cities = await fetchCitiesByPostalCode(postalCode);
                
                
                selectElement.innerHTML = '';
                if (cities.length > 0) {
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.city;
                        option.textContent = city.city;
                        selectElement.appendChild(option);
                    });
                } else {
                    
                    selectElement.innerHTML = '<option value="" disabled selected>No cities found</option>';
                }
            } catch (error) {
                console.error('Error populating cities:', error);
                
                selectElement.innerHTML = '<option value="" disabled selected>Error loading cities</option>';
            }
        }
    </script>
    @yield('scripts')
</body>
</html>