@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                @if (session('msg'))
                    <div class="alert alert-{{ __(session('alert_type')) }}" role="alert">
                        {{ __(session('msg')) }}
                    </div>
                @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('All categories') }}</th>
                                <th scope="col"></th>
                                <th scope="col">
                                    <a href="{{ route('admin.ad_category.create') }} "class="btn btn-primary">{{ __ ('New category') }}</a>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ( $ad_categories as  $ad_category)
                            <tr>
                                <th scope="row">
                                    <div class="me-3">
                                        {{ ( $ad_categories->currentPage() - 1) *  $ad_categories->perPage() + $loop->iteration }}
                                     </div>
                                </th>
                                <td>
                                    <a id="navbarDropdownAddCategory2" class="nav-link mx-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    
                                            {{  $ad_category->title }}
    
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAddCategory2">
                                        <ul>
                                            @foreach ( $ad_category->adCategories2 as $ad_category_2)
                                           <li>
                                            <a href="{{ route('admin.ad_category_2.show',['ad_category_2'  => $ad_category_2->id]) }}">{{  $ad_category_2->title }}</a>
                                                <ul>
                                                    @foreach ( $ad_category_2->adCategories3 as $ad_category_3)
                                                    <li>
                                                            <a href="{{ route('admin.ad_category_3.show',['ad_category_3'=>$ad_category_3->id]) }}">{{  $ad_category_3->title }}</a>
                                                    </li>
                                                    
                                                    @endforeach
                                                </ul>
                                            
                                      
                                           </li> 
                                            @endforeach
                                        </ul>
                                           
    
                                            
                                    </div>
    
                                </td>
                                <td>
                                    <a href={{ route('admin.ad_category.show',['ad_category'  => $ad_category->id]) }} class="btn btn-warning">{{ __ ('show') }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.ad_category_2.create',['ad_category_id'  => $ad_category->id]) }}" class="btn btn-primary">{{ __('New subcategory') }}</a>
                                </td>
                                <td>
                                    <a href={{ route('admin.ad_category.edit',['ad_category'  => $ad_category->id]) }} class="btn btn-success">{{ __ ('edit') }}</a></td>
                                <td>
                                    <a href={{ route('admin.ad_category.delete',['ad_category'  => $ad_category->id]) }} class="btn btn-danger">{{ __ ('delete') }}</a>
                                </td>
                                
                               
                                
                            </tr>
                     
                        @endforeach
                        </tbody>
                    </table>
                </div>                
                {{ $ad_categories->links() }}
            </div>
        </div>
    </div>
</div>

            {{-- @foreach ( $ad_categories as  $ad_category)
            <div>
               
                @foreach ( $ad_category->adCategories2 as $ad_category2)
                <div>
                    

                    @foreach ( $ad_category2->adCategories3 as $ad_category3)
                    <div>
                        {{  $ad_category3->title }}

                    </div>
                    @endforeach


                </div>
                
                    
                @endforeach

            </div>
            @endforeach
        </div>
   </div> --}}
@endsection