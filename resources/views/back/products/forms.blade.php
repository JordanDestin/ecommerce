@extends('back.layout')

@section('main')

<div class="box-header with-border">
    <h3 class="box-title">Produits</h3>
</div>

<div class="box-body">
    <form role="form">
      <!-- text input -->
      <div class="form-group">
        <label>Titre</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="titre">
      </div>
      <div class="form-group">
        <label>Quantite</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="Prix">
      </div>
      <div class="form-group">
        <label>Prix</label>
        <input type="number" name="price" id="price" class="form-control" placeholder="Prix">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" id="image" class="form-control">
      </div>
    </form>  
    
@endsection