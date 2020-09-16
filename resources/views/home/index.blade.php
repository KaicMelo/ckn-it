@extends('app.layout')

@section('title', 'Home')

@section('content')
  
<style>
.home-reception{
  height: 25px; 
  width: 100%;
  displ: block;
  text-align: center;
}
</style>  

<div class="album py-5 bg-light">
    <div class="container"> 
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" id="reception">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; displ: block;" src="{{ url('images/recepcao.jpg') }}"  data-holder-rendered="true">
                    <div class='home-reception'>Recepção</div> 
              </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" id="collaborator">
                    <img class="card-img-top"  alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; displ: block;" src="{{ url('images/colaborador.jpg') }}"  data-holder-rendered="true">
                    <div class='home-reception'>Colaborador</div> 
              </div>
            </div>
        </div>
    </div>
</div>

@endsection 

@section('scripts')
    <script src="{{ mix('/js/modules/home/home.js') }}" type="text/javascript"></script> 
@endsection