@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-{{ __(session('alert_type')) }}" role="alert">
                            {{ __(session('msg')) }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            img
                        </div>
                        <div class="col-2">{{ $custumer->name }}</div>
                        <div class="col-2">{{ $custumer->last_name }}</div>
                        <div class="col-2">{{ $custumer->phone_number }}</div>
                        <div class="col-2">{{ $custumer->location }}</div>
                        <div class="col-1">
                           <a href="{{ route('custumer.edit',['custumer' => $custumer->id]) }}" class="btn btn-success">{{ __('edit') }}</a>
                            
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection