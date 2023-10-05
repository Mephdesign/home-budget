<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planowane extends Model
{
    use HasFactory;
    protected $table = 'wydatki_planowane';

    protected $fillable = ['name','miesiac', 'kwota', 'completed'];
}
