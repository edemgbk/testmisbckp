<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paid_Through extends Model
{
    //

    protected $table ='paid_through';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'accountname', 'accountcode','accounttyoe_id','currency_id','description'
    ];


    public function expenses(){
        return $this->hasMany('App\Expense');

    }
}
