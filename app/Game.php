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
    protected $fillable = ['name', 'developer', 'picture', 'ageRating','description','price','score','platform_id','genre_id', 'created_at', 'updated_at'];
}
