<?php

namespace App\Providers;
use App\courses;
use App\Studeents;
use App\User;
use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
        
        $Users =User::all();
        $courses = courses::orderBy('created_at','desc')->paginate(10);
        $studeents = studeents::orderBy('created_at','desc')->paginate(10);
         $Users_manager = DB::table('users')
            ->where('role', 'sales')
            ->orWhere('role', 'manager')
            ->get();
        
         
        View::share('Users_manager', $Users_manager);
        View::share('courses',$courses);
        View::share('studeents',$studeents);
        View::share('Users',$Users);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
