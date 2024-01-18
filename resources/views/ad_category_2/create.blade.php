@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">
                       {{ __('Parent category') }}:{{ $ad_category->title }} 
                        
                    </div>
                    <div class="card-body"> 
                        @if (session('msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.ad_category_2.store')}}">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
    
                                <div class="col-md-6">
                                    <input type="hidden" name="ad_category_id" value={{ $ad_category->id }}>
                                    <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>z
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('New category') }}
                                    </button>
                                    <a  href= "{{route('admin.ad_category.show',['ad_category'=>$ad_category->id])}}" class="btn btn-secondary" >{{ __('Back') }}</a>
                                    <a  href= "{{route('admin.ad_category.index')}}" class="btn btn-warning" >{{ __('All categories') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection