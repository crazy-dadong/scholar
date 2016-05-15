<?php

namespace App\Data;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property int user_id
 * @property string plan_started_at
 * @property int module_id
 */
class Task extends Model
{

    protected $fillable = ['user_id', 'name', 'description', 'module_id', 'plan_started_at', 'plan_end_at', 'priority', 'status'];

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
     * 对模块的一对一
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modules()
    {
        return $this->hasOne('App\Data\Module');
    }
}
