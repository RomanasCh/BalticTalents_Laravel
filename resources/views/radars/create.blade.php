@extends('layouts.main')

@section('title_2')
    Duomenų įvedimas
@stop

@section('content')

    <div class="container mb-4 pb-4">
        <section>
            <div class="row"> <!--  row 1 -->

                <form action="{{route('radars.store')}}" class="row" id="form3" method="post">
                    {{method_field('PUT')}}
                    @csrf
                     <label class="textin" for="numeris">Numeris: </label>
                    <input type="text" class="form-control" id="numeris" name="number" placeholder="pvz.: ABC123" value="">
                    <label class="textin" for="atstumas">Atstumas: </label>
                    <input type="text" class="form-control" id="atstumas" name="distance" placeholder="pvz.: 10000" value="">
                    <label class="textin" for="laikas">Laikas:</label>
                    <input type="text" class="form-control" id="laikas" name="time" placeholder="pvz.: 2000" value="">
                    <br>
                    <input type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-secondary" form="form3">Pridėti</button>
                </form>
            </div>
        </section>
    </div>
@endsection
