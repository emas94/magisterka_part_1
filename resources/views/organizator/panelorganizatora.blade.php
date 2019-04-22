@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <ul class="list-group text-center m-auto" style="width: 200px">
            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createMecz')}}">Dodaj mecz</a></li>
            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createUser')}}">Dodaj użytkownika</a></li>
            <li class="list-group-item bg-list"><a href="{{URL::to('organizator/panelorganizatora/createNews')}}">Dodaj newsa</a></li>
        </ul>
    </div>
@endsection('dane')
