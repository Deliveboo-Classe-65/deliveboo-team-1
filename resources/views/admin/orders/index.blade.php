@extends('admin.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($index as $order)
                <div class="col-8">
                    <div class="card mb-1">
                        <div class="card-body py-1">
                            <div class="card-title mb-0 d-flex align-items-center justify-content-between">
                                <div> Ordine # {{ $order->id }}</div>
                                <div>Totale: € {{ $order->total }}</div>
                                <div>Orario consegna: {{ $order->chosen_delivery_time }}</div>
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="collapse" data-bs-target={{ '#order' . $order->id }}>
                                    Dettagli Ordine
                                </button>
                            </div>
                            <div class="collapse" id={{ 'order' . $order->id }}>
                                <div class="card-text row px-2 py-2" >
                                    <ul class="list-group col-4">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-5">
                                                    Articolo
                                                </div>
                                                <div class="col-5">
                                                    Quantità
                                                </div>
                                            </div>
                                        </li>
    
                                        @foreach ($order->dishes as $dish)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-5">
                                                        {{ $dish->name }}
                                                    </div>
                                                    <div class="col-5">
                                                        {{ $dish->pivot->quantity }}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="col-8">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex">
                                                <div class="col-4">
                                                    Nome:
                                                </div>
                                                <div class="col-8">
                                                    {{ $order->client_name . ' ' . $order->client_surname }}
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex">
                                                <div class="col-4">
                                                    Via:
                                                </div>
                                                <div class="col-8">
                                                    {{ $order->delivery_address }}
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex">
                                                <div class="col-4">
                                                    Telefono:
                                                </div>
                                                <div class="col-8">
                                                    {{ '+39 '. $order->client_phone }}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
