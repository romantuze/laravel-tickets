@extends('layouts.admin')

@section('content')
<h1>{{ __('Управление тикетами') }}</h1>

 <ul>
 @forelse ($tickets as $ticket)

 <li>{{ $ticket->name }} <a href="{{ route('admin_edit', ['id' => $ticket->id]) }}">Изменить</a></li>

 @empty

 <li>Тикетов не найдено.</li>

 @endforelse
</ul>

@endsection
