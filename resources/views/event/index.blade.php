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
                        <form method="post" action="{{route('event.store')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4" >
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>

                                <div class="form-group col-md-4" >
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="price" required>
                                </div>

                                <div class="form-group col-md-4" >
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>

                                <div class="form-group col-md-4" >
                                    <label>End Date</label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>

                                <div class="form-group col-md-8" >
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="details" required>
                                </div>


                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <button class="btn btn-success">Insert</button>
                                </div>

                            </div>
                        </form>

                    </div>


                    <div class="card-body">
                        <div class="tab-content doc-example-content" id="tab-tabContent" data-label="Example">
                            <div class="tab-pane fade show active" id="basic-datatable-preview" role="tabpanel" aria-labelledby="basic-datatable-preview-tab">
                                <div class="card">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table border-top" id="example">
                                            <thead>
                                            <tr>
                                                <th>title</th>
                                                <th>price</th>
                                                <th>Duration</th>
                                                <th>details</th>
                                                <th>Edit</th>

                                                {{--                                                <th>Action</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($events as $comp)
                                                <tr>
                                                    <td>{{$comp->title}}</td>
                                                    <td>{{$comp->price}}</td>
                                                    <td>
                                                        {{$comp->start_date}} ||
                                                        {{$comp->end_date}}

                                                    </td>
                                                    <td>{{$comp->details}}</td>
                                                    <td>
                                                        <a href="{{route('event.edit',$comp->id)}}" class="btn btn-info">Edit</a>
                                                    </td>
                                                    {{--                                                    <td><a href="{{route('employees.edit',$emp->id)}}" class="btn btn-sm btn-info">Show</a>--}}
                                                    {{--                                                        <form action="{{ route('employees.destroy',$emp->id) }}" method="POST">--}}
                                                    {{--                                                            @csrf--}}
                                                    {{--                                                            @method('DELETE')--}}

                                                    {{--                                                            <button type="submit" class="btn sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><span class="bx bx-trash"></span></button>--}}
                                                    {{--                                                        </form>--}}
                                                    {{--                                                    </td>--}}

                                                </tr>
                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- /Account -->
                    </div>

                </div>
            </div>



        </div>




        @endsection
        @section('js')

            {{--            https://code.jquery.com/jquery-3.5.1.js--}}


            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


            {{--    <script src="{{url('public')}}/assets/vendor/libs/jquery.dataTables.js"></script>--}}
            {{--            <!-- BS table js -->--}}

            {{--            <script src="{{url('public')}}/assets/vendor/libs/datatables-bootstrap5.js"></script>--}}
            {{--            <script src="{{url('public')}}/assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>--}}
            {{--            <script src="{{url('public')}}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>--}}
            {{--            <script src="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>--}}
            {{--            <script src="assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>--}}
            {{--            <script src="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>--}}
            {{--            <script src="assets/vendor/libs/jszip/jszip.js"></script>--}}
            {{--            <script src="assets/vendor/libs/pdfmake/pdfmake.js"></script>--}}
            {{--            <script src="assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>--}}
            {{--            <script src="assets/vendor/libs/datatables-buttons/buttons.print.js"></script>--}}

            {{--            <!-- Page JS -->--}}
            {{--            <script src="assets/js/docs.js"></script>--}}

            {{--            <script src="{{url('public')}}/assets/vendor/libs/docs-tables-datatables.js"></script>--}}
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>


@endsection
