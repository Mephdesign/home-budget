<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stale extends Model
{
    use HasFactory;
    protected $table = 'wydatki_stale';

    protected $fillable = ['name','miesiac', 'kwota', 'completed'];
}
