<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
class PinnedArticles 
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('pins', \App\Pin::get());
    }
}
