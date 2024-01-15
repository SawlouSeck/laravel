<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'Prenom',
        'Parti',
        'Biographie',
        'Validate',
        'Photo',];

        public function programmes(){
            return $this->hasMany(Programme::class);
        }

}
