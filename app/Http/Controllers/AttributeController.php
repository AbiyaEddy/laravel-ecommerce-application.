<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Contracts\AttributeContract;

class AttributeController extends BaseController
{
    //
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {

        $this->attributeRepository = $attributeRepository;
    }

}
