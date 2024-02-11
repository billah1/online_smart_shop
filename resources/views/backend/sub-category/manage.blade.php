@extends('backend.master')


@section('title','Manage SubCategory Page')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">SubCategory Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">SubCategory </a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage SubCategory </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All SubCategory Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Sl No</th>
                                <th class="wd-15p border-bottom-0">Category name</th>
                                <th class="wd-20p border-bottom-0">SubCategory name</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-10p border-bottom-0">status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sub_category->category->name}}</td>
                                <td>{{$sub_category->name}}</td>
                                <td><img src="{{asset($sub_category->image)}}" alt="" height="40" width="60"></td>
                                <td>{{$sub_category->status  == 1 ? 'published':'unpublished'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('sub-category.edit',$sub_category->id)}}" class="btn btn-success btn-sm me-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('sub-category.destroy',$sub_category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure to delete this')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

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
    <!-- /row -->


@endsection
