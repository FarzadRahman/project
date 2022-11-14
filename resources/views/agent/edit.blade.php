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


                    <div class="card-header">
                        <form method="post" action="{{route('agent.update')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$agent->id}}">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Agent Name</label>
                                    <input type="text" class="form-control" name="agent_name" value="{{$agent->agent_name}}" required>
                                </div>


                                <div class="form-group col-md-4">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" name="contact_number" value="{{$agent->contact_number}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>NID</label>
                                    <input type="text" class="form-control" name="nid" value="{{$agent->nid}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Company</label>

                                    <select class="form-control" name="company_id" required>
                                        <option value="">Select Company</option>
                                        @foreach($companies as $comp)
                                            <option value="{{$comp->company_id}}" @if($comp->company_id ==$agent->company_id) selected @endif>{{$comp->company_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" required autocomplete="off"
                                           value="{{$user->email}}">
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
