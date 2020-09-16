<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{CollaboratorModel,CheckInModel,User};

class receptionController extends Controller
{
    public function index()
    {
        return view('reception.index');
    }

    public function searchEmployee(Request $request,CollaboratorModel $CollaboratorModel)
    {
        $name = $request->input('name');

        $CollaboratorModel = $CollaboratorModel->serachCollaborator($name);

         if($CollaboratorModel)   
         {
            return response()->json($CollaboratorModel,200);
         }
         return response()->json("Usuaio não encontrado",404);
    }

    public function updateCollaborator(Request $request,CheckInModel $CheckInModel)
    {
        $verify = CheckInModel::where('ck_collaborator_id',$request['id'])->where('date',date('Y-m-d'))->get();
        
        if(count($verify) > 0)
        {  
            $var = [
                'check_in_time' =>$request['entrada'],
                'description' =>$request['obs']
            ];
            CheckInModel::find($verify[0]['id'])->update($var); 
            return response()->json('Cadastro Atualizado com sucesso',200);
        }else{
            $check = CheckInModel::create([
                'ck_collaborator_id' => $request['id'],
                'date' => date('Y-m-d'),
                'check_in_time' =>$request['entrada'],
                'description' =>$request['obs'],
            ]);  
            
            return response()->json('Cadastro realizado com sucesso',200);
        }
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
