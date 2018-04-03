@extends('layouts.main')

@section('title_6')
    {{trans_choice(__('common.driver'), 1, ['value' => 1])}}: Id  {!!$driver->id!!}, {{ __('common.name')}}: {{$driver->name}}
@stop

@section('content')


    <div class="content">

        <form action="{{route('drivers.update', ['id' => $driver->id])}}" class="row" id="form2" method="post">
            {{method_field('PUT')}}
            @csrf
            <label class="textin" for="name">{{ __('common.name')}}: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="pvz.: Vardenis Pavardenis"
                   value="{{$driver->name}}">
            <label class="textin" for="city">{{ __('common.city')}}: </label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Kaunas"
                   value="{{$driver->city}}">
            <br>
            <button type="submit" class="btn btn-secondary" form="form2">{{__('common.add')}}</button>
        </form>

    </div>
@endsection
