@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Administratorzy</div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Status</th>
                <th scope="col">Funkcja</th>
                <th scope="col">Organizowane mecze</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($adminiList as $admini)

                <tr>
                    <th scope="row">{{$admini->id}}</th>
                    <td><a href="{{ URL::to('admini/' . $admini->id) }}">{{$admini->name}}</a> </td>
                    <td>{{$admini->lastname}} </td>
                    <td>{{$admini->email}} </td>
                    <td>{{$admini->telefon}} </td>
                    <td>{{$admini->status}} </td>
                    <td>{{$admini->funkcja}} </td>
                    <td>
                        <ul>
                            @foreach($admini->mecze as $mecz)
                               <li> {{$mecz->nazwa}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>
    </div>
@endsection('dane')
