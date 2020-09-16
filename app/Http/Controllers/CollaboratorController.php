<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CollaboratorModel;

class CollaboratorController extends Controller
{
    public function index()
    {
        return view('collaborator.index');
    }

    public function list()
    {
        $all = CollaboratorModel::all();
        return response()->json((count($all)>0)?$all:0,200);
    }

    public function store(Request $request,CollaboratorModel $CollaboratorModel )
    { 
        $data = $request->all();

        $cpf = str_replace(array('.','-'),'',$data['cpf']);
        $rg = str_replace(array('.','-'),'',$data['rg']);

        $verify = $CollaboratorModel->verifyCollaborator($cpf,$rg);

        if($verify)
        { 
            $collaborator = CollaboratorModel::create([
                "name" => $data['name'],
                "admission_date" => $data['admission_date'],
                "occupation" => $data['occupation'],
                "cpf" => $cpf ,
                "rg" => $rg,
                "photo" => $data['photo']
            ]); 

            return response()->json("Cadastro realizado com sucesso",201);
        }else{
            $collaboratorModel = $CollaboratorModel->updateData(
                $data['id'],
                $data['name'],
                $data['admission_date'],
                $data['cpf'],
                $data['rg'],
                $data['occupation']
            ) ;

            if($collaboratorModel)
            {
                return response()->json("Cadastro atualizado com sucesso",200);
            }
        }
        return response()->json("Colaborador ja cadastrado",204);
        
    }

    public function employee_list()
    {
        $User = CollaboratorModel::all();

        if($User)
        {
            foreach($User as $key)
            {
                $var[] = $key->name;                 
            }

            return response()->json($var,200);
        }
        return response()->json("Usuário não encontrado",204);
    }

}
 