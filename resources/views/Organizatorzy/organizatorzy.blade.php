@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Organizatorzy</div>
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
            <th scope="col">Operacje </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($organizatorzyList as $organizatorzy)

            <tr>
                <th scope="row">{{$organizatorzy->id}}</th>
                <td><a href="{{ URL::to('organizatorzy/' . $organizatorzy->id) }}">{{$organizatorzy->name}}</a> </td>
                <td>{{$organizatorzy->lastname}} </td>
                <td>{{$organizatorzy->email}} </td>
                <td>{{$organizatorzy->telefon}} </td>
                <td>{{$organizatorzy->status}} </td>
                <td>{{$organizatorzy->funkcja}} </td>
                <td>
                    <ul>
                        @foreach($organizatorzy->mecze as $mecz)
                           <li><a href="{{ URL::to('organizatorzy/organizer/'. $mecz->id) }}">{{$mecz->nazwa}}</a></li>
                        @endforeach
                    </ul>
                </td>
                <td><a href="{{ URL::to('organizatorzy/delete/'. $organizatorzy->id) }}" onClick="return confirm('Czy napewno usunąć?')">Usuń organizatora</a></td>
            </tr>

        @endforeach

        </tbody>

    </table>
    </div>
@endsection('dane')
