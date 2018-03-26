@extends('layouts.main')

@section('title_6')
    Vairuotojas: Id  {!!$driver->id!!}, Vardas  {{$driver->number}}
@stop

@section('content')


    <div class="content">

        <form action="{{route('drivers.update', ['id' => $driver->id])}}" class="row" id="form2" method="post">
            {{method_field('PUT')}}
            @csrf
            <label class="textin" for="name">Vardas: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="pvz.: Vardenis Pavardenis"
                   value="{{$driver->name}}">
            <label class="textin" for="city">Atstumas: </label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Kaunas"
                   value="{{$driver->city}}">
            <br>
            <input type="hidden" name="id" value="{{$driver->id}}">
            <button type="submit" class="btn btn-secondary" form="form2">Pridėti</button>
        </form>

    </div>
@endsection
