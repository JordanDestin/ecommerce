@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

  {{-- 
    <div class="row justify-content-center">
        <div class="col-md-8 order">
            <div class="card">
                <div class="card-header">JE CRÉE UN NOUVEAU COMPTE</div>
                <div class="card-body">
                    <form class="w-100" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="firstName">Prénom</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="lastName">Nom</label>
                            <input type="text" class="form-control" name="name" id="lastname" placeholder="Nom" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                            </div>
                        </div>
            
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                            </div>
                        </div>
            
                        <div class="mb-3">
                            <label for="address">Addresse</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Addresse" required>
                            <div class="invalid-feedback">
                            Please enter your shipping address.
                            </div>
                        </div>
            
                        <div class="mb-3">
                            <label for="address2">Complément d'addresse</label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Complément d'addresse">
                        </div>
            
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="country">Ville</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Ville" required>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                            </div>
        
                            <div class="col-md-6 mb-3">
                            <label for="zip">Code Postal</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Code Postal" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password-confirm">Confirmation mot de passe</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmation mot de passe" required autocomplete="new-password">
                        </div>
                       
                        <div class="row mb-0">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer mon compte') }}
                                </button>
                            </div>
                        </div>
                        <hr class="mb-4">
                    </form>
                </div>
            </div>
        </div>
        
        <hr class="mb-4">
    </div>--}}
</div>
@endsection
