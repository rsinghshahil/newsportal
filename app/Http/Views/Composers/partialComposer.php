<?php
namespace App\Http\Views\Composers;

use App\News;
use Illuminate\Contracts\View\View;

class partialComposer {

    public function compose(View $view)
    {
        $view->with('banners', News::orderBy('id','desc')->take(3)->get())
        ->with('footernews',News::orderBy('id','desc')->take(3)->get());
    }
}
