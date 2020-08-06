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

    <div class="col-lg-12">

        <div class="card">

            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                {{ __('You are logged in!') }}

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
