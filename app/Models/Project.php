<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'title',
        'sub_title',
        'details',
        'image',

    ];
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
