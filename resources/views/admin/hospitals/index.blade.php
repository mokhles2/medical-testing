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

                    <a href="{{ route('hospital.create') }}" class="btn btn-success"
                        >
                        {{ trans('site.add-hospitals') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('site.hospitals') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('site.name') }}</th>
                                    <th>{{ trans('site.city-name') }}</th>
                                    <th>{{ trans('site.procces') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($hospitals as $hospital)
                                <tr>
                                    {{-- <td>{{ $hospital->id }}</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hospital->name }}</td>
                                    <td>{{ $hospital->branch->name ??""}}</td>
                                    <td>

                                        <a href="{{ route('hospital.edit', $hospital->id) }}" class="btn btn-info btn-sm">
                                            {{ trans('site.edit') }}
                                            <i
                                        class="fa fa-edit"></i>
                                        </a>
                                        

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $hospital->id }}"
                                                title="delete"><i
                                                    class="fa fa-trash">Delete</i></button>

                                    </td>

                                    <!-- delete_modal_hospital -->
                                    <div class="modal fade" id="delete{{ $hospital->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('site.delete-hospital') }} 
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('hospital.destroy',$hospital->id)}}" method="post">
                                                        {{-- {{method_field('Delete')}} --}}
                                                        @method('delete')
                                                        @csrf
                                                        {{ trans('site.are-you-sure-you-want-to-delete') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $hospital->id }}">
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




        {{-- add modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('site.add-branch') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="" method="POST">
                                        @csrf

                                       <div class="row">


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('site.name') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('site.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('site.save') }}</button>
                                            </div>

                                        </div>
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
