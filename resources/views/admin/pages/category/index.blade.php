@extends('layouts.admin')

@section('siteTitle', 'პროდუქციის კატეგორიების დამატება')

@section('content')

    <section class="content">
        <div class="container-fluid">
            
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> <i class="fa fa-plus"></i> ახალი კატეგორია </h2>
                        </div>

                        <div class="body">

                            @livewire('create-product-category')
                            
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        @livewire('get-product-category')
                        
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection