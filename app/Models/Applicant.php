<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'career_id',
        'applicant_code',
        'name',
        'email',
        'phone',
        'company',
        'file',
        'link',
        'letter',
        'optional_1'
    ];

    protected $casts = [
        'link' => 'array'
    ];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }

}
