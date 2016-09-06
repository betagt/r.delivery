@extends('app')
@section('content')
    <div class="container">
        <h3>Pedidos</h3>
<br>
        <a href="{{route('costumer.order.create')}}" class="btn btn-default">Nova categoria</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Total</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{$order->id}}</td>
                <td>R$ {{$order->total}}</td>
                <td>
                    {{$order->status}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}
    </div>


@endsection