<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'division',
        'banner',
        'content',
        'visibility',
        'status',
        'country',
        'city'
    ];

    public function divisions()
    {
        return $this->hasOne(Division::class, 'id', 'division');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
