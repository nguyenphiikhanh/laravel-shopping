<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    private $category;
    public function __construct(Category $category)
    {
        $this->category =$category;
    }

    public function create()
    {
        $htmlOption = $this->getCate($parent_id ='');

        return view('category.add',compact('htmlOption'));
    }


    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('category.index',compact('categories'));
    }

    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function getCate($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);

        return $htmlOption;
    }

    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCate($category->parent_id);

        return view('category.edit',compact('category','htmlOption'));
    }

    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id){

    }
}
