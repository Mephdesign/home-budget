<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WydatkiPlanowaneSum extends Model
{
    use HasFactory;
    protected $table = 'wydatki_planowane_sum';

    protected $fillable = ['kwota'];
}
