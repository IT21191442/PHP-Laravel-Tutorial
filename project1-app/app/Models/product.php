<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    
    protected $table = "products";

    //No need to specify primary key, because it is in your database
    //protected $primaryKey ='id;

    protected $fillable = [
        'name',
        'slug',
        'description',
    	'small_description',
    	'original_price',
    	'price', 
        'stock',
    	'is_active'
    ];

    //casting
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'datetime:Y-m-d',
        'is_active' => 'boolean'
    ];

    //hidden columns
    protected $hidden= [
        'created_at',
        'updated_at'
    ];

    //how can the data append the new columns
    protected $appends =[
        'name_price'//column name
    ];

    public function getNamePriceAttribute(){
        return $this-> name. '-' . $this -> price; //concertanate
    }

    //Accessors & Mutators in laravel
    //It should be maching to fillable

    //Accessors
    public function getNameAttribute()
    {
        return ucfirst($this->attributes['name']);//first letter is capital
    }

    //Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);//name: fully uppercase letter "MAN-PANT"
        $this->attributes['slug'] = str::slug($value);//print same name in name column
    }
}
