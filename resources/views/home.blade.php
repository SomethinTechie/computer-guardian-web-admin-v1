@extends('layouts.app')

@section('content')
    <div class="side-navigation">
        <div class="header pbc">
            <strong>Computer Guardian</strong>
        </div>
        <div class="nav-sect">PRIMARY</div>
        <a href="#" onclick="getView({'url':'{{ route('dashboard') }}','view':'ajax-view'})" class="active"><i
                class="mr-2 bi bi-house pc"></i> Overview</a>
        <a href="#" onclick="getView({'url':'{{ route('parcels.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-layers pc"></i> Parcels</a>
        <a href="#" onclick="getView({'url':'{{ route('customers.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-people pc"></i> Customers</a>
        <a href="#" onclick="getView({'url':'{{ route('quotes.index') }}','view':'ajax-view'})"><i
                class="mr-2 bi bi-file-earmark-text pc"></i> Quotations</a>

        <div class="nav-sect">ADMINISTRATION</div>
        <a href="#" onclick="getView({'url':'{{route('support.index')}}','view':'ajax-view'})" class=""><i
                class="mr-2 bi bi-person-gear pc"></i> Users</a>
        <a href="#" onclick="getView({'url':'{{route('support.index')}}','view':'ajax-view'})" class=""><i
                class="mr-2 bi bi-headset pc"></i> Support</a>
    </div>
    <div class="main-dashboard-view">
        <div class="header space-between pbc">
            <form id="globalSearchForm" action="#" class="search-form col-md-4">
                <i class="bi bi-search mr-2"></i><input type="text" id="globalSearch"
                    placeholder="Search for  parcel or customer..." style="width: calc(100% - 50px);">
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
                    <div class="overview-card-insight">
                        <span>
                            <i class="bi bi-layers pc"></i><br><br>
                            Total Parcels <br><br>
                            <h4>0</h4>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="overview-card-insight">
                        <span>
                            <i class="bi bi-layers-half pc"></i><br><br>
                            Received <br><br>
                            <h4>0</h4>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="overview-card-insight">
                        <span>
                            <i class="bi bi-layers-fill pc"></i><br><br>
                            Completed <br><br>
                            <h4>0</h4>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="overview-card-insight">
                        <span>
                            <i class="bi bi-check-circle-fill pc"></i><br><br>
                            Collected <br><br>
                            <h4>0</h4>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="height: 100px!important;">
                <div class="header">RECENT ACTIVITY</div>
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
