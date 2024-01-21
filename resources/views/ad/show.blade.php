@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  row" >
                <div class="card-header">
                    {{ $ad->title }}
                </div>
                <div class="card-body">
                    <div class="col-4">
                        <img src="{{ $img }}" alt="" class="rounded mx-auto d-block" > 
                    </div>
                    <table class="table col-4">                   
                        <tr>
                            <td>{{ __('Ad id') }}</td>
                            <td>{{ $ad->id }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Created at') }}</td>
                            <td>{{ $ad->created_at }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ad title') }}</td>
                            <td>{{ $ad->title }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ad description') }}</td>
                            <td>{{ $ad->description }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ad price') }}</td>
                            <td>{{ $ad->price }}</td>
                        </tr> 
    
                    </table>
                    @auth
                        <a href="{{ route('custumer.index') }}" class="btn btn-secondary">{{ __('back') }}</a>
                    @else
                        <a href="{{ route('/') }}" class="btn btn-secondary">{{ __('back') }}</a>

                    @endauth
                </div>
            </div>   
        </div>
    </div>

@endsection