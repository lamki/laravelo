<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //Table name
    protected $table = 'sales';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamp = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
