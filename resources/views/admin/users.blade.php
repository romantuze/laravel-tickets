@extends('layouts.admin')

@section('content')
<h1>{{ __('Зарегистрированные пользователи') }}</h1>

 <ul>
 @forelse ($users as $user)

 <li>{{ $user->name }} ({{ $user->email }})</li>

 @empty

 <li>Пользователей не найдено.</li>

 @endforelse
</ul>

@endsection
