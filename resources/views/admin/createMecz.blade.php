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
        <h2>dodawanie meczu mordo</h2>
        <form action="{{action('AdminiController@Store')}}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label for="nazwa">Nazwa meczu</label>
                <input type="text" class="form-control" name="nazwa" />
                <label for="data">Data</label>
                <input type="date" class="form-control" name="data" />
                <label for="wolnemiejsca">Ilość wolnych miejsc</label>
                <input type="number" class="form-control" name="wolnemiejsca" />
                <label for="status">Status </label> </br>
                <select name="status" id="">
                @foreach($status as $stat)
                    <option value="{{ $stat->status }}">{{ $stat->status }}</option>
                    @endforeach
                </select>

            </div>
            <input type="submit" value="Dodaj" class="btn btn-primary" />
        </form>
    </div>
@endsection('dane')
