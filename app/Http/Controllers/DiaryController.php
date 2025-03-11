<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
  public function index()
  {
    $diaries = Diary::all();
    return view('diary.index', compact('diaries'));
  }

  public function create()
  {
    return view('diary.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|max:20',
      'body' => 'required',
    ]);

    $model = new Diary();
    $model->title = $validated['title'];
    $model->body = $validated['body'];
    $model->date = date("Y-m-d");
    $model->save();

    return back()->with('message', '保存しました');
  }

  public function show(string $id)
  {
    $diary = Diary::find($id);
    return view('diary.show', compact('diary'));
  }

  public function edit(string $id)
  {
    $diary = Diary::find($id);
    return view('diary.edit', compact('diary'));
  }

  public function update(Request $request, string $id)
  {
    // 更新対象となるデータを取得する
    $diary = Diary::find($id);

    // 入力値チェックを行う
    // タイトルは20文字以内、本文は400文字以内という制限を設ける
    $validated = $request->validate([
      'title' => 'required|max:20',
      'body' => 'required|max:400',
    ]);

    // チェック済みの値を使用して更新処理を行う
    $diary->update($validated);

    // 更新後、日記詳細ページにリダイレクトし、成功メッセージを表示
    return back()->with('message', '更新しました');
  }

  public function destroy(Request $request)
  {
    // IDを受け取る（引数で受け取る他に、下記の書き方もできます）
    $id = $request->route('id');

    // 削除対象となるデータを取得する
    $diary = Diary::find($id);

    // 削除する
    $diary->delete();

    // 記事一覧画面に戻る
    return redirect()->route('diary.index');
  }
}
