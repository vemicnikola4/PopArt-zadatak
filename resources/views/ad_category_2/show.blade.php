@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('msg'))
                    <div class="alert alert-{{ __(session('alert_type')) }} m-2" role="alert">
                        {{ __(session('msg')) }}
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr class="">
                            <th scope="col">{{ __('Title') }}</th>
                            <th scope="col">
                                {{  $ad_category_2->title }}
                            </th>
                            <th>
                                <a href="{{ route('admin.ad_category_3.create',['ad_category_2'=>$ad_category_2->id]) }} "class="btn btn-primary">{{ __ ('New subcategory') }}</a>

                            </th>
                            {{-- <th scope="col">
                                <a href={{ route('admin.ad_category_2.edit',['ad_category_2'  => $ad_category_2->id]) }} class="btn btn-success">{{ __ ('edit') }}</a>
                            </th>
                            <th scope="col">
                                <a href={{ route('admin.ad_category_2.delete',['ad_category_2'  => $ad_category_2->id]) }} class="btn btn-danger">{{ __ ('delete') }}</a>
                        `   </th> --}}
                            <th>
                                <a  href= "{{route('admin.ad_category.show',['ad_category'=>$ad_category_2->ad_category_id])}}" class="btn btn-warning" >{{ __('Back') }}</a>                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>            
                        <tr>
                            <td>
                            </td>
                        </tr>           
                        @foreach ( $ad_category_2->adCategories3 as $ad_category_3)
                        <tr scope="row" >
                            <td>
                                <a id="navbarDropdownAddCategory2" class="nav-link mx-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{  $ad_category_3->title }}
    
                                </a>
                                {{-- <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownAddCategory2">
                                    <ul>
                                        @foreach ( $ad_category_2->adCategories3 as $ad_category_3)
                                    <li>
                                        <a href="">{{  $ad_category_3->title }}</a>


                                    
                                    </li> 
                                        @endforeach
                                    </ul>

    

                                </div> --}}
                            </td>
                            {{-- <td><a href={{ route('admin.ad_category_2.show',['ad_category_2'  => $ad_category_2->id]) }} class="btn btn-warning">{{ __ ('show') }}</a></td> --}}
                            <td><a href={{ route('admin.ad_category_3.edit',['ad_category_3'  => $ad_category_3->id]) }} class="btn btn-success">{{ __ ('edit') }}</a></td>
                            <td>
                                <a href={{ route('admin.ad_category_3.delete',['ad_category_3'  => $ad_category_3->id]) }} class="btn btn-danger">{{ __ ('delete') }}</a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection