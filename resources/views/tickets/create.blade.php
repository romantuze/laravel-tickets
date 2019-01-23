@extends('layouts.app')

@section('content')

<h1>{{ __('Добавить тикет') }}</h1>

            <div class="card">
                <div class="card-header">{{ __('Добавить тикет') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'tickets_store'], ['class' => 'form']) !!}

						<div class="form-group">
						{!! Form::label('name', 'Заголовок', ['class' => 'control-label']) !!}
						 {!! Form::text('name', null,
						 [
						 'class' => 'form-control input-lg',
						 ])
						!!}
						 </div>
						<div class="form-group">
						{!! Form::label('description', "Описание",
						 ['class' => 'control-label'])
						 !!}
						 {!! Form::textarea('description', null,
						 [
						 'class' => 'form-control input-lg',
						 'placeholder' => ''
						 ])
						!!}
						</div>
						<div class="form-group">
						{!! Form::submit('Добавить тикет',
						 [
						 'class' => 'btn btn-info btn-lg'
						 ])
						!!}
						</div>

                    {!! Form::close() !!}

                </div>
            </div>

@endsection
