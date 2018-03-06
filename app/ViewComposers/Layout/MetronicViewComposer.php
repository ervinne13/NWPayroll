<?php

namespace App\ViewComposers\Layout;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

/**
 * Description of MetronicViewComposer
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class MetronicViewComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('enable_quick_sidebar', Config::get('layout.cms.quick_sidebar', false));
        $view->with('enable_theme_modification', Config::get('layout.cms.theme_modification', false));
        $view->with('enable_breadcrumbs', Config::get('layout.cms.enable_breadcrumbs', false));
    }

}
