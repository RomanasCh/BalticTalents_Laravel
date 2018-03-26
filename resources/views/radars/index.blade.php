@extends('layouts.main')

@section('title', 'Automobiliai')

@section('content')

               <div class="row"> <!--  row 1 -->

                   <form action="{{route('radars.create')}}" id="form1" method="get">
                       <input type="hidden" name="id" value="">
                       <button type="submit" class="btn btn-secondary btn-group-sm" form="form1">Pridėti</button>
                   </form>

                   <nav >
                       <ul class="pagination pagination-md ">
                           <li class="page-item"><a  class="page-link bg-secondary text-white ml-5 btn-group-lg" href="{{route('drivers.index')}}">Drivers</a></li>
                       </ul>
                   </nav>


               </div>
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                    <tr  scope="row">
                        <th >Id</th>
                        <th >Number</th>
                        <th >Distance</th>
                        <th >Time</th>
                        <th>Trash</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($radars as $radar)
                            <tr scope="row">
                                <td>{{$radar->id}}</td>
                                <td>{{$radar->number}}</td>
                                <td>{{$radar->distance}}</td>
                                <td>{{$radar->time}}</td>
                                <td>{{$radar->trashed()}}</td>
                                <td>
                                    <a href="{{ route('radars.show', ['id' => $radar->id]) }}" >
                                        <button class= "btn btn-secondary  @if($radar->trashed()) disabled @endif">Peržiūrėti</button>
                                    </a>

                                    <a href="{{ route('radars.edit', ['id' => $radar->id]) }}" >
                                        <button class= "btn btn-secondary @if($radar->trashed()) disabled @endif">Redaguoti</button>
                                    </a>
                                    @if(!$radar->trashed())
                                        <a href="{{ route('radars.delete', ['id' => $radar->id]) }}" >
                                            <button class= "btn btn-danger">Išmesti</button>
                                    @else
                                        <a href="{{ route('radars.restore', ['id' => $radar->id]) }}" >
                                            <button class= "btn btn-success">Grąžinti</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
                {{$radars->links()}}
 @endsection
