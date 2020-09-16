@extends('app.layout')

@section('title', 'Recepção')

@section('content') 
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: %;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff; 
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
<br>
<br>
<div class='container'>
    <div class="row"> 

        <form class="form-inline" method="POST" id="frmSearchEmployee" name="frmSearchEmployee" autocomplete="off">

            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Email</label>
                <dub>Insira o nome para localizar o funcionário</dub>
            </div>

            <div class="form-group mx-sm-3 mb-2">
                <label for="myInput" class="sr-only">Nome</label>
                <div class="autocomplete" style="width:220px;">
                <input type="text" class="form-control" placeholder="Nome" id="myInput">
                </div>
            </div>
                <button type="submit" class="btn btn-primary mb-2">Localizar</button>
        </form> 
  
    </div>

    <div class="alert alert-danger" role="alert" id="divNotFound">
        Usuário não encontrado !!
    </div>
    <div class="alert alert-danger" role="alert" id="divError">
        Erro ao cadastrar colaborador!!
    </div>
    <hr>
    
    <div class="row"> 
        <div class="col-sm-12" >
           <div id="listColaborator">
                <form  method="POST" id="frmCollaborator" name="frmCollaborator">

                    <div class="alert alert-success" role="alert" id="divSuccess">
                        Cadastrado com sucesso !!
                    </div>
                    


                    <input type="hidden" id="idCollaborator" name="idCollaborator">
                    <legend>Dados pessoais</legend>
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label for="dataAdmissao">Data Admissão</label>
                                <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" disabled>
                            </div>  
                        </div>
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" name="rg" disabled>
                            </div>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" disabled>
                    </div>  

                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label for="entrada">Entrada</label>
                                <input type="time" class="form-control" id="entrada" name="entrada">
                            </div>  
                        </div> 
                    </div> 

                    <div class="form-group">
                        <label for="obs">Obs:</label>
                        <textarea class="form-control" id="obs" name="obs"  rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-12">Salvar</button>
                </form>
           </div>
        </div>
    </div> 
</div>
@endsection 

@section('scripts')
    <script src="{{ mix('/js/modules/recepcao/recepcao.js') }}" type="text/javascript"></script> 
@endsection