<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\ProviderMakeCommand;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description' , 'longDescription'];

    public function toggleComplete(){

        $this->completed = !$this->completed;
        $this->save();
    }
}
