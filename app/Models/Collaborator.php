<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    /** @use HasFactory<\Database\Factories\CollaboratorsFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'todo_list_id'];
}
