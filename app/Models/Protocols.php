<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protocols extends Model
{
    protected $table = 'protocols';

    protected $fillable = ['name', 'table_name', 'table_columns'];
}
