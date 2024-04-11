@extends('layouts.app')

@section('content')
<div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Tasks
                                    <a href="{{url('/')}}" class="btn btn-primary float-end">Back</a>
                                </h4>                                                                                               
                            </div>
                            <div class="card-body">
                                <form action="{{ url('first/'.$edit->id.'/edit') }}" method="POST">
                                    @csrf

                                    @method('PUT')
                                    <div class="md-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $edit->title }}" />
                                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="md-3">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ $edit->description }}</textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="md-3">
                                        <label>Completed</label>
                                        <input type="checkbox" name="completed" {{ $edit->completed == true ? 'checked' : '' }} />
                                        @error('completed') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="md-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
