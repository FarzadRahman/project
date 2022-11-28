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
                        <form method="post" action="{{route('event.store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{$event->id}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$event->title}}"
                                           required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="price" value="{{$event->price}}"
                                           required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date"
                                           value="{{$event->start_date}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>End Date</label>

                                    <input type="date" class="form-control" name="end_date" value="{{$event->end_date}}"
                                           required>
                                </div>

                                <div class="form-group col-md-8">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="details" value="{{$event->details}}"
                                           required>
                                </div>

                                <div class="col-md-12"><br></div>

                                <div class="form-group col-md-6">
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <button class="btn btn-success">Update</button>
                                </div>

                            </div>
                        </form>


                    </div>


                </div>
                @if($event->image)
                    <img src={{url('public/images/'.$event->image)}} width="300">
                @endif
            </div>


        </div>

@endsection

