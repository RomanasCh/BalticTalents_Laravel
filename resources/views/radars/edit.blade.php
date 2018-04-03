@extends('layouts.main')

@section('title_6')
    {{trans_choice(__('common.auto'), 1, ['value' => 1])}}: Id  {!!$radar->id!!}, Nr  {{$radar->number}}
@stop

@section('content')


    <div class="content">
        <div class="row"> <!--  row 1 -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{route('radars.update', ['id' => $radar->id])}}" class="row" id="form2" method="post">
            {{method_field('PUT')}}
            @csrf
            <label class="textin" for="numeris">{{ __('common.number')}}: </label>
            <input type="text" class="form-control" id="numeris" name="number" placeholder="pvz.: ABC123"
                   value="{{$radar->number}}">
            <label class="textin" for="atstumas">{{ __('common.distance')}}: </label>
            <input type="text" class="form-control" id="atstumas" name="distance" placeholder="pvz.: 10000"
                   value="{{$radar->distance}}">
            <label class="textin" for="laikas">{{ __('common.time')}}:</label>
            <input type="text" class="form-control" id="laikas" name="time" placeholder="pvz.: 2000"
                   value="{{$radar->time}}">
            <br>
            <button type="submit" class="btn btn-secondary" form="form2">{{__('common.add')}}</button>
        </form>

    </div>
@endsection
