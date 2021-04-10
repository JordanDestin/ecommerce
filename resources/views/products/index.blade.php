@extends('layouts.app')

@section('content')

<div class="row">
  <div id="carousel" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner col-lg-12">
      @foreach($products as $key => $product)
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
        <img class="d-block w-100"src="{{asset('images/thumbs/'.$product->image  ) }}" alt="First slide">
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


<div class="container">
  <div class="mt-3">
    <h2>Catégories</h2>
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">World</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Featured post</a>
            </h3>
            <div class="mb-1 text-muted">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#">Continue reading</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Post title</a>
            </h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#">Continue reading</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-4">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">World</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Featured post</a>
            </h3>
            <div class="mb-1 text-muted">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#">Continue reading</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Post title</a>
            </h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#">Continue reading</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-4">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Post title</a>
            </h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#">Continue reading</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>
    </div>
  </div>
  
  <div class="mt-3">
    <h2>Tendances</h2>
    <div class="row">
    <div id="carousel-popular" class="carousel slide col-12" data-ride="carousel">
      <div class="carousel-inner row w-100 mx-auto">
        @foreach($products->chunk(4) as $key => $product)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
          <div class="row">
            @foreach ($product as $item )
              <img class="imgpopular rounded mx-auto d-block" src="{{asset('images/thumbs/'.$item->image  ) }}" alt="{{ $item->title }}">
              <div class="carousel-caption">
                <h5 class="">{{ $item->title }}</h5>
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
  <h2>Produits</h2>
  <div class="row">
    
    @foreach($products as $product)
    <div class="col-md-4">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{asset('images/thumbs/' .$product->image  ) }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="">{{ $product->title }}</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="text-center"><strong>{{$product->getPrice() }} € TTC</strong></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary">
                <a href="{{ route('products.show',$product->id) }}">View</a>
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
            </div>
            <small class="text-muted">9 mins</small>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </div>
  <div class="col-lg-12">
    {{ $products->appends(request()->input())->links() }}
   </div>
</div>
  
  

@endsection



