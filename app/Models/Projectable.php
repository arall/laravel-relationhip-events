<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Projectable extends MorphPivot
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($model) {
            $projectable = $model->projectable;
            // Domain class
            if (get_class($projectable) == Domain::class) {
                // Attach host
                if ($projectable->host) {
                    $projectable->host->projects()->attach($model->project);
                }
            }
        });
    }

    /**
     * Project relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * Projectable relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function projectable()
    {
        return $this->morphTo();
    }
}
