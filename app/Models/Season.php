<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Season extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public function series()
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
