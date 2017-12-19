<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'owner_id'];

    protected $table = 'stadiums';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sectors()
    {
        return $this->hasMany('App\Sector','stadium_id','id');
    }
}
