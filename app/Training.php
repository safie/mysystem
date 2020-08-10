<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Training extends Model
{
    protected $table = 'trainings';

    protected $fillable = [
        'title',
        'description',
        'trainer',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
