<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;

/**
 * Class CategoryController
 * @package App\Http\Controllers\
 */
class CategoryController extends BaseController
{
    //
      /**
     * @var CategoryContract
     */

     protected $categoryRepository;
      /**
     * CategoryController constructor.
     * @param CategoryContract $categoryRepository
     */
    
public function __construct(CategoryContract $categoryRepository)
{
    $this->categoryRepository = $categoryRepository;
}
  /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();
        dd($categories);
        $this->setPageTitle('Categories','List of all categories');

        return view('admin.categories.index', compact('categories'));
    }

    /**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
public function create()
{
    $categories = $this->categoryRepository->listCategories('id', 'asc');

    $this->setPageTitle('Categories', 'Create Category');
    return view('admin.categories.create', compact('categories'));
}

  /**
 * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Illuminate\Validation\ValidationException
 */

public function store(Request $request)
{
    $this->validate($request, [
        'name'      =>  'required|max:191',
        'parent_id' =>  'required|not_in:0',
        'image'     =>  'mimes:jpg,jpeg,png|max:1000'
    ]);

    $params = $request->except('_token');

    $category = $this->categoryRepository->createCategory($params);

    if (!$category) {
        return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
    }
    return $this->responseRedirect('admin.categories.index', 'Category added successfully' ,'success',false, false);
}
}
