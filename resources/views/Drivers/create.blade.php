@extends('layouts.main')

@section('title_2')
    {{__('common.newdate')}}
@stop

@section('content')

    <div class="container mb-4 pb-4">
        <section>
            <div class="row"> <!--  row 1 -->

                <form action="{{route('drivers.store')}}" class="row" id="form3" method="post">
                    {{method_field('PUT')}}
                    @csrf
                     <label class="textin" for="name">{{ __('common.name')}}: </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Vardenis Pavardenis" value="">
                    <label class="textin" for="city">{{ __('common.city')}}: </label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Kaunas" value="">
                    <br>
                    <input type="hidden" name="id" value="">
                    <button type="submit" class="btn btn-secondary" form="form3">{{__('common.add')}}</button>
                </form>
            </div>
        </section>
    </div>
@endsection
