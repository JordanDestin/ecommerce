@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">MON COMPTE</div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-md-6 text-center dashboard">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <a class="text-dark w-100" href="#">
                    <div class="card-body ">
                      <h3 class="mb-0">
                        Mes commandes
                      </h3>
                    </div>
                    <i class="fas fa-align-justify fa-4x"></i>
                </a>
                  </div>
              </div>
            <div class="col-md-6 text-center dashboard">
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                  <a class="text-dark w-100" href="{{route('account.address')}}">
                  <div class="card-body ">
                    <h3 class="mb-0">
                      Adresse de livraison
                    </h3>
                  </div>
                  <i class="fas fa-align-justify fa-4x"></i>
              </a>
                </div>
            </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-6 text-center dashboard">
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                  <a class="text-dark w-100" href="#">
                  <div class="card-body ">
                    <h3 class="mb-0">
                      Paramêtre du compte
                    </h3>
                  </div>
                  <i class="fas fa-align-justify fa-4x"></i>
              </a>
                </div>
            </div>
      
      </div>
    </div>
</div>

@endsection



