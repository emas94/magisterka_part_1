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
        <h2>Edycja </h2>
        <form action="{{action('AdminiController@editStore')}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="id" value="{{ $user->id }}"/>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" value="{{$user->login}}" />
            </div>
            <div class="form-group">
                <label for="name">Imie</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
            </div>
            <div class="form-group">
                <label for="lastname">Nazwisko</label>
                <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}" />
            </div>
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" class="form-control" name="password" value="{{$user->password}}" />
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="phone" class="form-control" name="telefon" value="{{$user->telefon}}" />
            </div>
            <div class="form-group">
                <label for="mecze">Organizowane mecze:</label>
                @foreach($mecze as $mecz)
                    @if($user->mecze->contains($mecz->id))
                        <input type="checkbox" class="form-control" name="mecze[]" value="{{ $mecz->id }}" checked/>
                        <lablel class="m-auto text-center">{{$mecz->nazwa}}</lablel>
                    @else
                        <input type="checkbox" class="form-control" name="mecze[]" value="{{ $mecz->id }}" />
                        <lablel class="m-auto text-center">{{$mecz->nazwa}}</lablel>
                    @endif


                @endforeach
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="funkcja" value="Organizator" />
            </div>
            <div class="form-group">
                <label for="status">Status</label></br>

                    @if($user->status =='Aktywny')
                        Aktywny  <input type="checkbox" class="form-control" name="status" value="Aktywny" checked="checked"/>
                        Nieaktywny   <input type="checkbox" class="form-control" name="status" value="Nieaktywny" />
                        @else
                        Aktywny  <input type="checkbox" class="form-control" name="status" value="Aktywny">
                        Nieaktywny   <input type="checkbox" class="form-control" name="status" value="Nieaktywny" checked="checked" />
                        @endif

            </div>
            <div class="form-group">
                <label for="status">Funkcja</label>
                <select name="funkcja" id="" >
                    @foreach($funkcja as $fun)
                        <option value="{{ $fun->funkcja }}" selected>{{ $fun->funkcja }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Edytuj" class="btn btn-primary" />
        </form>
    </div>
@endsection('dane')
