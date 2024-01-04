<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionModel extends Model
{
    protected $fillable=[
        'text',
        'resultat',
        'competence_id'
    ];

    public function competence(){
        return $this->belongsTo(CompetenceModel::class);
    }
    use HasFactory;
}
