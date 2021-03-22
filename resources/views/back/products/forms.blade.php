@extends('back.layout')

@section('main')

<div class="box-header with-border">
    <h3 class="box-title">Produits</h3>
</div>add.product

<div class="box-body">
    <form method="POST" action="@isset($product) {{ route('produits.update', $product->id) }} @else {{ route('add.product') }} @endisset" enctype="multipart/form-data">
        @isset($product) @method('PUT') 
        @endisset
        @csrf  
      <!-- text input -->
      <div class="form-group">
        <label>Titre</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="titre" :value="isset($product) ? $product->name : ''">
      </div>
      <div class="form-group">
        <label>Quantite</label>
        <input type="number" name="quantite" id="quantite" class="form-control" placeholder="Prix" :value="isset($product) ? $product->quantity : ''">
      </div>
      <div class="form-group">
        <label>Prix</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="Prix" :value="isset($product) ? $product->price : ''">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description" :value="isset($product) ? $product->description : ''"></textarea>
      </div>
      <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">
                <label for="description">Image</label>
                @if(isset($product) && !$errors->has('image'))
                  <div>
                    <p><img src="{{ asset('images/thumbs/' . $product->image) }}"></p>
                    <button id="changeImage" class="btn btn-warning">Changer d'image</button>
                  </div>
                @endif
                <div id="wrapper">
                  @if(!isset($product) || $errors->has('image'))
                    <div class="custom-file">
                      <input type="file" id="image" name="image"
                            class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" required>
                      <label class="custom-file-label" for="image"></label>
                      @if ($errors->has('image'))
                        <div class="invalid-feedback">
                          {{ $errors->first('image') }}
                        </div>
                      @endif
                    </div> 
                  @endif
                </div>
              </div>
      <div class="form-group row mb-0">
        <div class="col-md-12">
          <a class="btn btn-primary" href="{{ route('list.product') }}" role="button"><i class="fas fa-arrow-left"></i> Retour à la liste des produits</a>
           <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </div>

    </form>  
    
@endsection