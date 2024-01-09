@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                <div class="card-header">
                    <h5 class="card-title">{{  $ad_category_3->title }}</h5>
                    
                </div>
                
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <a href={{ route('admin.ad_category_3.delete',['ad_category_3'  => $ad_category_3->id]) }} class="btn btn-danger">{{ __ ('delete') }}</a>
                        </div>
                        <div class="col-3">
                            <a href={{ route('admin.ad_category_3.edit',['ad_category_3'  => $ad_category_3->id]) }} class="btn btn-success">{{ __ ('edit') }}</a>
                        </div>
                        <div class="col-3">
                            <a  href= "{{route('admin.ad_category_2.show',['ad_category_2'=>$ad_category_3->ad_category_2_id])}}" class="btn btn-warning" >{{ __('Back') }}</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection