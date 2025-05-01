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
                        <form action="{{ route('medicalHistories.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="patient_id"
                                    class="mr-sm-2"> {{ trans('site.patients') }}
                                    :</label>
                                    <select name="patient_id" id="patient_id" class="form-control form-control-lg" >
                                        <option value="">{{ trans('site.chose-patient') }} </option>
                                        @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"> {{ $patient->name }}</option>

                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="national_id"
                                    class="mr-sm-2"> {{ trans('site.national_id') }}
                                    :</label>
                                    <select name="national_id" id="national_id" class="form-control form-control-lg" >
                                        <option value="">Chose National Id </option>

                                    </select>
                                    @error('patient_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">


                                    <label for="branch_id"
                                    class="mr-sm-2">  {{ trans('site.city-name') }}
                                    :</label>
                                    <select name="branch_id" id="branch_id" class="form-control form-control-lg" >
                                        <option value="">{{ trans('site.chose-city') }} </option>
                                        @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('branch_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">


                                    <label for="hospital_id"
                                    class="mr-sm-2">  {{ trans('site.hospital-name') }}
                                    :</label>
                                    <select name="hospital_id" id="hospital_id" class="form-control form-control-lg" >
                                        <option value=""> {{ trans('site.chose-hospital') }}</option>
                                        
                                    </select>
                                    @error('hospital_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                    <input id="age" type="text" name="age" value="{{ old('age') }}" class="form-control" >
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="weight"
                                        class="mr-sm-2">  {{ trans('site.weight') }}
                                        :</label>
                                    <input id="weight" type="text" name="weight" value="{{ old('weight') }}" class="form-control" >
                                    @error('weight')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                           </div>
                           <div class="row">

                                <div class="col">
                                    <label for="temperature"
                                        class="mr-sm-2"> {{ trans('site.temperature') }}
                                        :</label>
                                    <input id="temperature" type="text" name="temperature" value="{{ old('temperature') }}" class="form-control" >
                                    @error('temperature')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="sugar_level"
                                        class="mr-sm-2">  {{ trans('site.sugar-levle') }}
                                        :</label>
                                    <input id="sugar_level" type="text" name="sugar_level" value="{{ old('sugar_level') }}" class="form-control" >
                                    @error('sugar_level')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                           </div>

                           <div class="row">


                            <div class="col">
                                <label for="blood_pressure"
                                    class="mr-sm-2"> {{ trans('site.blood-pressure') }}
                                    :</label>
                                <input id="blood_pressure" type="text" name="blood_pressure" value="{{ old('blood_pressure') }}" class="form-control" >
                                @error('blood_pressure')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="col">
                                <label for="blood_type"
                                    class="mr-sm-2">   {{ trans('site.blood-type') }}
                                    :</label>
                                    <select name="blood_type" id="blood_type" class="form-control form-control-lg" >
                                        <option value=""> Chose Blood Type </option>
                                        <option @if (old('blood_type') =='O+') selected @endif value="O+">O+</option>
                                        <option @if (old('blood_type') =='O-') selected @endif value="O-">  O-</option>
                                        <option @if (old('blood_type') =='A+') selected @endif value="A+">A+</option>
                                        <option @if (old('blood_type') =='A-') selected @endif value="A-">A-</option>
                                        <option @if (old('blood_type') =='B+') selected @endif value="B+">B+  </option>
                                        <option @if (old('blood_type') =='B-') selected @endif value="B-">B-</option>
                                        <option @if (old('blood_type') =='AB+') selected @endif value="AB+">AB+  </option>
                                        <option @if (old('blood_type') =='AB-') selected @endif value="AB-">AB-</option>

                                    </select>
                                @error('blood_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="blood_test"
                                    class="mr-sm-2">   {{ trans('site.blood-test') }}
                                    :</label>
                                <input id="blood_test" type="text" name="blood_test" value="{{ old('blood_test') }}" class="form-control" >
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
                            <textarea name="prescription" id="prescription" cols="30" rows="10" class="form-control">{{ old('prescription') }}</textarea>
                           </div>
                       </div>

                       <div class="row">
                        <div class="col">
                            <label for="status"
                            class="mr-sm-2"> {{ trans('site.status') }}
                            :</label>
                            <select name="status" id="status" class="form-control form-control-lg" >
                                <option value=""> Chose Status</option>
                                <option @if (old('sataus') == 'Good') selected @endif value="Good">Good</option>
                                <option @if (old('sataus') == 'Need Follow up') selected @endif value="Need Follow up "> Need Follow up </option>
                                <option @if (old('sataus') == 'Serious') selected @endif value="Serious">Serious</option>

                            </select>
                        </div>
                       </div>





                                    <br>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit"
                                        class="btn btn-success">Save</button>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="branch_id"]').on('change', function() {
            var branch_id = $(this).val();
            if (branch_id) {
                $.ajax({
                    url: "{{ URL::to('admin/get_hospital') }}/" + branch_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="hospital_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="hospital_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
{{-- //this for national Id --}}
<script>
    $(document).ready(function() {
        $('select[name="patient_id"]').on('change', function() {
            var patient_id = $(this).val();
            if (patient_id) {
                $.ajax({
                    url: "{{ URL::to('admin/get_national') }}/" + patient_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="national_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="national_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
