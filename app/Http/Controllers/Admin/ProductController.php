<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Product::orderBy('created_at','desc')->orderBy('id','desc')->paginate(10);
//        foreach ($list as $item){
//            dump($item->category->name);
//        }die;
        return view('admin.product.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $cates = Category::getCates();

        return view('admin.product.create')->with('cates',$cates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        $ProductModel = new Product;
        $ProductModel->cid = $request->cid;
        $ProductModel->title = $request->title;
        $ProductModel->keyword = $request->keyword;
        $ProductModel->desc = $request->desc;
        $ProductModel->remark = $request->remark;
        $ProductModel->views = $request->views;
        $ProductModel->alt = $request->alt;
        $ProductModel->tuijian = $request->tuijian?$request->tuijian:0;
        $ProductModel->content = $request->contents;
        if($request->file("file")){
            $ProductModel->pic = $request->file('file')->store('product');
        }
        checkreturn($ProductModel->save(),"新增");
        return redirect(route('admin.product.index'));
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
    public function edit(Product $product)
    {
        //
        $cates = Category::getcates();
        return view('admin.product.edit')->with('product',$product)->with('cates',$cates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        //
        $ProductModel = Product::find($id);
        $ProductModel->cid = $request->cid;
        $ProductModel->title = $request->title;
        $ProductModel->keyword = $request->keyword;
        $ProductModel->desc = $request->desc;
        $ProductModel->remark = $request->remark;
        $ProductModel->alt = $request->alt;
        $ProductModel->views = $request->views;
        $ProductModel->tuijian = $request->tuijian?$request->tuijian:0;
        $ProductModel->content = $request->contents;
        if($request->file("file")){
            //删除旧图片
            Storage::delete($ProductModel->pic);
            $ProductModel->pic = $request->file('file')->store('product');

        }
        checkreturn($ProductModel->save(),"编辑");
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $ids =[];
        if($id!=0){
            $ids[]=$id;
        }else{
            if($request->has('ids')){
                $ids = $request->ids;
            }
        }
        $counts = Product::destroy($ids);
        checkreturn($counts>0,"删除");
        return redirect(route('admin.product.index'));
    }
}
