@extends('back.layout')

@section('main')

<div class="box-header with-border">
    <h3 class="box-title">Catégorie</h3>
</div>

<div class="box-body">
    <form method="POST"
            action="@isset($category) {{ route('update.category', $category->id) }} @else {{ route('add.category') }} @endisset"
            enctype="multipart/form-data">  
            @csrf
            <!-- text input -->
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="titre" @isset($category) value="{{ $category->name }}" @else value="" @endisset>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('list.categories') }}" role="button"><i
                        class="fas fa-arrow-left"></i> Retour à la liste des catégories</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
    
@endsection