@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <h3>{{ __('Welcome to our website') }}</h3>
                @include('layouts.home-sidebar')
                <div class="card col-9">
                    <div class="card-header">{{ __('Ads!') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Posted at</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Condition</th>
                                
                            </thead>
                            <tbody>
                                @foreach ($ads as $ad) 
                                
                                <tr>
                                    <td scope="row">
                                        <div class="me-3">
                                {{ ( $ads->currentPage() - 1) *  $ads->perPage() + $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>{{ $ad->created_at }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->description }}</td>
                                    <td>{{ $ad->price }}</td>
                                    <td>{{ $ad->condition }}</td>
                                    <td>
                                        <a href="{{  route('ad.show',['ad'=>$ad->id]) }}" class="btn btn-primary">{{ __('Show') }}</a>    
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div>
@endsection
