@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ 'Profile' }}
                </div>
                {{-- profile header --}}
                <div class="card-body">
                    @if (session('msg'))
                    <div class="alert alert-{{ __(session('alert_type')) }} m-1" role="alert">
                        {{ __(session('msg')) }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success m-1" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row my-2">
                        <div class="col-2">
                            <img src="{{ $img }}" alt="" class="rounded mx-auto d-block" style="width: 100px;"> 
                        </div>
                        <div class="col-2">{{$custumer->name }}</div>
                        <div class="col-2">{{ $custumer->last_name }}</div>
                        <div class="col-2">{{ $custumer->phone_number }}</div>   
                        <div class="col-2">{{ $custumer->location }}</div>   
                        <div class="col-1">
                            <a href="{{ route('custumer.edit',['custumer' => $custumer->id]) }}" class="btn btn-success">{{ __('edit') }} </a>                     
                        </div>
                    </div>
                </div>
                <div class="card-header border border-top-solid">
                    {{ 'Ads' }}
                </div>                
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Ad id</th>
                            <th>Posted at</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Condition</th>
                            <th>Category</th>
                            <th>
                                <a href="{{ route('ad.create',['custumer'=>$custumer->id]) }}" class="btn btn-primary">{{ __('New ad') }}</a>
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($custumer->ads as $ad) 
                            <tr>
                                <td>{{ $ad->id }}</td>
                                <td>{{ $ad->created_at }}</td>
                                <td>{{ $ad->title }}</td>
                                <td>{{ $ad->description }}</td>
                                <td>{{ $ad->price }}</td>
                                <td>{{ $ad->condition }}</td>
                                <td>
                                    {{ $ad->adCategory->title }}                  
                                    @foreach (  $ad->adCategory->adCategories2 as  $ad_category_2 )
                                    @if( $ad_category_2->id == $ad->ad_category_2_id)
                                    {{ (' ->') }}{{ $ad_category_2->title }}
                                        @foreach (  $ad_category_2->adCategories3 as  $ad_category_3 )
                                            @if( $ad_category_3->id == $ad->ad_category_3_id)
                                            {{ (' ->') }}{{ $ad_category_3->title }}

                                            @endif 

                                        @endforeach
                                    @endif                                      
                                    @endforeach
                                   
                                </td>
                                <td>
                                    <a href="{{  route('ad.show',['ad'=>$ad->id]) }}" class="btn btn-primary">{{ __('Show') }}</a>    
                                </td>
                                <td>
                                    <a href="{{ route('ad.edit',['ad'=>$ad->id]) }}" class="btn btn-success">{{ __('Edit') }}</a>    
                                </td>
                                <td>
                                    <a href="{{ route('ad.delete',['ad'=>$ad->id]) }}" class="btn btn-danger">{{ __('Delete') }}</a>    
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>   
            </div>
            {{-- list of all custumer adds  --}}
                     

           
        </div>
    </div>
</div>
@endsection