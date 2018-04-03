@extends('layouts.main')

@section('title_2')
    {{__('common.newdate')}}
@stop

@section('content')

    <div class="container mb-4 pb-4">
        <section>
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
            <div class="row"> <!--  row 2 -->
                <form action="{{route('radars.store')}}" class="row" id="form3" method="post">
                    {{method_field('PUT')}}
                    @csrf
                     <label class="textin" for="numeris">{{ __('common.number')}}: </label>
                    <input type="text" class="form-control" id="numeris" name="number" placeholder="pvz.: ABC123" value="{{old('number')}}">
                    <label class="textin" for="atstumas">{{ __('common.distance')}}: </label>
                    <input type="text" class="form-control" id="atstumas" name="distance" placeholder="pvz.: 10000" value="{{old('distance')}}">
                    <label class="textin" for="laikas">{{ __('common.time')}}:</label>
                    <input type="text" class="form-control" id="laikas" name="time" placeholder="pvz.: 2000" value="{{old('time')}}">
                    <br>
                    <input type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-secondary" form="form3">{{__('common.add')}}</button>
                </form>
            </div>
        </section>
    </div>
@endsection
