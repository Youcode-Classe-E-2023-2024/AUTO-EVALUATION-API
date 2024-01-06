<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceModel extends Model
{
    protected $fillable= array(
        'nom',
        'description',
        'coefficient',
        'categoryId'
    );

    public function categorie(){
        return $this->belongsTo(CategoryModel::class,'categoryId');
    }

    public function actions()
    {
        return $this->hasMany(ManagerAction::class);
    }

    public function questions()
    {
        return $this->hasMany(QuestionModel::class);
    }

    public function evaluations()
    {
        return $this->belongsToMany(EvaluationModel::class , 'competence_evaluation' , 'evaluation_id' ,'evaluation_id')
            ->withPivot('is_correct')
            ->withTimestamps();
    }
    use HasFactory;
}
