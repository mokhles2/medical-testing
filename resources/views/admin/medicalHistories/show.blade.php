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





                            <div class="row">
                                <div class="col">
                                    <label for="patient_id"
                                    class="mr-sm-2"> {{ trans('site.patients') }}
                                    :</label>
                                    <input type="text" class="form-control" value="{{ $medicalHistory->user->name }}" readonly>

                                </div>
                                <div class="col">
                                    <label for="national_id"
                                    class="mr-sm-2"> {{ trans('site.national_id') }}
                                    :</label>
                                    <input type="text" class="form-control" value="{{ $medicalHistory->user->national_id  }}" readonly>

                                </div>
                                <div class="col">


                                    <label for="branch_id"
                                    class="mr-sm-2">  {{ trans('site.city-name') }}
                                    :</label>
                                    <input type="text" class="form-control" value="{{ $medicalHistory->hospital->branch->name }}" readonly>

                                </div>
                                <div class="col">


                                    <label for="hospital_id"
                                    class="mr-sm-2">  {{ trans('site.hospital-name') }}
                                    :</label>
                                    <input type="text" class="form-control" value="{{ $medicalHistory->hospital->name  }}" readonly>

                                </div>
                            </div>
                            <br>
                            <br>
                            <h3 class="text-center"> {{ trans('site.medical-info') }}</h3>
                            <br>

                           <div class="row">


                                <div class="col">
                                    <label for="age"
                                        class="mr-sm-2">{{ trans('site.age') }}
                                        :</label>
                                    <input  type="text"  value="{{  $medicalHistory->age   }}" class="form-control" readonly>

                                </div>

                                <div class="col">
                                    <label for="weight"
                                        class="mr-sm-2">  {{ trans('site.weight') }}
                                        :</label>
                                    <input id="weight" type="text" name="weight" value="{{ $medicalHistory->weight }}" readonly class="form-control" >

                                </div>
                           </div>
                           <div class="row">

                                <div class="col">
                                    <label for="temperature"
                                        class="mr-sm-2"> {{ trans('site.temperature') }}
                                        :</label>
                                    <input id="temperature" type="text" name="temperature" readonly value="{{ $medicalHistory->temperature }}" class="form-control" >

                                </div>

                                <div class="col">
                                    <label for="sugar_level"
                                        class="mr-sm-2">  {{ trans('site.sugar-levle') }}
                                        :</label>
                                    <input id="sugar_level" type="text" name="sugar_level" readonly value="{{  $medicalHistory->sugar_level }}" class="form-control" >

                                </div>

                           </div>

                           <div class="row">


                            <div class="col">
                                <label for="blood_pressure"
                                    class="mr-sm-2"> {{ trans('site.blood-pressure') }}
                                    :</label>
                                <input id="blood_pressure" type="text" name="blood_pressure" readonly value="{{ $medicalHistory->blood_pressure}}" class="form-control" >

                            </div>



                            <div class="col">
                                <label for="blood_type"
                                    class="mr-sm-2">   {{ trans('site.blood-type') }}
                                    :</label>
                                
                                
                                    <input type="text" class="form-control" value="{{ $medicalHistory->blood_type }}" readonly>
                               
                            </div>
                            <div class="col">
                                <label for="blood_test"
                                    class="mr-sm-2">   {{ trans('site.blood-test') }}
                                    :</label>
                                <input id="blood_test" readonly type="text" name="blood_test" value="{{ old('blood_test') ?? $medicalHistory->blood_test }}" class="form-control" >
                                @error('blood_test')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                       </div>
                       <div class="row">
                           <div class="col">
                            <label for="prescription"
                            class="mr-sm-2">  {{ trans('site.prescription') }}
                            :</label>
                            <textarea name="prescription" readonly id="prescription" cols="30" rows="10" class="form-control">{{ old('prescription')?? $medicalHistory->prescription}}</textarea>
                           </div>
                       </div>

                       <div class="row">
                        <div class="col">
                            <label for="status"
                            class="mr-sm-2"> {{ trans('site.status') }}
                            :</label>
                            <input type="text" class="form-control" value="{{ $medicalHistory->status }}" readonly>
                        </div>
                       </div>





                    </div>








                </div>



            </div>
        </div>










    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
