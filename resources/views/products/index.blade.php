@extends('layouts.app')

@section('content')

<div class="row">
  <div id="carousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner col-lg-12">
      <div class="carousel-item col-lg-12 active">
        <img class="d-block w-100" src="{{asset('images/thumbs/1617634037.jpg') }}" alt="First slide">
        <div class="carousel-caption">
          <h5>test1</h5>
          <p>test1test1test1</p>
        </div>
      </div>
      <div class="carousel-item col-lg-12">
        <img class="d-block w-100" src="{{asset('images/thumbs/1617634070.jpg') }}" alt="Second slide">
        <div class="carousel-caption">
          <h5>test2</h5>
          <p>test2test2test2</p>
        </div>
      </div>
      <div class="carousel-item col-lg-12">
        <img class="d-block w-100" src="{{asset('images/thumbs/1617634091.jpg') }}" alt="Third slide">
        <div class="carousel-caption">
          <h5>test3</h5>
          <p>test3test3test3</p>
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


<div class="row">
  <div class="container">
  <div id="carousel" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
      @foreach($products as $key => $product)
      <div class="col-md-3">
      <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
        <img class="d-block w-100"src="{{asset('images/thumbs/'.$product->image  ) }}">
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
  <div class="col-lg-12">
   {{ $products->appends(request()->input())->links() }}
  </div>
</div>
@endsection


<script>
  $('.carousel').carousel()
</script>
