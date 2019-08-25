<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperHeroe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','actor_id','house','image'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function actor(){
        return $this->belongsTo(Actor::class);
    }

    public function peliculas(){
        return $this->hasMany(Peliculas::class);
    }
}
