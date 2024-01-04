<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $fillable=[
        'text',
        'response',
        'competence_id',
    ];
    public function competence(){
        return $this->belongsTo(CompetenceModel::class, 'competence_id');
    }


    use HasFactory;
}
