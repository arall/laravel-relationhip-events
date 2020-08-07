<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Websites relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     */
    public function websites()
    {
        return $this->morphedByMany('App\Models\Website', 'projectable')->using('App\Models\Projectable');
    }

    /**
     * Domains relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     */
    public function domains()
    {
        return $this->morphedByMany('App\Models\Domain', 'projectable')->using('App\Models\Projectable');
    }
}
