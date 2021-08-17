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
<div class="container">
  <nav class="navbar navbar-expand-lg d-flex p-2">
    <h2><a class="navbar-brand" href="{{route('home')}}">SHOP</a></h2>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <div class="searchproduct">
        <form action="{{ route('products.search') }}" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-6" type="search" id="search" name="q" placeholder="Rechercher" aria-label="Search" value="{{ request()->q ?? '' }}">
          <button class="btnsearch" type="submit"><i class="fas fa-search fa-2x"></i></button>
        </form>
      </div>
      
      @guest
      <button type="button" class="btn btn-light btn-sm ml-3 d-flex "><i class="fas fa-user"></i><a class="nav-link" type='button' href="{{ route('login') }}"></a></button>
       @else
       <ul class="navbar-nav mr-auto">
       <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          
          <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('account.index') }}">Mon Compte</a>
  
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                  {{ __('Déconnexion') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
       </li>
       @endguest
       <li class="nav-item">
     <a href="{{route('cart.index')}}" class="iconcart" data-target="mobile" class="panier" style="color: rgb(43, 9, 104);"><i class="Small material-icons left">add_shopping_cart</i>{{Cart::count()}}</a>
       </li>  
    </ul>
    </div>
  </nav>
  
  <div class="row">
    <div class="container d-flex flex-column flex-md-row justify-content-between mb-3 ">
      @foreach (App\Models\Category::all() as $category)

          <a class="py-2" href="{{ route('products.index', ['categorie' => $category->id]) }}"> {{$category->name}} </a>
      @endforeach
    </div>
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
    @include('sweetalert::alert')
    @yield('content')
  </main>

  <footer>
  </footer>
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
