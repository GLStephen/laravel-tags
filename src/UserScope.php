<?php

namespace Spatie\Tags;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Auth::hasUser() && Auth::user()->role === 'something') {
            $builder->where('user_id', '=', Auth::user()->id);
        }else{
            $builder->where('user_id', '=', '');
        }
    }
}
