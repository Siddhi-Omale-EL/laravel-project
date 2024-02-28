@extends('front.layouts.main')
@section('page_title', __('Doctor Dashboard'))
@section('content')
    @php
        $allsettings = allsetting();
    @endphp

    <!-- breadcrumb area start here   -->
    <section class="breadcrumb-area cus-bg-img"
        style="background-image: url({{ asset(path_page_banner() . $allsettings['banner']) }})">
        <div class="container">
            <h2 class="page-title">
                {{ Auth::user()->role == 'doctor' ? __('Doctor Dashboard') : __('Stuff Dashboard') }}
            </h2>
            <ul class="breadcrumb-page">
                <li><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                <li>{{ __('Dashboard') }}</li>
            </ul>
        </div>
    </section>
    <!-- breadcrumb area end here   -->
    <div class="main-section-wrap section doctor-dashboard-area" id="js_variable_data" data-jsvar='{{ $doctorVariables }}'>
        <div class="container">
            <div class="section-header">
                <div class="section-header-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="tab-menu menu-style-two">
                                <ul class="nav nav-tabs justify-content-between" id="DashboardTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'dashboard' ? 'active' : '' }}"
                                            id="tabone-tab" data-toggle="tab" href="#tabone" role="tab"
                                            aria-controls="tabone" aria-selected="true">
                                            <i class="fas fa-home"></i> <span>{{ __('Dashboard') }}</span>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <i class="fas fa-calendar-check"></i>   Appointments
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding: 15px">
                                            <a class="nav-link {{ isset($tab) && $tab == 'today-appointments' ? 'active' : '' }} dropdown-item custom-font-size" id="tabeight-tab" data-toggle="tab" href="#tabeight" role="tab" aria-controls="tabeight" aria-selected="{{ isset($tab) && $tab == 'today-appointments' ? 'true' : 'false' }}" style="font-size: 16px;">
                                                <i class="fas fa-calendar-check"></i> <span>{{ __('main.Todays_Appointments') }}</span>
                                            </a>
                                            <a class="nav-link {{ isset($tab) && $tab == 'appointments' ? 'active' : '' }} dropdown-item custom-font-size" id="tabtwo-tab" data-toggle="tab" href="#tabtwo" role="tab" aria-controls="tabtwo" aria-selected="{{ isset($tab) && $tab == 'appointments' ? 'true' : 'false' }}" style="font-size: 16px;">
                                                <i class="fas fa-calendar-check"></i> <span>{{ __('All Appointments') }}</span>
                                            </a>
                                        </div>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        @forelse($pastapp as $papp)

                                        @endforeach
                                        <a class="nav-link" id="tabseven-tab" data-toggle="modal"
                                            data-target="#MakePrescription{{ $papp->id }}" title="E-Prescription"
                                            aria-selected="false">
                                            <i
                                            class="fas fa-prescription"></i><span style="cursor: pointer">{{ __('Create prescription') }}</span>
                                        </a>
                                    </li>

                                @if (Auth::check() && Auth::user()->role == 'doctor')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                          <i class="fas fa-user-cog"></i>  Manage Staff
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding: 20px; width: max-content">
                                            <a class="nav-link" id="tabfive-tab" data-toggle="tab" href="#tabfive" role="tab" aria-controls="tabfive" aria-selected="false" style="font-size: 14px;">
                                                <i class="fas fa-address-book"></i><span>{{ __('Add Staff') }}</span>
                                            </a>
                                            <a class="nav-link" id="tabseven-tab" data-toggle="tab" href="#tabseven" role="tab" aria-controls="tabseven" aria-selected="false" style="font-size: 14px;">
                                                <i class="fas fa-address-book"></i><span>{{ __('Manage Staff') }}</span>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tabnight-tab" data-toggle="tab" href="#tabnight"
                                            role="tab" aria-controls="tabnight" aria-selected="false">
                                            <i class="fas fa-cog"></i><span>{{ __('Setting') }}</span>
                                        </a>
                                    </li>

                                    {{-- <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'today-appointments' ? 'active' : '' }}"
                                            id="tabeight-tab" data-toggle="tab" href="#tabeight" role="tab"
                                            aria-controls="tabeight" aria-selected="false">
                                            <i class="fas fa-calendar-check"></i> <span>
                                                {{ __('main.Todays_Appointments') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'appointments' ? 'active' : '' }}"
                                            id="tabtwo-tab" data-toggle="tab" href="#tabtwo" role="tab"
                                            aria-controls="tabtwo" aria-selected="false">
                                            <i class="fas fa-calendar-check"></i> <span>
                                                {{ __('All Appointments') }}</span>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ isset($tab) && $tab == 'profile' ? 'active' : '' }}"
                                            id="tabfour-tab" data-toggle="tab" href="#tabfour" role="tab"
                                            aria-controls="tabfour" aria-selected="false">
                                            <i class="fas fa-user"></i><span>{{ __('profile') }}</span>
                                        </a>
                                    </li>
                                    {{-- @if (Auth::check() && Auth::user()->role == 'doctor') --}}

                                    {{-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            Manage Staff
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding: 20px; width: max-content">
                                            <a class="nav-link" id="tabfive-tab" data-toggle="tab" href="#tabfive" role="tab" aria-controls="tabfive" aria-selected="false" style="font-size: 14px;">
                                                <i class="fas fa-address-book"></i><span>{{ __('Add Staff') }}</span>
                                            </a>
                                            <a class="nav-link" id="tabseven-tab" data-toggle="tab" href="#tabseven" role="tab" aria-controls="tabseven" aria-selected="false" style="font-size: 14px;">
                                                <i class="fas fa-address-book"></i><span>{{ __('Manage Staff') }}</span>
                                            </a>
                                        </div>
                                    </li>
                                     --}}

                                        {{-- <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tabfive-tab" data-toggle="tab" href="#tabfive"
                                                role="tab" aria-controls="tabfive" aria-selected="false">
                                                <i class="fas fa-address-book"></i><span>{{ __('Add Staff') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tabseven-tab" data-toggle="tab" href="#tabseven"
                                                role="tab" aria-controls="tabseven" aria-selected="false">
                                                <i class="fas fa-address-book"></i><span>{{ __('Manage Staff') }}</span>
                                            </a>
                                        </li> --}}

                                        {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="prescriptionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('Create prescription') }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="prescriptionDropdown">
                                        @forelse($pastapp as $papp)

                                       @endforeach
                                         <a class="dropdown-item" data-toggle="modal" data-target="#MakePrescription{{ $papp->id }}" title="E-Prescription" aria-expanded="false" data-value="1">{{ __('Create prescription') }}</a>
                                        <a class="dropdown-item"  data-toggle="modal" data-target="#WithoutPrescription{{ $papp->id }}" title="E-Prescription" aria-expanded="false" data-value="0">{{ __('Prescription without prescription') }}</a>
                                    </div>
                                </li> --}}
                                        {{-- <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tabnight-tab" data-toggle="tab" href="#tabnight"
                                                role="tab" aria-controls="tabnight" aria-selected="false">
                                                <i class="fas fa-address-book"></i><span>{{ __('Setting') }}</span>
                                            </a>
                                        </li> --}}
                                        {{-- <li class="nav-item" role="presentation">
                                            @forelse($pastapp as $papp)

                                            @endforeach
                                            <a class="nav-link" id="tabseven-tab" data-toggle="modal"
                                                data-target="#MakePrescription{{ $papp->id }}" title="E-Prescription"
                                                aria-selected="false">
                                                <i
                                                class="fas fa-prescription"></i><span>{{ __('Create prescription') }}</span>
                                            </a>
                                        </li> --}}

                                        @if (Auth::check() && Auth::user()->role == 'stuff')
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tabsix-tab" data-toggle="tab" href="#tabsix"
                                                role="tab" aria-controls="tabsix" aria-selected="false">
                                                <i
                                                    class="fas fa-address-book"></i><span>{{ __('Create Appointment') }}</span>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="search-form">
                                <form action="#">
                                    <div class="search-input">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ Session::get('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ __($error) }} <br />
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="section-wraper">
                <div class="tab-content" id="DashboardTabContent">
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'dashboard' ? 'show active' : '' }}"
                        id="tabone" role="tabpanel" aria-labelledby="tabone-tab">
                        <div class="dashboard-box">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-4.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('Total Patient') }}</h4>
                                                <h2 class="counter">{{ $totalpatient }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-13.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('Pending Patient') }}</h4>
                                                <h2 class="counter color-three">{{ $pendingAppointment }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-7.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('Total Earnings') }}</h4>
                                                @if (auth()->user()->role == 'doctor')
                                                    <h2 class="counter color-four">
                                                        {{ fetchOnlineEarningByDoctor(auth()->user()->doctor->id) }}
                                                    </h2>
                                                @else
                                                    <h2 class="counter color-four">
                                                        {{ fetchOnlineEarningByDoctor($doctor->doctor->id) }}
                                                    </h2>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-12.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('Patient') }}
                                                    ({{ now()->format('F') }})</h4>
                                                <h2 class="counter">{{ $totalpatientmonth }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-11.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('Earnings') }}
                                                    ({{ now()->format('F') }})</h4>
                                                @if (auth()->user()->role == 'doctor')
                                                    <h2 class="counter color-four">{{ $totalearningmonth }}</h2>
                                                @else
                                                    <h2 class="counter color-four">{{ $totalearningmonth }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-3 col-md-6">
                                                <div class="single-box">
                                                    <div class="media align-items-center">
                                                        <img src="{{ asset('front/assets/images/box-image-10.png') }}" class="box-image mr-4" alt="{{ __('box image') }}" />
                                                        <div class="media-body">
                                                            <h4 class="counter-title mt-0">{{ __('Online') }}
                                                                ({{ now()->format('F') }})</h4>
                                                            @if (auth()->user()->role == 'doctor')
                                                            <h2 class="counter color-four">{{ $total_online_earning_month }}
                                                            </h2>
@else
    <h2 class="counter color-four">{{ $total_online_earning_month }}
                                                            </h2>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="single-box">
                                        <div class="media align-items-center">
                                            <img src="{{ asset('front/assets/images/box-image-9.png') }}"
                                                class="box-image mr-4" alt="{{ __('box image') }}" />
                                            <div class="media-body">
                                                <h4 class="counter-title mt-0">{{ __('Total Pay Out') }} </h4>
                                                <h2 class="counter color-four">
                                                    @if (auth()->user()->role == 'doctor')
                                                        {{ admintopay(auth()->user()->doctor->id) }}
                                                    @else
                                                        {{ admintopay($doctor->doctor->id) }}
                                                    @endif
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <a href="{{ route('doctor.financialReport') }}">
                                        <div class="single-box report-box">
                                            <div class="media align-items-center">
                                                <img src="{{ asset('front/assets/images/box-image-8.png') }}"
                                                    class="box-image mr-4" alt="{{ __('box image') }}" />
                                                <div class="media-body">
                                                    <h4 class="counter-title mt-0">{{ __('Financial Report') }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-heading-area section-heading-area-dashboard">
                            <h2 class="section-title">{{ __('Appointment Requests') }}</h2>
                            <!-- dashboard appointment request -->
                        </div>
                        <div class="primary-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('Patient Name') }}</th>
                                            <th scope="col">{{ __('Date') }}</th>
                                            <th scope="col">{{ __('Time') }}</th>
                                            <th scope="col">{{ __('Type') }}</th>
                                            <th scope="col">{{ __('Status') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dashboardpagi" class="accordion">
                                        @include('front.pages.doctordashboardpagi')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'appointments' ? 'show active' : '' }}"
                        id="tabtwo" role="tabpanel" aria-labelledby="tabtwo-tab">
                        <div class="section-inner-header section-heading-area">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h2 class="section-title">{{ __('All Appointment') }}</h2>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner-header-right">
                                        <div class="appoinment-search">
                                            <form action="#">
                                                <div class="input-wrap">
                                                    <div class="search-input">
                                                        <input type="text" class="form-control"
                                                            name="appoinmentsearch" id="appoinmentsearch"
                                                            placeholder="{{ __('Search Your Appointment') }}" />
                                                        <button class="search-btn"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <div class="date-input">
                                                        <input type="text" class="form-control" name="appoinmentdate"
                                                            id="appoinmentdate" placeholder="{{ __('Search Date') }}" />
                                                        <span class="form-icon"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="AppominmentTabContent">
                            <div class="tab-pane fade" id="TodayAppominment" role="tabpanel"
                                aria-labelledby="TodayAppominment-tab">
                                @include('front.pages.doctor_today_pagination')
                                <div class="primary-table d-none" id="searchheadtoday">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Patient Name') }}</th>
                                                    <th scope="col">{{ __('Date') }}</th>
                                                    <th scope="col">{{ __('Time') }}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Status') }}</th>
                                                    <th scope="col">{{ __('Prescription') }}</th>
                                                    @if (Auth::user()->role == 'doctor')
                                                        <th scope="col">{{ __('Meeting') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="searchbodytoday">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="PastAppominment" role="tabpanel"
                                aria-labelledby="PastAppominment-tab">
                                @include('front.pages.doctor_past_pagination')
                                <!-- searchtable start -->
                                <div class="primary-table d-none" id="searchhead">
                                    <div class="table-responsive">
                                        <table class="table" id="todaypagination">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Patient Name') }}</th>
                                                    <th scope="col">{{ __('Date') }}</th>
                                                    <th scope="col">{{ __('Time') }}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Status') }}</th>
                                                    <th scope="col">{{ __('Prescription') }}</th>
                                                    @if (Auth::user()->role == 'doctor')
                                                        <th scope="col">{{ __('Meeting') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="searchbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- searchtable end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $medicareDetail = App\Models\MedicareDetail::where('user_id', auth()->user()->id)->first();
                    @endphp
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'profile' ? 'show active' : '' }}" id="tabfour"
                        role="tabpanel" aria-labelledby="tabfour-tab">
                        <div class="section-heading-area">
                            <h2 class="section-title">{{ __('Profile') }}</h2>
                        </div>
                        <div class="profile-area">
                            <div class="profile-bottom">
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4">
                                                <div class="profile-top">
                                                    <div class="profile-thumbnail">
                                                        <img src="{{ isset(Auth::user()->image) ? asset(path_user_image() . Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64() }}"
                                                            class="profile-image mr-3" alt="{{ __('profile') }}" />
                                                    </div>
                                                    <div class="profile-info">
                                                        <h3 class="user-name mt-0">{{ Auth::user()->name }}</h3>
                                                        <h4 class="user-age">{{ __('Age:') }}
                                                            {{ Auth::user()->age }} {{ __('Years') }}
                                                        </h4>
                                                        <button class="profile-btn" type="button" data-toggle="modal"
                                                            data-target="#editeprofilemodal"><i class="far fa-edit"></i>
                                                            {{ __('Edit Info') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-8">
                                                <div class="profile-left">
                                                    <div class="secondary-form">
                                                        <form>
                                                            <h3 class="form-title">
                                                                {{ __('Basic Information') }}
                                                            </h3>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Email') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->email }}"
                                                                            readonly />
                                                                        <span
                                                                            class="text-danger">{{ __($errors->first('email')) }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Mobile') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->mobile }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Gender') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->gender }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('BirthDate') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ date('d M Y', strtotime(Auth::user()->dob)) }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Prescriber Number') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $medicareDetail ? $medicareDetail->prescriber_number : '-' }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="form-title mt-20">
                                                                {{ __('Address Information') }}
                                                            </h3>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Street Address') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->address }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('City') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->city }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Zip Code') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ Auth::user()->code }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="form-title mt-20">
                                                                {{ __('Medicare Information') }}
                                                            </h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Card Name') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $medicareDetail ? $medicareDetail->card_name : '-' }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Individual Reference Number') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $medicareDetail ? $medicareDetail->individual_reference_number : '-' }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Card Number') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $medicareDetail ? $medicareDetail->card_number : '-' }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>{{ __('Expiry Date') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $medicareDetail ? $medicareDetail->exp_date : '-' }}"
                                                                            readonly />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="form-title mt-20">
                                                                {{ __('Signature') }}
                                                            </h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if (Auth::user()->signature)
                                                                        <img src="{{ asset('storage/signature/' . Auth::user()->signature) }}"
                                                                            alt="Signature">
                                                                    @else
                                                                        <h4>-</h4>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabfive" role="tabpanel" aria-labelledby="tabfive-tab">
                        <div class="add-stuff-area">
                            <div class="add-stuff-bottom">
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="section-heading-area">
                                                    <h2 class="section-title">{{ __('Add Staff') }}</h2>
                                                </div>

                                                <form method="POST" action="{{ route('stuff.add') }}">
                                                    @csrf
                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group">
                                                                    <i class="far fa-user"></i>
                                                                    <input type="text" name="fname"
                                                                        class="form-control"
                                                                        placeholder="{{ __('First name') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group">
                                                                    <i class="far fa-user"></i>
                                                                    <input type="text" name="lname"
                                                                        class="form-control"
                                                                        placeholder="{{ __('Last name') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="input-group">
                                                                    <i class="far fa-envelope"></i>
                                                                    <input type="email" name="email"
                                                                        class="form-control"
                                                                        placeholder="{{ __('Email') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group mb-0 position-relative">
                                                                    <i class="fas fa-lock"></i>
                                                                    <input class="form-control" name="password"
                                                                        id="passInput"
                                                                        placeholder="{{ __('Password') }}"
                                                                        type="password">
                                                                    <i class="fas fa-eye" id="showPass"></i>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group mb-0 position-relative">
                                                                    <i class="fas fa-lock"></i>
                                                                    <input class="form-control" name="confirm_password"
                                                                        id="passConfirmInput"
                                                                        placeholder="{{ __('Confirm Password') }}d"
                                                                        type="password">
                                                                    <i class="fas fa-eye" id="showConfirmPass"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                            <div class="form-group mb-0">
                                                                <div class="form-check generate-default-password">
                                                                    <input class="form-check-input default-pass"
                                                                        type="checkbox" id="gridCheck">
                                                                    <label class="form-check-label" for="gridCheck">
                                                                        {{ __('main.check_field_default_pass') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Save Staff') }}</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabsix" role="tabpanel" aria-labelledby="tabsix-tab">
                        <div class="add-stuff-area">
                            <div class="add-stuff-bottom">
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="section-heading-area">
                                                    <h2 class="section-title">{{ __('Create Appointment') }}</h2>
                                                </div>

                                                <form action="{{ route('stuff.create_appointment') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="doctor_id"
                                                        value="{{ auth()->user()->role == 'stuff' ? $doctor->doctor->id : '' }}">
                                                    <input type="hidden" name="doctorsService"
                                                        value="{{ auth()->user()->role == 'stuff' ? $doctor->doctor->specialist : '' }}">
                                                    <input type="hidden" name="fees"
                                                        value="{{ auth()->user()->role == 'stuff' ? $doctor->doctor->fees : '' }}">
                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group">
                                                                    <i class="far fa-user"></i>
                                                                    <input type="text" class="form-control"
                                                                        name="fname"
                                                                        placeholder="{{ __('First name') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group">
                                                                    <i class="far fa-user"></i>
                                                                    <input type="text" class="form-control"
                                                                        name="lname"
                                                                        placeholder="{{ __('Last name') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class="input-group">
                                                                    <i class="far fa-envelope"></i>
                                                                    <input type="email" class="form-control"
                                                                        name="email"
                                                                        placeholder="{{ __('Email') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group">
                                                                    <i class="fas fa-calendar"></i>
                                                                    <input type="date" name="app_date"
                                                                        class="form-control"
                                                                        placeholder="{{ __('Date') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="input-group">
                                                                    <i class="fas fa-business-time"></i>
                                                                    <select name="slot_id" class="form-control">
                                                                        @foreach ($docslots as $docslot)
                                                                            <option value="{{ $docslot->id }}">
                                                                                {{ Carbon\Carbon::parse($docslot->start_time)->format('h:i A') }}-{{ Carbon\Carbon::parse($docslot->end_time)->format('h:i A') }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <div class=" mb-0 position-relative">
                                                                    <textarea name="comment" class="stuff-create-appointment-" cols="30" rows="10"
                                                                        placeholder="{{ __('Write something') }}"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Create Appointment') }}</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabseven" role="tabpanel" aria-labelledby="tabseven-tab">
                        <div class="section-heading-area">
                            <h2 class="section-title">{{ __('Manage Staff') }}</h2>
                        </div>
                        <div class="primary-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('Name') }}</th>
                                            <th scope="col">{{ __('Email') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($stuffs as $stuff)
                                            <tr>
                                                <td>{{ $stuff->name }}</td>
                                                <td>{{ $stuff->email }}</td>
                                                <td>
                                                    <ul class="action-area">
                                                        <li><a class="delet-btn action-btn"
                                                                href="{{ route('stuff.delete', $stuff->id) }}"><i
                                                                    class="fas fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    No staff found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ isset($tab) && $tab == 'today-appointment' ? 'show active' : '' }}"
                        id="tabeight" role="tabpanel" aria-labelledby="tabeight-tab">
                        <div class="section-heading-area">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="section-title">{{ __('main.Todays_Appointments') }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                @include('front.pages.doctor_today_pagination')
                                <div class="primary-table d-none" id="searchheadtoday">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Patient Name') }}</th>
                                                    <th scope="col">{{ __('Date') }}</th>
                                                    <th scope="col">{{ __('Time') }}</th>
                                                    <th scope="col">{{ __('Type') }}</th>
                                                    <th scope="col">{{ __('Status') }}</th>
                                                    <th scope="col">{{ __('Prescription') }}</th>
                                                    @if (Auth::user()->role == 'doctor')
                                                        <th scope="col">{{ __('Meeting') }}</th>
                                                    @endif
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="searchbodytoday">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabnight" role="tabpanel" aria-labelledby="tabnight-tab">
                        <div class="two-auth">
                            <h2 class="fs-24">Two Factor Authentication</h2>
                            <div class="section-heading-area">
                                <h2 class="fs-24">Protecting your account is our higherst priority</h2>
                                <h3 class="fw-300">For your account security, you can enable your email Two Factor
                                    Authentication</h3>
                            </div>
                            <div class="auth">
                                <div class="detail">
                                    <h3>Two Factor Authentication</h3>
                                    <div class="switch_box box_1">
                                        <input type="checkbox" class="switch_1" id="toggleSwitch"
                                            @if (Auth()->user()->is_2FA == 1) checked @endif>
                                    </div>
                                </div>
                                <p>We'll send a randomized 4-digit code to <span>{{ Auth()->user()->email }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editeprofilemodal">
        <div class="modal-dialog modal-dialog-centered editeprofilemodal">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="section-heading-area">
                        <h2 class="section-title">{{ __('Edit Profile') }}</h2>
                    </div>
                    <div class="edite-profile-area">
                        <div class="primary-form">
                            <form action="{{ route('user.profile', auth()->user()->id) }}" method="POST"
                                id="editform" enctype="multipart/form-data">
                                @csrf
                                <div class="profile-image-area">
                                    <div class="profile-image">
                                        <span id="openfile">
                                            <img id="target" class="cus-doctor-img-edit"
                                                src="{{ isset(Auth::user()->image) ? asset(path_user_image() . Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64() }}">
                                        </span>
                                    </div>
                                    <div class="custom-fileuplode">
                                        <input type="file" id="file-input" name="image" class="form-control-file">
                                    </div>
                                </div>
                                <h4 class="form-inner-title">{{ __('Basic Information') }}</h4>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name"><span style="color: red;">*
                                                </span>{{ __('Name') }}</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ Auth::user()->name }}"
                                                placeholder="{{ isset(Auth::user()->name) ? Auth::user()->name : __('Enter your name') }}"
                                                required />
                                            <small
                                                class="text-danger d-none nameerror">{{ __('Name field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email"><span style="color: red;">*
                                                </span>{{ __('Email') }}</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ Auth::user()->email }}"
                                                placeholder="{{ isset(Auth::user()->email) ? Auth::user()->email : __('Enter your email') }}" />
                                            <small
                                                class=" text-danger d-none emailerror">{{ __('Email field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile"><span style="color: red;">*
                                                </span>{{ __('Mobile') }}</label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                value="{{ Auth::user()->mobile }}"
                                                placeholder="{{ isset(Auth::user()->mobile) ? Auth::user()->mobile : __('Enter your mobile') }}" />
                                            <small
                                                class=" text-danger d-none mobileerror">{{ __('Mobile field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob"><span style="color: red;">*
                                                </span>{{ __('Date of Birth') }}</label>
                                            <input type="date" class="form-control" name="dob" id="dob"
                                                value="{{ date('Y-m-d', strtotime(Auth::user()->dob)) }}"
                                                placeholder="{{ isset(Auth::user()->dob) ? Auth::user()->dob : __('Enter your date of birth') }}" />
                                            <small
                                                class=" text-danger d-none doberror">{{ __('Date field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="age"><span style="color: red;">*
                                                </span>{{ __('Age') }}</label>
                                            <input type="text" class="form-control" name="age" id="age"
                                                value="{{ Auth::user()->age }}"
                                                placeholder="{{ isset(Auth::user()->age) ? Auth::user()->age : __('Enter your age') }}" />
                                            <small
                                                class=" text-danger d-none ageerror">{{ __('Age field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prescriber_number"><span style="color: red;">*
                                                </span>{{ __('Prescriber Number') }}</label>
                                            <input type="number" class="form-control" name="prescriber_number"
                                                id="prescriber_number"
                                                value="{{ $medicareDetail ? $medicareDetail->prescriber_number : ' ' }}"
                                                placeholder="Enter prescriber number" />
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="medical_reg_num">{{ __('Medical Registration Number') }}</label>
                                                        <input type="text" class="form-control" name="medical_reg_num" id="medical_reg_num" value="{{ Auth::user()->medical_reg_num }}" placeholder="{{ isset(Auth::user()->medical_reg_num) ? Auth::user()->medical_reg_num : __('Medical registration number') }}" />
                                                        <small class=" text-danger d-none medical_reg_numerror">{{ __('Medical registration number field is required') }}</small>
                                                    </div>
                                                </div> -->
                                    <div class="col-md-8">
                                        <div class="gender-group">
                                            <span>{{ __('Gender:') }}</span>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="male" value="male"
                                                    @if (isset(Auth::user()->gender)) @if (Auth::user()->gender == 'male') checked @endif
                                                    @endif>
                                                <label class="form-check-label" for="male">
                                                    {{ __('Male') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="female" value="female"
                                                    @if (isset(Auth::user()->gender)) @if (Auth::user()->gender == 'female') checked @endif
                                                    @endif>
                                                <label class="form-check-label" for="female">
                                                    {{ __('Female') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="gender-group">
                                            <span>{{ __('PBS / RPBS:') }}</span>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pbs_status"
                                                    id="yes" value="yes"
                                                    @if (isset(Auth::user()->pbs_status)) @if (Auth::user()->pbs_status == 'yes') checked @endif
                                                    @endif>
                                                <label class="form-check-label" for="yes">
                                                    {{ __('Yes') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pbs_status"
                                                    id="no" value="no"
                                                    @if (isset(Auth::user()->pbs_status)) @if (Auth::user()->pbs_status == 'no') checked @endif
                                                    @endif>
                                                <label class="form-check-label" for="no">
                                                    {{ __('No') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-inner-title">{{ __('Address Information') }}</h4>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">{{ __('Address') }}</label>
                                            <input type="text" class="form-control" name="address" id="address"
                                                value="{{ Auth::user()->address }}" placeholder="Enter your address" />
                                            <small
                                                class=" text-danger d-none addresserror">{{ __('Address field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">{{ __('City') }}</label>
                                            <input type="text" class="form-control" name="city" id="city"
                                                value="{{ Auth::user()->city }}" placeholder="Enter your city" />
                                            <small
                                                class=" text-danger d-none cityerror">{{ __('City field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="code">{{ __('Code') }}</label>
                                            <input type="text" class="form-control" name="code" id="code"
                                                value="{{ Auth::user()->code }}" placeholder="Enter your code" />
                                            <small
                                                class=" text-danger d-none codeerror">{{ __('Code field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4 class="form-inner-title">{{ __('About Yourself') }}</h4>
                                            <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{ isset(Auth::user()->bio) ? Auth::user()->bio : '' }}</textarea>
                                            <small
                                                class=" text-danger d-none bioerror">{{ __('About field is required') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-inner-title">{{ __('Medicare Information') }}</h4>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="card_name"><span style="color: red;">*
                                                </span>{{ __('Card name') }}</label>
                                            <input type="text" class="form-control" name="card_name" id="card_name"
                                                value="{{ $medicareDetail ? $medicareDetail->card_name : ' ' }}"
                                                placeholder="Enter your card name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="individual_reference_number"><span style="color: red;">*
                                                </span>{{ __('Individual Reference Number') }}</label>
                                            <input type="number" class="form-control" name="individual_reference_number"
                                                id="individual_reference_number"
                                                value="{{ $medicareDetail ? $medicareDetail->individual_reference_number : '' }}"
                                                placeholder="Individual reference number" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="card_number"><span style="color: red;">*
                                                </span>{{ __('Card Number') }}</label>
                                            <input type="text" class="form-control" name="card_number"
                                                id="card_number" pattern="[0-9]{13,19}" maxlength="12"
                                                value="{{ $medicareDetail ? $medicareDetail->card_number : '' }}"
                                                placeholder="Enter your card number" />
                                            <small
                                                class=" text-danger d-none card_numbererror">{{ __('Card Number field is required') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exp_date"><span style="color: red;">*
                                                </span>{{ __('Expiry Date') }}</label>
                                            <input type="month" class="form-control" name="exp_date" id="exp_date"
                                                value="{{ $medicareDetail ? $medicareDetail->exp_date : '' }}" />
                                            <small
                                                class=" text-danger d-none exp_dateerror">{{ __('Expiry Date field is required') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-inner-title">{{ __('Signature') }}</h4>
                                <div id="signature-pad" class="signature-pad signature_pad_custome">
                                    <div class="signature_pad_wrapper">
                                        <canvas id="signature-canvas"></canvas>
                                    </div>
                                    <button type="button" id="clear">Clear</button>
                                </div>
                                <input type="hidden" id="signature" name="signature">
                                <div class="">
                                    <button class="primary-btn changesave"
                                        type="submit">{{ __('Changes Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Profile Modal -->
    <!-- MakePrescription  Modal -->
    {{-- @foreach ($todaysapp as $app) --}}
    @foreach ($appointment as $app)


        <div class="modal fade" id="MakePrescription{{ $app->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <div class="prescription-top">
                                <h2 class="section-title">{{ __('All Appointment') }}
                                    <span>{{ __('Make Prescription') }}</span>
                                </h2>
                                <div class="edit-prescription-area">
                                    <form action="{{ route('prescription', $app->id) }}" method="POST" class="create-form" id="createform{{ $app->id }}">
                                        @csrf
                                        <div class="edit-prescription-form">
                                            <div class="form-top mb-30">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="button-container">
                                                                <button type="button" onclick="toggleDropdown({{ $app->id }})" class="primary-btn mr-1" id="toggleDropdown{{ $app->id }}">Create Prescription</button>
                                                                <button type="button" onclick="toggleFields({{ $app->id }})"  class="primary-btn mr-1">Without Appointment Prescription</button>
                                                            </div>
                                                            {{-- <button onclick="toggleDropdown({{ $app->id }})" class="primary-btn mr-1"  id="toggleDropdown{{ $app->id }}">Create Prescription</button> --}}
                                                            <label id="Dropdownlabel{{ $app->id }}" style="display: none;"><b>{{ __('Patient personal information') }}</b></label>
                                                            <select id="patientDropdown{{ $app->id }}"  name="selectedPatient" class="form-control patient_id" style="display: none;">

                                                                <option value="">{{ __('Patient Name') }}</option>

                                                                @foreach ($data['patient'] as $patient)
                                                                <option value="{{ $patient->id }}" data-patient-id="{{ $patient->id }}" data-app-id="{{ $app->id }}">
                                                                    {{ $patient->name }}
                                                                </option>

                                                                @endforeach
                                                            </select>

                                                            @foreach ($data['patient'] as $patient)
                                                            <div id="{{ $app->id }}patientDetails{{ $patient->id }}" style="display: none;" class="info">
                                                                                                                                <!-- Patient details will be displayed here -->
                                                                <div class="patient-info-container">
                                                                    <!-- Name -->
                                                                    <div style="margin-right: 10px;">
                                                                        <div class="form-group">
                                                                            <label for="patient_name">{{ __('Name') }}</label>
                                                                            <input type="text" class="form-control" id="patient_name" name="patient_name" value="{{ $patient->name }}" style="width: 200px;" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Age -->
                                                                    <div style="margin-right: 10px;">
                                                                        <div class="form-group">
                                                                            <label for="patient_email">{{ __('Email') }}</label>
                                                                            <input type="text" class="form-control" id="patient_email" name="patient_email" value="{{ $patient->email }}" style="width: 200px;" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Phone No -->
                                                                    <div style="margin-right: 10px;">
                                                                        <div class="form-group">
                                                                            <label for="patient_phone">{{ __('Phone number') }}</label>
                                                                            <input type="number" class="form-control" id="patient_phone" name="patient_phone" value="{{ $patient->mobile }}" style="width: 200px;" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Gender -->
                                                                    <div style="margin-right: 10px;">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <label
                                                                                    for="patient_gender">{{ __('Gender') }}</label>
                                                                                    <select class="form-control" id="patient_gender" name="patient_gender" style="width: 200px;" readonly>
                                                                                        <option value="{{ $patient->gender }}">{{ $patient->gender }}</option>
                                                                                    </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="prescription-header">
                                                    <div class="row">
                                                        <div class="col-lg-7">

                                                            {{-- <button onclick="toggleFields({{ $app->id }})" class="primary-btn mr-1" id="toggleFields{{ $app->id }}">Without Appointment Prescription</button> --}}
                                                            <div id="infoContainer{{ $app->id }}" class="patient"
                                                                style="display: none;">
                                                                <!-- Patient ID input field initially hidden -->

                                                                <!-- Name input field initially hidden -->
                                                                <div style="margin-right: 10px;">
                                                                    <div class="form-group">
                                                                        <label for="patient_name">{{ __('Name') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            id="patient_name" name="patient_name"
                                                                            placeholder="{{ __('Name') }}"
                                                                            style="width: 200px;" />
                                                                    </div>
                                                                </div>

                                                                <!-- Email input field initially hidden -->
                                                                <div style="margin-right: 10px;">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="patient_email">{{ __('Email') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            id="patient_email{{ $app->id }}" name="patient_email"
                                                                            placeholder="{{ __('Email') }}"
                                                                            style="width: 200px;" />
                                                                    </div>
                                                                </div>

                                                                <!-- Phone number input field initially hidden -->
                                                                <div style="margin-right: 10px;">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="patient_phone">{{ __('Phone no') }}</label>
                                                                        <input type="number" class="form-control"
                                                                            id="patient_phone{{ $app->id }}" name="patient_phone"
                                                                            placeholder="{{ __('Phone number') }}"
                                                                            style="width: 200px;" />
                                                                    </div>
                                                                </div>


                                                                <!-- Address input field initially hidden -->
                                                                <div style="margin-right: 10px;">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="patient_address">{{ __('Address') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            id="patient_address" name="patient_address"
                                                                            placeholder="{{ __('Address') }}"
                                                                            style="width: 200px;" />
                                                                    </div>
                                                                </div>

                                                                <!-- Gender input field initially hidden -->
                                                                <div style="margin-right: 10px;">
                                                                    <div class="form-group">
                                                                        <div>
                                                                            <label for="patient_gender">{{ __('Gender') }}</label>
                                                                            <select class="form-control" id="patient_gender{{ $app->id }}" name="patient_gender" style="width: 200px;">
                                                                                <option value="" disabled selected>{{ __('Select Gender') }}</option>
                                                                                <option value="male">Male</option>
                                                                                <option value="female">Female</option>
                                                                                <option value="other">Other</option>
                                                                            </select>
                                                                            {{-- <span class="error">Please provide gender.</span> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="form-top mb-30">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 col-sm-6">

                                                            </div>
                                                            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="PatientBP">{{ __('Patient BP') }}</label>
                                                                            <input type="number" class="form-control" id="PatientBP" name="PatientBP" placeholder="{{ __('BP') }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="PatientTemperature">{{ __('Patient Temperature') }}</label>
                                                                            <input type="number" class="form-control" id="PatientTemperature" name="PatientTemperature" placeholder="{{ __('Temperature') }}" />
                                                                        </div>
                                                                    </div> -->
                                                            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                                                        <div class="form-group"><br/><br/>
                                                            <label for="patient_age">{{ __('Age') }}</label>
                                                            <input type="number" class="form-control" id="patient_age" name="patient_age" placeholder="{{ __('Age') }}" required />
                                                        </div>
                                                    </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prescription-body">
                                                    <div class="medicine-area mb-40">
                                                        <div class="primary-table-three">
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless" id="medicine_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">
                                                                                {{ __('Medicine Name') }}
                                                                            </th>
                                                                            <th scope="col">{{ __('Type') }}</th>
                                                                            <th scope="col">{{ __('Mg/Ml') }}</th>
                                                                            <th scope="col">{{ __('Dose') }}</th>
                                                                            <th scope="col">{{ __('Day') }}</th>
                                                                            <th scope="col" colspan="2">
                                                                                {{ __('Comment') }}
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="medicine" class='prescriptionMedicineTbody'>
                                                                        @if ($errors->any())
                                                                            <div id="error-box">
                                                                                <p class="text-danger">
                                                                                    {{ __('Please fill up all the field') }}
                                                                                </p>
                                                                            </div>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <a class="add-btn" id="add-tablebtn" href="javascript:void(0)"><i
                                                                class="fas fa-plus"></i>{{ __('Add') }}</a>
                                                    </div>
                                                    <div class="test-area mb-40">
                                                        <div class="primary-table-three">
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">{{ __('Repeats') }}</th>
                                                                            <th scope="col" colspan="2">
                                                                                {{ __('Follow Ups') }}
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="testtable" class="prescriptionTestTbody">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <a class="add-btn" id="add-testbtn" href="javascript:void(0)"><i
                                                                class="fas fa-plus"></i> {{ __('Add') }}</a>
                                                    </div>
                                                    <div class="advice-area mt-3 mb-40">
                                                        <div class="form-group">
                                                            <label for="advice{{ $app->id }}">{{ __('Advice') }}</label>
                                                            <input type="text" class="form-control" name="advice" id="advice{{ $app->id }}" placeholder="{{ __('Advice') }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prescription-footer text-right">
                                                    <button  type="submit" id="presBtnSubmit"
                                                        class="primary-btn mr-2">{{ __('Confirm') }}</button>
                                                </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="EReferral{{ $app->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal modal_refferal">
                <div class="modal-content">
                    <div class="modal-header custome_header">
                        <h2 class="section-title">{{ __('eReferral') }}</h2>
                        <button type="button" class="closed" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <div class="prescription-top">
                                <!-- <h2 class="section-title">{{ __('eReferral') }} -->
                                <!-- <span>{{ __('Make Prescription') }}</span> -->
                                <!-- </h2> -->
                                <div class="edit-prescription-area">
                                    <div class="edit-prescription-form">
                                        <form action="{{ route('referral', $app->id) }}" method="POST" class="eReferral-form" id="eReferral-form{{ $app->id }}">
                                            @csrf
                                            <div class="prescription-body">
                                                <div class="row">
                                                    <!-- <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Patient Information</label>
                                                                    <textarea class="form-control h-auto" name="patient_info" id="patient_info" rows="4" cols="50"
                                                                        placeholder="{{ __('Patient Information') }}">{{ old('patient_info') }}</textarea>
                                                                </div>
                                                            </div> -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Referring Doctor</label>
                                                            <!-- <textarea class="form-control h-auto" name="referring_doctor" id="referring_doctor" rows="4"
                                                                cols="50" placeholder="{{ __('Referring Doctor/Specialist') }}">{{ old('referring_doctor') }}</textarea> -->
                                                            <input type="text" class="form-control"
                                                                name="referring_doctor" id="referring_doctor{{$app->id}}"
                                                                value="{{ old('referring_doctor') }}"
                                                                placeholder="Enter doctor name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Specialist</label>
                                                            <!-- <textarea class="form-control h-auto" name="referring_doctor" id="referring_doctor" rows="4"
                                                                cols="50" placeholder="{{ __('Referring Doctor/Specialist') }}">{{ old('referring_doctor') }}</textarea> -->
                                                            <input type="text" class="form-control"
                                                                name="specialty" id="specialty{{$app->id}}"
                                                                value="{{ old('specialty') }}"
                                                                placeholder="Specialty" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Doctor Email</label>
                                                            <input type="text" class="form-control"
                                                                name="ref_doctor_email" id="ref_doctor_email{{$app->id}}"
                                                                value="{{ old('ref_doctor_email') }}"
                                                                placeholder="Enter doctor email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Doctor Mobile</label>
                                                            <input type="number" class="form-control"
                                                                name="ref_doctor_mobile" id="ref_doctor_mobile{{$app->id}}"
                                                                value="{{ old('ref_doctor_mobile') }}"
                                                                placeholder="Enter doctor mobile" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Doctor Address</label>
                                                            <textarea class="form-control h-auto" name="ref_doctor_address" id="ref_doctor_address{{$app->id}}" rows="3"
                                                                cols="50" placeholder="{{ __('Enter doctor address') }}">{{ old('ref_doctor_address') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Situation</label>
                                                            <textarea class="form-control h-auto" name="situation" id="situation{{$app->id}}" rows="4" cols="50"
                                                                placeholder="{{ __('Situation') }}">{{ old('situation') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Medical History</label>
                                                            <textarea class="form-control h-auto" name="medical_history" id="medical_history{{$app->id}}" rows="4"
                                                                cols="50" placeholder="{{ __('Medical History') }}">{{ old('medical_history') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Examination & Assessment</label>
                                                            <textarea class="form-control h-auto" name="examination_assessment" id="examination_assessment{{$app->id}}" rows="4"
                                                                cols="50" placeholder="{{ __('Examination & Assessment') }}">{{ old('examination_assessment') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Request</label>
                                                            <textarea class="form-control h-auto" name="request" id="request{{$app->id}}" rows="4" cols="50"
                                                                placeholder="{{ __('Request') }}">{{ old('request') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-btn btn_large ">
                                                <button type="submit" id="nextBtn"
                                                    class="add-btn">{{ __('Submit') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    <!-- MakePrescription  Modal -->
    @foreach ($pastappModal as $vapp)
        <!-- ViewPrescription  Modal -->
        <div class="modal fade" id="ViewPrescription{{ $vapp->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <div class="prescription-top mb-30">
                                <h2 class="section-title">{{ __('All Appointment') }} <span>/
                                        {{ __('View Prescription') }}</span></h2>
                            </div>
                            <div class="prescription-area">
                                <div id="printable">
                                    <div class="prescription-header mb-30">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="prescription-header-left">
                                                    <h3>{{ isset($vapp->doctor->user->name) ? $vapp->doctor->user->name : '' }}
                                                    </h3>
                                                    <!-- <span>{{ isset($vapp->doctor->specialist) ? $vapp->doctor->specialist : '' }}</span> -->
                                                    <h4>{{ $vapp->doctorsService }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="prescription-header-center">
                                                    <p>{{ $vapp->degree }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="prescription-header-right">
                                                    <div class="prescription-timing mb-2">
                                                        <h4>{{ __('Offday-') }}
                                                            {{ isset($vapp->doctor->offday) ? $vapp->doctor->offday : '' }}day
                                                        </h4>
                                                        @if (isset($vapp->doctor->starttime) && isset($vapp->doctor->endtime))
                                                            <span>{{ Carbon\Carbon::parse($vapp->doctor->starttime)->format('h:i A') }}-{{ Carbon\Carbon::parse($vapp->doctor->endtime)->format('h:i A') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="prescription-timing">
                                                        @if (isset($vapp->doctor->starttime2) && isset($vapp->doctor->endtime2))
                                                            <span>{{ Carbon\Carbon::parse($vapp->doctor->starttime2)->format('h:i A') }}-{{ Carbon\Carbon::parse($vapp->doctor->endtime2)->format('h:i A') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prescription-date mb-30">
                                        <p>{{ __('Appointment Date:') }}
                                            {{ Carbon\Carbon::parse($vapp->adddate)->format('d M, Y, D') }} ,
                                            {{ $vapp->slot ? Carbon\Carbon::parse($vapp->slot->start_time ?? '')->format('H:i A') : 'N/A' }}-{{ Carbon\Carbon::parse($vapp->slot->end_time ?? '')->format('H:i A') }}
                                        </p>
                                    </div>
                                    <div class="prescription-body ">
                                        <div class="prescription-info mb-30">
                                            <h3 class="prescription-section-title mb-3">{{ __('Medicine:') }}</h3>
                                            <div class="primary-table">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">{{ __('Medicine Name') }}</th>
                                                                <th scope="col">{{ __('Type') }}</th>
                                                                <th scope="col">{{ __('Mg/Ml') }}</th>
                                                                <th scope="col">{{ __('Dose') }}</th>
                                                                <th scope="col">{{ __('Day') }}</th>
                                                                <th scope="col">{{ __('Comments') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($vapp->prescription as $key => $prescription)
                                                                @if (is_array(json_decode($prescription->medicine_name, true)))
                                                                    @php
                                                                        $type = json_decode($prescription->medicine_type, true);
                                                                        $quantity = json_decode($prescription->medicine_quantity, true);
                                                                        $dose = json_decode($prescription->medicine_dose, true);
                                                                        $day = json_decode($prescription->medicine_day, true);
                                                                        $comment = json_decode($prescription->medicine_comment, true);
                                                                    @endphp
                                                                    @foreach (json_decode($prescription->medicine_name, true) as $key1 => $medicine)
                                                                        <tr>
                                                                            <td>{{ $medicine }}</td>
                                                                            <td>{{ $type[$key1] }}</td>
                                                                            <td>{{ $quantity[$key1] }}</td>
                                                                            <td>{{ $dose[$key1] }}</td>
                                                                            <td>{{ $day[$key1] }}</td>
                                                                            <td>{{ $comment[$key1] }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-0">
                                            <div class="col-lg-6">
                                                <div class="patient-info patient_detail mb-30">
                                                    <h3 class="prescription-section-title mb-2">
                                                        {{ __('Patient Info:') }}
                                                    </h3>
                                                    <table class="table table-borderless patient_table">
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ __('Name') }} </td>
                                                                <td>: <b>{{ $vapp->patient->name }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Age') }} </td>
                                                                <td>: <b>{{ $vapp->patient->age }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Gender') }} </td>
                                                                <td>: <b>{{ $vapp->patient->gender }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Date of Birth') }} </td>
                                                                <td>:
                                                                    <b>{{ $vapp->patient->dob ? Carbon\Carbon::parse($vapp->patient->dob)->format('d-m-Y') : '-' }}</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Address') }} </td>
                                                                <td>: <b>{{ $vapp->patient->address }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Medicare Insurance Number') }} </td>
                                                                <td>: <b>{{ $vapp->patient->medi_ins_num }}</b></td>
                                                            </tr>
                                                            <!-- <tr>
                                                                        <td>{{ __('Blood Pressure') }} </td>
                                                                        <td>:
                                                                            <b>{{ isset($vapp->prescription()->latest()->first()->patient_bp)? $vapp->prescription()->latest()->first()->patient_bp: '' }}</b>
                                                                        </td>
                                                                    </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                @foreach ($vapp->prescription as $prescription)
                                                    <h3 class="prescription-section-title mb-4 text-center">
                                                        {{ __('QR Code:') }}</h3>
                                                    <div class="patient_detail qr_code">
                                                        @if (config('app.QRCODE_URL') == 'local')
                                                            <img
                                                                src="http://localhost:8000/storage/qrcode/{{ $prescription->qrcode_link }}" />
                                                        @else
                                                            <img
                                                                src="https://myfarmacy.online/storage/qrcode/{{ $prescription->qrcode_link }}" />
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                @if ($vapp->testprescription)
                                                    <div class="test-repot mb-30">
                                                        <h3 class="prescription-section-title mb-3">
                                                            {{ __('Repeats') }}
                                                        </h3>
                                                        <ul>
                                                            @foreach ($vapp->testprescription as $test)
                                                                <li><span>{{ $test->test_name }}</span></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                @if ($vapp->prescription)
                                                    <div class="advice-list-area mb-30">
                                                        <h3 class="prescription-section-title mb-3">
                                                            {{ __('Advice') }}
                                                        </h3>
                                                        <ul>
                                                            @foreach ($vapp->prescription as $test)
                                                                <li><span>{{ view_html($test->advice) }}</span></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                @if ($vapp->testprescription)
                                                    <div class="advice-list-area mb-30">
                                                        <h3 class="prescription-section-title mb-3">
                                                            {{ __('Follow Ups') }}
                                                        </h3>
                                                        <ul>
                                                            @foreach ($vapp->testprescription as $comment)
                                                                <li><span>{{ view_html($comment->test_comment) }}</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12">
                                                @if ($vapp->consultation_note)
                                                    <div class="test-repot mb-30">
                                                        <h3 class="prescription-section-title mb-3">
                                                            {{ __('Consultation Note') }}
                                                        </h3>
                                                        <ul>
                                                            <li><span>{{ view_html($vapp->consultation_note) }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="test-repot mb-30">
                                                    <h3 class="prescription-section-title mb-3">
                                                        {{ __('Doctor Signature') }}
                                                    </h3>
                                                    <img src="{{ asset('storage/signature/' . Auth::user()->signature) }}"
                                                        alt="Signature">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mx-0">
                                                    @foreach ($vapp->prescription as $prescription)
    <div class="qr_code">
                                                        <img src="http://localhost:8000/storage/qrcode/{{ $prescription->qrcode_link }}" />
                                                        <img src="https://myfarmacy.online/storage/qrcode/{{ $prescription->qrcode_link }}" />
                                                    </div>
    @endforeach
                                                </div> -->
                                    </div>
                                </div>
                                <div class="prescription-footer text-right">
                                    <a class="primary-btn mr-2"
                                        href="{{ route('qrcode', $vapp) }}">{{ __('Download') }} </a>
                                    <a class="primary-btn" href="{{ route('printpres', $vapp) }}"
                                        target="_blank">{{ __('Print') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ViewPrescription  Modal -->
    @endforeach

    @foreach ($pastReferral as $vapp)
        <!-- ViewEReferrel  Modal -->
        <div class="modal fade" id="VieweReferral{{ $vapp->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal modal_refferal">
                <div class="modal-content">
                    <div class="modal-header custome_header">
                        <h2 class="section-title"><span>{{ __('View eReferral') }}</span></h2>
                        <button type="button" class="closed" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <!-- <div class="prescription-top mb-30"> -->
                            <!-- <h2 class="section-title"><span>{{ __('View eReferral') }}</span></h2> -->
                            <!-- </div> -->
                            <div class="prescription-area">
                                <div class="edit-prescription-form">
                                    @if ($vapp->referral)
                                        <div id="printable">
                                            <div class="row">
                                                <!-- <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Patient Information</label>
                                                            <textarea class="form-control h-auto" name="patient_info" id="patient_info" rows="4" cols="50"
                                                                readonly>{{ $vapp->referral->patient_info }}</textarea>
                                                        </div>
                                                    </div> -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Referring Doctor</label>
                                                        <!-- <textarea class="form-control h-auto" name="referring_doctor" id="referring_doctor" rows="4"
                                                            cols="50" readonly>{{ $vapp->referral->referring_doctor }}</textarea> -->
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $vapp->referral->referring_doctor }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Specialist</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $vapp->referral->specialty }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Doctor Email</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $vapp->referral->ref_doctor_email }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Doctor Mobile</label>
                                                        <input type="text" class="form-control" readonly
                                                            value="{{ $vapp->referral->ref_doctor_mobile }}" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Doctor Address</label>
                                                        <textarea class="form-control h-auto" name="situation" id="situation" rows="3" cols="50" readonly>{{ $vapp->referral->ref_doctor_address }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Situation</label>
                                                        <textarea class="form-control h-auto" name="situation" id="situation" rows="4" cols="50" readonly>{{ $vapp->referral->situation }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Medical History</label>
                                                        <textarea class="form-control h-auto" name="medical_history" id="medical_history" rows="4"
                                                            cols="50" readonly>{{ $vapp->referral->medical_history }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Examination & Assessment</label>
                                                        <textarea class="form-control h-auto" name="examination_assessment" id="examination_assessment" rows="4"
                                                            cols="50" readonly>{{ $vapp->referral->examination_assessment }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Request</label>
                                                        <textarea class="form-control h-auto" name="request" id="request" rows="4" cols="50"
                                                            placeholder="{{ __('Request') }}" readonly>{{ $vapp->referral->request }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @php
                                    $id = encryptStringData($vapp->id);
                                @endphp
                                <div class="prescription-footer text-right">
                                    <a class="primary-btn mr-2"
                                        href="{{ route('referralDownload', $id) }}">{{ __('Download') }} </a>
                                    <a class="primary-btn mr-2" href="#" role="button" data-toggle="modal"
                                        data-dismiss="modal" data-target="#shareReferral{{ $vapp->id }}">Share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ViewEReferrel  Modal -->

        <!-- Share Referral Modal -->
        <div class="modal fade" id="shareReferral{{ $vapp->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal share_modal  modal_refferal">
                <div class="modal-content">
                    <div class="modal-header custome_header">
                        <h2 class="section-title"><span>{{ __('Share Referral') }}</span></h2>
                        <button type="button" class="closed" data-dismiss="modal" aria-label="Close"
                            data-toggle="modal" data-target="#VieweReferral{{ $vapp->id }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <!-- <div class="prescription-top mb-30"> -->
                            <!-- <h2 class="section-title"><span>{{ __('View eReferral') }}</span></h2> -->
                            <!-- </div> -->
                            <div class="prescription-area">
                                <div class="edit-prescription-form">
                                    <form action="{{ route('shareReferral', $vapp->id) }}" method="POST"
                                        id="share_pre">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ $vapp->id }}" />
                                        <div class="form-group">
                                            <select name="option" id="option" class="form-control option">
                                                <option value="" disabled="disabled" selected="true">
                                                    {{ __('Select one option to share prescription') }}</option>
                                                <option value="mobile">{{ __('Mobile') }}</option>
                                                <option value="email">{{ __('Email') }}</option>
                                            </select>
                                        </div>
                                        <div class="mobile_feild hide">
                                            <div class="form-group">
                                                <label for="mobile">{{ __('Mobile') }}</label>
                                                <input type="number" class="form-control" id="mobile"
                                                    name="mobile" value="{{ $vapp->patient->mobile }}"
                                                    placeholder="{{ __('Enter Mobile') }}" disabled />
                                                <input type="hidden" id="mobile" name="mobile"
                                                    value="{{ $vapp->patient->mobile }}" />
                                            </div>
                                            <div class="prescription-footer text-right">
                                                <button type="submit" class="btn_sharePre">Submit</button>
                                            </div>
                                        </div>
                                        <div class="email_feild hide">
                                            <div class="form-group" id="mobile">
                                                <label for="email">{{ __('Email') }}</label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email" placeholder="{{ __('Enter email') }}" />
                                            </div>
                                            <div class="prescription-footer text-right">
                                                <button class="btn_sharePre">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Share Referral Modal -->
    @endforeach

    <!-- Share Prescription Modal -->
    @foreach ($pastappModal as $vapp)
        <div class="modal fade" id="sharePrescription{{ $vapp->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal share_modal  modal_refferal">
                <div class="modal-content">
                    <div class="modal-header custome_header">
                        <h2 class="section-title"><span>{{ __('Share Prescription') }}</span></h2>
                        <button type="button" class="closed" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <!-- <div class="prescription-top mb-30"> -->
                            <!-- <h2 class="section-title"><span>{{ __('View eReferral') }}</span></h2> -->
                            <!-- </div> -->
                            <div class="prescription-area">
                                <div class="edit-prescription-form">
                                    <form action="{{ route('sharePrescription', $vapp->id) }}" method="POST"
                                        id="share_pre">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                            value="{{ $vapp->id }}" />
                                        <div class="form-group">
                                            <select name="option" id="option" class="form-control option">
                                                <option value="" disabled="disabled" selected="true">
                                                    {{ __('Select one option to share prescription') }}</option>
                                                <option value="mobile">{{ __('Mobile') }}</option>
                                                <option value="email">{{ __('Email') }}</option>
                                            </select>
                                        </div>
                                        <div class="mobile_feild hide">
                                            <div class="form-group">
                                                <label for="mobile">{{ __('Mobile') }}</label>
                                                <input type="number" class="form-control" id="mobile"
                                                    name="mobile" value="{{ $vapp->patient->mobile }}"
                                                    placeholder="{{ __('Enter Mobile') }}" disabled />
                                                <input type="hidden" id="mobile" name="mobile"
                                                    value="{{ $vapp->patient->mobile }}" />
                                            </div>
                                            <div class="prescription-footer text-right">
                                                <button type="submit" class="btn_sharePre">Submit</button>
                                            </div>
                                        </div>
                                        <div class="email_feild hide">
                                            <div class="form-group" id="mobile">
                                                <label for="email">{{ __('Email') }}</label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email" placeholder="{{ __('Enter email') }}" />
                                            </div>
                                            <div class="prescription-footer text-right">
                                                <button type="submit" class="btn_sharePre">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Share Prescription Modal -->

    <!-- Message Modal -->
    @foreach ($appointment as $app)
        <div class="modal fade" id="AppMessage{{ $app->id }}">
            <div class="modal-dialog modal-dialog-centered prescriptionmodal share_modal message_modal modal_refferal">
                <div class="modal-content">
                    <div class="modal-header custome_header">
                        <h2 class="section-title"><span>{{ __('Clinical Notes') }}</span></h2>
                        <button type="button" class="closed" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <div class="prescription-area">
                                <div class="edit-prescription-form">
                                    <form action="{{ route('consultationNote', $app->id) }}" method="POST"
                                        id="cons_note">
                                        @csrf
                                        <div class="form-group">
                                            <label for="note">{{ __('Message') }}</label>
                                            <textarea class="form-control h-auto" id="note" name="note" rows="6"
                                                placeholder="{{ __('main.Your_Messages') }}">{{ isset($app->consultation_note) ? $app->consultation_note : '' }}</textarea>
                                            <small
                                                class=" text-danger d-none noteerror">{{ __('Card Number field is required') }}</small>
                                        </div>
                                        <div class="prescription-footer text-right">
                                            <button type="submit" class="btn_sharePre">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Message Modal -->

    <!-- View Message Modal -->
    @foreach ($appointment as $app)
        <div class="modal fade" id="AppMessageView{{ $app->id }}">
            <div
                class="modal-dialog modal-dialog-centered prescriptionmodal share_modal view_massage_modal modal_refferal">
                <div class="modal-content">
                    <div class="modal-header custome_header">
                        <h2 class="section-title"><span>{{ __('Clinical Notes') }}</span></h2>
                        <button type="button" class="closed" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="prescription-wrap">
                            <div class="prescription-area">
                                <div class="edit-prescription-form">
                                    <!-- <form action="{{ route('consultationNote', $app->id) }}" method="POST" id="cons_note">
                                                @csrf -->
                                    <div class="">
                                        <label for="note">{{ __('Message') }}</label>
                                        <!-- <textarea class="form-control h-auto" id="note" name="note" rows="4"
                                            placeholder="{{ __('main.Your_Messages') }}" readonly>{{ isset($app->consultation_note) ? $app->consultation_note : '' }}</textarea> -->
                                        <p>{{ isset($app->consultation_note) ? $app->consultation_note : '' }}</p>
                                        <small
                                            class=" text-danger d-none noteerror">{{ __('Card Number field is required') }}</small>
                                    </div>
                                    <!-- <div class="prescription-footer text-right">
                                                    <button type="submit" class="btn_sharePre">Save</button>
                                                </div>
                                            </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- View Message Modal -->

    @foreach ($appointment as $ap)
        <div class="modal fade common-modal create-meeting-modal" id="cancelAppointmentModal{{ $ap->id }}"
            tabindex="-1" role="dialog" aria-labelledby="cancelAppointmentModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Cancel Appointment') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('cancel.appointment', $ap->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="reason">{{ __('Reason') }}</label>
                                <textarea class="form-control create-meeting-info" id="reason" rows="3" name="reason"
                                    placeholder="{{ __('Write something') }}" required></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-primary create-meeting-info-button">{{ __('Cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade common-modal create-meeting-modal" id="createMeetingModal{{ $ap->id }}"
            tabindex="-1" role="dialog" aria-labelledby="createMeetingModalTitle{{ $ap->id }}"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Create Meeting') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('doctor.zoom_create_link') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden"
                                value="{{ __('Meeting with ' . Auth::user()->name . ' and ' . $ap->patient->name) }}"
                                name="topic">
                            <input type="hidden" value="{{ \Carbon\Carbon::now() }}" name="start_time">
                            <input type="hidden" value="30" name="duration">
                            <input type="hidden" value="1" name="host_video">
                            <input type="hidden" value="1" name="participant_video">
                            <input type="hidden" value="{{ $ap->id }}" name="appointment_id">
                            <input type="hidden" value="{{ $ap->doctor_id }}" name="doctor_id">
                            <input type="hidden" value="{{ $ap->user_id }}" name="user_id">
                            <div class="create-meeting-info"><span>{{ __('Patient:') }}</span>
                                {{ $ap->patient->name }}
                            </div>
                            <div class="create-meeting-info"><span>{{ __('Appointment Date:') }}</span>
                                {{ $ap->appdate }}
                            </div>
                            <div class="create-meeting-info"><span>{{ __('Appointment Time:') }}</span>
                                {{ $ap->slot ? \Carbon\Carbon::parse($ap->slot->start_time)->format('g:i a') : 'N/A' }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Create Meeting') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (hasMeeting($ap->id) == 1)
            <div class="modal fade common-modal create-meeting-modal" id="viewMeetingModal{{ $ap->id }}"
                tabindex="-1" role="dialog" aria-labelledby="viewMeetingModalTitle{{ $ap->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ $ap->meeting->topic }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="create-meeting-info"><span>{{ __('Join URL:') }}</span>
                                {{ $ap->meeting->join_url }} <a href="{{ $ap->meeting->join_url }}"
                                    class="btn btn-primary" target="_blank">{{ __('Click Link') }}</a>
                            </div>
                            <div class="create-meeting-info"><span>{{ __('Meeting ID:') }}</span>
                                {{ $ap->meeting->meeting_id }}
                            </div>
                            <div class="create-meeting-info"><span>{{ __('Meeting Password:') }}</span>
                                {{ $ap->meeting->password }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <!-- Modal -->
    {{-- <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div> --}}
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script src="{{ asset('front/js/doctor-appointment.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // 2FA
            $('#toggleSwitch').on('click', function() {
                var switchChecked = $('.switch_1').prop('checked')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: "{{ route('user.2FA') }}",
                    method: "post",
                    data: {
                        'switchChecked': switchChecked
                    },
                    success: function(data) {
                        if (data.status === true) {
                            if (data.type === "true") {
                                toastr.success('Two Factor Authentication on successfully',
                                    'Success', {
                                        positionClass: 'toast-top-right',
                                        timeOut: 3000
                                    });
                            } else {
                                toastr.success('Two Factor Authentication off successfully',
                                    'Success', {
                                        positionClass: 'toast-top-right',
                                        timeOut: 3000
                                    });
                            }
                        }
                    },
                    error: function(response) {
                        $('.text-strong').text('');
                        $.each(response.responseJSON.errors, function(field_name, error) {
                            $('[name=' + field_name + ']').after(
                                '<span class="text-strong" style="color:red">' +
                                error + '</span>')
                        })
                    }
                })
            })

            // signature
            var canvas = document.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas);
            $('.changesave').on('click', function() {
                if (signaturePad.isEmpty()) {
                    $("#signature").val();
                } else {
                    var signatureData = signaturePad.toDataURL();
                    $("#signature").val(signatureData);
                }
            })

            $('#clear').on('click', function() {
                signaturePad.clear();
            })

            // display existing signature
            var signatureImageUrl = "{{ auth()->user()->signature }}";
            var baseUrl = "{{ asset('storage/signature') }}";

            var canvas1 = document.getElementById("signature-canvas");
            var ctx = canvas1.getContext("2d");

            var image = new Image();
            image.onload = function() {
                ctx.drawImage(image, 0, 0);
            };
            image.src = baseUrl + '/' + signatureImageUrl;
        })

        $(document).ready(function() {
            $('#cons_note').validate({
                rules: {
                    note: {
                        required: true,
                    }
                },
                errorElement: 'span',
                messages: {
                    note: 'Please enter message!'
                }
            })

            $('.option').on('change', function(e) {
                if (e.target.value === 'mobile') {
                    $(".mobile_feild").removeClass("hide").addClass("show")
                    $(".email_feild").removeClass("show").addClass("hide")
                } else if (e.target.value === 'email') {
                    $(".email_feild").removeClass("hide").addClass("show")
                    $(".mobile_feild").removeClass("show").addClass("hide")
                }

            });
        })

        $(document).ready(function() {
            $('#editform').validate({
                rules: {
                    email: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        maxlength: 10,
                        minlength: 8
                    },
                    dob: {
                        required: true,
                    },
                    age: {
                        required: true,
                    },
                    card_name: {
                        required: true,
                        maxlength: 20
                    },
                    individual_reference_number: {
                        required: true,
                        maxlength: 11
                    },
                    card_number: {
                        required: true,
                        maxlength: 12,
                        minlength: 10
                    },
                    exp_date: {
                        required: true
                    },
                },
                errorElement: 'span',
                messages: {
                    email: {
                        required: 'Please enter email address!'
                    },
                    mobile: {
                        required: 'Please enter mobile number!',
                    },
                    dob: 'Please select date of birth!',
                    age: 'Please enter your age!',
                    card_name: {
                        required: 'Please enter medicare card number!',
                    },
                    individual_reference_number: {
                        required: 'Please enter medicare individual reference number!',
                    },
                    card_number: {
                        required: 'Please enter card number!',
                        minlength: 'Please enter valid card number'
                    },
                    exp_date: 'Please select expiry date!'
                }
            })
        })

        // Add JavaScript to format the card number input field with spaces
        document.getElementById('card_number').addEventListener('input', function(e) {
            var cardNumber = e.target.value;
            cardNumber = cardNumber.replace(/\s/g, ''); // Remove existing spaces
            var formattedCardNumber = '';

            var groups = cardNumber.match(/^(\d{1,4})(\d{1,5})?(\d{1,1})?$/);
            if (groups) {
                formattedCardNumber = groups.slice(1).filter(Boolean).join(' ');
            }

            e.target.value = formattedCardNumber;
        });

        function limitInputLength(input) {
            let cardNumber = input.value.replace(/[^0-9]/gi, ''); // Remove non-digit characters
            if (cardNumber.length > 7) {
                cardNumber = cardNumber.slice(0, 7); // Truncate to 7 digits
            }
            input.value = cardNumber;
        }

        // Add an event listener to limit input to 7 digits
        const cardNumberInput = document.getElementById('prescriber_number');
        cardNumberInput.addEventListener('input', function() {
            limitInputLength(this);
        });

        // disable previous dates
        const expDateInput = document.getElementById('exp_date');
        const currentDate = new Date();
        currentDate.setFullYear(currentDate.getFullYear() + 1);
        const minYear = currentDate.getFullYear();
        const minMonth = currentDate.getMonth() + 1; // Months are 0-based, so add 1
        const minDate = `${minYear}-${minMonth.toString().padStart(2, '0')}`;
        expDateInput.setAttribute('min', minDate);


        function toggleDropdown(id) {
            var label = $("#Dropdownlabel" + id);
            var dropdown = $("#patientDropdown" + id);
            var toggleFields = $("#toggleFields" + id);
            var info = $(".info");

            var infoContainer = $("#infoContainer" + id);
            dropdown.val('');
            if (!dropdown.is(":visible")) {
                label.show();
                dropdown.show();
                infoContainer.css("display", "none");
                // toggleFields.prop("disabled", true);
                console.log('FieldsElement disabled');
            } else {
                label.hide();
                dropdown.hide();
                // toggleFields.prop("disabled", false);
                info.hide();
            }
        }

// function showInfo(id) {
        //     console.log({id})
        //     alert(id)
        //      $("#patientDetails" + id).show();
        // }

        $('.patient_id').change(function () {

            var selectedOption = $(this).find('option:selected');

            $(".info").hide();
            var patientId = selectedOption.data('patient-id');
            var appID = selectedOption.data('app-id');
            console.log('Selected Patient ID:', patientId);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "{{ route('doctor.dashboard') }}",
                method: "get",
                data: {
                    'patient_id': patientId
                },
                success: function(data) {
                    console.log("data", data)
                    // Extract the patient ID from the response
                    var patientId = data['patient'][0].id;

                    console.log('patientId', patientId)
                    // Show the specific container based on the received patient ID
                    var patientContainer = $("#"+appID+"patientDetails" + patientId);
                    console.log(patientContainer.html());
                    patientContainer.show();
                    console.log(123, data['patient'][0]);

                    // Use the specific container for finding elements

                    patientContainer.find('#patient_name').val(data['patient'][0].name);
                    patientContainer.find('#patient_email').val(data['patient'][0].email);
                    patientContainer.find('#patient_phone').val(data['patient'][0].mobile);
                    patientContainer.find('#patient_gender').val(data['patient'][0].gender);
                },
                error: function(response) {
                    console.log({response});
                    console.log(response.responseJSON.errors);
                }
            });
        }).change();

     function toggleFields(id) {
            var infoContainer = $("#infoContainer" + id);
            var info = $(".info");
            // console.log(info)
            var toggleDropdown = $("#toggleDropdown" + id);
            var dropdown = $("#patientDropdown" + id);
            var label = $("#Dropdownlabel" + id);
            // toggleDropdown(null)
            info.hide()
            if (dropdown.is(":visible")) {
                dropdown.hide();
                label.hide();
                infoContainer.css("display", "none");
            }
            if (infoContainer.css("display") !== "flex") {
                infoContainer.css("display", "flex");
                // toggleDropdown.prop("disabled", true);
                console.log('Dropdown disabled');
            } else {
                infoContainer.css("display", "none");
                // toggleDropdown.prop("disabled", false);
            }
        }

    </script>

<script>
    $(document).ready(function() {

        $(".create-form").each(function() {
            $(this).validate({

                rules: {

                    advice: {
                        required: true

                    },
                    patient_name: {
                        required: true

                    },
                    patient_email: {
                        required: true

                    },
                    patient_phone:{
                        required: true
                    },
                    patient_gender: {
                        required: true

                    }
                },
                errorElement: 'span',
                messages: {
                    advice: {
                        required: "Please provide advice."
                    },
                    patient_name: {
                        required: "Please provide name."
                    },
                    patient_email: {
                        required: "Please provide email."
                    },
                    patient_phone: {
                        required: "Please provide ."
                    },
                    patient_gender: {
                        required: "Please provide gender."
                    },

                },
            });
        });

    });

</script>




@endpush
