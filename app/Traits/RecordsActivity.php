<?php

namespace App\Traits;

use App\Models\Activity;

trait RecordsActivity
{
    /**
     * The project's old attributes.
     *
     * @var array
     */
    public $oldAttributes = [];

    /**
     * Boot the trait.
     */
    public static function bootRecordsActivity()
    {
        foreach (self::recordableEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });

            if ($event === 'updated') {
                static::updating(function ($model) {
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }

    /**
     * Fetch the model events that should trigger activity.
     *
     * @return array
     */
    protected static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

        return ['created', 'updated'];
    }

    /**
     * Record activity.
     *
     * @param string $description
     */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'description' => $description,
            'changes' => $this->activityChanges(),
        ]);
    }

    /**
     * The activity feed
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }
}
