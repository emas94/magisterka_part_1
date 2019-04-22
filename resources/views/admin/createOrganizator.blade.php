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
        <h2>Dodawanie Organizatora</h2>
        <form action="{{action('AdminiController@StoreOrganizer')}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" />
            </div>
            <div class="form-group">
                <label for="name">Imie</label>
                <input type="text" class="form-control" name="name" />
    </div>
            <div class="form-group">
                <label for="lastname">Nazwisko</label>
                <input type="text" class="form-control" name="lastname" />
    </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" />
    </div>
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" class="form-control" name="password" />
    </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="phone" class="form-control" name="telefon" />
    </div>
            <div class="form-group">
                <label for="mecze">Organizowane mecze:</label>
                @foreach($mecze as $mecz)

                <input type="checkbox" class="form-control" name="mecze[]" value="{{ $mecz->id }}" />
                    <lablel class="m-auto text-center">{{$mecz->nazwa}}</lablel>
                    @endforeach
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="funkcja" value="Organizator" />
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="" >
                    @foreach($status as $stat)
                        <option value="{{ $stat->status }}">{{ $stat->status }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary" />
        </form>
    </div>
@endsection('dane')
