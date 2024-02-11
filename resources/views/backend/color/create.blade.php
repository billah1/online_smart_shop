@extends('backend.master')

@section('title', 'Add Color')

@section('body')
    <!-- PAGE-HEADER -->
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Color Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Color</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Size Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('color.store')}}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" placeholder="Color Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstCode" class="col-md-3 form-label">Color Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstCode" name="code" placeholder="Color Code" type="color">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Color Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="Color Description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label> <input type="radio" value="1" checked name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Color</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
