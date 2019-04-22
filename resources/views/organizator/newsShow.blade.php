@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card">
            <div class="card-headerc font-weight-bold text-center"style="border: #1d2124 1px solid">
                {{$newsShow->tittle}}
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Autor</td>
                        <td>{{$newsShow->author}}</td>
                    </tr>
                    <tr>
                        <td>Tytuł</td>
                        <td>{{$newsShow->tittle}}</td>
                    </tr>
                    <tr>
                        <td>Treść</td>
                        <td>{{$newsShow->content}}</td>
                    </tr>
                    <tr>
                        <td>Ocena</td>
                        <td>{{$newsShow->rating}}</td>
                    </tr>
                    <tr>
                        <td>Data dodania</td>
                        <td>{{$newsShow->created_at}}</td>
                    </tr>
                    <tr><td>Operacje</td>
                    <td>    <a href="{{ URL::to('organizator/panelorganizatora/delete/'. $newsShow->id) }}" onClick="return confirm('Czy napewno usunąć?')">Usuń </a></td></tr>

                </table>

            </div>
        </div>
    </div>
@endsection('dane')
