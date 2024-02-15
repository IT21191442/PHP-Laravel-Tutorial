<?php

use App\Models\product;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('products',function(){
    return product::get();
});

Route::get('product-create',function(){
    return product::create([
        'name'=> 'man pant two style',
        'description'=>'man pant description',
    	'small_description' =>'man pant samll description',
    	'original_price' => 599,
    	'price'=>459, 
        'stock'=>40,
    	'is_active'=>1,
    ]);
});

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
