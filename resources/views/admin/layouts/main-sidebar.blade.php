<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    @if (auth()->user()->status == 'admin')
                    <li>
                        <a href="{{ route('admin') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text"> {{ trans('site.dashboard') }}</span>
                            </div>

                        </a>

                    </li>
                    @endif
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                       {{ trans('site.home') }}
                    </li>
                    <!-- menu item Elements-->

                    @if (auth()->user()->status == 'admin')
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#branches">
                            <div class="pull-left"><i class="fa fa-diamond" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('site.branches') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="branches" class="collapse" data-parent="#sidebarnav">
                            <li><a
                                    href="{{ route('branches.index') }}">{{ trans('site.all-branches') }}</a>
                            </li>


                        </ul>
                    </li>
                    @endif
                    @if (auth()->user()->status == 'admin')
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#hospitals">
                            <div class="pull-left"><i class="fa fa-diamond" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('site.hospitals') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="hospitals" class="collapse" data-parent="#sidebarnav">
                            <li><a
                                    href="{{ route('hospitals.index') }}">{{ trans('site.all-hospitals') }}</a>
                            </li>


                        </ul>
                    </li>
                    @endif
                    @if (auth()->user()->status == 'admin')
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#patients">
                            <div class="pull-left"><i class="fa fa-diamond" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('site.patients') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="patients" class="collapse" data-parent="#sidebarnav">
                            <li><a
                                href="{{ route('patients.create') }}">{{ trans('site.add-patient') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('patients.index') }}">{{ trans('site.all-patients') }}</a>
                            </li>


                        </ul>
                    </li>
                    @endif
                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#medicalHistories">
                            <div class="pull-left"><i class="fa fa-diamond" aria-hidden="true"></i><span
                                    class="right-nav-text"> {{ trans('site.medical-record') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="medicalHistories" class="collapse" data-parent="#sidebarnav">
                            @if (auth()->user()->status == 'admin')
                            <li><a
                                href="{{ route('medicalHistories.create') }}"> {{ trans('site.add-medical-rec') }}</a>
                            </li>
                            @endif
                            <li><a
                                    href="{{ route('medicalHistories.index') }}">{{ trans('site.display-medical-record') }} </a>
                            </li>


                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#logout">
                            <div class="pull-left"><i class=" ti-unlock"></i><span
                                    class="right-nav-text">logout</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="logout" class="collapse" data-parent="#sidebarnav">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class="bx bx-log-out"></i>logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>


                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
