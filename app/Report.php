<?php

namespace App;
use Hootlex\Moderation\Moderatable;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    // use Moderatable;

    protected $table = 'reports';

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'number','title', 'purpose','fromd','tod','submittedon','status','moderated_at',
  ];



  public function expenses()
  {

return $this->belongsToMany(Expense::Class);
    }



    public function merchants()
    {
        return $this->hasManyThrough('App\Merchant', 'App\Expense');
    }




// public function expenses()
// {
//     return $this->morphToMany('App\Expense','expendable');
// }


 }
