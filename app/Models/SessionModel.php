<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionModel extends Model
{
    protected $fillable=[
      'start_at' ,
      'end_at',
      'subject_id',
      'group_id'
    ];

    public function subject(){
        return $this->belongsTo(SubjectModel::class , 'subject_id');
    }



    public function group(){
        return $this->belongsTo(GroupeModel::class , 'group_id');
    }

    // here add the apprenant FK

    use HasFactory;
}
