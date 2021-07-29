@extends('layouts.admin')

@section('siteTitle', 'ვიზიტორების ცხრილი')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ვიზიტორები ({{ number_format($visitorCount) }})
                            </h2>
                        </div>
                        
                        <div class="body">
                            @include('admin.pages.visitor.components.visitors_table')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection