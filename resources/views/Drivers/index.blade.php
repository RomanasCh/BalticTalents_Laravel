@extends('layouts.main')

@section('title', __('common.drivers'))

@section('content')

               <div class="row"> <!--  row 1 -->
                    <form action="{{route('drivers.create')}}" id="form1" method="get">
                        <input type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-secondary  btn-group-sm" form="form1">{{__('common.add')}}</button>
                    </form>
                    <nav >
                        <ul class="pagination pagination-md ">
                            <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('radars.index')}}">{{__('common.cars')}}</a></li>
                        </ul>
                    </nav>
                </div>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                    <tr  scope="row">
                        <th >{{ __('common.id')}}</th>
                        <th >{{ __('common.name')}}</th>
                        <th >{{ __('common.city')}}</th>
                        <th>{{ __('common.trash')}}</th>
                        <th>{{ __('common.modified')}} </th>
                        <th >{{ __('common.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($drivers as $driver)
                            <tr scope="row">
                                <td>{{$driver->id}}</td>
                                <td>{{$driver->name}}</td>
                                <td>{{$driver->city}}</td>
                                <td>{{$driver->trashed()}}</td>
                                <td>{{$driver->user ? $driver->user->name : ''}}</td>
                                <td>
                                    <a href="{{ route('drivers.show', ['id' => $driver->id]) }}" >
                                        <button class= "btn btn-secondary  @if($driver->trashed()) disabled @endif">{{ __('common.view')}}</button>
                                    </a>

                                    <a href="{{ route('drivers.edit', ['id' => $driver->id]) }}" >
                                        <button class= "btn btn-secondary @if($driver->trashed()) disabled @endif">{{ __('common.edit')}}</button>
                                    </a>
                                    @if(!$driver->trashed())
                                        <a href="{{ route('drivers.delete', ['id' => $driver->id]) }}" >
                                            <button class= "btn btn-danger">{{ __('common.delete')}}</button>
                                    @else
                                        <a href="{{ route('drivers.restore', ['id' => $driver->id]) }}" >
                                            <button class= "btn btn-success">{{ __('common.restore')}}</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
                {{$drivers->links()}}
 @endsection
