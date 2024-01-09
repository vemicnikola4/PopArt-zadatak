@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body"> 
                        <form method="POST" action="{{ route('admin.ad_category_2.update',['ad_category_2'=>$ad_category_2->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="my-3">
                                <h6>
                                    {{ __('Edit') }}
                                </h6>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title',$ad_category_2->title) }}" required autocomplete="name" autofocus>
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                    <a  href= "{{route('admin.ad_category.show',['ad_category'  => $ad_category_2->ad_category_id])}}" class="btn btn-warning" >{{ __('Back') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection