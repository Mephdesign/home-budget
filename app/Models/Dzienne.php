<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dzienne extends Model
{
    use HasFactory;
    protected $table = 'wydatki_dzienne';

    protected $fillable = ['name','miesiac', 'kwota'];
}
