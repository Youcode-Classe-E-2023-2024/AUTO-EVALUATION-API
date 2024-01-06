<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationModel extends Model
{
    protected $fillable=[
        'remarque',
        'start_At',
        'end_At',
        'competence_id',
        'user_evaluateur_id',
        'user_evalue_id',
        'session_id'
    ];

    public function competence(){
        return $this->belongsTo(CompetenceModel::class,'competence_id'  );

    }

    public function evaluateur(){
        return $this->belongsTo(User::class,'user_evaluateur_id');
    }

    public function evalue(){
        return $this->belongsTo(User::class,'user_evaluateur_id');
    }

    public function session(){
        return $this->belongsTo(SessionModel::class,'session_id');
    }

    public function competences()
    {
        return $this->belongsToMany(CompetenceModel::class , 'competence_evaluation' , 'evaluation_id' , 'competence_id')
            ->withPivot('is_correct')
            ->withTimestamps();
    }
    use HasFactory;
}
