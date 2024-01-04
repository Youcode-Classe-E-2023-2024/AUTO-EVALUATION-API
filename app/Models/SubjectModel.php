<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    protected $table = 'subject';
    protected $fillable=[
        'title',
        'description',
        'competence_id'
    ];

    public function competence(){
        return $this->belongsTo(CompetenceModel::class);
    }

    use HasFactory;
}
