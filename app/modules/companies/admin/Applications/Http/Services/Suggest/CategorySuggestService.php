<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Suggest;

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;

/**
 * Class CategorySuggestService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CategorySuggestService
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var SubcategoryRepository
     */
    private $subcategoryRepository;

    /**
     * CategorySuggestService constructor.
     * @param CategoryRepository $categoryRepository
     * @param SubcategoryRepository $subcategoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository,
                                SubcategoryRepository $subcategoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->subcategoryRepository = $subcategoryRepository;
    }

   
    /**
     * Search Suggest in Categories
     * @param $query
     * @return bool|string
     */
    public function search($query)
    {
        $categories = $this->categoryRepository->searchLikeSuggest($query);
        
        $suggestions = [];
        if ($categories === false) {
            echo json_encode(['suggestions' => [] ]);
            exit;
        }

        foreach($categories as $category)
        {
            $suggestions[] = [
                'value' => $category->name,
                'id' => $category->id
            ];
        }

        echo json_encode(['suggestions' => $suggestions ]);
        exit;

    }

    /**
     * Search Suggest in SubCategories
     * @param $query
     * @return bool|string
     */
    private function searchSubCategories($query)
    {
        $subcategories = $this->subcategoryRepository->searchLikeSuggest($query);

        $suggestions = array();
        if ($subcategories === false) {
            return false;
        }

        $subcategories_array = [];
        foreach($subcategories as $subcategory)
        {
            array_push( $subcategories_array, $subcategory->name);
        }

        foreach($subcategories_array as $subcategory)
        {
            $suggestions[] = array(
                'value' => $subcategory,
                'name' => $subcategory
            );
        }
        return (json_encode(array('suggestions' => $suggestions)));

    }

}
