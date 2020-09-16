<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CheckInModel;

class CollaboratorModel extends Model
{
    protected $table = "ck_collaborator";
    protected $fillable = ['name','admission_date','occupation','cpf','rg','photo'];

    public function serachCollaborator($name)
    {
        $data = CollaboratorModel::where("name", $name)->get();

        if(count($data) > 0)
        {
            $verify = CheckInModel::where('ck_collaborator_id',$data[0]['id'])->where('date',date('Y-m-d'))->get();

            if(count($verify) > 0)
            {
                foreach($data as $key)
                {
                    $key->date = $verify[0]['check_in_time'];
                    $key->description = $verify[0]['description'];
                }
            }
        }
        return (count($data) >0)?$data:0;
    }

    public function verifyCollaborator($cpf,$rg)
    {
        $verify = CollaboratorModel::where('cpf',$cpf)->orWhere('rg',$rg)->get();

        return (count($verify)>0) ? false:true;
    }

    public function updateData($id,$name,$admissionDate,$cpf,$rg,$occupation)
    {
        $verify = CollaboratorModel::where('id',$id)->update(["name" => $name,"admission_date" => $admissionDate,"cpf" => $cpf,"rg" => $rg,"occupation" => $occupation]);

        return ($verify) ? true:false;
    }
}
