<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = ['name','email','phone','people','datetime','note'];

    public function getAvatarAttribute() {
        return sprintf('https://www.gravatar.com/avatar/%s?s=100',md5($this->email));
    }
}
