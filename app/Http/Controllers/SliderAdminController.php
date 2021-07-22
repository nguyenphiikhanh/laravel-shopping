<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        //
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderAddRequest $request)
    {
        //
        try {
            $dataInert = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            $imageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($imageSlider)) {
                $dataInert['image_name'] = $imageSlider['file_name'];
                $dataInert['image_path'] = $imageSlider['file_path'];
            }
            $this->slider->create($dataInert);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
        }
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
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderAddRequest $request, $id)
    {
        //
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            $imageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($imageSlider)) {
                $dataUpdate['image_name'] = $imageSlider['file_name'];
                $dataUpdate['image_path'] = $imageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
        }
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
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'delete_success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'delete_fail'
            ], 500);
        }
    }
}
