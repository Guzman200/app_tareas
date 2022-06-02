<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraIngreso extends Model
{
    use HasFactory;

    protected $table = "bitacora_ingresos";
    protected $guarded = [];
}
