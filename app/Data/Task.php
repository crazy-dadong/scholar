<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * 对用户的一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Data\User');
    }

    /**
     * 对用户的一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modules()
    {
        return $this->hasOne('App\Data\User');
    }
}
