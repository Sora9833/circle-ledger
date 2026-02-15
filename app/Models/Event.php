<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'fiscal_year',
        'start_date',
        'end_date',
        'note',
        'created_by',
        ];

    public function creator()
        {
            return $this->belongsTo(User::class, 'created_by');
        }
}
