@extends('back.layout')

@section('main')

    <div class="container-fluid">
        <div class="mt-3">
            <h2>DashBoard</h2>
            <div class="row mb-2">
                <div class="col-md-6 text-center dashboard">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <a class="text-dark w-100" href="{{route('list.product')}}">
                        <div class="card-body ">
                          <h3 class="mb-0">
                            Produits
                          </h3>
                        </div>
                        <i class="fas fa-align-justify fa-4x"></i>
                    </a>
                      </div>
                  </div>

              <div class="col-md-6 text-center dashboard">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <a class="text-dark w-100" href="{{route('list.categories')}}">
                    <div class="card-body ">
                      <h3 class="mb-0">
                        Catégories
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
                        <a class="text-dark w-100" href="{{route('shop.index')}}">
                        <div class="card-body ">
                          <h3 class="mb-0">
                            Gestion
                          </h3>
                        </div>
                        <i class="fas fa-laptop-house fa-4x"></i>
                    </a>
                      </div>
                  </div>
                  <div class="col-md-6 text-center dashboard">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <a class="text-dark w-100" href="{{route('create.product')}}">
                        <div class="card-body ">
                          <h3 class="mb-0">
                            Catégories
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