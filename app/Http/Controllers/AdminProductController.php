<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $htmlOption = $this->getCate($parent_id ='');
        return view('admin.product.add',compact('htmlOption'));
    }

    public function getCate($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);

        return $htmlOption;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dataUpload = $this->storageTraitUpload($request,'feature_image_path','product');
        // $file = $request->feature_image_path;
        // $fileNameOrigin = $file->getClientOriginalName();
        // $fileNameHash = str_random(20).'.'.$file->getClientOriginalExtension();

        // $filepath = $request->file('feature_image_path')->storeAs('public/product/'.auth()->id(),$fileNameHash);

        // $data =[
        //     'file_name' => $fileNameOrigin,
        //     'file_path' => Storage::url($filepath),
        // ];
        dd($dataUpload);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
