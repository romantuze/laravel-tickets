@extends('layouts.admin')

@section('content')

            <div class="card">
                <div class="card-header">{{ __('Обновить тикет') }}</div>

                <div class="card-body">
                    {!! Form::open(['method'=>'put', 'route' => ['admin_update',$ticket->id], 'class'=>'form']) !!}

						<div class="form-group">
						{!! Form::label('name', 'Заголовок', ['class' => 'control-label']) !!}
						 {!! Form::text('name', $ticket->name,
						 [
						 'class' => 'form-control input-lg',
						 ])
						!!}
						 </div>
						<div class="form-group">
						{!! Form::label('description', "Описание",
						 ['class' => 'control-label'])
						 !!}
						 {!! Form::textarea('description', $ticket->description,
						 [
						 'class' => 'form-control input-lg',
						 'placeholder' => ''
						 ])
						!!}
						</div>
						<div class="form-group">
						{!! Form::label('done', "Статус",
						 ['class' => 'control-label'])
						 !!}
						 {!! Form::select('done', ['0' => 'Открыт','1' => 'Закрыт',]);
						!!}
						</div>

						<div class="form-group">
						{!! Form::submit('Обновить тикет',
						 [
						 'class' => 'btn btn-info btn-lg'
						 ])
						!!}
						</div>

                    {!! Form::close() !!}

                </div>
            </div>

@endsection
