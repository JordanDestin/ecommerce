@extends('layouts.app')

@section('content')

<div class="col-md-6 offset-md-3">
    <div class="card">
        <div class="card-header">Mon addresse</div>
        <div class="card-body">
            <form class="w-100" method="POST" action="@isset($addresses) {{route('address.store')}} @else {{route('address.store')}} @endisset">
                @csrf
                
                <x-addresse :addresse="$addresses"/>
            </form>
        </div>
    </div>
</div>

    
@endsection