<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wplyw extends Model
{
    use HasFactory;
    protected $table = 'wplywy';

    protected $fillable = ['miesiac', 'kwota'];
}
