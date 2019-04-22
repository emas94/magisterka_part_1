@extends('szablon')

@section('dane')
    <section class="strefaklienta">
<div class="container " style="margin-top: 5%">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">strefa    {{ Auth::user()->funkcja }}a </div>

                <div class="card-body">
                    @if (session('status_danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status_danger') }}
                        </div>
                    @endif

                    Jesteś zalogowany mordo!
                    <ul class="list-group text-center">
                        <li class="list-group-item"><a href="{{ URL::to('zapisy') }}" class="nav-link"> Zapisz się na mecz</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('wszyscy') }}" class="nav-link"> Wszyscy</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('admini') }}" class="nav-link"> Admini</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('organizatorzy') }}" class="nav-link"> Organizatorzy</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('stadiony') }}" class="nav-link"> Stadiony</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('ligi') }}" class="nav-link"> Ligi</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('druzyny') }}" class="nav-link"> Druzyny</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('mecze') }}" class="nav-link"> Mecze</a></li>
                        <li class="list-group-item"><a href="{{ URL::to('wyjazdy') }}" class="nav-link"> Wyjazdy</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
