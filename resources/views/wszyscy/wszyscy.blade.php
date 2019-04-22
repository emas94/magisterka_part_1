@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Cała społeczność Wyjedż z Nami</div>
        <table class="table table-bordered">
            <thead>
            <tr class="text-danger">
                <th scope="col">#</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Funkcja</th>
                <th scope="col">Email</th>
                <th scope="col">Telefon</th>
                <th scope="col">Status</th>
                <th scope="col">Napisane artykuły</th>
                <th scope="col">Organizowane mecze</th>
                <th scope="col">Edytuj</th>
            </tr>
            </thead>
            <tbody>
            @php
                $time_start = microtime(true);
            @endphp
            @foreach ($wszyscyList as $all)

                <tr>
                    <th scope="row">{{$all->id}}</th>
                    <td><a href="{{ URL::to('wszyscy/' . $all->id) }}">{{$all->name}}</a> </td>
                    <td>{{$all->lastname}} </td>
                    <td  class="font-weight-bold font-italic">{{$all->funkcja}} </td>
                    <td>{{$all->email}} </td>
                    <td>{{$all->telefon}} </td>
                    <td>{{$all->status}} </td>
                    <td>
                        <ul>
                            @if(($all->news!==null))
                                @foreach($all->news as $new)
                                    <li><a href="{{ URL::to('news/'. $new->id) }}">{{$new->tittle}} </a></li>


                                @endforeach
                            @else
                                <li>Brak artykułów</li>
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($all->mecze as $mecz)
                                <li> {{$mecz->nazwa}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td> <a href="{{ URL::to('admin/paneladministratora/editUser/'. $all->id) }}">Edytuj</a></td>
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
$file = "wszyscyTime.txt";

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

<div style="border: 1px black solid; width: 200px" class="p-1">

    @foreach ($statisticAdmin as $statAdmin)
        @if ($statAdmin->funkcja == "Admin")
            Liczba administratorów: {{$statAdmin->user_count}} </br>
            @endif
            @endforeach


        @foreach ($statistic as $stat)
            @if ($stat->funkcja == "Organizator")
                Liczba organizatorów: {{$stat->user_count}} </br>
            @endif
            @endforeach
    @foreach ($statisticUser as $statUser)
            @if ($statUser->funkcja == "Użytkownik")
                Liczba uzytkowników: {{$statUser->user_count}} </br>
            @endif
        @endforeach
    </div>
    </div>
@endsection('dane')
