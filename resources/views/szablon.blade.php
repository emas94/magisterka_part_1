@include('items/header')




@include('items/navbar')
<section style="margin-top: 80px;">
@if (session('status'))
    <div class="alert alert-danger  m-auto " style="width: 400px; margin-top: 150px!important; margin-bottom: 50px!important;" role="alert">
        {{ session('status') }}
    </div>
@endif
@yield('dane')
</section>
@include('items/footer')
