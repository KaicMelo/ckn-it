<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckInModel extends Model
{
    protected $table = "ck_check_in_time";

    protected $fillable = [
        'ck_collaborator_id', 'date','check_in_time','description'
    ];

}
