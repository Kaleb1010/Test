<!DOCTYPE html>
<html dir="ltr" lang="en">
@include('head')
<body>

<div id="page-wrapper">

    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">TODO</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item text-muted active" aria-current="page">Apps</li>
                                <li class="breadcrumb-item text-muted" aria-current="page">Todo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">


            <div class="row">
                <div class="col">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header " style="color: black"><strong>Reports</strong><small> and</small><strong> Tasks</strong></div>


                            <form action="{{route('create')}}" method="post">
                                @csrf

                                <div class="results">
                                    @if(\Illuminate\Support\Facades\Session::get('success_todo'))
                                        <div class="alert alert-success_todo">
                                            <script>
                                                swal("Okay! Task Added!", {
                                                    icon: "success",
                                                });

                                            </script>
                                        </div>
                                    @endif


                                    @if(\Illuminate\Support\Facades\Session::get('fails'))
                                        <div class="alert alert-danger">
                                            {{\Illuminate\Support\Facades\Session::get('fails')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">


                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Task Title</label>
                                                <input type="text" name="task_title" placeholder="Enter task title" class="form-control">
                                                <span class="text-danger">@error('task_title') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="assigned_by" class=" form-control-label">Assigned by?</label>
                                                <select name="assigned_by" id="assigned_by" class="form-control">

                                                    <option value="{{$user->name}}">{{$user->name}}</option>


                                                </select>
                                                <span class="text-danger">@error('assigned_by') {{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="assigned_to" class=" form-control-label">Assigned to</label>
                                            <select name="assigned_to" id="assigned_to" class="form-control">
                                                <option></option>
                                                @foreach ($employee_name as $data1)
                                                    <option value="{{ $data1->name }}">{{ $data1->name }}</option>
                                                @endforeach
                                                <option value="admin">Admin</option>

                                            </select>
                                                <span class="text-danger">@error('task_title') {{$message}} @enderror</span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class=" form-control-label"> Task Status</label>
                                                <!--                                                    <input type="text" id="postal-code" placeholder="Postal Code" class="form-control"></div>-->
                                                <select required name="task_status" id="task_status" class="form-control">
                                                    <option></option>
                                                    <option value="pending">Pending</option>
                                                </select>
                                                <span class="text-danger">@error('task_status') {{$message}} @enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"><label for="description" class=" form-control-label">Task Description</label>
                                        <textarea required type="text" name="description" placeholder="Task Description" class="form-control">

                                    </textarea>
                                        <span class="text-danger">@error('description') {{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm btn-success shadow" style="border-radius: 5px">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm shadow" style="border-radius: 5px">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                @if(\Illuminate\Support\Facades\Session::get('warning'))
                    <div class="alert alert-warning_change">
                        <script>
                            swal("Nope! You are not authorized to access this page!", {
                                icon: "warning",
                            });
                        </script>
                    </div>
                @endif

                @if(\Illuminate\Support\Facades\Session::get('denied'))
                    <div class="alert alert-warning_change">
                        <script>
                            swal("Nope! You are not authorized to access this page!, Contact Admin", {
                                icon: "error",
                            });
                        </script>
                    </div>
                @endif
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Task Table</h3>
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class=" card card-body col-12  shadow" style="border-radius: 30px; ">
                    <div class="table-responsive " >
                        <table id="example" class="table table-striped table-hover table-bordered no-wrap">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Task Name</th>
                                <th>Assigned by</th>
                                <th>Assigned to</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $details)
                                <tr class="details{{$details->id}}">

                                    <td> <span class="fa fa-eye"
                                                    data-toggle="modal"
                                                          data-target="#task_view"
                                                          data-task_title="{{$details->task_title}}"
                                                          data-assigned_by="{{$details->assigned_by}}"
                                                          data-assigned_to="{{$details->assigned_to}}"
                                                          data-task_status="{{$details->task_status}}"
                                                          data-created_at="{{$details->created_at}}"
                                                          data-description="{{$details->description}}">
                                           </span>
                                    </td>
                                        <td>
                                            <button class="btn btn-info shadow"
                                                    style="border-radius: 5px"
                                                       data-toggle="modal"
                                                   data-target="#task_edit"
                                                   data-id1="{{$details->id}}"
                                                   data-task_title1="{{$details->task_title}}"
                                                   data-assigned_by1="{{$details->assigned_by}}"
                                                   data-assigned_to1="{{$details->assigned_to}}"
                                                   data-task_status1="{{$details->task_status}}"
                                                   data-created_at1="{{$details->created_at}}"
                                                   data-description1="{{$details->description}}">
                                                <span class="fa fa-edit"></span> Edit</button></td>
                                    @if($details->task_status != 'complete' and $details->task_status != 'approved')
                                        <td >
                                            <a href="#" class="complete alert-complete-success" data-id="{{$details->id}}" data-status="{{$details->task_status}}" data-name="{{$details->task_title}}">
                                                <span class="fa fa-clipboard-check" style="color: forestgreen"></span></a>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{$details->task_title}}</td>
                                    <td><a href="javascript:void(0)" class="font-weight-medium link">{{$details->assigned_by}}</a></td>
                                    <td><a href="javascript:void(0)" class="font-bold link">{{$details->assigned_to}}</a></td>
                                    <td>{{$details->task_status}}</td>
                                    <td>{{date('d-m-Y', strtotime($details->created_at))}}</td>
                                    <td>{{$details->description}}</td>
                                    <td><a href="#" class="delete alert-delete-success" data-id="{{$details->id}}" data-name="{{$details->name}}"><span  class="fa fa-trash-alt" style="color: red"></span></a></td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal fade" id="task_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content" style="border-radius: 10px;" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Table View</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <form action="" method="post">
                                        @csrf
                                        <input name="id3" type="hidden" id="id3" class=" form-control mb-3"  style=" border-radius: 5px">
                                        <label for="task_title"> <strong> Task Title:</strong></label>
                                        <input  disabled name="task_title3" type="text" id="task_title3" class=" form-control mb-3"  style=" border-radius: 5px">

                                        <label for="assigned_by3" class=" form-control-label">Assigned by</label>
                                        <input disabled name="assigned_by3" type="text" id="assigned_by3" class="form-control mb-3"  style="background-color: whitesmoke; border-radius: 5px">
                                        <div class="form-group">
                                            <label for="assigned_to3" class=" form-control-label">Assigned to</label>
                                            <input disabled name="assigned_to3" id="assigned_to3" class="form-control">
                                            <span class="text-danger">@error('assigned_to3') {{$message}} @enderror</span>
                                        </div>

                                        <div class="form-group">
                                            <label for="status3" class=" form-control-label" > Task Status</label>
                                            <input disabled name="status3" id="status3" class="form-control" style=" border-radius: 5px">

                                            <span class="text-danger">@error('status3') {{$message}} @enderror</span>
                                        </div>

                                        <label for="created_at3" class=" form-control-label" > Created At</label>
                                        <input type="text" id="created_at3" class="form-control mb-3" disabled style="background-color: whitesmoke; border-radius: 5px">
                                        <label for="description3" class=" form-control-label" >Description </label>
                                        <textarea disabled name="description3" type="text" id="description3" class="form-control mb-3"  style=" border-radius: 5px"></textarea>
                                        <div class="modal-footer"></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="task_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content" style="border-radius: 10px;" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Table View</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('edit_todo')}}" method="post">
                                    @csrf
                                    <input name="id" type="hidden" id="id" class=" form-control mb-3"  style=" border-radius: 5px">
                                    <label for="task_title"> <strong> Task Title:</strong></label>
                                    <input name="task_title" type="text" id="task_title" class=" form-control mb-3"  style=" border-radius: 5px">


                                    <label for="task_title"> <strong> Assigned by:</strong></label>
                                    <input disabled name="assigned_by" type="text" id="assigned_by" class="form-control mb-3"  style="background-color: whitesmoke; border-radius: 5px">
                                    <div class="form-group">
                                        <label for="assigned_to" class=" form-control-label">Assigned to</label>
                                        <select name="assigned_to" id="assigned_to" class="form-control">
                                            <option></option>
                                            @foreach ($employee_name as $data1)
                                                <option value="{{ $data1->name }}">{{ $data1->name }}</option>
                                            @endforeach
                                            <option value="admin">Admin</option>

                                        </select>                                        <span class="text-danger">@error('assigned_to3') {{$message}} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="status" class=" form-control-label" > Task Status</label>
                                        <select name="status" id="status" class="form-control" style=" border-radius: 5px">
                                            <option></option>
                                            <option value="pending">Pending</option>
                                            <option value="changes">Project changes</option>
                                            <option value="approved">Approved</option>
                                        </select>
                                        <span class="text-danger">@error('status3') {{$message}} @enderror</span>
                                    </div>

                                    <label for="created_at"> <strong> Created at:</strong></label>
                                    <input  type="text" id="created_at" class="form-control mb-3" disabled style="background-color: whitesmoke; border-radius: 5px">
                                    <label for="description" class=" form-control-label" > Task Description</label>
                                    <textarea name="description" type="text" id="description" class="form-control mb-3"  style=" border-radius: 5px"></textarea>
                                    <div class="modal-footer"> <button type="submit" class="btn btn-success shadow " style="border-radius: 5px"> Save Changes</button></div>


                                </form>
                            </div>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::get('success-edit'))
                        <div class="alert alert-success">
                            <script>
                                swal("yay! Edit Successful!", {
                                    icon: "success",
                                });
                            </script>
                        </div>
                    @endif
                </div>


            </div>


            <footer class="footer text-center">
                All Rights Reserved by . Designed and Developed by <a
                    href=""></a>.
            </footer>
            <!-- End footer -->

        </div>

        <!-- All Jquery -->
@include('script')
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });

    } );

    $('#task_view').on('shown.bs.modal', function (event) {
        const modal = $(this)
        const button = $(event.relatedTarget)
        // const id = button.data('id')
        const task_title = button.data('task_title')
        const assigned_by = button.data('assigned_by')
        const assigned_to = button.data('assigned_to')
        const task_status = button.data('task_status')
        const created_at = button.data('created_at')
        const description = button.data('description')
        // $('#exampleModal').modal('show');




        modal.find('.modal-body #task_title3').val(task_title);
        modal.find('.modal-body #assigned_by3').val(assigned_by);
        modal.find('.modal-body #assigned_to3').val(assigned_to);
        modal.find('.modal-body #status3').val(task_status);
        modal.find('.modal-body #created_at3').val(created_at);
        modal.find('.modal-body #description3').val(description);

    });

    $('#task_edit').on('shown.bs.modal', function (event) {
        const modal = $(this)
        const button = $(event.relatedTarget)
        const id = button.data('id1')
        const task_title = button.data('task_title1')
        const assigned_by = button.data('assigned_by1')
        const assigned_to = button.data('assigned_to1')
        const task_status = button.data('task_status1')
        const created_at = button.data('created_at1')
        const description = button.data('description1')
        // $('#exampleModal').modal('show');


        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #task_title').val(task_title);
        modal.find('.modal-body #assigned_by').val(assigned_by);
        modal.find('.modal-body #assigned_to').val(assigned_to);
        modal.find('.modal-body #status').val(task_status);
        modal.find('.modal-body #created_at').val(created_at);
        modal.find('.modal-body #description').val(description);
        console.log(id)
        console.log(task_status)
        console.log(task_title)

    });
</script>
<script>
    $('.complete').click(function (){
        const id = $(this).attr('data-id');
        const status = $(this).attr('data-status');
        const name = $(this).attr('data-name');
        swal({
            title: "Are you sure?",
            text: "Task: "+name+" is completed",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/completed/"+id+"/"+status+"";
                }
            });
    });




    $('.delete').click(function (){
        const id = $(this).attr('data-id');
        const name = $(this).attr('data-name');
        swal({
            title: "Are you sure?",
            text: "Once "+name+" is deleted, you will not be able to recover these Details!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin_delete/"+id+"";
                }
            });
    });
</script>
</html>
