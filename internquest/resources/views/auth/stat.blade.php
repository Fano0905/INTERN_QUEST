@extends('layout')

@section('content')
<div class="container">
    <h1>Statistiques de l'utilisateur</h1>


    <div class="chart-container bg-white">
        <div class="row">
            <div class="col-md-6">
                <h3>Secteurs</h3>
                <canvas id="sectorChart"></canvas>
            </div>
            <div class="col-md-6">
                <h3>Localités</h3>
                <canvas id="locationChart"></canvas>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Nombre total de candidatures</h3>
                <canvas id="totalApplicationsChart"></canvas>
            </div>
            <div class="col-md-6">
                <h3>Candidatures acceptées et refusées</h3>
                <canvas id="statusApplicationsChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configuration pour le graphique des secteurs
    var ctxSector = document.getElementById('sectorChart').getContext('2d');
    var sectorChart = new Chart(ctxSector, {
        type: 'bar',
        data: {
            labels: {!! json_encode($sectorNames) !!},
            datasets: [{
                label: 'Nombre de candidatures par secteur',
                data: {!! json_encode($sectorCounts) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });

    // Configuration pour le graphique des localités
    var ctxLocation = document.getElementById('locationChart').getContext('2d');
    var locationChart = new Chart(ctxLocation, {
        type: 'bar',
        data: {
            labels: {!! json_encode($locationNames) !!},
            datasets: [{
                label: 'Nombre de candidatures par localité',
                data: {!! json_encode($locationCounts) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        }
    });

    // Configuration pour le graphique du nombre total de candidatures
    var ctxTotalApplications = document.getElementById('totalApplicationsChart').getContext('2d');
    var totalApplicationsChart = new Chart(ctxTotalApplications, {
        type: 'bar',
        data: {
            labels: ['Total des candidatures'],
            datasets: [{
                label: 'Nombre total de candidatures',
                data: [{{ $totalApplications }}],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        }
    });

    // Configuration pour le graphique des candidatures acceptées et refusées
    var ctxStatusApplications = document.getElementById('statusApplicationsChart').getContext('2d');
    var statusApplicationsChart = new Chart(ctxStatusApplications, {
        type: 'bar',
        data: {
            labels: ['Acceptées', 'Refusées'],
            datasets: [{
                label: 'Nombre de candidatures',
                data: [{{ $acceptedApplications }}, {{ $refusedApplications }}],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        }
    });
});
</script>
@endsection
