<?php
namespace App\Traits;

use App\View;

trait HasViews
{
    public function views()
    {
        return $this->morphMany('App\View', 'viewable');
    }

    /**
     * Adds new view
     */
    public function addView() {

        $latestView = $this->views->where('session_id', '=', request()->getSession()->getId())->sortByDesc('id')->first();
        // only record view if there was no view in the last 15 minutes
        if($latestView && $latestView->created_at > now()->subMinutes(15)) return false;
        
        $view= new View();
        $view->session_id = request()->getSession()->getId();
        $view->ip = request()->getClientIp();
        $view->agent = request()->header('User-Agent');

        if($this->views()->save($view)) return true;

        return false;
    }
    
    /**
     * Returns unique views
     */
    public function getViews($unique = true){
        $views = $this->views;

        if($unique) $views = $views->groupBy('session_id');

        return $views->count();
    }

}
