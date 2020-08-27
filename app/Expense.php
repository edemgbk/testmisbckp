<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
class Expense extends Model
{
    //

    protected $table = 'expenses';

    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'reference', 'merchant_id','amount','category_id','description','report_id','status','paidthrough_id',
    ];



    public function merchants()
    {
        return $this->belongsToMany(Merchant::Class);
    }



    public function categories()
    {
        return $this->belongsToMany(Merchant::Class);

        // return $this->morphedByMany('App\Category','expendable');
     }



    // public function reports()
    // {
    //     return $this->morphedByMany('App\Report','expendable');
    // }



    public function paidthrough()
    {
        return $this->belongsTo('App\Paid_Through');
    }



    public function reports()
    {

  return $this->belongsToMany(Report::Class);
      }




}
