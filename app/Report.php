<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //

    protected $table = 'reports';

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'number','title', 'purpose','fromd','tod','submittedon','status',
  ];



  public function expenses()
  {

return $this->belongsToMany(Expense::Class);
    }




// public function expenses()
// {
//     return $this->morphToMany('App\Expense','expendable');
// }


 }
