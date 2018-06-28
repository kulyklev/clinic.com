<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 28.06.18
 * Time: 16:06
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind('App\\Repositories\\IPatientRepository', 'App\\Repositories\\PatientsRepository');
        $this->app->bind('App\\Repositories\\IAllergicHistoryRepository', 'App\\Repositories\\AllergicHistoryRepository');
    }
}