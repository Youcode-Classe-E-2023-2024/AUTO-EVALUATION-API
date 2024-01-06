<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence_Evaluation_Model extends Model
{
    protected $fillable=[
      'competence_id',
        'evaluation_id',
        'is_correct'
    ];

    function competence(){
        return $this->belongsTo(CompetenceModel::class,'competence_id');
    }

    public function evaluation(){
        return $this->belongsTo(EvaluationModel::class,'evaluation_id');
    }
    use HasFactory;
}
