<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'stadium_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stadium()
    {
        return $this->belongsTo('App\Stadium', 'stadium_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rows()
    {
        return $this->hasMany('App\Row', 'sector_id', 'id');
    }

    /**
     * Take all places of sector
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function places()
    {
        return $this->hasManyThrough('App\Place', 'App\Row',
            'sector_id', 'row_id',
            'id', 'id');
    }

    /**
     * Get count of free places in this sector
     * @return int
     */
    public function freePlaces()
    {
        return $this->places()->where('user_id', '=',null)->count();
    }

    /**
     * Get average price on place in this sector
     * @return mixed
     */
    public function averagePrice()
    {
        return (int)$this->places()->avg('price');
    }
}
