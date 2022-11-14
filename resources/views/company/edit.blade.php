@extends('main')
@section('css')
    <!-- Datatable css -->

    <link rel="stylesheet" href="{{url('public')}}/assets/vendor/libs/datatables.bootstrap5.css">
    {{--    <link rel="stylesheet" href="{{url('public')}}/assets/vendor/libs/responsive.bootstrap5.css">--}}
    {{--    <link rel="stylesheet" href="{{url('public')}}/assets/vendor/libs/datatables.checkboxes.css">--}}
    {{--    <link rel="stylesheet" href="{{url('public')}}/assets/vendor/libs/buttons.bootstrap5.css">--}}








@endsection
@section('container')




    <div class="container-xxl flex-grow-1 container-p-y">



        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    {{--                    <h5 class="card-header">All Employees--}}
                    {{--                        <a href="{{route('employees.create')}}" class="btn btn-sm btn-info bx-pull-right m-4" >+</a>--}}
                    {{--                    </h5>--}}

                    <div class="card-header">
                        <form method="post" action="{{route('company.store')}}">
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4" >
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company_name" value="{{$company->company_name}}" required>
                                </div>

                                <div class="form-group col-md-4" >
                                    <label>License</label>
                                    <input type="text" class="form-control" name="license" value="{{$company->license}}" required>
                                </div>

                                <div class="form-group col-md-4" >
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" value="{{$company->contact_number}}" required>
                                </div>

                                <div class="form-group col-md-12" >
                                    <label>Office Address</label>
                                    <input type="text" class="form-control" name="office_address" value="{{$company->office_address}}" required>
                                </div>


                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <button class="btn btn-success">Update</button>
                                </div>

                            </div>
                        </form>

                    </div>




                </div>
            </div>



        </div>




        @endsection

