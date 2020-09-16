@extends('app.layout')

@section('title', 'Login')

@section('content')
 
<style>
    html,
  body {
    height: 100%;
  }

  body {
    display: -ms-flexbox;
    display: -webkit-box;
    display: flex;
    -ms-flex-align: center;
    -ms-flex-pack: center;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }
  .form-signin .checkbox {
    font-weight: 400;
  }
  .form-signin .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  p{
    text-align: center;
  }
</style>  	 

    <form class="form-signin" method="POST" id="frmLogin" name="frmLogin">
        @csrf
        <p><img class="mb-4" src="{{url('images/logo-ckn.jpg')}}" width="150" height="150"></p> 
        <h1 class="h3 mb-3 font-weight-normal"><p>Login</p></h1>

        @if ($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                 {{$error}}
              @endforeach
            </div>
        @endif
        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; Todos os direitos reservados CKN IT</p>
    </form>
    @endsection 

@section('scripts')
    <script src="{{ mix('/js/modules/login/login.js') }}" type="text/javascript"></script> 
@endsection
 
    