@extends('szablon')

@section('tytul')
    @if (isset($tytul))
        - {{$tytul}} @endsection
@endif
@section('dane')
    <div class="container mt mb-4">
        <div class="card-header font-weight-bold" style="border: #1d2124 1px solid">Ligi</div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Kraj</th>


            </tr>
            </thead>
            <tbody>
            @foreach ($ligi as $liga)

                <tr>
                    <th scope="row">{{$liga->id}}</th>
                    <td>{{$liga->nazwa}} </td>
                    <td>{{$liga->kraj}} </td>


                </tr>

            @endforeach
            </tbody>

        </table>
    </div>
@endsection('dane')
