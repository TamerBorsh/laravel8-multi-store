@extends('back.layouts.master')
@section('stylesheet')
<style>
.md-content button {
    display: inline-block;
} 
</style>
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Bootstrap Table Sizes</h4>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Sizing Table</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                {{-- Start Index --}}
                <div class="page-body">
                    <div class="card">
                        {{-- =========Button========= --}}
                        <div class="card-header">
                            <div class="card-block">
                                <button type="button" class="btn btn-success btn-outline-default waves-effect md-trigger" data-modal="modal-add">Add user</button>
                            </div>                 
                        </div>
                        {{-- =========Button========= --}}
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-xs table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>first_name</th>
                                            <th>last_name</th>
                                            <th>email</th>
                                            <th>mobile_number</th>
                                            <th>status</th>
                                            <th>receive_email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile_number}}</td>
                                            <td>{{$user->status}}</td>
                                            <td>{{$user->receive_email}}</td>
                                            <td data-id="{{$user->id}}" class="text-center">
                                                <a class="btn btn-sm btn-info text-light waves-effect md-trigger" id="editRow" data-id="{{$user->id}}" data-modal="modal-edit" style=" padding: 6px 10px; "><span class="icofont icofont-ui-edit"></span></a>
                                                <a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="{{$user->id}}" style=" padding: 6px 10px; "><span class="icofont icofont-ui-delete"></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>{{ $users->links() }}
                        </div>
                    </div>
                {{-- End Index --}}
                </div>
{{-- ================================================================== --}}
                <div class="card-block">
                    <div class="animation-model">
                        {{-- Add Model --}}
                        <div class="md-modal md-effect-5" id="modal-add">
                            <div class="md-content">
                                <div>
                                    <p>Add user</p>
                                    <form id="addNewDataForm">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group row">
                          
                                            <div class="col-sm-6">
                                                <label for="first_name">First Fame</label>
                                                <input type="text" id="first_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" id="last_name" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="mobile_number">Mobile Number</label>
                                                <input type="text" id="mobile_number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="username">Username</label>
                                                <input type="text" id="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                               
                                            <div class="col-sm-6">
                                                <label for="password">Password</label>
                                                <input type="text" id="password" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="status">Status</label>
                                                <select name="select" class="form-control" id="status">
                                                    <option value="0">Inactive</option>
                                                    <option value="1">active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="receive_email">Receive an email</label>
                                                <select name="select" class="form-control" id="receive_email">
                                                    <option value="0">Inactive</option>
                                                    <option value="1">active</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="file">
                                                    <input type="file" id="image" aria-label="File browser example">
                                                    <span class="file-custom"></span>
                                                  </label>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success alert-success-msg m-b-10">save</button>
                                            <button type="button" class="btn btn-danger alert-success-cancel m-b-10 md-close">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- End Add Model --}}
                        {{-- Edit Model --}}
                        <div class="md-modal md-effect-5" id="modal-edit">
                            <div class="md-content">
                                <div>
                                    <p>Edit</p>
                                        <form id="editDataForm">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" id="e_id">
                                            <div class="form-group row">
                               
                                                <div class="col-sm-6">
                                                    <label for="first_name">First Fame</label>
                                                    <input type="text" id="e_first_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" id="e_last_name" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="mobile_number">Mobile Number</label>
                                                    <input type="text" id="e_mobile_number" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="email">Email</label>
                                                    <input type="text" id="e_email" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="username">Username</label>
                                                    <input type="text" id="e_username" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                   
                                                <div class="col-sm-6">
                                                    <label for="password">Password</label>
                                                    <input type="text" id="e_password" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="receive_email">Status</label>
                                                    <select name="select" class="form-control" id="e_status">
                                                        <option value="0">Inactive</option>
                                                        <option value="1">active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="receive_email">Receive an email</label>
                                                    <select name="select" class="form-control" id="e_receive_email">
                                                        <option value="0">Inactive</option>
                                                        <option value="1">active</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="file">
                                                        <input type="file" id="image" aria-label="File browser example">
                                                        <span class="file-custom"></span>
                                                      </label>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success alert-success-msg m-b-10">save</button>
                                                <button type="button" class="btn btn-danger alert-success-cancel m-b-10 md-close">Close</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        {{-- End Edit Model --}}                                
                        <!--animation modal  Dialogs ends -->
                        <div class="md-overlay"></div>
                    </div>
                </div>
{{-- ================================================================== --}}

                </div>
            </div>
            <!-- Main-body end -->
        </div>
    </div>
@endsection
@section('script')
<script>
    //Store
    $('body').on('submit','#addNewDataForm',function(e){
        e.preventDefault();
        axios.post("{{ route('users.store') }}", {
            role_id: $('#role').val(),
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            username: $('#username').val(),
            mobile_number: $('#mobile_number').val(),
            password: $('#password').val(),
            status: $('#status').val(),
            receive_email: $('#receive_email').val(),
            image: $('#image').val(),
        }).then(function (response) {
            toastr.success(response.data.message);
            window.location.href = "{{ route('users.store') }}"
        })
        .catch(function (error) {
            // console.log(error);
            if (error.response.status == 422) {
                var object = error.response.data.data.errors;
                for (const key in object) {
                    var message = object[key][0]
                    break;
            }
            toastr.error(message);
            }else{
                toastr.error(error.response.data.message);
            }
        });
    });

    //Edit
    $('body').on('click','#editRow',function(){
        let id = $(this).data('id');
        let edit = '/'+ window.location.pathname.split('/')[1] +'/dashboard/users/'+ id + '/edit';
        axios.get(edit)
        .then(function(res){
            // console.log(res);
            $('#e_id').val(res.data.id)
            $('#e_role').val(res.data.guard_name).checked
            $('#e_first_name').val(res.data.first_name)
            $('#e_last_name').val(res.data.last_name)
            $('#e_email').val(res.data.email)
            $('#e_username').val(res.data.username)
            $('#e_mobile_number').val(res.data.mobile_number)
            $('#e_password').val(res.data.password)
            $('#e_status').val(res.data.status)
            $('#e_receive_email').val(res.data.receive_email)
        })
    })

    //update
    $('body').on('submit','#editDataForm',function(e){
        e.preventDefault()
        let id = $('#e_id').val()
        axios.put('/'+ window.location.pathname.split('/')[1] +'/dashboard/users/'+ id, {
            role_id:        $('#e_role').val(),
            first_name:     $('#e_first_name').val(),
            last_name:      $('#e_last_name').val(),
            email:          $('#e_email').val(),
            username:       $('#e_username').val(),
            mobile_number:  $('#e_mobile_number').val(),
            password:       $('#e_password').val(),
            status:         $('#e_status').val(),
            receive_email:  $('#e_receive_email').val(),
            image:          $('#e_image').val(),
        }).then(function (response) {
            toastr.success(response.data.message);
            window.location.href = "{{ route('users.store') }}"
        })
        .catch(function (error) {
            // console.log(error);
            if (error.response.status == 422) {
                var object = error.response.data.data.errors;
                for (const key in object) {
                    var message = object[key][0]
                    break;
            }
            toastr.error(message);
            }else{
                toastr.error(error.response.data.message);
            }
        });
    })
    //delete 
    $('body').on('click','#deleteRow',function (e) {
        e.preventDefault();
        let id = $(this).data('id')
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/dashboard/users/'+id)
                .then(function (response) {
                    // console.log(response);
                    // reference.closest('tr').remove();
                    showMessage(response.data);
                    window.location.href = "{{ route('users.store') }}"
                }).catch(function (error) {
                    console.log(error);
                    showMessage(error.response.data);
                })
            }
        });
        function showMessage(data){
            Swal.fire({
            position: 'top-end',
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
            })
        }
    });   
</script>
@endsection