@extends('layouts.main')


@section('content')
@section('title')
    Automobilis: Id  {!!$radar->id!!}, Nr  {{$radar->number}}, Atstumas  {{$radar->distance}}, Laikas  {{$radar->time}}
@stop

@endsection
