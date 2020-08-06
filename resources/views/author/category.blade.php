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
                    <form id="categoryForm" action="{{route('storeCategory')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Title</label>
                            <input class="form-control form-control-sm" id="title" name="title" type="text" />
                        </div>
                        <button id="actionBtn" value="store" class="btn btn-primary" type="submit">Save</button>
                        <input type="hidden" id="id" name="id" value="">
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
                                    <th width="5%">#</th>
                                    <th>Title</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $category->title}}</td>
                                    <td>
                                        <a id="editBtn" href="javascript:void(0)" data-id="{{$category->id}}">&nbsp;<i class="fa fa-edit text-info"></i></a>&nbsp;
                                        <a id="deleteBtn" href="{{ url('/author/category') }}/{{$category->id}}/delete" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" data-id="{{$category->id}}"><i class="fa fa-trash text-danger"></i></a>
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
<script>
    $(document).ready(function() {
        /* Edit Function */
        $(document).on('click', '#editBtn', function() {
            var id = $(this).data('id');
            $.get("{{ url('/author/category') }}" + '/' + id + '/edit', function(data) {
                console.log(data);
                document.getElementById("categoryForm").action = "{{route('updateCategory')}}";
                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#actionBtn').text('Udpate');
            })
        });
    });
</script>
@endpush
{{-- end scripts --}}
