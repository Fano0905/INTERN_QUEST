@extends('layout')

@section('title', 'Statistiques des Entreprises')

@section('content')
<!-- Reste de votre contenu -->

<!-- Graphique pour les secteurs -->
<div class="mt-8">
    <h2 class="text-center text-xl font-bold mb-4">Répartition par secteur d'activité</h2>
    <canvas id="sectorChart" width="400" height="200"></canvas>
</div>

<!-- Graphique pour les localités -->
<div class="mt-8">
    <h2 class="text-center text-xl font-bold mb-4">Répartition par localité</h2>
    <canvas id="locationChart" width="400" height="200"></canvas>
</div>

<!-- Graphique pour les annonces les plus sollicitées -->
<div class="mt-8">
    <h2 class="text-center text-xl font-bold mb-4">Top des annonces les plus sollicitées</h2>
    <canvas id="offerChart" width="400" height="200"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Graphique pour les secteurs
    const sectorCtx = document.getElementById('sectorChart').getContext('2d');
    const sectorChart = new Chart(sectorCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($sectorNames) !!},
            datasets: [{
                label: 'Nombre d\'entreprises',
                data: {!! json_encode($sectorCounts) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
