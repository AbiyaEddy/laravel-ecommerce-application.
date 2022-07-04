<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryContract;
use App\Http\Controllers\BaseController;


/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends BaseController
{
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

        $this->setPageTitle('Categories', 'List of all categories');
        return view('admin.categories.index', compact('categories'));
    }

    /**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */

    public function create(){
        // $categories =$this->categoryRepository->listCategories('id','asc');
        $categories = $this->categoryRepository->treeList();

        $this->setPageTitle('Categories','Create Category');
        return view('admin.categories.create',compact('categories'));
    }

        /**
 * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Illuminate\Validation\ValidationException
 */

 public function store(Request $request)
 {
    $this->validate($request,[
        'name' => 'required|max:191',
        'parent_id' => 'required|not_in:0',
        'image' => 'mimes:jpg,jpeg,png|mx:1000',

    ]);

    $params = $request->except('_token');

    $category = $this->categoryRepository->createCategory($params);

    if(!$category){
        return $this->responseRedirectBack('error occurred while updating category.','error',true,true);
    }
    return $this->responseRedirectBack('admin.categories.index','Category added succesfully',false,false);
 }/**
 * @param $id
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
public function edit($id)
{
    $targetCategory = $this->categoryRepository->findCategoryById($id);
    // $categories = $this->categoryRepository->listCategories();
    $categories = $this->categoryRepository->treeList();

    $this->setPageTitle('Categories', 'Edit Category : '.$targetCategory->name);
    return view('admin.categories.edit', compact('categories', 'targetCategory'));
}

/**
 * @param Request $request
 * @return \Illuminate\Http\RedirectResponse
 * @throws \Illuminate\Validation\ValidationException
 */

 public function update(Request $request)
 {
    $this->validate($request ,[
        'name'      =>  'required|max:191',
        'parent_id' =>  'required|not_in:0',
        'image'     =>  'mimes:jpg,jpeg,png|max:1000'
    ]); 

    $params = $request->except('_token');

    $category = $this->categoryRepository->updateCategory($params);


    if(!$category){

        return $this->responseRedirectBack('Error occured while updating category.','error',true, true);
    }


    return $this->responseRedirectBack('Category updated succesfully','success',false,false);
    
 }

 /**
 * @param $id
 * @return \Illuminate\Http\RedirectResponse
 */

 public function delete($id)
 {
    $category = $this->categoryRepository->deleteCategory($id);


    if(!$category){
        return $this->responseRedirectBack('Error occcurred while deletin category.','error',true,true);
    }

 }
 public function show($slug)
{
    $category = $this->categoryRepository->findBySlug($slug);

    return view('site.pages.category', compact('category'));
}
}


