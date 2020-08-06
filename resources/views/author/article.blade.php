@extends('layouts.master')

{{-- start styles --}}
@push('styles')

@endpush
{{-- end styles --}}

{{-- start content --}}
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">{{ $page_title ?? 'Page Title' }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $page_title ?? 'Page Title' }}</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
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
