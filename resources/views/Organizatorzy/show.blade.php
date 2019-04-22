@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
    <div class="card">
        <div class="card-headerc font-weight-bold "style="border: #1d2124 1px solid">
            {{$organizator->login}}
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Imie</td>
                    <td>{{$organizator->name}}</td>
                </tr>
                <tr>
                    <td>Nazwisko</td>
                    <td>{{$organizator->lastname}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$organizator->email}}</td>
                </tr>
                <tr>
                    <td>Telefon</td>
                    <td>{{$organizator->telefon}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{$organizator->status}}</td>
                </tr>
                <tr>
                <td>Organizowane mecze</td>
                <td>
                    <ul>
                        @foreach($organizator->mecze as $mecz)
                            <li> {{$mecz->nazwa}}</li>
                        @endforeach
                    </ul>
                </td>

                </tr>
                <tr>
                    <td>Wyjzady </td>
                    <ul>
                    <td>@foreach( $organizator->wyjazdyList as $wyjazd)
                      <li> {{$wyjazd->nazwa}}</li>
                        @endforeach
                    </ul>
                    </td>
                </tr>
                <tr>
                    <td>Napisane artykuły</td>
                    <td>
                        <ul>
                            @if(($organizator->news!==null))
                            @foreach($organizator->news as $new)
                           <li><a href="{{ URL::to('news/'. $new->id) }}">{{$new->tittle}} </a></li>


                                @endforeach
                            @else
                                <li>Brak artykułów</li>
                            @endif
                        </ul>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    </div>
@endsection('dane')
