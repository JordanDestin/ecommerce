@extends('layouts.app')

@section('content')
<div class="container-fluid">




  <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('images/vetement.jpg/' ) }}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100"src="{{asset('images/shop6.jpg/' ) }}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100"src="{{asset('images/shop6.jpg/' ) }}" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
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

<div class="container">
      <div class="mt-3 p-2 w-100">
        <div class="row mb-2">
          <div class="category col-md-6 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/vetement.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory ">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 1]) }}"> Vêtement </a>
              </button>
            </div>
          </div>
          <div class="category col-md-6 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/chaussure.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 2]) }}">Chaussures</a>
              </button>
            </div>
          </div>
        </div>

      </div>
      
      <div class="mt-3">
        <h4>En ce moment</h4>
        <div class="row mt-3">
            <div id="carousel-popular" class="carousel slide col-12" data-pause="carousel" >
            <div class="carousel-inner row mx-auto">
                @foreach($products->chunk(4) as $key => $product)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
                <div class="row w-100 mx-auto">
                    @foreach ($product as $item )
                      <div class="col-sm-4 col-lg-3"> 
                        <div class="single-publication box-shadow">
                            <figure>
                                <a href="{{ route('products.show',$item->id) }}">
                                  <img class="card-img-top" src="{{asset('images/thumbs/' .$item->image  ) }}" alt="Card image cap">
                                </a>
                            </figure>
                            <div class="publication-content">
                                <span class="category">Book</span>
                                <h3><a href="{{ route('products.show',$item->id) }}">{{ $item->title }}</a></h3>
                                <h4 class="price">{{$item->getPrice() }}€</h4>
                            </div>
                            <div class="add-to-cart">
                                <a href="{{ route('products.show',$item->id) }}" class="default-btn">Ajouter au panier</a>
                            </div>
                        </div>
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
        <div class="row mb-2 solde p-2">
          <div class="category col-md-4 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/maquillage.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 3]) }}">Maquillages</a>
              </button>
            </div>
          </div>
          <div class="category col-md-4 p-2">
            <div class="card shadow bg-white">
              <img class="imagesolde w-100" src="{{asset('images/sac.jpg/' ) }}" alt="Card image cap">
              <button class="btn btn-primary btncategory">
                <a class="py-2" href="{{ route('products.index', ['categorie' => 4]) }}">Parfums</a>
              </button>
            </div>
          </div>
          <div class="category col-md-4 p-2">
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
        <h4> Nos nouveautés</h4>
        <div class="row mt-3">
            <div id="carousel-news" class="carousel slide col-12" data-pause="carousel" >
            <div class="carousel-inner row mx-auto">
                @foreach($newproducts->chunk(4) as $key => $newproduct)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
                  <div class="row w-100 mx-auto">
                      @foreach ($newproduct as $item )
                        <div class="col-sm-4 col-lg-3"> 
                          <div class="single-publication">
                              <figure>
                                  <a href="{{ route('products.show',$item->id) }}">
                                    <img class="card-img-top" src="{{asset('images/thumbs/' .$item->image  ) }}" alt="Card image cap">
                                  </a>
                              </figure>
                              <div class="publication-content">
                                  <h3><a href="{{ route('products.show',$item->id) }}">{{ $item->title }}</a></h3>
                                  <h4 class="price">{{$item->getPrice() }}€</h4>
                              </div>
                              <div class="add-to-cart">
                                  <a href="{{ route('products.show',$item->id) }}" class="default-btn">Ajouter au panier</a>
                              </div>
                          </div>
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
      <div class="row mb-3">
        <div class="col-md-6 offset-md-3 text-center">
          <button class="btn btn-light btncustom">
            <a href="{{ route('products.index') }}">Voir tous les produits</a>
          </button>
        </div>
      </div> 
</div>

@endsection


