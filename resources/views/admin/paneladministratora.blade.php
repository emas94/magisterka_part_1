@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <section class="paneladmin" style="margin-top: 5%;height: 600px ">
    <div class="container" >

        <ul class="list-group text-center m-auto " style="width: 200px;padding-top: 150px;">

            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createMecz')}}">Dodaj mecz</a></li>
            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createLiga')}}">Dodaj Ligę</a></li>
            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createDruzyna')}}">Dodaj Druzynę</a></li>
            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createUser')}}">Dodaj Użytkownika</a></li>
            <li class="list-group-item bg-list"><a href="{{URL::to('admin/paneladministratora/createOrganizator')}}">Dodaj Organizatora</a></li>
            <li class="list-group-item bg-list p-2"><a href="{{URL::to('admin/paneladministratora/editUser')}}">Edytuj użytkownika</a></li>

        </ul>
    </div>
    </section>
@endsection('dane')
