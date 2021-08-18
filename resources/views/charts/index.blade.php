<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
    <title>Chart</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        {{-- <a href="{{ route('dashboard') }}">Dashboard</a>
        <h1>게시글 리스트</h1> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View Chart') }}
            </h2>
        </x-slot>
    <canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
        data: {
            labels: [
                // 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
                    @foreach ( $postusers as $postuser )
                        "{{ $postuser->post->title }}",
                    @endforeach
                    ],
                datasets: [{
                    label:
                        ': Views',
                    data: [
                    // [12, 19, 3, 5, 2, 3],
                        @foreach ($postusers as $postuser)
                            {{ $postuser->cnt }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
        </script>
    </div>
</body>
</html>
</x-app-layout>