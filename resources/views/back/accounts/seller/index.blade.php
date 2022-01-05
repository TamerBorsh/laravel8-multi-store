@extends('back.layouts.master')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
                <h4 class="page-title">Products</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#add"><i class="mdi mdi-plus-circle me-2"></i> Add seller</button>
                        </div>
                    </div>
                    <table class="table table-sm table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Status</th>
                                <th>created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $seller)
                                <tr>
                                    <td class="table-user">
                                        <img src="{{asset('backend/assets/images/users/avatar-2.jpg')}}" alt="table-user" class="me-2 rounded-circle" />
                                        {{$seller->first_name. ' ' .$seller->last_name}}
                                    </td>
                                    <td>{{$seller->email}}</td>
                                    <td>{{$seller->mobile_number }}</td>
                                    <td>{{$seller->State}}</td>
                                    <td>{{$seller->created_at}}</td>
                                    <td class="table-action" data-id="{{$seller->id}}">
                                        <a href="javascript: void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#edit"  id="editRow" data-id="{{$seller->id}}"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript: void(0);" class="action-icon"  id="deleteRow" data-id="{{$seller->id}}"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->



<!-- add modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">ADD seller</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="addNewDataForm">
                    @csrf
                    @method('POST')
                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label for="role" class="form-label">Role Nmae</label>
                            <select id="role" class="form-select">
                                <option>Choose</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="First name">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mobile_number" class="form-label">Mobile Number</label>
                            <input type="number" class="form-control" id="mobile_number" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label for="state" class="form-label">Status</label>
                            <select id="state" class="form-select">
                                <option>Choose</option>
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                    </div>
                                
                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" class="form-select">
                                <option>Choose</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                                <option value="">Option 3</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="number" class="form-control" id="postal_code">
                        </div>
                    </div>          
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end modal -->
<!-- edit modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit seller</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form id="editDataForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="e_id">
                    <div class="row g-2">
                        <div class="mb-3 col-md-4">
                            <label for="e_role" class="form-label">Role Nmae</label>
                            <select id="e_role" class="form-select">
                                <option>Choose</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="e_first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="e_first_name" placeholder="First name">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="e_last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="e_last_name" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="e_email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="e_email" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="e_mobile_number" class="form-label">Mobile Number</label>
                            <input type="number" class="form-control" id="e_mobile_number" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="e_status" class="form-label">Status</label>
                            <select id="e_status" class="form-select">
                                <option>Choose</option>
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="e_image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="e_image">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                    </div>
                                
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="inputState" class="form-label">Country</label>
                            <select id="inputState" class="form-select">
                                <option>Choose</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>          
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end modal -->



@endsection
@section('script')
<script>
    //Store
    $('body').on('submit', '#addNewDataForm', function(e) {
        e.preventDefault();
        axios.post("{{ route('sellers.store') }}", {
                role_id: $('#role').val(),
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                email: $('#email').val(),
                mobile_number: $('#mobile_number').val(),
                password: $('#password').val(),
                status: $('#state').val(),
                receive_email: $('#receive_email').val(),
                image: $('#image').val(),
            }).then(function(response) {
                toastr.success(response.data.message);
                window.location.href = "{{ route('sellers.store') }}"
            })
            .catch(function(error) {
                // console.log(error);
                if (error.response.status == 422) {
                    var object = error.response.data.data.errors;
                    for (const key in object) {
                        var message = object[key][0]
                        break;
                    }
                    toastr.error(message);
                } else {
                    toastr.error(error.response.data.message);
                }
            });
    });

    //Edit
    $('body').on('click', '#editRow', function() {
        let id = $(this).data('id');
        let edit = '/' + window.location.pathname.split('/')[1] + '/dashboard/sellers/' + id + '/edit';
        axios.get(edit)
        .then(function(res) {
            // console.log(res);
            $('#e_id').val(res.data.id)
            $('#e_first_name').val(res.data.first_name)
            $('#e_last_name').val(res.data.last_name)
            $('#e_email').val(res.data.email)
            $('#e_mobile_number').val(res.data.mobile_number)
            $('#e_status').val(res.data.status)
        })
    })

    //update
    $('body').on('submit', '#editDataForm', function(e) {
        e.preventDefault()
        let id = $('#e_id').val()
        axios.put('/' + window.location.pathname.split('/')[1] + '/dashboard/sellers/' + id, {
                role_id: $('#e_role').val(),
                first_name: $('#e_first_name').val(),
                last_name: $('#e_last_name').val(),
                email: $('#e_email').val(),
                mobile_number: $('#e_mobile_number').val(),
                status: $('#e_status').val(),
                image: $('#e_image').val(),
            }).then(function(response) {
                toastr.success(response.data.message);
                window.location.href = "{{ route('sellers.store') }}"
            })
            .catch(function(error) {
                // console.log(error);
                if (error.response.status == 422) {
                    var object = error.response.data.data.errors;
                    for (const key in object) {
                        var message = object[key][0]
                        break;
                    }
                    toastr.error(message);
                } else {
                    toastr.error(error.response.data.message);
                }
            });
    })
    //delete 
    $('body').on('click', '#deleteRow', function(e) {
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
                axios.delete('/dashboard/sellers/' + id)
                    .then(function(response) {
                        // console.log(response);
                        // reference.closest('tr').remove();
                        showMessage(response.data);
                        window.location.href = "{{ route('sellers.store') }}"
                    }).catch(function(error) {
                        console.log(error);
                        showMessage(error.response.data);
                    })
            }
        });

        function showMessage(data) {
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
