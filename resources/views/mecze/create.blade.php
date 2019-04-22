@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <h2>dodawanie meczu mordo</h2>
        <form action="{{action('MeczeController@Store)'}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nazwa">Nazwa meczu:</label>
                <input type="text" class="form-control" name="nazwa">
            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary">

        </form>
    </div>
@endsection('dane')
