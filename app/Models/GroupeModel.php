<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeModel extends Model
{
    protected $fillable=[
      'nom',
      'description'
    ];

    public function sessions()
    {
        return $this->hasMany(SessionModel::class, 'group_id');
    }

    use HasFactory;
}
