@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Cofirm deleting') }} </h5>
                    
                </div>
                <div class="card-body">
                <p class="card-text">{{ __('You sure you want to delete') }}:{{ $ad_category->title }}</p>
                <form class="delete-post-form d-inline" method="POST" action="{{ route('admin.ad_category.destroy', ['ad_category'=>$ad_category->id]) }}" >
                    @csrf
                    @method('DELETE')
                    <button class="delete-post-button btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">{{ __('Confirm') }}</button>
                </form>
                <a  href= "{{route('admin.ad_category.index')}}" class="btn btn-warning" >{{ __('Back') }}</a>

                </div>              
            </div>
        </div>
    </div>
</div>
@endsection
