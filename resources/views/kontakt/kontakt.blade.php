@extends('szablon')
@section('dane')
<section class="kontakt">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-6 m-auto text-center">
            <h1>Skontaktuj się z Nami</h1>
            <p>W razie jakichkolwiek pytań prosimy o kontakt</p>
        </div>
    </div>
    </div>
</section>

<section id="contact" class="py-3">
    <div class="container ">
        <div class="row">
            <div class="col-md-4">
                    <div class="card p-4">
                        <div class="card-body">
                            <h4>Nasz adres do korespondencji:</h4>
                            <p>W razie problemów, pytań czy ofert współpracy proszę pisać/dzwonić pod wskazany adres</p>
                            <h2>Wyjedź z nami sp. z o.o.</h2>
                            <h4>ul. Ulicowa 4</h4>
                            <p>49-300 Brzeg</p>
                            <h4>Email</h4>
                            <p>office@wyjedzznami.pl</p>
                            <h4>Numer Telefonu</h4>
                            <p>111-222-333 - <b>Administrator</b></p>
                            <p>111-222-333 - <b>Organizator</b></p>
                            <p>111-222-333 - <b>Organizator1</b></p>
                            <p>111-222-333 - <b>Biuro</b></p>
                        </div>
                    </div>
            </div>
            <div class="col-md-8 p-4">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="text-center">Proszę wypełnić ten formularz, aby się z nami skontaktować</h3>
                        <hr>
                        <form method="POST" action="{{ url('sendmail') }}">
                            {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="imie" type="text" name="imie"class="form-control" placeholder="Imie">
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="nazwisko "type="text" name="nazwisko" class="form-control" placeholder="Nazwisko">
                                    </div>
                                </div>
                            <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email"id="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" id="numer" name="numer"class="form-control" placeholder="Numer Telefonu:">
                                    </div>
                                </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                        <textarea type="text" id="wiadomosc" name="wiadomosc" class="form-control" placeholder="Wiadomość"></textarea>
                                    </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                        <input type="submit" name="submit"value="Wyślij" class="btn btn-outline-danger btn-block">
                                    </div>
                        </div>
                        </div>
                    </form>
                        @yield('kontakt')
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>



</section>
@endsection('dane')
