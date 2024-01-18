@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ "Create new ad" }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ad.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="inputGroupSelect01">Options</label>
                            <div class="col-md-6"> 
                                <select class="custom-select form-control" id="inputGroupSelect01">
                                    <option selected>{{ __('Condition')}}</option>
                                    <option value="1">{{ __('Novo') }}</option>
                                    <option value="Novo">{{ __('Novo') }}</option>
                                    <option value="Kao Novo">{{ __('Kao Novo') }}</option>
                                    <option value="Polovno">{{ __('Polovno') }}</option>  
                                </select>
                            </div>                               
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror "
                                id="image" name="image" value="{{ old('image') }}" >
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" for="inputGroupSelect01">Options</label>
                            <div class="col-md-6"> 
                                <select class="custom-select form-control" id="inputGroupSelect01">
                                    <option selected>{{ __('Category')}}</option>
                                    @foreach ($ad_categories as $ad_category )
                                        <option value="{{ $ad_category->id }}">{{ $ad_category-> title }}</option>
                                        @if ($ad_category->adCategories2 !== NULL)
                                            @foreach ($ad_category->adCategories2 as $ad_category_2 )
                                            <div class="ps-2">
                                                <option value="{{ $ad_category_2->id }}">{{ $ad_category_2-> title }}</option>
                                            </div>

                                        @endforeach
                                        
                                        @endif

                                        
                                    @endforeach
                                    
                                </select>
                            </div>                               
                        </div>
                        
                            

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection