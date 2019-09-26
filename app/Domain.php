<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';
    //protected $primaryKey = 'employeeID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customet_id',
        'domain',
        'provider',
        'orderid',
        'regis_date',
        'expire_date',
    ];
}
