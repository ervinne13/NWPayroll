<?php

namespace App\ViewComposers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/**
 * Description of AdminViewComposer
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class GeneralViewComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $currentRoute = Route::getCurrentRoute();

        if (!$currentRoute) {
            return;
        }

        $fullActionName      = $currentRoute->getActionName();
        $splitFullActionName = explode("@", $fullActionName);

        if (count($splitFullActionName) >= 2) {
            $actionName = explode("@", $fullActionName)[1];
            $view->with("route_action", $actionName);
            $view->with("route_action_name", ucfirst($actionName));
        } else {
            $view->with("route_action", null);
            $view->with("route_action_name", null);
        }
    }

}
