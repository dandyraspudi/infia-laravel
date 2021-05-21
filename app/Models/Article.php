<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'cover',
        'visibility',
        'content',
        'visit',
        'created_by',
        'optional_1',
        'optional_2'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
