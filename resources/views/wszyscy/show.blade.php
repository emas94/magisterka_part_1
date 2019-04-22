@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card">
            <div class="card-headerc font-weight-bold p-2 "style="border: #1d2124 1px solid">
                {{$single->login}}
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Imie</td>
                        <td>{{$single->name}}</td>
                    </tr>
                    <tr>
                        <td>Nazwisko</td>
                        <td>{{$single->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$single->email}}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{$single->telefon}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$single->status}}</td>
                    </tr>
                    <tr>
                    <td>Organizowane mecze</td>
                    <td>
                        <ul>
                            @foreach($single->mecze as $mecz)
                                <li> {{$mecz->nazwa}}</li>
                            @endforeach
                        </ul>
                    </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection('dane')
