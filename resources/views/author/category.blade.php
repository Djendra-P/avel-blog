@extends('layouts.master')

{{-- start styles --}}
@push('styles')

@endpush
{{-- end styles --}}
{{-- {{dd($categories)}} --}}
{{-- start content --}}
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">{{ $page_title ?? 'Page Title' }}</h1>
    <hr>
    @include('layouts.alert')
    <div class="row">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus mr-1"></i>
                    New Category
                </div>
                <div class="card-body">
                <form action="{{route('storeCategory')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="mb-1">Title</label>
                            <input class="form-control form-control-sm" name="title" type="text" />
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-8">

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Category List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $category->title}}</td>
                                    <td>
                                        <a href=""><i class="fa fa-edit text-info"></i></a>
                                        <a href=""><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
{{-- end content --}}

{{-- start scripts --}}
@push('scripts')

@endpush
{{-- end scripts --}}
