<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    
    protected $fillable = [
      'title', 'city','address'
  ];




 public $timestamps = true;	
    
 protected $table = 'shops';


   public function user()
    {
        return $this->belongsTo('App\User');
    }


}
