@extends('layouts.main')


@section('content')
@section('title')
    Vairuotojas: Id  {!!$driver->id!!}, Vardas:  {{$driver->name}}, Adresas:  {{$driver->city}}
@stop

@endsection
