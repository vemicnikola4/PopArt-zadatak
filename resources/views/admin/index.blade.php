@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>
                        {{ __('Welcome Admin') }}
                    </h3>
                    {{-- <a href="{{ route('admin.ad_category.index')}}">{{ __('Ad categories') }}</a> --}}
                    
                 

                </div>
            </div>
        </div>

    </div>
</div>
@endsection