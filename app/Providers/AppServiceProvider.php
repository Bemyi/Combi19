<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Models\Insumo;

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
    //Add this custom validation rule.
    Validator::extend('alpha_spaces', function ($attribute, $value) {

      // This will only accept alpha and spaces.
      // If you want to accept hyphens use: /^[\pL\s-]+$/u.
      return preg_match('/^[\pL\s]+$/u', $value);

    });

    Validator::extend('alpha_num_spaces', function ($attribute, $value) {

      // This will only accept alpha_num and spaces.
      // If you want to accept hyphens use: /^[\pL\s-]+$/u.
      return preg_match('/^[a-zA-Z0-9\s]+$/', $value);

    });

    Validator::extend('nombre_descripcion', function ($attribute, $value, $parameters) {
      $insumo = Insumo::where('nombre', '=', $parameters[0])->where('descripcion', '=', $value)->get()->first();
      if(empty($insumo)){
        return true;
      }else{
        return false;
      }

    });

  }
}
