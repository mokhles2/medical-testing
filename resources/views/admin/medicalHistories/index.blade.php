@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/city.cities') }}
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
                    @if (auth()->user()->status == 'admin')
                        <a href="{{ route('medicalHistories.create') }}" class="btn btn-success"
                        >
                        {{ trans('site.add-medical-rec') }}
                        </a>
                    @endif




                    <br><br>
                    <h1> {{ trans('site.medical-records') }}</h1>
                    @if (auth()->user()->status == 'admin')
                        <form action="{{ route('search') }}" method="Post">
                            @csrf
                            <div class="row">
                            <input type="text" name="national_id" class="col-3 form-control"/>
                            <input type="submit" value="Search" class="col-1 btn btn-info">
                            <a href="{{ route('medicalHistories.index') }}" class="col-1 btn btn-success align-center"style="margin-left: 2px; padding-top: 12px;">{{ trans('site.ALL') }}</a>
                        </div>
                        </form>
                    @endif
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> {{ trans('site.patient-name') }}</th>
                                    <th>{{ trans('site.national_id') }} </th>
                                    <th>{{ trans('site.hospital-name') }} </th>
                                    <th>{{ trans('site.age') }}</th>
                                    <th>{{ trans('site.status') }}</th>
                                    @if (auth()->user()->status == 'admin')
                                        <th>{{ trans('site.procces') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($medicalHistories as $medicalHistory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $medicalHistory->user->name ?? " "}}</td>
                                    <td><b> <a href="{{ route('medicalHistories.show' , $medicalHistory->id) }}">{{ $medicalHistory->user->national_id ?? " "}}</a></b> </td>
                                    <td>{{ $medicalHistory->hospital->name ?? "" }}</td>
                                    <td>{{ $medicalHistory->age }}</td>
                                    <td @if ($medicalHistory->status == 'Good')
                                        style="color:#28a745"
                                    @endif
                                    @if ($medicalHistory->status == 'Serious')
                                        style="color:#dc3545"
                                    @endif
                                    @if ($medicalHistory->status == 'Need Follow up')
                                        style="color:#ffc107"
                                    @endif
                                      ><b>{{ $medicalHistory->status }}</b></td>


                                    @if (auth()->user()->status == 'admin')
                                    <td>

                                        <a href="{{ route('medicalHistories.edit', $medicalHistory->id) }}" class="btn btn-info btn-sm">
                                            {{ trans('site.edit') }}
                                            <i
                                        class="fa fa-edit"></i>
                                        </a>
                                       

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $medicalHistory->id }}"
                                                title="delete"><i
                                                    class="fa fa-trash"></i>Delete</button>
                                    </td>
                                    @endif

                                 <!-- delete_modal_branch -->
                                 <div class="modal fade" id="delete{{ $medicalHistory->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('site.delete-patient') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('medicalHistories.destroy',$medicalHistory->id)}}" method="post">
                                                    {{-- {{method_field('Delete')}} --}}
                                                    @method('delete')
                                                    @csrf
                                                          {{ trans('site.are-you-sure-you-want-to-delete') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $medicalHistory->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('site.close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('site.delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- delete_modal_hospital-->
                                </tr>
                                @endforeach



                            </tbody>
                        </table>



                    </div>






                </div>



            </div>
        </div>









    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
