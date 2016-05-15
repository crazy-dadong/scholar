<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['user_id', 'project_id', 'name','description'];

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
     * 对项目的一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Data\Project');
    }


    /**
     * 对任务的一对多
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Data\Task');
    }
}
