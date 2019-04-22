@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card">
            <div class="card-headerc font-weight-bold p-2"style="border: #1d2124 1px solid">
                {{$admin->login}}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Imie</td>
                        <td>{{$admin->name}}</td>
                    </tr>
                    <tr>
                        <td>Nazwisko</td>
                        <td>{{$admin->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$admin->email}}</td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td>{{$admin->telefon}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$admin->status}}</td>
                    </tr>
                    <tr>
                        <td>Organizowane mecze</td>
                        <td>
                            <ul>
                                @foreach($admin->mecze as $mecz)
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
