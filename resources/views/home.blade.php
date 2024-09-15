@extends('layouts.app')

@section('content')
    <div class="side-navigation">
        <div class="header pbc">
            <strong>Computer Guardian</strong>
        </div>
        <div class="nav-sect">PRIMARY</div>
        <a href="#" onclick="getView({'url':'{{ route('overview') }}','view':'ajax-view'})" class="active"><i
                class="mr-2 bi bi-house pc"></i> Overview</a>
        <a href="#" onclick="getView({'url':'{{ route('quote.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-layers pc"></i> Quotations</a>
        <a href="#" onclick="getView({'url':'{{ route('repair.index',['status' => 'booked']) }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-tools pc"></i> Repairs</a>
        <a href="#" onclick="getView({'url':'{{ route('branch.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-bank pc"></i> Branches</a>
        <a href="#" onclick="getView({'url':'/admin/services','view':'ajax-view'})"><i
                class="mr-2 bi bi-file-earmark-text pc"></i> Service categories</a>
        <a href="#" onclick="getView({'url':'{{ route('products.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-cart pc"></i> Products</a>
        <a href="#" onclick="getView({'url':'{{ route('customers.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-people pc"></i> Customers</a>
        <a href="#" onclick="getView({'url':'{{ route('courier.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-truck pc"></i> Courier</a>

        <div class="nav-sect">ADMINISTRATION</div>
        <a href="#" class="" onclick="getView({'url':'{{ route('support.index') }}','view':'ajax-view'})"><i class="mr-2 bi bi-headset pc"></i> Support</a>
        <a href="#" class="" onclick="getView({'url':'{{ route('chats.index') }}','view':'ajax-view'})"><i class="mr-2 bi bi-chat pc"></i> Chats</a>

        <div class="nav-sect">EXTRAS</div>
        <a href="#" class="" onclick="getView({'url':'{{ route('banners.index') }}','view':'ajax-view'})"><i class="mr-2 bi bi-easel2 pc"></i> App banner</a>
    </div>
    <div class="main-dashboard-view">
        <div class="header space-between pbc">
            <form id="globalSearchForm" action="#" class="search-form col-md-4">
                <i class="bi bi-search mr-2"></i><input type="text" id="globalSearch"
                    placeholder="Search customer..." style="width: calc(100% - 50px);">
            </form>
            <div class="right">
                <!-- <span class="">{{ Auth::user()->name }}</span> -->
                <a href="#"><i class="bi bi-power mr-1" style="color: #fff"></i></a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <!-- <div class="avatar"></div> -->
            </div>
        </div>
        <div class="ajax-view">
            <div class="overview-card">
                <div class="col-md-3">
                    <div class="overview-card-insight" onclick="getView({'url':'{{ route('repair.index',['status' => 'pending']) }}','view':'ajax-view'})">
                        <span>
                            <i class="bi bi-layers pc"></i><br><br>
                            Total Repairs <br><br>
                            <h4>{{ $total }}</h4>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="overview-card-insight" onclick="getView({'url':'{{ route('repair.index',['status' => 'booked']) }}','view':'ajax-view'})">
                        <span>
                            <i class="bi bi-layers-half pc"></i><br><br>
                            Booked <br><br>
                            <h4>{{ $booked }}</h4>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="overview-card-insight" onclick="getView({'url':'{{ route('repair.index',['status' => 'collected']) }}','view':'ajax-view'})">
                        <span>
                            <i class="bi bi-check-circle-fill pc"></i><br><br>
                            Collected <br><br>
                            <h4>{{ $collected }}</h4>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="overview-card-insight" onclick="getView({'url':'{{ route('repair.index',['status' => 'completed']) }}','view':'ajax-view'})">
                        <span>
                            <i class="bi bi-layers-fill pc"></i><br><br>
                            Completed <br><br>
                            <h4>{{$completed}}</h4>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="height: 100px!important;">
                <div class="header" style="font-size: 12px">RECENT ACTIVITY</div>
            </div>
        </div>
    </div>

    <div class="modal-wrapper animated fadeIn">

        <!-- Dynamic modal view -->
        <div id="updateModal" class="body animated fadeInUp"></div>
        <div id="ajaxModal" class="body animated fadeInUp"></div>

    </div>
    <div id="search-loading" class="search-loading">
        <div style="color: #fff">Searching...</div>
    </div>
@endsection
