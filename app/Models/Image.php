<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;
    protected $fillable = [
        "image_name",
        'superhero_id',
    ];

    public function superhero(){
        return $this->belongsTo(Superhero::class);
    }


}
