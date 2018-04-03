@extends('layouts.main')


@section('content')
@section('title')
    {{trans_choice(__('common.auto'), 1, ['value' => 1])}}: Id:  {!!$radar->id!!}, Nr  {{$radar->number}}, {{ __('common.distance')}}:  {{$radar->distance}}, {{ __('common.time')}}: {{$radar->time}}
    {{ __('common.modified')}}: {{$radar->user ? $radar->user->name : ''}}
@stop

@endsection
