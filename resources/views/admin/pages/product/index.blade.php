@extends('layouts.admin')

@section('siteTitle', 'პროდუქციის ცხრილი')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                პროდუქციის სია ({{ number_format($productCount) }})
                            </h2>
                        </div>
                        
                        <div class="body">
                            @include('admin.pages.product.components.product_table')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection