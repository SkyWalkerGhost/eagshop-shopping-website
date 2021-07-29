@extends('layouts.admin')

@section('siteTitle', 'მთავარი გვერდი')

@section('content')
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="header">
                            <h2> 
                                <i class="fa fa-plus"></i> 
                                პროდუქციის დამატება 
                            </h2>
                        </div>
                        
                        <div class="body">
                            @include('admin.pages.product.crud.store')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection