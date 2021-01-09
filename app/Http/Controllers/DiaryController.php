<?php

namespace App\Http\Controllers;
use App\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiary;

class DiaryController extends Controller
{
    public function index(){
        // return 'Hello World';

        //diariesテーブルのデータを全件取得
        //useしてるDiaryのallメソッドを実施
        //all()はテーブルのデータを全て取得するメソッド
        $diaries = Diary::all();

        // IDの降順にするときは
        // $diaries = Diary::orderBy('id', 'desc')->get();

        // var_dump()とdie()を合わせたメソッド。変数の確認 + 処理のストップ
        // dd($diaries); 

        // view/diaries/index.blade.phpを表示
        return view('diaries.index',['diaries' => $diaries]);
    }

    public function create()
    {
        return view('diaries.create');
    }

    public function store(CreateDiary $request)
    {
        $diary = new Diary();

        $diary->title = $request->title;
        $diary->body = $request->body;
        $diary->save();

        return redirect()->route('diary.index');

        // dd('ここに保存処理');
    }

    public function destroy(int $id)
    {
        // Diaryモデルを使用して、diariesテーブルから$idと一致するidをもつデータを取得
        $diary = Diary::find($id);

        // 取得したデータを削除
        $diary->delete();

        return redirect()->route('diary.index');
    }
    
    public function edit(int $id)
    {
        // Diaryモデルを使用して、diariesテーブルから$idと一致するidをもつデータを取得
        $diary = Diary::find($id);

        return view('diaries.edit', [
            'diary' => $diary,
        ]);
    }

    public function update(int $id, CreateDiary $request)
    {
        $diary = Diary::find($id);

        $diary->title = $request->title; //画面で入力されたタイトルを代入
        $diary->body = $request->body; //画面で入力された本文を代入
        $diary->save(); //DBに保存

        return redirect()->route('diary.index');
    }

}
