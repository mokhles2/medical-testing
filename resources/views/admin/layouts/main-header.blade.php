        <!--=================================
        header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="margin-top: 0px">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper text-center" >
                <h6 class="text-center"></h6>
                <p style="font-size: 20px;color: #083789;">  {{ trans('site.site-name') }}</p>
                
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">

           

                <li class="nav-item " style="padding-top: 10px">{{  auth()->user()->name}}</li>

                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>


                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('adminasset/assets/images/user_image.jpg') }} " alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0"> @if (auth()->user())
                                        {{ auth()->user()->name }}
                                    @endif </h5>
                                    <span>@if (auth()->user())
                                        {{ auth()->user()->email }}
                                    @endif</span>
                                </div>
                            </div>
                        </div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class=" ti-unlock"></i>
                                     logout</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>

                   </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
