@extends('layouts.app')

@section('content')

<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header">Mes commandes</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Commandes</th>
                            <th scope="col">Produit</th>
                            <th scope="col">Date de la commande</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listsorders as $listsorder )
                            @foreach ($listsorder->products as $item)
                            <tr>
                                <th scope="row">{{$listsorder->id}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$listsorder->created_at}}</td>
                                <td>{{$item->price}}</td>
                            </tr> 
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection