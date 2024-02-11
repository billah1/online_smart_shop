@extends('backend.master')


@section('title','Category Create')


@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category From</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" name="name" placeholder="Category Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" name="description" placeholder="Category Description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="imgInp" name="image" type="file">
                                <img src="" id="categoryImage" alt="" >
                            </div>
                        </div>
                        <div class="row">
                            <label  class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label><input type="radio"  name="status" checked value="1"><span>Published</span></label>
                                <label><input type="radio" name="status" value="0"><span>Unpublished</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->


@endsection
