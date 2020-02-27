<?php
namespace App\Http\Views\Composers;

use App\News;
use Illuminate\Contracts\View\View;

class partialComposer {

    public function compose(View $view)
    {
        $view->with('banners', News::take(3)->get());
    }
}
