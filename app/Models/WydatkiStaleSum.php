<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WydatkiStaleSum extends Model
{
    use HasFactory;
    protected $table = 'wydatki_stale_sum';

    protected $fillable = ['kwota'];
}
