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
                                <h4 class="card-title">Add Tasks
                                    <a href="{{url('first')}}" class="btn btn-primary float-end">Back</a>
                                </h4>                                                                                               
                            </div>
                            <div class="card-body">
                                <form action="{{ url('store') }}" method="POST">
                                    @csrf
                                    <div class="md-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old ('title') }}" />
                                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="md-3">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{ old ('description') }}</textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="md-3">
                                        <label>Completed</label>
                                        <input type="checkbox" name="completed" {{ old('completed') == true ? 'checked' : '' }} />
                                        @error('completed') <span class="text-danger">{{ $message }}</span> @enderror

                                    </div>

                                    <div class="md-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection
