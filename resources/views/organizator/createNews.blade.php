@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4" xmlns="http://www.w3.org/1999/html">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Dodawanie Newsów</h2>
        <form action="{{action('AllController@StoreNews')}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label for="tittle">Tytuł newsa</label>
                <input type="text" class="form-control" name="tittle" />
                <label for="content">Treść</label>
                <textarea type="text" class="form-control" name="content" /></textarea>
                <label for="author">Autor:</label>
                <input type="text" class="form-control" name="author" value="{{ Auth::user()->login}}"  readonly/>
                <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id}}"  readonly/>
            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary" />
        </form>
    </div>
@endsection('dane')
