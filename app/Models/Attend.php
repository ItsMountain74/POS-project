<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{
    use HasFactory;
    protected $fillable=
        [
            'Checked_in_at',
            'Checked_out_at'=>'nullable',
            'user_id',
        ];
}
