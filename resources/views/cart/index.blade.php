@extends('layouts.app')

@section('extra-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
@if (Cart::count() > 0)
    
    <div class="container">
        <div class="row">
            <div class="col s8">
                <div class="card">        
                    <div class="card-content">
                    <div id="wrapper">          
                        <span class="card-title">Mon panier</span>            
                        @foreach (Cart::content() as $product)
                            <hr><br>
                            <div class="row">
                            <form action="#" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col s12 m6">
                                <img  src="{{asset('images/thumbs/'. $product->model->image   ) }}">
                              </div>
                                <div class="col m6 s12">{{ $product->name }}</div>
                                <div class="col m3 s12"><strong>{{ getPrice($product->subtotal()) }} €</strong></div>
                                <div class="col m2 s12">
                                <select name="qty" id="qty" data-id={{$product->rowId}} class="custom-select">
                                    @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                        {{ $i }}
                                    </option>
                                    @endfor
                                </select>
                                </div>
                            </form>
                            <form action="{{route('cart.destroy',$product->rowId )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="material-icons deleteItem" style="cursor: pointer">delete</i></button>
                            </form>              
                            </div>
                        @endforeach
                        <hr><br>
                        
                
                    </div>        
                    <div id="loader" class="hide">
                        <div class="loader"></div>
                    </div>
                    </div>

                </div>
            </div>
            <div class="col s4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Récapitulatif</span> 
                        <br>
                        <div class="row">
                            <div class="col s6">
                            Sous Total
                            </div>
                            <div class="col s6">
                            <strong>{{getprice(Cart::subtotal())}} €</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                            Taxe
                            </div>
                            <div class="col s6">
                            <strong>{{getprice(Cart::tax())}} €</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col s6">
                            Total TTC (hors livraison)
                            </div>
                            <div class="col s6">
                            <strong>{{getprice(Cart::total())}} €</strong>
                            </div>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            @if(Cart::total())
                                
                            <button type="submit" class="btn btn-primary">
                                <a href="{{route('address.index')}}">Commander</a>
                            </button>
                        @endif
                        </div>
                    </div>
        
                </div>
        
            </div>
        </div>
    </div>
    @else
        <p><strong>Votre Panier est vide.</strong>
    @endif

@endsection

@section('extra-js')
<script>
    var selects = document.querySelectorAll('#qty');
    
    Array.from(selects).forEach((element) => {
        element.addEventListener('change', function() {
            var rowId = this.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(
                `panier/${rowId}`,
                {
                    headers: {
                            "Content-Type": "application/json",
                            "Accept" : "application/json, text-plain, */*",
                            "X-Requested-With" : "XMLHttpRequest",
                            "X-CSRF-Token" : token
                        },
                        method: 'patch',
                        body: JSON.stringify({
                            qty : this.value
                        })
                }
            )
            .then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) =>{
                console.log(error);
            })
        });
    });

</script>
@endsection
