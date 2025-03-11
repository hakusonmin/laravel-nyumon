@foreach($diaries as $diary)
<div>
  <div>{{ $diary->date }}</div>
  <a href="{{ route('diary.show', ['id' => $diary->id]) }}">{{ $diary->title }}</a>
</div>
@endforeach

