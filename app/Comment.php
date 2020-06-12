<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
