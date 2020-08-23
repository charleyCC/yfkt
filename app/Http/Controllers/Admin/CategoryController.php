<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //分类列表
    public function index()
    {
        $list = Category::getCates();

        return view('admin.category.index')->with('list',$list);
    }

    public function create(CheckCategoryRequest $request)
    {
//        dd($request->method());

        if ($request->isMethod('POST')){
            $cateModel = new Category();
            $cateModel->name = $request->name;
            $cateModel->pid = $request->pid;
            $cateModel->sort = $request->sort;
            $result = $cateModel->save();

            //检查结果，记录闪存数据
            checkReturn($result,'新增');

            return redirect(route('admin.category.list'));
        }

        $cates = Category::getCates();

        return view('admin.category.create')->with('cates',$cates);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CheckCategoryRequest $request, Category $cate)
    {

        if ($request->isMethod('POST')){

            $cate->name = $request->name;
            $cate->pid = $request->pid;
            $cate->sort = $request->sort;
            $result = $cate->save();

            //检查结果，记录闪存数据
            checkReturn($result,'编辑');

            return redirect(route('admin.category.list'));
        }

        $cates = Category::getCates();
//        dd($category);
        return view('admin.category.edit')->with('cate',$cate)->with('cates',$cates);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Category $cate)
    {
        $result = $cate->delete();

        //检查结果，记录闪存数据
        checkReturn($result,'删除');

        return redirect(route('admin.category.list'));
    }
}
