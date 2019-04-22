@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Druzyny</div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Kraj</th>
                <th scope="col">Stadion</th>


            </tr>
            </thead>
            <tbody>
            @foreach ($druzyny as $druzyna)

                <tr>
                    <th scope="row">{{$druzyna->id}}</th>
                    <td>{{$druzyna->nazwa}} </td>
                    <td>{{$druzyna->kraj}} </td>
                    @if (isset($druzyna->stadion->nazwa))
                    <td>{{$druzyna->stadion->nazwa}} ({{$druzyna->stadion->liczbamiejsc}})</td>
                        @else
                        <td>Brak danych</td>
                    @endif


                </tr>

            @endforeach
            </tbody>

        </table>
    </div>
@endsection('dane')
