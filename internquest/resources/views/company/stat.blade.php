@extends('layout')

@section('title', 'Statistiques entreprises')

@section('content')
    <div class="mt-8">
        <canvas id="sectorChart" width="400" height="200"></canvas>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Assurez-vous d'inclure la bibliothèque Chart.js -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('sectorChart').getContext('2d');
    const sectorChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($sectorNames) !!},
            datasets: [{
                label: 'Nombre d\'entreprises par secteur',
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
});
</script>
@endsection