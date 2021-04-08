@extends('layouts.app')

@section('content')

<div class="row">
  <div id="carousel" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner col-lg-12">
      @foreach($products as $key => $product)
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
        <img class="d-block w-100"src="{{asset('images/thumbs/'.$product->image  ) }}" alt="First slide">
        <div class="carousel-caption">
          <h5>test1</h5>
          <p>test1test1test1</p>
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
  <div class="row mt-5">
    <div class="col-lg-12">
      <div class="row category1">
        <div class="col lg-6 sous-category1"></div>
        <div class="col lg-6 sous-category2"></div>
      </div>
      <div class="row category2">
        <div class="col lg-4 sous-category3"></div>
        <div class="col lg-4 sous-category4"></div>
        <div class="col lg-4 sous-category5"></div>
      </div>
    </div>
  </div>


  <div class="row mt-5">
    <div id="carousel-popular" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner row w-100 mx-auto">
        @foreach($products->chunk(3) as $key => $product)
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
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-popular" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>


</div>
{{-- 
<div class="row">
  <div class="container">
  <div id="carousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
      @foreach($products as $key => $product)
      <div class="col-md-3">
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> 
     {{--   <div class="carousel-item @if($loop->first) active @endif">--}}
     {{--    <img class="d-block w-100"src="{{asset('images/thumbs/'.$product->image  ) }}">
        <div class="carousel-caption">
          <h5>test1</h5>
          <p>test1test1test1</p>
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
--}}




     {{--  @foreach($products as $product)
      <div class="col-lg-4 cards mb-3">
        <div class="card cardproduct">
            <a href="{{ route('products.show',$product->id) }}">
          <div class="card-image">
            <img src="{{asset('images/thumbs/' .$product->image  ) }}">
          </div>          
          <div class="card-content text-center">
            <h5 class="">{{ $product->title }}</h5>
            <p class="productprice"><strong>{{$product->getPrice() }} € TTC</strong></p>
          </div>
        </a>
        </div>
      </div>
        @endforeach
        --}}
  </div> 
  {{--
  <div class="col-lg-12">
   {{ $products->appends(request()->input())->links() }}
  </div>
  --}}
</div>
@endsection



