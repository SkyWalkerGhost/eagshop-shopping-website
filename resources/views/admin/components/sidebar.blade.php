<aside id="leftsidebar" class="sidebar">
    
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('back/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
            </div>
            <div class="email"> {{ auth()->user()->email }} </div>

            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:void(0);">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button type="submit"> 
                                    <i class="material-icons">input</i>
                                    გასვლა
                                </button>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="menu">
        <ul class="list">
            
            <li class="header"> სამართავი პანელი </li>
            
            <li class="active">
                <a href="{{ route('admin.index') }}">
                    <i class="material-icons">home</i>
                    <span> მთავარი გვერდი </span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.pages.product.create') }}">
                    <i class="material-icons">add_circle</i>
                    <span> პროდუქციის დამატება </span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.pages.category.index') }}">
                    <i class="material-icons">local_offer</i>
                    <span> კატეგორიის დამატება </span>
                </a>
            </li>
        
            <li>
                
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">view_list</i>
                    <span> ცხრილები </span>
                </a>
                
                <ul class="ml-menu">
            
                    <li>
                        <a href="{{ route('admin.pages.product.index') }}"> 
                            <i class="material-icons col-red">donut_large</i>
                            <span> პროდუქტების ცხრილი </span>
                             
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.pages.visitor.index') }}"> 
                            <i class="material-icons col-blue">donut_large</i>
                            <span> ვიზიტორების ცხრილი </span>
                             
                        </a>
                    </li>

                </ul>
            </li>
            
        </ul>
    </div>
    
    <div class="legal">
        <div class="copyright">
            &copy; 2021 - {{ now()->year }} 
                <a href="javascript:void(0);"> EAGSHOP.GE </a>
        </div>
     
    </div>

</aside>