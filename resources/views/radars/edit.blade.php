@extends('layouts.main')

@section('title_6')
    Automobilis: Id  {!!$radar->id!!}, Nr  {{$radar->number}}
@stop

@section('content')


    <div class="content">

        <form action="{{route('radars.update', ['id' => $radar->id])}}" class="row" id="form2" method="post">
            {{method_field('PUT')}}
            @csrf
            <label class="textin" for="numeris">Numeris: </label>
            <input type="text" class="form-control" id="numeris" name="number" placeholder="pvz.: ABC123"
                   value="{{$radar->number}}">
            <label class="textin" for="atstumas">Atstumas: </label>
            <input type="text" class="form-control" id="atstumas" name="distance" placeholder="pvz.: 10000"
                   value="{{$radar->distance}}">
            <label class="textin" for="laikas">Laikas:</label>
            <input type="text" class="form-control" id="laikas" name="time" placeholder="pvz.: 2000"
                   value="{{$radar->time}}">
            <br>
            <input type="hidden" name="id" value="{{$radar->id}}">
            <button type="submit" class="btn btn-secondary" form="form2">Pridėti</button>
        </form>

    </div>
@endsection
