@extends('layout')

@section('title', 'Statistiques des Entreprises')

@section('content')
<div class="flex justify-center">
    <!-- Cadre pour le graphique des localités -->
    <div class="mt-20 w-1/2 mx-4 bg-gray-200 rounded-lg p-4 border border-black">
        <h2 class="text-center text-xl font-bold mb-4">Répartition par localité</h2>
        <canvas id="locationChart" class="w-full h-60"></canvas>
    </div>

    <!-- Cadre pour le graphique des annonces les plus sollicitées -->
    <div class="mt-20 w-1/2 mx-4 bg-gray-200 rounded-lg p-4 border border-black">
        <h2 class="text-center text-xl font-bold mb-4">Top des annonces les plus sollicitées</h2>
        <canvas id="offerChart" class="w-full h-60"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Graphique pour les localités
    const locationCtx = document.getElementById('locationChart').getContext('2d');
    const locationChart = new Chart(locationCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($locationNames) !!},
            datasets: [{
                label: 'Nombre d\'entreprises',
                data: {!! json_encode($locationCounts) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Graphique pour les annonces les plus sollicitées
    const offerCtx = document.getElementById('offerChart').getContext('2d');
    const offerChart = new Chart(offerCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($offerNames) !!},
            datasets: [{
                label: 'Nombre de candidatures',
                data: {!! json_encode($offerCounts) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
