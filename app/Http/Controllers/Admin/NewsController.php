<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = new News();
//        $list = $news::orderBy('created_at','desc')->orderBy('id','desc')->get();
        $list = $news::orderBy('created_at','desc')->orderBy('id','desc')->paginate(10);//分页
        return view('admin.news.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        //
        $news = new News();

        $news->title = $request->title;
        $news->keyword = $request->keyword;
        $news->desc = $request->desc;
        $news->remark = $request->remark;
        $news->views = $request->views;
        $news->content = $request->contents;

        if ($request->file('file')){
            $news->pic = $request->file('file')->store('news');
        }

        //检查结果，记录闪存数据
        checkReturn($news->save(),'新增');

        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        return view('admin.news.edit')->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $data = array(
            'title' => $request->title,
            'keyword' => $request->keyword,
            'desc' => $request->desc,
            'remark' => $request->remark,
            'views' => $request->views,
            'content' => $request->contents,
        );

        if ($request->file('file')){
            $data['pic'] = $request->file('file')->store('news');
            //删除图片
            Storage::delete($news->pic);
        }

        $newsModel = new News();
        $result = $newsModel::where('id','=',$news->id)->update($data);

        //检查结果，记录闪存数据
        checkReturn($result > 0,'修改');

        return redirect(route('admin.news.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
//        $newsModel = new News();
//        $result = $newsModel::where('id','=',$news->id)->delete();
//        dd($result);

        $result = $news->delete();
        //删除图片
        Storage::delete($news->pic);

        //检查结果，记录闪存数据
        checkReturn($result,'删除');

        return redirect(route('admin.news.index'));


    }
}
