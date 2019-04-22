@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Stadiony</div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Adres</th>
                <th scope="col">Liczba miejsc na stadionie</th>

            </tr>
            </thead>
            <tbody>
            @php
                $time_start = microtime(true);
            @endphp
            @foreach ($stadiony as $stadion)

                <tr>
                    <th scope="row">{{$stadion->id}}</th>
                    <td>{{$stadion->nazwa}} </td>
                    <td>{{$stadion->adres}} </td>
                    <td>{{$stadion->liczbamiejsc}} </td>

                </tr>

            @endforeach
            @php   $time_end = microtime(true);
              echo " Czas na początku pętli: ". $time_start ."</br>";
               echo " Czas na końcu pętli: ".$time_end ."</br>";
               $time = $time_end - $time_start;

            echo " Różnica: ". $time;

// zmienna $dane, która będzie zapisana
// może także pochodzić z formularza np. $dane = $_POST['dane'];
$dane = $time."\n";

// przypisanie zmniennej $file nazwy pliku
$file = "stadionyTime.txt";

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
