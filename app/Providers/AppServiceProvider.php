<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('getRoleId', function ($name) {
            $roles = Role::all();
            for ($i = 0; $i < count($roles); $i++) {
                if ($name === strtolower($roles[$i]->name)) {
                    return $roles[$i]->id;
                }
            }
        });

        Builder::macro('getCategoryId', function ($name) {
            $categories = Category::all();
            for ($i = 0; $i < count($categories); $i++) {
                if ($name === strtolower($categories[$i]->name)) {
                    return $categories[$i]->id;
                }
            }
        });

        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%' . $string . '%') : $this;
        });
        Builder::macro('searchMultipleUsers', function ($fields, $string) {
            if ($string) {
                return $this->where('first_name', 'like', '%' . $string . '%')
                    ->orWhere('created_at', 'like', '%' . $string . '%')
                    ->orWhere('status', 'like', '%' . $string . '%')
                    ->orWhere('role_id', '=', intval($this->getRoleId($string)));
            } else {
                return $this;
            }
        });
        Builder::macro('searchMultipleRoles', function ($fields, $string) {
            if ($string) {
                return $this->where('name', 'like', '%' . $string . '%')
                    ->orWhere('created_at', 'like', '%' . $string . '%')
                    ->orWhere('description', 'like', '%' . $string . '%');
            } else {
                return $this;
            }
        });
        Builder::macro('searchMultipleTags', function ($fields, $string) {
            if ($string) {
                return $this->where('name', 'like', '%' . $string . '%')
                    ->orWhere('created_at', 'like', '%' . $string . '%')
                    ->orWhere('color', 'like', '%' . $string . '%');
            } else {
                return $this;
            }
        });
        Builder::macro('searchMultipleItems', function ($string) {
            if ($string) {
                return $this->where('items.name', 'like', '%' . $string . '%')
                    ->orWhere('items.created_at', 'like', '%' . $string . '%')
                    ->orWhere('items.category_id', '=', intval($this->getCategoryId($string)));
            } else {
                return $this;
            }
        });
    }
}
