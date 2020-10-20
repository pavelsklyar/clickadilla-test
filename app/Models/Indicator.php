<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table name: indicators
 *
 * id           :id             primary key
 * value        :text
 * created_at   :timestamp
 * updated_at   :timestamp
 */
class Indicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];
}
