@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Cofirm deleting') }} </h5>
                    
                </div>
                @if(Auth::user()->is_admin == 1)
                    <div class="card-body">
                    <p class="card-text">{{ __('You sure you want to delete') }}:{{ $custumer->name }}{{ " " }}{{ $custumer->last_name }}</p>
                    <form class="delete-post-form d-inline" method="POST" action="{{ route('custumer.destroy', ['custumer'=>$custumer->id]) }}" >
                        @csrf
                        @method('DELETE')
                        <button class="delete-post-button btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">{{ __('Confirm') }}</button>
                    </form>
                        <a  href= "{{route('admin.custumers.all')}}" class="btn btn-warning" >{{ __('Back') }}</a>
                @else
                <div class="card-body">
                    <p class="card-text">{{ __('You sure you want to delete yourprofile') }}</p>
                    <form class="delete-post-form d-inline" method="POST" action="{{ route('custumer.destroy', ['custumer'=>$custumer->id]) }}" >
                        @csrf
                        @method('DELETE')
                        <button class="delete-post-button btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">{{ __('Confirm') }}</button>
                    </form>
                        <a  href= "{{route('custumer.index')}}" class="btn btn-warning" >{{ __('Back') }}</a>
                @endif

                </div>              
            </div>
        </div>
    </div>
</div>
@endsection
