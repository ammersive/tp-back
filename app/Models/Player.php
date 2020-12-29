<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ["name", "play_count"];

    public function incrementPlayCount()
    {   
        $this->play_count = $this->play_count + 1;
        return $this->play_count;   
    }
}
