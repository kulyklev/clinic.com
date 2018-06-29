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
        $this->app->bind('App\\Repositories\\Patients\\IPatientsRepository', 'App\\Repositories\\Patients\\PatientsRepository');
        $this->app->bind('App\\Repositories\\AllergicHistories\\IAllergicHistoriesRepository', 'App\\Repositories\\AllergicHistories\\AllergicHistoriesRepository');
        $this->app->bind('App\\Repositories\\BloodTransfusions\\IBloodTransfusionsRepository', 'App\\Repositories\\BloodTransfusions\\BloodTransfusionsRepository');
        $this->app->bind('App\\Repositories\\Diaries\\IDiaryRecordsRepository', 'App\\Repositories\\Diaries\\DiaryRecordsRepository');
    }
}