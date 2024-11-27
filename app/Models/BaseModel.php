<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method void insertWithTimestamps(Builder $query, array $data)
 * @method Builder whereBetweenDate(Builder $query, string $field, array $dates)
 */
class BaseModel extends Model
{
    use HasFactory;
    use GetStaticTableName;
    public function scopeInsertWithTimestamps(Builder $query, array $data): void
    {
        $currentTime = Carbon::now();
        $query->insert([
            'created_at' => $currentTime,
            'updated_at' => $currentTime,
            ...$data,
        ]);
    }
    public function scopeWhereBetweenDate(
        Builder $query,
        string $field,
        array $dates,
    ): Builder
    {
        $start = ($dates[0] instanceof Carbon ? $dates[0] : Carbon::parse($dates[0]));
        $end = ($dates[1] instanceof Carbon ? $dates[0] : Carbon::parse($dates[1]));
        $start = $start->clone();
        $end = $end->clone();
        $query->where($field, '>=', $start->startOfDay());
        $query->where($field, '<', $end->addDay()->startOfDay());
        return $query;
    }
}
