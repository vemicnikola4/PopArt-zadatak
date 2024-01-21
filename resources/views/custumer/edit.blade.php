@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    
                    <div class="card-header">{{ __('Edit profile') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('custumer.update',['custumer'=>$custumer->id]) }}" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$custumer->name) }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __($message) }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$custumer->last_name) }}" required autocomplete="">
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number',$custumer->phone_number) }}" required autocomplete="">
    
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location" value="{{ old('location',$custumer->location) }}" required autocomplete="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror "
                                    id="image" name="image" value="{{ old('image',$custumer->image) }}" >
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                @if(Auth::user()->is_admin == 1)
                                    <a href="{{ route('admin.custumers.all') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                                 @else
                                         <a href="{{ route('custumer.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>

                                 @endif
                                </div>
                                
                                   
                            </div>
                        </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection