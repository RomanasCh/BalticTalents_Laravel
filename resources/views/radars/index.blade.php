@extends('layouts.main')

@section('title')
    {{trans_choice(__('common.auto'), $radars->count(), ['value' => $radars->count()])}}
@stop

@section('content')

               <div class="row"> <!--  row 1 -->

                   <form action="{{route('radars.create')}}" id="form1" method="get">
                       <input type="hidden" name="id" value="">
                       <button type="submit" class="btn btn-secondary btn-group-sm" form="form1">{{__('common.add')}}</button>
                   </form>

                   <nav >
                       <ul class="pagination pagination-md ">
                           <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('drivers.index')}}">{{ __('common.drivers')}}</a></li>
                           <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('radars.settrashoff')}}">{{ __('common.all')}}</a></li>
                           <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('radars.settrashon')}}">{{ __('common.deleted')}}</a></li>
                           <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('radars.locale')}}">{{ __('common.lang')}}</a></li>
                       </ul>
                   </nav>

               </div>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                    <tr  scope="row">
                        <th >{{ __('common.id')}}</th>
                        <th >{{ __('common.number')}}</th>
                        <th >{{ __('common.distance')}}</th>
                        <th >{{ __('common.time')}}</th>
                        <th >{{ __('common.name')}}</th>
                        <th>{{ __('common.trash')}}</th>
                        <th>{{ __('common.modified')}} </th>
                        <th >{{ __('common.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($radars as $radar)
                            <tr scope="row">
                                <td>{{$radar->id}}</td>
                                <td>{{$radar->number}}</td>
                                <td>{{$radar->distance}}</td>
                                <td>{{$radar->time}}</td>
                                <td>{{$radar->driver ? $radar->driver->name : ''}}</td>
                                <td>{{$radar->trashed()}}</td>
                                <td>{{$radar->user ? $radar->user->name : ''}}</td>
                                <td>
                                    <a href="{{ route('radars.show', ['id' => $radar->id]) }}" >
                                        <button class= "btn btn-secondary  @if($radar->trashed()) disabled @endif">{{ __('common.view')}}</button>
                                    </a>

                                    <a href="{{ route('radars.edit', ['id' => $radar->id]) }}" >
                                        <button class= "btn btn-secondary @if($radar->trashed()) disabled @endif">{{ __('common.edit')}}</button>
                                    </a>
                                    @if(!$radar->trashed())
                                        <a href="{{ route('radars.delete', ['id' => $radar->id]) }}" >
                                            <button class= "btn btn-danger">{{ __('common.delete')}}</button>
                                    @else
                                        <a href="{{ route('radars.restore', ['id' => $radar->id]) }}" >
                                            <button class= "btn btn-success">{{ __('common.restore')}}</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
                {{$radars->links()}}
 @endsection
