<?php

namespace App\Http\Controllers\Admin;

use App\Cases;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCasesPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Cases::orderBy('sort','desc')->orderBy('id','desc')->paginate(10);
        return view('admin.cases.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //加载视图
        return view("admin.cases.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCasesPostRequest $request)
    {
        //
        $CasesModel = new Cases();
        $CasesModel->title = $request->title;
        $CasesModel->remark = $request->remark;
        $CasesModel->sort = $request->sort;
        if($request->file("file")){
            $CasesModel->pic = $request->file('file')->store('cases');
        }
        checkreturn($CasesModel->save(),"新增");
        return redirect(route('admin.cases.index'));
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
    public function edit(Cases $case)
    {
        //
        return view('admin.cases.edit')->with('cases',$case);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCasesPostRequest $request, $id)
    {
        //
        $CasesModel = Cases::find($id);
        $CasesModel->title = $request->title;
        $CasesModel->remark = $request->remark;
        $CasesModel->sort = $request->sort;
        if($request->file("file")){
            //删除旧图片
            Storage::delete($CasesModel->pic);
            $CasesModel->pic = $request->file('file')->store('cases');
        }
        checkreturn($CasesModel->save(),"编辑");
        return redirect(route('admin.cases.index'));
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
        $counts = Cases::destroy($ids);
        checkreturn($counts>0,"删除");
        return redirect(route('admin.cases.index'));
    }
}
