@extends('layouts.app')

@section('content')

@if (Auth::check())
  <h1>タスク一覧</h1>
  
  @if (count($tasks) > 0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>状態</th>
          <th>タスク</th>
        </tr>
      </thead>
      <tbody>
        {{ $tasks }}
        @foreach ($tasks as $task)
          <tr>
            <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->content }}</td>
          </tr>
        @endforeach
      </tbody>
      {!! $tasks->render() !!}
    </table>
  @endif
  {!! link_to_route('tasks.create', '新規タスクの追加', null, ['class' => 'btn btn-primary']) !!}
@else
  <div class="center jumbotron">
    <div class="text-center">
      <h1>Welcome to the Tasklist</h1>
      {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
  </div>
@endif
@endsection