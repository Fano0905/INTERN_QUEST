@extends('layout')

@section('title', 'Statistiques offres')

@section('content')
<div class="chart-container bg-white">
    <div class="chart-wrapper">
        <div class="chart-background">
            <canvas id="skillsChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="chart-wrapper">
        <div class="chart-background">
            <canvas id="localityChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="chart-wrapper">
        <div class="chart-background">
            <canvas id="durationChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="chart-wrapper">
        <div class="chart-background">
            <canvas id="wishlistChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctxSkills = document.getElementById('skillsChart').getContext('2d');
    var skillsChart = new Chart(ctxSkills, {
        type: 'bar',
        data: {
            labels: JSON.parse(`{!! $skillNamesJson !!}`),
            datasets: [{
                label: 'Nombre d\'offres par compétence',
                data: JSON.parse(`{!! $skillOffersCountJson !!}`),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });

    var ctxLocality = document.getElementById('localityChart').getContext('2d');
    var localityChart = new Chart(ctxLocality, {
        type: 'bar',
        data: {
            labels: JSON.parse(`{!! $localityNamesJson !!}`),
            datasets: [{
                label: 'Nombre d\'offres par localité',
                data: JSON.parse(`{!! $localityOffersCountJson !!}`),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        }
    });

    var ctxDuration = document.getElementById('durationChart').getContext('2d');
    var durationChart = new Chart(ctxDuration, {
        type: 'bar',
        data: {
            labels: JSON.parse(`{!! $durationNamesJson !!}`),
            datasets: [{
                label: 'Nombre d\'offres par durée',
                data: JSON.parse(`{!! $durationOffersCountJson !!}`),
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        }
    });

    var ctxWishlist = document.getElementById('wishlistChart').getContext('2d');
    var wishlistChart = new Chart(ctxWishlist, {
        type: 'bar',
        data: {
            labels: JSON.parse(`{!! $wishlistOffersNamesJson !!}`),
            datasets: [{
                label: 'Top des offres en wishlist',
                data: JSON.parse(`{!! $wishlistCountJson !!}`),
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        }
    });
});
</script>
@endsection

<style>
.chart-wrapper {
    width: 48%; /* Met deux diagrammes par ligne */
    margin: 1%; /* Espacement entre les diagrammes */
    float: left; /* Alignement côte à côte */
    border: 1px solid #000; /* Contour noir */
    padding: 1px; /* Espacement entre les bordures des cadres et les diagrammes */
}

.chart-background {
    background-color: #f2f2f2; /* Couleur de fond gris */
    padding: 10px; /* Espacement interne */
}
</style>
