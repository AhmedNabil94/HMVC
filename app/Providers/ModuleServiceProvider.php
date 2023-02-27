<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $modules = config("modules.modules");
        foreach ($modules as $module) {
            if(file_exists(base_path('app/Modules/'.$module.'/routes.php'))) {
                $this->loadRoutesFrom( base_path('app/Modules/'.$module.'/routes.php'));
            }
            if(is_dir(base_path('app/Modules/'.$module.'/Views'))) {
                $this->loadViewsFrom(base_path('app/Modules/'.$module.'/Views'), $module);
            }
            if(is_dir(base_path('app/Modules/'.$module.'/Database/migrations'))) {
                $this->loadMigrationsFrom(base_path('app/Modules/'.$module.'/database/migrations'));
            }
            if(is_dir(base_path('app/Modules/'.$module.'/Lang'))) {
                $this->loadTranslationsFrom(base_path('app/Modules/'.$module.'/Lang'), lcfirst($module));
            }
            if(is_dir(base_path('app/Modules/'.$module.'/Config'))) {
                $this->mergeConfigFrom( base_path('app/Modules/'.$module.'/Config/'.lcfirst($module).'.php') , lcfirst($module));
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
