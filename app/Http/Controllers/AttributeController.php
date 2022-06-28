<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;
// use App\Http\Controllers\AttributeController;

class AttributeController extends BaseController
{
    //
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {

        $this->attributeRepository = $attributeRepository;
    }


    public function index(){
        $attributes = $this->attributeRepository->listAttributes();

        $this->setPageTitle('Attributes','List of All attributes');

        return view ('admin.attributes.index',compact('attributes'));
    }

    public function create(){

        $this->setPageTitle('Attributes','Create Attribute');

        return view('admin.attributes.create');
    }

    public function store( Request $request){

        $this->validate($request,[
            'code'  =>'required',
            'name'  =>'required',
            'frontend-type'  =>'required',
        ]);

        $params = $request->except('_token');

        $attribute =$this->attributeRepository->createAttribute($params);

        if (!$attribute) {
            return $this->responseRedirectBack('Error Occured while creating attribute','error',true,true);
        }
        return $this->responseRedirect('admin.attributes.index','Attributes added succesfully','success',false,false);
    }
   

    public function edit($id){
        $attribute=$this->attributeRepository->findAttributeById($id);

        $this->setPageTitle('Attributes','Edit Attribute:'.$attribute->name);

        return view('admin.attributes.edit',compact('attribute'));
    }

    public function update(Request $request){
        
        $this->validate($request,[
            'code'  =>'required',
            'name'  =>'required',
            'frontend-type'  =>'required',
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->updateAttribute($params);

        if (!$attribute) {
            return $this->responseRedirectBack('Error Occured while updating attribute','error',true,true);
        }
        return $this->responseRedirect('admin.attributes.index','Attributes update succesfully','success',false,false);
    
    }

    public function delete($id)
{
    $attribute = $this->attributeRepository->deleteAttribute($id);

    if (!$attribute) {
        return $this->responseRedirectBack('Error occurred while deleting attribute.', 'error', true, true);
    }
    return $this->responseRedirect('admin.attributes.index', 'Attribute deleted successfully' ,'success',false, false);
}
}
