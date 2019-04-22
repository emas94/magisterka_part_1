@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        @if (session('status_succes'))
            <div class="alert alert-success">
                {{ session('status_succes') }}
            </div>
        @endif
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Mecze</div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Data</th>
                <th scope="col">Wolne miejsca</th>
                <th scope="col">Status</th>
                <th scope="col">Lista osób</th>

            </tr>
            </thead>
            <tbody>
            @php
                $time_start = microtime(true);
            @endphp
            @foreach ($mecze as $mecz)

                <tr>
                    <th scope="row">{{$mecz->id}}</th>
                    <td>     <a href="{{ URL::to('organizatorzy/organizer/'. $mecz->id) }}">{{$mecz->nazwa}}</a></td>
                    <td>{{$mecz->data}} </td>
                    <td>{{$mecz->wolnemiejsca}} </td>
                    <td>{{$mecz->status}} </td>
                    <td>    <ul>
                            @foreach($mecz->klientMecz as $mecz)
                                <li> <a href="{{ URL::to('wyjazdylist/'. $mecz->id) }}">{{$mecz->name}} {{$mecz->lastname}}</a></li>
                            @endforeach
                        </ul></td>



                </tr>

            @endforeach
            @php   $time_end = microtime(true);;
              echo " Czas na początku pętli: ". $time_start ."</br>";
               echo " Czas na końcu pętli: ".$time_end ."</br>";
               $time = $time_end - $time_start;

            echo " Różnica: ". $time;
            // zmienna $dane, która będzie zapisana
// może także pochodzić z formularza np. $dane = $_POST['dane'];
$dane = $time."\n";

// przypisanie zmniennej $file nazwy pliku
$file = "wyjazdyTime.txt";

// uchwyt pliku, otwarcie do dopisania
$fp = fopen($file, "a");

// blokada pliku do zapisu
flock($fp, 2);

// zapisanie danych do pliku
fwrite($fp, $dane);

// odblokowanie pliku
flock($fp, 3);

// zamknięcie pliku
fclose($fp);
            @endphp
            </tbody>

        </table>
    </div>
@endsection('dane')
