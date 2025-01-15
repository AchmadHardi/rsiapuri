<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COA extends Model
{
    use HasFactory;
    protected $table = 'coa';


    protected $fillable = [
        'code',
        'name',
        'type',
        'level',
        'parent_id',
        'group',
        'control',
        'currency',
        'department',
        'gain_loss'
    ];

    /**
     * Define a relationship to the parent COA (self-referencing).
     * If the COA has a parent account, this method allows you to access it.
     */
}
