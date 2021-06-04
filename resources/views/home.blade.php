@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div id="carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner col-lg-12">
            @foreach($products as $key => $product)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
              <img class="d-block w-100"src="{{asset('images/test1.jpg/' ) }}" alt="First slide">
              <div class="container">
                <div class="carousel-caption text-left">
                  <h1>Example headline.</h1>
                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="mt-3">
        <div class="row mb-2 solde">
          <div class="col-md-6 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/vetement.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory d-block">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 1]) }}"> Vêtement </a>
              </button>
            </div>
          </div>
          <div class="col-md-6 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/chaussure.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 2]) }}">Chaussures</a>
              </button>
            </div>
          </div>
    
        </div>
        <div class="row mb-2 solde">
          <div class="col-md-4 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/maquillage.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 3]) }}">Maquillages</a>
              </button>
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/sac.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 4]) }}">Parfums</a>
              </button>
            </div>
          </div>
          <div class="col-md-4 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/accessoire.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 4]) }}">Accessoires</a>
              </button>
            </div>
          </div>
    
        </div>
      </div>
      
      <div class="mt-3">
        <h2>Tendances</h2>
        <div class="row ">
            <div id="carousel-popular" class="carousel slide col-12" data-pause="carousel" >
            <div class="carousel-inner row mx-auto">
                @foreach($products->chunk(4) as $key => $product)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
                <div class="row w-100 mx-auto">
                    @foreach ($product as $item )
                      <div class="card d-block mx-auto shadow bg-white">
                        <a href="{{ route('products.show',$item->id) }}" class="">
                        <img class="imgpopular rounded card-img-top" src="{{asset('images/thumbs/'.$item->image  ) }}" alt="{{ $item->title }}">
                        <div class="card-body">
                            <h5 class="text-primary">{{ $item->title }}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            <p class="text-center"><strong>{{$item->getPrice() }} € TTC</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                              <form  method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <div class="input-field col">
                                  <input type="hidden" name="product_id" value="{{ $item->id }}">       
                                  <p>
                                    <button class="btn btn-light btn-sm ml-3 d-flex btncustom" style="width:100%" type="submit" id="addcart">
                                      Ajouter au panier
                                    </button>
                                  </p>    
                                </div>    
                              </form>
                            </div>
                        </div>
                      </a>
                      </div>
                    
                    @endforeach
                 
                </div>
                </div>
                @endforeach
            
            </div>
            <a class="carousel-control-prev" href="#carousel-popular" role="button" data-slide="prev">
                <span class="carousel-control" aria-hidden="true"><i class="fas fa-arrow-left fa-2x"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-popular" role="button" data-slide="next">
                <span class="carousel-control" aria-hidden="true"><i class="fas fa-arrow-right fa-2x"></i></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
      </div>

      <div class="mt-3">
        <h2>Nouveautés</h2>
        <div class="row">
            <div id="carousel-news" class="carousel slide col-12" data-pause="carousel" >
            <div class="carousel-inner row mx-auto">
                @foreach($newproducts->chunk(4) as $key => $newproduct)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
                <div class="row w-100 mx-auto">
                    @foreach ($newproduct as $item )
                      <div class="card d-block mx-auto shadow bg-white">
                        <a href="{{ route('products.show',$item->id) }}" class="">
                        <img class="imgpopular rounded card-img-top" src="{{asset('images/thumbs/'.$item->image  ) }}" alt="{{ $item->title }}">
                        <div class="card-body">
                            <h5 class="text-primary">{{ $item->title }}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            <p class="text-center"><strong>{{$item->getPrice() }} € TTC</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                              <form  method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <div class="input-field col">
                                  <input type="hidden" name="product_id" value="{{ $item->id }}">       
                                  <p>
                                    <button class="btn btn-light btn-sm ml-3 d-flex btncustom" style="width:100%" type="submit" id="addcart">
                                      Ajouter au panier
                                    </button>
                                  </p>    
                                </div>    
                              </form>
                            </div>
                        </div>
                      </a>
                      </div>
                    
                    @endforeach
                 
                </div>
                </div>
                @endforeach
            
            </div>
            <a class="carousel-control-prev" href="#carousel-news" role="button" data-slide="prev">
                <span class="carousel-control" aria-hidden="true"><i class="fas fa-arrow-left fa-2x"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-news" role="button" data-slide="next">
                <span class="carousel-control" aria-hidden="true"><i class="fas fa-arrow-right fa-2x"></i></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
      </div>

      <div class="row mt-3 mb-3">
        <div class="col-12">
          <button class="btn btn-light btn-sm ml-3 d-flex btncustom">
            <a href="{{ route('products.index') }}">Voir tous les produits</a>
          </button>
        </div>
          
      </div>
</div>

@endsection


