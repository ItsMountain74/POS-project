<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(mixed $id)
 * @method static create(array $array)
 */
class Orders extends Model
{
    use HasFactory;
    protected $fillable=
        [
          'products',
          'qnt',
          'total_price',
        ];
}
