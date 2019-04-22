@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Dodawanie Ligi</h2>
        <form action="{{action('AdminiController@StoreLiga')}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label for="nazwa">Nazwa Ligi</label>
                <input type="text" class="form-control" name="nazwa" />
                <label for="kraj">Kraj</label>
                <input type="text" class="form-control" name="kraj" />
            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary" />
        </form>
    </div>
@endsection('dane')
