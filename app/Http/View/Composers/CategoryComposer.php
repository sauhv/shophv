<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Categories;

class CategoryComposer
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Categories::getCategoryMenu();
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
