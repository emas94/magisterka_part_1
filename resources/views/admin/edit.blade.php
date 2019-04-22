@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')

    <div class="container mt mb-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Edit </h2>
        <form  method="POST" role="form" >

            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <div>

                <select name="name" id="test" onchange="javascript:doUrl(event)">

                @foreach($user as $us1)
                        <option value="{{$us1->id}}">{{$us1->name}} {{$us1->lastname}}</option>


                    @endforeach

                    </select>
            </div>


        </form>



            <a id="linkEdit" href="{{ URL::to('admin/paneladministratora/editUser/'. $us1->id) }}">Edytuj </a>


    </div>

    <script>
         function doUrl(e){
            $('#linkEdit').attr('href','/admin/paneladministratora/editUser/'+e.target.value)
        }
    </script>
@endsection('dane')
