@extends('layouts.admin')
    
    @section('siteTitle', 'მთავარი გვერდი')

    @section('content')
        
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2> მთავარი გვერდი </h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">

                    @include('admin.partials.info_box')

                </div>

                <div class="row clearfix">
                    <!-- Task Info -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>TASK INFOS</h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                @include('admin.partials.product_table')
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

    @endsection
    