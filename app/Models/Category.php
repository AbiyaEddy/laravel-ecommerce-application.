<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable =[
        'name','slug','description','parent_id','featured','image'
    ];

    protected $casts =[
        'parent_id'=>'integer',
        'featured'=>'boolean',
        'menu'=>'boolean',
    ];


    public function setNameAtrribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);

    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
