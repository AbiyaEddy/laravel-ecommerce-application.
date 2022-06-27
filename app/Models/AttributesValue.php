<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesValue extends Model
{
    use HasFactory;

      /**
     * @var string
     */

     protected $table = 'attributes_values';

     /**
     * @var array
     */

     protected $fillable=[
        'attribute_id','value','price'
     ];
   
    /**
     * @var array
     */
    protected $casts = [
        'attribute_id'  =>  'integer',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public function attribute()
     {
        return $this->belongsTo(Attribute::class);
     }
}  
