<?php

namespace App\Http\Controllers;

use App\Lop;
use Illuminate\Http\Request;
use iLLuminate\Support\Facades\Auth;

class LopsController extends Controller
{
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧表示
        #lopテーブルに入っているデータをすべて取ってくる
        $lops=Lop::all();
        return view("lops.index",compact('lops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //作成用画面表示
        return view("lops.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //作成画面から送られた情報をデータベースに登録
        $lop=new Lop();
        $lop->fill($request->all());
        $lop->user_id=Auth::user()->id;
        $lop->save();

        return redirect()->route('lops.show',$lop);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function show(Lop $lop)
    {
        //詳細表示
        return view("lops.show",compact('lop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function edit(Lop $lop)
    {
        //編集
        return view("lops.edit",compact('lop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lop $lop)
    {
        //編集内容を登録
        $lop->fill($request->all());
        $lop->save();

        return redirect()->route('lops.show',$lop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lop $lop)
    {
        //投稿削除
        $lop->delete();
        return redirect()->route('lops.index');
    }
}
