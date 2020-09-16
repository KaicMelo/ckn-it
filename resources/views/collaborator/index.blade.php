@extends('app.layout')

@section('title', 'Recepção')

@section('content') 

<style>
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
#resetData{
    margin-left: 5px;
}
</style>
<br>
<br>   

<div class="container">

    <form class="form-inline" method="POST" id="frmSearchEmployee" name="frmSearchEmployee" autocomplete="off">
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Email</label>
            <dub><b>Insira o nome para editar o cadastro do colaborador</b></dub>
        </div>
    
        <div class="form-group mx-sm-3 mb-2">
            <label for="myInput" class="sr-only">Nome</label>
            <div class="autocomplete" style="width:220px;">
                <input type="text" class="form-control" placeholder="Nome" id="myInput">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Localizar</button>
        <button type="button" class="btn btn-danger mb-2" id="resetData" >Resetar</button>
    </form>

    <br>
    <br> 

    <div class="alert alert-danger" role="alert" id="divError">
        Erro ao cadastrar colaborador!!
    </div>
    <div class="alert alert-danger" role="alert" id="divExists">
        Usuário já cadastrado!!
    </div>
    <div class="alert alert-success" role="alert" id="divSuccess">
        Cadastrado com sucesso !!
    </div>
    <div class="alert alert-success" role="alert" id="divSuccessUpdate">
        Cadastrado atualizado com sucesso !!
    </div>

    <form method="post" enctype="multipart/form-data" id="frmCollaborator" name="frmCollaborator">
    <input type="hidden" id="idCollaborator" name="idCollaborator">
    <div class="form-row"> 
        <div class="form-group col-md-6">
            <label for="inputEmail4">nome</label>
            <input type="text" class="form-control" id="name" placeholder="Nome" required>
        </div>
        <div class="form-group col-md-6">
            <label for="admissionDate">Data Admissão</label>
            <input type="date" class="form-control" id="admissionDate" >
        </div>
    </div>
    <div class="form-group">
        <label for="occupation">Cargo</label>
        <input type="text" class="form-control" id="occupation" placeholder="Cargo" required>
    </div>
    <div class="form-row"> 
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="inputAddress2">CPF</label>
                <input type="text" class="form-control" id="cpf" placeholder="CPF" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="inputAddress2">RG</label>
                <input type="text" class="form-control" id="rg" placeholder="RG" required>
            </div>
        </div>
    </div>
     
    <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <br>
    <br> 
    <table id="tableCollaborator" class="display">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Data Admissão</th>
                <th>Data Cadastro</th>
                <th>Ultima Atualização</th>
            </tr>
        </thead>
        <tbody id = "bodyCollaborator">
        </tbody>
    </table>
</div>




@endsection 

@section('scripts')
    <script src="{{ mix('/js/modules/collaborator/collaborator.js') }}" type="text/javascript"></script> 
@endsection