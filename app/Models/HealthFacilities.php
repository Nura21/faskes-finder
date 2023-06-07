<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HealthFacilities
 *
 * @property int $id
 * @property string $name
 * @property string $lat
 * @property string $long
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities query()
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HealthFacilities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HealthFacilities extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lat',
        'long',
        'status',
    ];

    /**
     * Validation
     */
    protected $rules = [
        'name' => 'required',
        'lat' => 'required',
        'long' => 'required',
    ];

    public function getRules()
    {
        return $this->rules;
    }
}
