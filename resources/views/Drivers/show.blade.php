@extends('layouts.main')


@section('content')
@section('title')
    {{trans_choice(__('common.driver'), 1, ['value' => 1])}}: Id  {!!$driver->id!!}, {{ __('common.name')}}:  {{$driver->name}}, {{ __('common.city')}}:  {{$driver->city}}
@stop

@endsection
