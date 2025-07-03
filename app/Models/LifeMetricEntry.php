<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LifeMetricEntry extends Model
{
    use HasFactory;

    protected $table = 'life_metric_entry';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'life_metric_id',
        'value',
    ];

    /**
     * Get the life metric associated with the entry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\LifeMetric, $this>
     */
    public function vault(): BelongsTo
    {
        return $this->belongsTo(LifeMetric::class);
    }

    /**
     * Get the contacts associated with the life metric.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Contact, $this>
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'life_metric_entry', 'contact_id', 'life_metric_id')->withTimestamps();
    }
}
