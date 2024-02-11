@extends('backend.master')


@section('title','Add Product')


@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" onchange="setSubCategory(this.value)" name="category_id" required>
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId" required>
                                    <option value="" disabled selected> -- Select Sub Category -- </option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}"> {{$sub_category->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('sub_category_id') ? $errors->first('sub_category_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="brand_id" required>
                                    <option value="" disabled selected> -- Select Brand -- </option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"> {{$brand->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="unit_id" required>
                                    <option value="" disabled selected> -- Select Unit -- </option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}"> {{$unit->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Color Name</label>
                            <div class="col-md-9 form-group">
                                <select  multiple class="form-control select2-show-search form-select" name="colors[]" data-placeholder="Select Product Color" required>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('color_id') ? $errors->first('color_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Size Name</label>
                            <div class="col-md-9 form-group">
                                <select multiple class="form-control select2-show-search form-select " name="sizes[]" data-placeholder="Select Product Size" required>

                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}"> {{$size->name}} </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('size_id') ? $errors->first('size_id') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control"  id="firstName" name="name" placeholder="Product Name" type="text"/>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstCode" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control"  id="firstCode" name="code" placeholder="Product Code" type="text"/>
                                <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" name="short_description" placeholder="Short Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" name="long_description" placeholder="Long Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="image" data-height="200" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input type="file" name="other_image[]" class="form-control" multiple />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input class="form-control" name="regular_price" placeholder="Regular Price" type="number"/>
                                    <input class="form-control" name="selling_price" placeholder="Selling Price" type="number"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="stockAmount" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" id="stockAmount" name="stock_amount" placeholder="Stock Amount" type="number"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label> <input type="radio" value="1" checked name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
