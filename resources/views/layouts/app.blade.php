<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    @yield('extra-meta')


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')

    <!-- Stripe JS -->
    @yield('extra-script')

  

</head>
<body>


  <nav class="navbar navbar-expand-lg d-flex p-2">
    <h2><a class="navbar-brand" href="{{route('products.index')}}">Ecommerce</a></h2>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
        
          <form action="{{ route('products.search') }}" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-6" type="search" id="search" name="q" placeholder="Search" aria-label="Search" value="{{ request()->q ?? '' }}">
            <button class="btnsearch" type="submit"><i class="fas fa-search fa-2x"></i></button>
          </form>
        
      
      @guest
   
          <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
     
 {{--     @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif --}}
       @else
      
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
  
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('home') }}">Mes commandes</a>
  
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
  
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
 
  @endguest
   <a href="{{route('cart.index')}}" data-target="mobile" class="panier" style="color: rgb(43, 9, 104);"><i class="Small material-icons left">add_shopping_cart</i>{{Cart::count()}}</a>   
      
    </div>
  </nav>

  
  <div class="row">
    <div class="col-sm-12">
      <ul class="category">
      @foreach (App\Models\Category::all() as $category)
        <li class="nav-item">
          <a href="{{ route('products.index', ['categorie' => $category->slug]) }}"> {{$category->name}} </a>
        </li>
      @endforeach
      </ul>  
    </div>
  </div>
  
 
  @if ( session('success') )
      <div class="alert alert-success">
        {{session('success')}}
      </div>
  @endif

  @if ( session('danger') )
    <div class="alert alert-danger">
      {{session('success')}}
    </div>
  @endif
  @if (request()->input('q'))
    <h6>{{ $products->total() }} résultat(s) pour la recherche "{{ request()->q }}"</h6>
  @endif

  <main>
    @yield('content')
  </main>
  <script>
    document.getElementById('search').addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        window.location = 'search'
      }
  });
  </script>

  @yield('extra-js')
  @yield('javascript')

</body>
</html>
