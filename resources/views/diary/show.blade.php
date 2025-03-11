<!-- タイトルを H1 タグで表示する -->
<h1>{{ $diary->title }}</h1>

<!-- 内容と日付を表示する -->
<a href="{{ route('diary.edit', ['id' => $diary->id]) }}">
  <button>編集</button>
</a>
<form method="post" action="{{ route('diary.destroy',  ['id' => $diary->id]) }}">
  @csrf
  @method('delete')
  <button>削除</button>
</form>
<div>
  <div>{{ $diary->body }}</div>
  <div>{{ $diary->date }}</div>
</div＞