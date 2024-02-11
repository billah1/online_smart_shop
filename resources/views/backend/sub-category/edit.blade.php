@extends('backend.master')


@section('title','Edit SubCategory Page')

@section('body')

    <div class="page-header">
        <div>
            <h1 class="page-title">SubCategory Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">SubCategory </a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit SubCategory </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit SubCategory From</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.update',$sub_category->id)}}" method="post" enctype="multipart/form-data">
                       @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" required>
                                    <option value="" disabled selected >-- Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$sub_category->category_id == $category->id ? 'selected' :''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') :''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">SubCategory Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" value="{{$sub_category->name}}" placeholder="SubCategory Name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') :''}}</span>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">SubCategory Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" name="description" placeholder="SubCategory Description">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">SubCategory Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file">
                                <img src="{{asset($sub_category->image)}}" id="categoryImage" alt="" height="100" width="120">
                            </div>
                        </div>
                        <div class="row">
                            <label  class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio"  name="status" {{$sub_category->status == 1 ? 'checked' :'' }}  value="1"><span>Published</span></label>
                                <label><input type="radio" name="status" {{$sub_category->status == 0 ? 'checked' :'' }} value="0"><span>Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update SubCategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->


@endsection
