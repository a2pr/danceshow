<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PackageDefinition extends Model
{
    use HasFactory;
    const AMOUNT_TYPE = 'amount';
    const INTERVAL_TYPE = 'interval';

    const ONE_MONTH_INTERVAL = 'P1M';
    const ONE_WEEK_INTERVAL = 'P1W';
    const TWO_WEEK_INTERVAL = 'P2W';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'name', 'description', 'package_duration', 'package_amount'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'type' => Package::AMOUNT_TYPE, //interval
        'package_amount' => 0,
        'package_duration' => null
    ];

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function isAmountType(): bool
    {
        return $this->type == self::AMOUNT_TYPE;
    }
}
