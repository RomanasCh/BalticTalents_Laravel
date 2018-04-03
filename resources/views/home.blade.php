@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav >
                <ul class="pagination pagination-md ">
                    <li class="page-item"><a  class="page-link bg-secondary text-white btn-group-lg" href="{{route('radars.index')}}">Radars</a></li>
                </ul>
            </nav>

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
