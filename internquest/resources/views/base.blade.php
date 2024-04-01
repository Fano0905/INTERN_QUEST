<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Accueil')</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body style="height: 200dvh">
<div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">

    @guest
        <nav class="bg-gray-100" id ="nav_guest">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex ">   
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{route('internquest/')}}">
                                <ion-icon name="home"></ion-icon>
                                Accueil</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                    Offres</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black"><a href="{{route('companies.index')}}">
                                <ion-icon name="business"></ion-icon>
                                Entreprises</a>
                            </div>
                            <div class="text-gray-700 items-center hidden md:flex space-x-8">
                                <a href="#" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300" onclick="login(), preventReload(event)" >Se connecter</a>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="person-add"></ion-icon>
                                    <a href="#" onclick="signin(), preventReload(event)">S'inscrire</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @endguest

    @auth
        @if (Auth::user()->role == 'Admin')
            <nav class="bg-gray-100" id ="nav_admin">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-center">
                        <div class="flex ">   
                            <div class="text-gray-700 hidden md:flex space-x-16">
                                <div class="py-5 px-3 hover:text-black">
                                    <a href="{{route('internquest/')}}">
                                    <ion-icon name="home"></ion-icon>
                                    Accueil</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                        Offres</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black"><a href="{{route('companies.index')}}">
                                    <ion-icon name="business"></ion-icon>
                                    Entreprises</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="person"></ion-icon>
                                    <a href="{{route('users.list')}}" class="py-5 px-3 hover:text-black">utilisateurs</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="school"></ion-icon>
                                    <a href="{{route('promos.index')}}" class="py-5 px-3 hover:text-black">Promotions</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="person-circle"></ion-icon>
                                    <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                                </div>
                                <form action="{{route('auth.logout')}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="py-5 px-3 hover:text-black">
                                        <ion-icon name="log-out"></ion-icon>
                                        <button>Se deconnecter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        @endif

        @if (Auth::user()->role == 'Pilote')
        <nav class="bg-gray-100" id ="nav_admin">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex ">   
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{route('internquest/')}}">
                                <ion-icon name="home"></ion-icon>
                                Accueil</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                    Offres</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black"><a href="{{route('companies.index')}}">
                                <ion-icon name="business"></ion-icon>
                                Entreprises</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="school"></ion-icon>
                                <a href="{{route('promos.index')}}" class="py-5 px-3 hover:text-black">Promotions</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="person-circle"></ion-icon>
                                <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                            </div>
                            <form action="{{route('auth.logout')}}" method="POST">
                                @method('delete')
                                @csrf
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="log-out"></ion-icon>
                                    <button>Se deconnecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </nav>
        @endif
    @endauth
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @elseif (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    @yield('content')
    </div>
        @if ($errors->any()) {
            <div>
                <div style="font-style: italic; color:red;">Erreur</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        }
        @endif
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
  });

  document.getElementById("select_city").addEventListener("change", async function() {
      var selectedCity = this.value;
      var postalCodeInput = document.getElementById("postal_code");
      var errorElement = document.getElementById('error-postal_code');
      errorElement.innerHTML = ""; // Vider le message d'erreur précédent

      try {
          var postalCode = await fetchCPbycity(selectedCity);
          postalCodeInput.value = postalCode; // Remplir le champ de saisie du code postal
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
              // Supposons que le premier élément du tableau est la ville correspondante
              return data.cities[0].code; // Notez que la propriété est 'code', pas 'codePostal'
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
</body>
</html>