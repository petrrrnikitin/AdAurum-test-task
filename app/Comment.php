<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    protected $fillable = ['user_id', 'company_id'];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
