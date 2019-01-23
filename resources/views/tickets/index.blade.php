@extends('layouts.app')

@section('content')
<h1>{{ __('Тикеты') }}</h1>

 <ul>
 @forelse ($tickets as $ticket)

 <li><a href="{{ route('tickets_read', ['id' => $ticket->id]) }}">{{ $ticket->name }}</a></li>

 @empty

 <li>Тикетов не найдено.</li>

 @endforelse
</ul>


@endsection
