@extends('back.layout')

@section('css')
  <style>
    .custom-file-label::after { content: "Parcourir"; }
  </style>
@endsection
@section('main')

    <div class="box-header with-border">
        <h3 class="box-title">Produits</h3>
    </div>

    <div class="box-body">
      <form method="POST"
            action="@isset($product) {{ route('update.product', $product->id) }} @else {{ route('add.product') }} @endisset"
            enctype="multipart/form-data">  
            @csrf
            <!-- text input -->
        <div class="form-group">
          <label>Titre</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="titre" @isset($product)
                value="{{ $product->title }}" @else value="" @endisset>
        </div>

        <div class="form-group">
          <label>Quantite</label>
          <input type="number" name="quantite" id="quantite" class="form-control" placeholder="Quantite"
                @isset($product) value="{{ $product->quantite }}" @else value="" @endisset>
        </div>

        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Prix" @isset($product)
            value="{{ $product->price }}" @else value="" @endisset>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description">@isset($product){{ $product->description }}@endisset
            </textarea>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            
            <select class="form-control" name="category[]" id="category" multiple="multiple">
                @foreach ($categories as $category)
                
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        {{-- <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">
            <label for="description">Image</label>
            @if (isset($product) && !$errors->has('image'))
                <div>
                    <p><img src="{{ asset('images/thumbs/' . $product->image) }}"></p>
                    <form method="POST" action="{{ route('delete.image',$product->image) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            @endif
            <div id="image" class="custom-file">
                <input type="file" id="image" name="image" class="custom-file-input">
                <label class="custom-file-label" for="image"></label>
              </div>



        </div> --}}

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
                        class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input">
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
       
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineCheckbox1">Tendance</label>
            <input class="form-check-input" type="checkbox" id="tendance" name="tendance" @isset($product){{ $product->tendance ? 'checked' : '' }} @endisset>
            
          </div>

  
        
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('list.product') }}" role="button"><i
                        class="fas fa-arrow-left"></i> Retour à la liste des produits</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>

    </form>
    
</div>
@endsection

@section('js')
  <script>
    $(document).ready(() => {
      $('form').on('change', '#image', e => {
        $(e.currentTarget).next('.custom-file-label').text(e.target.files[0].name);
      });
      $('#changeImage').click(e => {
        $(e.currentTarget).parent().hide();
        $('#wrapper').html(`
          <div id="image" class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input" required>
            <label class="custom-file-label" for="image"></label>
          </div>`
        );
      });
    });
  </script>
@endsection
