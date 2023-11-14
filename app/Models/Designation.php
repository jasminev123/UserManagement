<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    protected $table = 'designations';
    protected $primaryKey = 'pk_int_designation_id';
    protected $fillable = [

        'designation',
        'status',
    ];
}
