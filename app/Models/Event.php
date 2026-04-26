<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Income;
use App\Models\Expense;

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

    public function incomes()
        {
            return $this->hasMany(Income::class);
        }

    public function expenses()
        {
            return $this->hasMany(Expense::class);
        }
}
