@extends('layouts.app')

@section('content')
	<h1>{{ __('Тикет') }} #{{ $ticket->id }} {{ $ticket->name }}</h1>

	<p>
	{{ $ticket->description }}
	</p>

	<h3>{{ __('Комментарии') }}</h3>

	<div class="comments">

		<ul>
		 @forelse ($comments as $comment)

		 <li><p>{{ $comment->message }}</p> <p><a href="/storage/{{ $comment->file }}" target="_blank">{{ $comment->file }}</a></p></li>

		 @empty

		 <li>Комментариев не найдено.</li>

		 @endforelse
		</ul>

	</div>


   <div class="card">
        <div class="card-header">{{ __('Добавить комментарий') }}</div>

        <div class="card-body">
            {!! Form::open(['route' => 'comments_store','files' => true], ['class' => 'form']) !!}
				
            	{!! Form::hidden('ticket_id', $ticket->id) !!}

            	{!! Form::hidden('user_id', $user_id) !!}

				<div class="form-group">
				{!! Form::label('message', "Сообщение",
				 ['class' => 'control-label'])
				 !!}
				 {!! Form::textarea('message', null,
				 [
				 'class' => 'form-control input-lg',
				 'placeholder' => ''
				 ])
				!!}
				</div>

				<div class="form-group">
				{!! Form::label('document', 'Файл', ['class' => 'control-label']) !!}
				 {!! Form::file('document',  [
				 'class' => 'form-control input-lg',
				 ])
				!!}
				 </div>

				<div class="form-group">
				{!! Form::submit('Добавить комментарий',
				 [
				 'class' => 'btn btn-info btn-lg'
				 ])
				!!}
				</div>

            {!! Form::close() !!}

        </div>
    </div>


@endsection
