<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\ToChuc;
use App\User;

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
        view()->composer('admin.layout.header', function($view){
            
                $id = Auth::id();
                $check_user = User::find($id);
                $tochuc = ToChuc::where('id_user', $check_user->id)->first();
                // dd($tochuc);
                $view->with(['tochuc'=>$tochuc]);
                    
                
        });

        // view()->composer('admin.layout.menu', function($view){
        //     if(Auth::check())
        //     {
        //         $id = Auth::id();
        //         $check_user = User::find($id);
        //         if($check_user->role == '1')
        //         {
        //             $tochuc = ToChuc::where('id_user', $check_user->id)->first();
        //             // dd($tochuc);
        //             $view->with(['tochuc'=>$tochuc]);
                    
        //         }
        //         else if($check_user->role == '0')
        //         {
        //             $a =  "nhan vien";
        //             dd($a);
        //         }
        //     }
        // });
        
    }
}
