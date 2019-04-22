@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card">
            <div class="card-headerc font-weight-bold p-2 "style="border: #1d2124 1px solid">
                {{$dane->login}}
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Imie</td>
                        <td>{{$dane->name}}</td>
                    </tr>
                    <tr>
                        <td>Nazwisko</td>
                        <td>{{$dane->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$dane->email}}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{$dane->telefon}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$dane->status}}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>
@endsection('dane')
