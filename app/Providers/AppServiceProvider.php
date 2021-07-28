<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Kelas;
use App\Models\Siswa;

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
        Schema::defaultStringLength(191);
            View::composer('*', function($view){
                if (Auth::user()){
                    if (Auth::user()->hasRole('Guru')){
                        $view->with('kelas', Kelas::where('guru_id', Auth::user()->id)->get());
                    }
                    // else if (Auth::user()->hasRole('Siswa')){
                    //     $siswa = Siswa::where('nis', Auth::user()->id)->first();
                    //     $view->with('jadwal', Jadwal::where('kelas_id', $siswa->kelas_id)->get());
                    // }
                    // else if (Auth::user()->hasRole('Ortu')){
                    //     $siswa = Siswa::where('user_ortu', Auth::user()->id)->first();
                    //     $view->with('jadwal', Jadwal::where('kelas_id', $siswa->kelas_id)->get());
                    // }
                }
            }); 
    }
}
