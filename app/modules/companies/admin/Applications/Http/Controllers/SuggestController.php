<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Suggest\CategorySuggestService;
use Illuminate\Http\Request;

/**
 * Class SuggestController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class SuggestController extends BaseController
{

    private $categoryService;

    public function __construct(CategorySuggestService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categories(Request $request)
    {
        $this->categoryService->search($request->get('query'));
    }

}
