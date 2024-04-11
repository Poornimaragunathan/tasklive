@extends('layouts.app')

@section('content')
<div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tasks
                                    <a href="{{url('first/create')}}" class="btn btn-primary float-end">Add Tasks</a>
                                </h4>                                                                                               
                            </div>
                            <div class="card-body">                                
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($first as $view)
                                            <tr>
                                                <td>{{$view->id}}</td>
                                                <td>{{$view->title}}</td>
                                                <td>{{$view->description}}</td>
                                                <td>
                                                    @if ($view->completed)
                                                        Completed
                                                    @else
                                                        Incompleted
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('first/'.$view->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                                                    <a href="{{ url('first/'.$view->id.'/delete') }}" class="btn btn-danger mx-1" 
                                                    onclick="return confirm('Are you sure ?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
