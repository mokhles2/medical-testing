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
                        <!-- add_form -->
                        <form action="{{ route('patients.update', $patient->id)}}" method="POST">
                            @csrf
                            @method('put')
                           <div class="row">


                                <div class="col">
                                    <label for="patient_name"
                                        class="mr-sm-2">{{ trans('site.patient-name') }}
                                        :</label>
                                    <input id="patient_name" type="text" name="patient_name" class="form-control" required value="{{ $patient->name }}">
                                    @error('patient_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="national_id"
                                        class="mr-sm-2">  {{ trans('site.national_id') }}
                                        :</label>
                                    <input id="branch_name_ar" type="text" name="national_id" class="form-control" required value="{{ $patient->national_id }}">
                                    @error('national_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="email"
                                        class="mr-sm-2"> {{ trans('site.email-address') }} 
                                        :</label>
                                    <input id="email" type="text" name="email" class="form-control" required value="{{ $patient->email}}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                           </div>







                                    <br>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('site.close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('site.save') }}</button>



                    </div>








                </div>



            </div>
        </div>










    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
