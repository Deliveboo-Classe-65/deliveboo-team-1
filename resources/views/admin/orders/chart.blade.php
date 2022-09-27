@extends('admin.home')

@section('content')
    <script src="{{ asset('chart.js/chart.js') }}"></script>
    <canvas id="myChart" width="500" height="200"></canvas>
    <div class="py-4"></div>
    <canvas id="ordersChart" width="500" height="200"></canvas>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const cty = document.getElementById('ordersChart').getContext('2d');
        const data = {!! json_encode($orders) !!}
        const months = {
            '01': 'Gennaio',
            '02': 'Febbraio',
            '03': 'Marzo',
            '04': 'Aprile',
            '05': 'Maggio',
            '06': 'Giugno',
            '07': 'Luglio',
            '08': 'Agosto',
            '09': 'Settembre',
            '10': 'Ottobre',
            '11': 'Novembre',
            '12': 'Dicembre',
        }

        console.log(data)

        const chartLabels = []
        const chartData = []
        const chartNumOrders = []

        data.forEach(element => {
            label = months[element.months.substring(5)] + ' ' + element.months.substring(0, 4)
            chartLabels.push(label)
            chartData.push(element.sums)
            chartNumOrders.push(element.orders)
        });






        const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: chartLabels,
        datasets: [
            {
            label: 'Fatturato',
            data: chartData,
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 2
            }
        ]
    }
})


const myOrdersChart = new Chart(cty, {
    type: 'line',
    data: {
        labels: chartLabels,
        datasets: [

            {
            label: 'Numero ordini',
            data: chartNumOrders,
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 2
            }
        ]
    }
})





    </script>


@endsection
