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
        <h2>Zapisz się na mecz! </h2>
            <p>Przed zapisem prosimy o sprawdzenie poprawności danych. W razie problemów prosimy o kontakt z administratorem</p>
        <form action="{{action('WszyscyController@registerMatch')}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">

                <input type="hidden" class="form-control" name="user_id" readonly value="{{ Auth::user()->id }}" />
            </div>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" readonly value="{{ Auth::user()->login }}" />
            </div>
            <div class="form-group">
                <label for="name">Imie</label>
                <input type="text" class="form-control" name="name" readonly value="{{ Auth::user()->name }}" />
            </div>
            <div class="form-group">
                <label for="lastname">Nazwisko</label>
                <input type="text" class="form-control" name="lastname" readonly value="{{ Auth::user()->lastname }}" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" readonly value="{{ Auth::user()->email }}" />
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="phone" class="form-control" name="telefon"  readonly value="{{ Auth::user()->telefon }}" />
            </div>
            <div class="form-group">
                <label for="mecze">Wybierz mecz  </label></br>
                <select name="mecze" id="">
                @foreach($mecze as $mecz)
                        <option value="{{ $mecz->id }}">{{$mecz->nazwa}}</option>
                @endforeach
                </select>
            </div>
            <input type="submit" value="Zpisz" class="btn btn-primary" />
        </form>
    </div>
@endsection('dane')
