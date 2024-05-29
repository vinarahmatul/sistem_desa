@extends('layout.Login.login-lay');

@section('content')
<!-- Content -->

<div class="container-xxl">
    <form class="container py-4 h-100 shadow" style="background-color: #ffff; border-radius: 20px" action="{{ route('loginproses') }}" method="post"> 
    @csrf 
        <img class="mb-4 mt-4" src="{{ asset('images/logodinas.png') }}" alt="logo" width="150" height="100"> 
    
        <h1 class="h3 mb-3 fw-normal fw-bold" style="font-size: 16px">SELAMAT DATANG</h1> 
    
        <div class="form-group form-floating mb-3 mr-2" style="font-size: 16px;"> 
            <input type="email" name="email" value="{{old('email')}}" class="form-control" /> 
            <label for="floatingName">Masukkan Email</label> 
        </div> 
    
        <div class="form-group form-floating mb-3" style="font-size: 16px;"> 
            <input type="password" name="password" class="form-control" /> 
            <label for="floatingPassword">Masukkan Password</label> 
        </div> 

        <div class="d-flex justify-content-between"> 
            <a class="btn btn-lg btn-danger me-2" href="/Beranda" style="font-size:small; width:50%;">Kembali</a> 
            <button class="btn btn-lg btn-primary" type="submit" style="font-size:small; width:50%;">Masuk</button>
        </div> 
    </form>
</div>

<!-- / Content -->
@endsection