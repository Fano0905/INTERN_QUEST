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
        <dialog id="signin_dialog" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
            <div class="w-full p-10 flex flex-col items-center">
                <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closesignin(), preventReload(event)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
                <h2 class="text-2xl text-blue-600 mb-6">S'inscrire</h2>
                <form action="{{route('internquest.users.store')}}" method="POST" class = w-full>
                    @csrf
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nom</label>
                        <input type="text" name="lname" id="lname" required placeholder="Last Name" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @error('lname')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Prénom</label>
                        <input type="text" name="fname" id="fname" required placeholder="First name" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @error('fname')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="relative mb-6">
                        <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mail</label>
                        <input type="email" name="mail" id="mail" required placeholder="email@example.fr" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <span>
                            @error('mail')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                    <div class="relative mb-6">
                        <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mot de passe</label>
                        <input type="password" name="password" id="password" required placeholder="password" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <span>
                            @error('password')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Pseudo</label>
                        <input type="text" name="username" id="username" required placeholder="Identifiant" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <span>
                            @error('username')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Role</label>
                        <select name="role" id="role" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                            <option value="Admin">Admin</option>
                            <option value="Pilote">Pilote</option>
                            <option value="Etudiant">Etudiant</option>
                        </select>
                        <span>
                            @error('role')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                <div class="flex justify-between items-center mb-4">
                    <label class="flex items-center text-base text-gray-700 font-medium">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 mr-2">Se rappeler de moi
                    </label>
                    <a href="#" class="text-sm text-gray-700 hover:underline mx-3">Politique de confidentialité</a>
                </div>
                <div>
                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Envoyer demande</button>
                </div>
            </form>
        </div>
        </dialog>
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
    <script>
        function signin(){
            console.log("Open signin");
            const signin_dialog = document.getElementById("signin_dialog");
            signin_dialog.style.display = "flex";
        };

        function closesignin(){
            console.log("close signin");
            const signin_dialog = document.getElementById("signin_dialog");
            signin_dialog.style.display = "none";
        };
        const mailInput = document.getElementById("mail");
        const passwordInput = document.getElementById("password");
        const usernameInput = document.getElementById("username");
    
        
        mailInput.addEventListener('input', validateInput);
        passwordInput.addEventListener('input', validateInput);
        usernameInput.addEventListener('input', validateInput);
    
        
        function validateInput(event) {
            const input = event.target;
            const value = input.value.trim(); 
    
            
            switch (input.id) {
                case 'username':
                
                    break;
                case 'mail':
                    
                    if (!isValidEmail(value)) {
                        input.setCustomValidity('Veuillez entrer une adresse email valide');
                    } else {
                        input.setCustomValidity('');
                    }
                    break;
                case 'password':
                    
                    if (value.length < 8) {
                        input.setCustomValidity('Le mot de passe doit comporter au moins 8 caractères');
                    } else {
                        input.setCustomValidity('');
                    }
                    break;
                default:
                    break;
            }
        }
        
        function isValidEmail(email) {
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
    @yield('scripts')
</body>
</html>