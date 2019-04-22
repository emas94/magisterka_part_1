@extends('szablon')
@section('dane')
<div class="container">
    <div class="card">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <div class="card-header">{{ Auth::user()->login }} </div>
            <div class="card-body">
                <h3>Imie:</h3> <input name="edycja" id="edycja" readonly="readonly"   rows="1" value=" {{ Auth::user()->name }}"><div class="btn myButton" id="myButton" onclick="myFunction()"><i class="fas fa-pencil-alt"></i></div>
                <h3>Nazwisko:</h3><input readonly  rows="1" style="border: 0;" value="  {{ Auth::user()->lastname }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
                <h3>Email:</h3> <input readonly  rows="1" style="border: 0;" value=" {{ Auth::user()->email }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
                <h3>W naszym serwisie od:</h3><input readonly  rows="1" style="border: 0;" value="  {{ Auth::user()->created_at }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
                <h3>Numer telefonu </h3><input readonly  rows="1" style="border: 0;" value=" {{ Auth::user()->telefon }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
                <h3>Status:</h3><input readonly  rows="1" style="border: 0;" value=" {{ Auth::user()->status }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
                <h3>Funkcja:</h3><input readonly  rows="1" style="border: 0;" value="  {{ Auth::user()->funkcja }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
                <h3>Funkcja:</h3><input readonly  rows="1" style="border: 0;" value="  {{ Auth::user()->password }}"><div class="btn"><i class="fas fa-pencil-alt"></i></div>
            </div>
        </div>
    </div>
<script>

    function myFunction() {

        if (document.getElementById("edycja").style.border = "0") {
            document.getElementById("edycja").style.border = "1px solid black";
        } else if
        (document.getElementById("edycja").style.border = "1px solid black")
        {
            document.getElementById("edycja").style.border = "0";
        }

    }


</script>
<script>   document.getElementById('myButton').onclick = function() {
        document.getElementById('edycja').removeAttribute('readonly');
    };
</script>
@endsection('dane')
