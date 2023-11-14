<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $primaryKey = 'pk_int_user_dtls_id';
    protected $fillable = [

        'Name',
        'email',
        'contact_number',
        'contact_number1',
        'address',
        'fk_int_designation_id',
        'user_status',
        'fk_int_user_id',
    ];
    public function designation()
    {
        return $this->belongsTo('App\Models\Designation', 'fk_int_designation_id')->withDefault();
    }
}
