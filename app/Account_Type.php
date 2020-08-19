<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_Type extends Model
{
    //

    protected $table = 'account_type';

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'display_name','description'
  ];
}
