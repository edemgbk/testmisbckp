<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    //

    protected $table = 'merchants';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code',
    ];



    // public function expenses()
    // {
    //     return $this->belongsToMany(Expense::Class);
    // }



    public function expenses()
{
    return $this->morphToMany('App\Expense','expendable');
}


}
