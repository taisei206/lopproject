<?php

namespace App\Http\Controllers;

use App\Lop;
use Illuminate\Http\Request;

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
        $lop->dream=$request->input("dream");
        $lop->dreamwhy=$request->input("dreamwhy");
        $lop->dreamdo=$request->input("dreamdo");
        $lop->nowdo=$request->input("nowdo");
        $lop->nowwhy=$request->input("nowwhy");
        $lop->tovisitor=$request->input("tovisitor");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lop $lop)
    {
        //
    }
}
