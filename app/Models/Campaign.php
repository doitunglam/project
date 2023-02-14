<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'title'=>'Title',
        'image'=>'campaign',
        'creator_id',
        'info',
        'url',
        'criteria'=>'Criteria',
        'commission'
    ];

}
