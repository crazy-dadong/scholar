<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['user_id','name','description'];

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
     * 对模块的一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany('App\Data\Module');
    }
}
