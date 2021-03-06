<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function platform()
    {
        return $this->belongsTo('App\Platform');
    }
    
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
     public function scopeSearch($query, $searchTerm)
   {
     $query->where('name', 'LIKE', "%$searchTerm%");             
   }
    
    protected $fillable = ['name', 'developer', 'picture', 'ageRating','description','price','score','platform_id','genre_id', 'created_at', 'updated_at'];
}

