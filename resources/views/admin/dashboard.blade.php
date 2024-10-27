@extends('admin.layout.header')
@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- seo fact area start -->
        <div class="col-lg-12 mt-4">
            <div class="row">
                <div class="col-md-6  mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-briefcase"></i>Total Categories:</div>
                                <h2>{{ $totalcategory }}</h2>
                            </div>
                            <canvas id="seolinechart1" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-user"></i>Total Users:</div>
                                <h2>{{ $totalusers }}</h2>
                            </div>
                            <canvas id="seolinechart2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg3">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bookmark-alt"></i>Total Courses:</div>
                                <h2>{{ $totalcourses }}</h2>
                            </div>
                            <canvas id="seolinechart1" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg4">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-wallet"></i>Total Lessons:</div>
                                <h2>{{ $totallessons }}</h2>
                            </div>
                            <canvas id="seolinechart2" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- seo fact area end -->
        <!-- Social Campain area start -->
        <div class="col-lg-4 mt-5">
            <div class="card">
                <div class="card-body pb-0">
                    <h4 class="header-title">Social ads Campain</h4>
                    <div id="socialads" style="height: 245px;"></div>
                </div>
            </div>
        </div>
        <!-- Social Campain area end -->
        <!-- Statistics area start -->
        <div class="col-lg-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">User Statistics</h4>
                    <div id="user-statistics"></div>
                </div>
            </div>
        </div>
        <!-- Statistics area end -->
        <!-- Advertising area start -->
      
    </div>
</div>

@endsection
