<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['number', 'sector_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector()
    {
        return $this->belongsTo('App\Sector', 'sector_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function places()
    {
        return $this->hasMany('App\Place', 'row_id', 'id');
    }
}
