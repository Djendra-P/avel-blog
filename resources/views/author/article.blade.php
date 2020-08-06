@extends('layouts.master')

{{-- start styles --}}
@push('styles')

<script src="{{ asset('tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endpush
{{-- end styles --}}

{{-- start content --}}
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">{{ $page_title ?? 'Page Title' }}</h1>
    <hr>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Article
        </div>
        <div class="card-body">
            <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                New Article
            </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                <form action="{{route('storeArticle')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="title">Title</label>
                            <input class="form-control form-control-sm col-md-6" id="title" name="title" type="text">
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="category">Category</label>
                            <select class="form-control form-control-sm col-md-6" id="category" name="category">
                                <option value="">Not Selected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="excerpt">Excerpt</label>
                            <input class="form-control form-control-sm col-md-6" id="excerpt" name="excerpt" type="text">
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="body">Body</label>
                            <textarea class="form-control form-control-sm col-md-6" id="body" name="body" type="text"></textarea>
                        </div>
                        <button class="btn btn-primary" id="actionBtn" value="store" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Excerpt</th>
                            <th>Body</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
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
