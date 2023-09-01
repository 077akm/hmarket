<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory(){
        $category = Category::all();
        return view('adm.categories.index', ['categories'=>$category]);
    }
    public function create(){
        return view('adm.categories.create' , ['categories'=>Category::all()]);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'name_kz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required'
        ]);

        Category::create($validated);
        return redirect()->route('adm.categories.index', ['categories' => Category::all()]);
    }
    public function destroy(Category $category){
            $category->delete();
            return redirect()->route('adm.categories.index');

    }
}
