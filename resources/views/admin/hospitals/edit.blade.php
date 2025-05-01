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
                        <form action="{{ route('hospital.update', $hospital->id) }}" method="POST">
                            @csrf
                            @method('put')
                           <div class="row">


                                <div class="col">
                                    <label for="hospital_name_ar"
                                        class="mr-sm-2">{{ trans('site.hospital-name-ar') }}
                                        :</label>
                                    <input id="hospital_name_ar" type="text" name="hospital_name" class="form-control form-control-lg" required value="{{ $hospital->name }}">
                                    @error('hospital_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                              
                               <div class="col">
                                <label for="branch_id"
                                class="mr-sm-2">  {{ trans('site.city-name') }}
                                :</label>
                                <select name="branch_id" id="branch_id" class="form-control form-control-lg" required>

                                    @foreach ($branches as $branch)
                                    <option @if($branch->id ==$hospital->branch_id) selected @endif value="{{ $branch->id }}">{{ $branch->name }}</option>

                                    @endforeach
                                </select>
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
