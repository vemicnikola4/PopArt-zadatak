<nav id="home-sidebar" class="col-2 sidenav sidenav-primary bg bg-dark text-white me-3">
    <hr>
    
    <ul class="list-unstyled">
        <div class="toggle-button">
            <li>
                <a href="">{{ __('Categories')}}</a>
            </li>
        </div>
       
        <div class="hidden">
            @foreach ($ad_categories as $ad_category)
            <a id="navbarDropdownAddCategory2" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>    
                {{  $ad_category->title }}
            </a>
            <div class="dropdown-menu dropdown-menu-end  ps-2" aria-labelledby="navbarDropdownAddCategory2">
                <ul class="list-unstyled">
                    @foreach ( $ad_category->adCategories2 as $ad_category_2)
                   <li>
                    <a href="">{{  $ad_category_2->title }}</a>
                        <ul>
                            @foreach ( $ad_category_2->adCategories3 as $ad_category_3)
                            <li>
                                    <a href="">{{  $ad_category_3->title }}</a>
                            </li>
                            
                            @endforeach
                        </ul>
                    
              
                   </li> 
                    @endforeach
                </ul>
                

                    
            </div>
            
            @endforeach
        </div>
    </ul>
    <hr>
</nav>
