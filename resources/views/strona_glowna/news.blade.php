<section id="news">
    <div class="col-md-6 m-auto p-4">
        <h2 class="text-center text-white">Aktualności:</h2>
        <div class="container" style=" overflow-y: scroll; height: 800px;;">

            <div class="col-md-8 m-auto">
                @php
                    $time_start = microtime(true);
                @endphp
                @for($i=0; $i<1000; $i++)

                @foreach($news as $new)
                    <div class="card">
                        <div class="card-header"><b><a href="{{ URL::to('news/'. $new->id) }}">{{$new->tittle}}</a></b>
                            Autor: <b>{{$new->author}}</b> Ocena: <b>{{$new->rating}}</b> <div><a href="{{ URL::to('add/'. $new->id) }}"><b class="text-success h2">+</b></a>
                                <a href="{{ URL::to('sub/'. $new->id) }}"><b class="text-danger h2">-</b></a></div></div>
                <div class="card-body">
                    <div> {{$new->content}}</div>
                </div>
                    </div>
                @endforeach
                @endfor
                @php   $time_end = microtime(true);
              echo " Czas na początku pętli: ". $time_start ."</br>";
               echo " Czas na końcu pętli: ".$time_end ."</br>";
               $time = $time_end - $time_start;

            echo " Różnica: ". $time;
           // zmienna $dane, która będzie zapisana
// może także pochodzić z formularza np. $dane = $_POST['dane'];

$dane = $time."\n";

// przypisanie zmniennej $file nazwy pliku
$file = "newsTime.txt";

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
            </div>
        </div>

</section>
