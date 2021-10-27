<?php

namespace App\Http\Controllers;

use App\Lop;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use iLLuminate\Support\Facades\Auth;
use Route;
use Illuminate\Support\Facades\Validator;

class LopsController extends Controller
{
    public function __construct()
    {
        $action=Route::currentRouteAction();
        $action_exp=explode('@',$action);
        $action_name=end($action_exp);
        $array=['create','edit','destroy','cont','comment'];
        if(in_array($action_name,$array)){
            $this->middleware('auth');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧表示
        #lopテーブルに入っているデータをすべて取ってくるor検索されていたら絞る
        $lops=Lop::orderBy('created_at','desc')->where(function ($query) {
            // 検索機能
        if ($search = request('search')) {
            $query->where('dream', 'LIKE', "%{$search}%")->orWhere('dreamdo','LIKE',"%{$search}%")->orWhere('nowdo','LIKE',"%{$search}%")->orWhere('nowwhy','LIKE',"%{$search}%")
            ;
        }
        })->paginate(10);
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
        //バリデーション

        $message = [
            'dream.required' => '名前を入力してください',
            'dream.max'=>'200字以下にしてくさい',
            'dreamwhy.max' => '500字以下にしてくさい',
            'dreamdo.max' => '500字以下にしてくさい',
            'nowdo.max' => '200字以下にしてくさい',
            'nowwhy.max'=>'500字以下にしてくさい',
            'tovisitor.max'=>'200字以下にしてくさい',
          ];

        $rules=[
            'dream'=>'required|max:200',
            'dreamwhy'=>'max:500',
            'dreamdo'=>'max:500',
            'nowdo'=>'max:200',
            'nowwhy'=>'max:500',
            'tovisitor'=>'max:200'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect('lops/create')
                        ->withErrors($validator)
                        ->withInput();
        }
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
        //コメントと詳細表示
        $comments=Comment::where('lop_id',$lop->id)->orderBy('created_at','desc')->get();
        return view("lops.show",['lop'=>$lop,'comments'=>$comments]);
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
        //バリデーション

        $message = [
            'dream.required' => 'タイトルを入力してください',
            'dream.max'=>'200字以下にしてくさい',
            'dreamwhy.max' => '500字以下にしてくさい',
            'dreamdo.max' => '500字以下にしてくさい',
            'nowdo.max' => '200字以下にしてくさい',
            'nowwhy.max'=>'500字以下にしてくさい',
            'tovisitor.max'=>'200字以下にしてくさい',
          ];

        $rules=[
            'dream'=>'required|max:200',
            'dreamwhy'=>'max:500',
            'dreamdo'=>'max:500',
            'nowdo'=>'max:200',
            'nowwhy'=>'max:500',
            'tovisitor'=>'max:200'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->
                        route('lops.edit',['lop' => $lop])
                        ->withErrors($validator)
                        ->withInput();
        }

        $lop->dream=$request->input("dream");
        $lop->dreamwhy=$request->input("dreamwhy");
        $lop->dreamdo=$request->input("dreamdo");
        $lop->nowdo=$request->input("nowdo");
        $lop->nowwhy=$request->input("nowwhy");
        $lop->tovisitor=$request->input("tovisitor");
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

    public function cont(){
        //ログインユーザーの画面
        $lops=User::find(Auth::user()->id)->lops;
        return view('lops.cont',compact('lops'));
    }

    public function comment(Request $request,lop $lop){
        //コメントをデータベースに登録
        $comment=new Comment();
        $comment->comment=$request->input('comment');
        $comment->user_id=Auth::user()->id;
        $comment->lop_id=$lop->id;
        $comment->save();
        return redirect()->route('lops.show',compact('lop'));
    }

    //絞り込み検索画面
    public function squeeze(){
        return view('lops.squeeze');
    }

    //絞り込み検索処理
    public function squeezedo(Request $req){
        $ageunder=0;//年齢下限値
        $ageup=0;//年齢上限値
        if($req->input('ageunder')){
            global $ageunder;
            $ageunder=(int)$req->input('ageunder');
        }

        if($req->input('ageup')){
            global $ageup;
            $ageup=(int)$req->input('ageup');
        }
        $users=User::orderBy('created_at','desc')
            ->where('name', 'LIKE', "%{$req->input('name')}%")
            ->where('gender','LIKE',"%{$req->input('gender')}%")
            ->whereBetween('age',[$ageunder,$ageup])
            ->where('occupation','LIKE',"%{$req->input('occupation')}%")
            ->where('likes','LIKE',"%{$req->input('likes')}%")
            ->paginate(10);

        return view('lops.squeezedo',compact('users'));
    }

    //人で検索後に投稿を見る処理
    public function detail(User $user){
        $user=User::find($user->id);
        $lops=Lop::where('user_id', $user->id) //$userによる投稿を取得
        ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
        ->paginate(10);
        return view('lops.index',compact('lops'));
    }
}
