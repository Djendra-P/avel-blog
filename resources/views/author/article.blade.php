@extends('layouts.master')

{{-- start styles --}}
@push('styles')

<script src="{{ asset('tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({selector:'textarea'});
</script>
@endpush
{{-- end styles --}}

{{-- start content --}}
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">{{ $page_title ?? 'Page Title' }}</h1>
    <hr>
    @include('layouts.alert')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Article
        </div>
        <div class="card-body">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#newArticle" role="button"
                    aria-expanded="false" aria-controls="newArticle">
                    New Article
                </a>
            </p>
            <div class="collapse" id="newArticle">
                <div class="card card-body">
                    <form id="articleForm" action="{{route('storeArticle')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="title">Title</label>
                            <input class="form-control form-control-sm col-md-6" id="title" name="title" type="text">
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="category">Category</label>
                            <select for="select" class="form-control form-control-sm col-md-6" id="category_id"
                                name="category_id">
                                <option id="select" value="">Not Selected</option>
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="excerpt">Excerpt</label>
                            <input class="form-control form-control-sm col-md-6" id="excerpt" name="excerpt"
                                type="text">
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="body">Body</label>
                            <textarea class="form-control form-control-sm col-md-6" id="body" name="body"
                                type="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="category">Status</label>
                            <select for="select1" class="form-control form-control-sm col-md-4" id="is_publish"
                                name="is_publish">
                                <option id="select1" value="">Not Selected</option>
                                <option value="0">Draft</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                        <input type="hidden" id="id" name="id" value="">
                        <button id="actionBtn" value="store" class="btn btn-primary" id="actionBtn" value="store" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Excerpt</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td width="60%">

                                {{$item->title}} <br><a class="badge badge-info" data-toggle="collapse"
                                    href="#collapseExample{{$item->id}}">
                                    View
                                </a>

                                <div class="collapse" id="collapseExample{{$item->id}}">
                                    <div class="card card-body">
                                        {!! $item->body !!}
                                    </div>
                                </div>
                            </td>
                            <td width="10%">{{$item->category_id}}</td>
                            <td width="10%">{{$item->excerpt}}</td>

                            <td width="15%">
                                @if ($item->is_publish == 0)
                                {{ 'Draft' }}
                                @else
                                {{ 'Publish' }}
                                @endif
                            </td>
                            <td>{{$item->author_id}}</td>
                            <td>
                                <a id="editBtn" data-toggle="collapse" href="#newArticle" data-id="{{$item->id}}">&nbsp;<i
                                        class="fa fa-edit text-info"></i></a>&nbsp;
                                <a id="deleteBtn" href="{{ url('/author/article') }}/{{$item->id}}/delete"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                                    data-id="{{$item->id}}"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$articles->links()}}
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
            $.get("{{ url('/author/article') }}" + '/' + id + '/edit', function(data) {
                console.log(data);
                document.getElementById("articleForm").action = "{{route('updateArticle')}}";
                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#category_id').val(data.category_id);
                $('#excerpt').val(data.excerpt);
                tinymce.get('body').setContent(data.body);
                $('#is_publish').val(data.is_publish);
                $('#actionBtn').text('Udpate');
            })
        });
    });
</script>
@endpush
{{-- end scripts --}}
