@extends('layouts.main')

@section('title', 'Vairuotojai')

@section('content')

               <div class="row"> <!--  row 1 -->
                    <form action="{{route('drivers.create')}}" id="form1" method="get">
                        <input type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-secondary  btn-group-sm" form="form1">Pridėti</button>
                    </form>

                    <nav >
                        <ul class="pagination pagination-md ">
                            <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('radars.index')}}">Radars</a></li>
                        </ul>
                    </nav>


                </div>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                    <tr  scope="row">
                        <th >Id</th>
                        <th >Name</th>
                        <th >City</th>
                        <th>Trash</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($drivers as $driver)
                            <tr scope="row">
                                <td>{{$driver->id}}</td>
                                <td>{{$driver->name}}</td>
                                <td>{{$driver->city}}</td>
                                <td>{{$driver->trashed()}}</td>
                                <td>
                                    <a href="{{ route('drivers.show', ['id' => $driver->id]) }}" >
                                        <button class= "btn btn-secondary  @if($driver->trashed()) disabled @endif">Peržiūrėti</button>
                                    </a>

                                    <a href="{{ route('drivers.edit', ['id' => $driver->id]) }}" >
                                        <button class= "btn btn-secondary @if($driver->trashed()) disabled @endif">Redaguoti</button>
                                    </a>
                                    @if(!$driver->trashed())
                                        <a href="{{ route('drivers.delete', ['id' => $driver->id]) }}" >
                                            <button class= "btn btn-danger">Išmesti</button>
                                    @else
                                        <a href="{{ route('drivers.restore', ['id' => $driver->id]) }}" >
                                            <button class= "btn btn-success">Grąžinti</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
                {{$drivers->links()}}
 @endsection
