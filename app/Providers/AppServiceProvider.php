<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerAccessBasedDirectives();
        $this->registerCustomDirectives();
        $this->registerRouteMacros();        
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

    private function registerAccessBasedDirectives()
    {
        Blade::directive('isOwner', function ($userId) {
            return "<?php if (Auth::user()->isAdmin() || Auth::user()->id == {$userId}) { ?>";
        });

        Blade::directive('endIsOwner', function() {
            return '<?php } ?>';
        });
    }

    private function registerCustomDirectives()
    {
        Blade::directive('metronic_partial', function ($expression) {
            return "<?php echo \$__env->make( 'layouts.metronic.partials.' . $expression , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
        });

        Blade::directive('partial', function ($arguments) {
            list($layout, $partial) = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

            return "<?php echo \$__env->make( 'layouts.$layout.partials.$partial' , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
        });

        Blade::directive('vendor', function($arguments) {
            list($layout, $template) = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

            return "<?php echo \$__env->make( 'layouts.$layout.vendor.$template' , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
        });

        Blade::directive('jslet', function($arguments) {
            list($name, $obj) = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

            return "<?php                
                echo 'let {$name} = ' .  json_encode({$obj});
            ?>";
        });
    }

    private function registerRouteMacros()
    {
        Router::macro('acl_resource', function($code, $baseUrl, $controller) {
            Router::get($baseUrl, "{$controller}@index")->middleware("acl.verify:{$code},Viewer")->name("{$baseUrl}.index");
            Router::get($baseUrl . '/create', "{$controller}@create")->middleware("acl.verify:{$code},Author.NonResource")->name("{$baseUrl}.create");
            Router::get($baseUrl . '/{id}', "{$controller}@show")->middleware("acl.verify:{$code},Viewer")->name("{$baseUrl}.show");
            Router::get($baseUrl . '/{id}/edit', "{$controller}@edit")->middleware("acl.verify:{$code},Author.Resource")->name("{$baseUrl}.show");

            Router::post($baseUrl, "{$controller}@store")->middleware("acl.verify:{$code},Author.NonResource")->name("{$baseUrl}.store");
            ;
            Router::put($baseUrl . '/{id}', "{$controller}@update")->middleware("acl.verify:{$code},Author.Resource")->name("{$baseUrl}.update");

            Router::delete($baseUrl . '/{id}', "{$controller}@destroy")->middleware("acl.verify:{$code},Author.Resource")->name("{$baseUrl}.destroy");
        });
    }

}
