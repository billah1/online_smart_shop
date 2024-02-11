@extends('backend.master')

@section('title', 'Edit Size')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Size Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Size</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Size</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Size Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('size.update', $size->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" value="{{$size->name}}" name="name" placeholder="Unit Name" type="text">
                            </div>
                            <div class="row mb-4">
                                <label for="firstCode" class="col-md-3 form-label">Unit Code</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="firstCode" value="{{$size->code}}" name="code" placeholder="Unit Code" type="text">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="lastName" class="col-md-3 form-label">Unit Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="lastName" placeholder="Unit Description" name="description">{{$size->description}}</textarea>                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Publication Status</label>
                                <div class="col-md-9 pt-3">
                                    <label> <input type="radio" value="1" {{$size->status == 1 ? 'checked' : ''}} name="status"><span> Published</span> </label>
                                    <label> <input type="radio" value="0" {{$size->status == 0 ? 'checked' : ''}} name="status"><span> Unpublished</span> </label>
                                </div>
                            </div>
                            <button class="btn btn-primary rounded-0 float-end" type="submit">Update Size Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

