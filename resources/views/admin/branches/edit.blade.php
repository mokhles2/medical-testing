@extends('admin.layouts.master')
@section('title')

@endsection
@section('content')



    <!--=================================
                         Main content -->
    <!-- main-content -->
    <!-- row -->
    <div class="row">



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">




                        <!-- add_form -->
                        <form action="{{ route('branch.update' , $branch->id) }}" method="POST">
                            @csrf
                            @method('put')
                           <div class="row">
                            {{-- <h1>{{ $branch->name }}</h1> --}}

                                <div class="col">
                                    <label for="branch_name_ar"
                                        class="mr-sm-2">{{ trans('site.branch_name_ar') }}
                                        :</label>
                                    <input id="branch_name_ar" type="text" name="branch_name" value="{{ $branch->name }}" class="form-control" required>
                                    @error('branch_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                              

                           </div>






                                    <br>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('site.close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('site.save') }}</button>


                        </form>

                    </div>








                </div>



            </div>
        </div>










    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
