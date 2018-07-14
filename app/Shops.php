<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    
    protected $fillable = [
      'title', 'city','address'
  ];


  private $rules = array(
    'title' => 'required',
    'city' => 'required|min:6',
    'address' => 'required|min:20'
  );
 
  public function validate($input) {
    return Validator::make($input, $this->rules);
  }


 public $timestamps = true;	
    
 protected $table = 'shops';


   public function user()
    {
        return $this->belongsTo('App\User');
    }


}
