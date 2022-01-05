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
                                <button type="button" class="btn btn-success btn-outline-default waves-effect md-trigger" data-modal="modal-add">Add permission</button>
                            </div>                 
                        </div>
                        {{-- =========Button========= --}}
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-de">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>permission Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <th scope="row">{{$permission->id}}</th>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->guard_name}}</td>
                                            <td data-id="{{$permission->id}}" class="text-center">
                                                <a class="btn btn-sm btn-info text-light waves-effect md-trigger" id="editRow" data-id="{{$permission->id}}" data-modal="modal-edit" style=" padding: 6px 10px; "><span class="icofont icofont-ui-edit"></span></a>
                                                <a class="btn btn-sm btn-danger text-light"  id="deleteRow" data-id="{{$permission->id}}" style=" padding: 6px 10px; "><span class="icofont icofont-ui-delete"></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>{{$permissions->links()}}
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
                                    <p>This is a modal window. You can do the following things with it:</p>
                                    <form id="addNewDataForm">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="text" id="name" class="form-control" placeholder="col-sm-6">
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="select" class="form-control" id="permission">
                                                    <option value="user">User</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="admin">Admin</option>
                                                </select>
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
                                                <input type="text" id="e_name" class="form-control" placeholder="col-sm-6">
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="select" class="form-control" id="e_permission">
                                                    <option value="user">User</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="admin">Admin</option>
                                                </select>
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
        axios.post("{{ route('permissions.store') }}", {
            name: $('#name').val(),
            guard_name: $('#permission').val(),
        }).then(function (response) {
            toastr.success(response.data.message);
            window.location.href = location.href
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
        let edit = '/'+ window.location.pathname.split('/')[1] +'/dashboard/permissions/'+ id + '/edit';
        axios.get(edit)
        .then(function(res){
            // console.log(res);
            $('#e_id').val(res.data.id)
            $('#e_name').val(res.data.name)
            $('#e_permission').val(res.data.guard_name).checked
        })
    })
    //update
    $('body').on('submit','#editDataForm',function(e){
        e.preventDefault()
        let id = $('#e_id').val()
        axios.put('/'+ window.location.pathname.split('/')[1] +'/dashboard/permissions/'+ id, {
            name: $('#e_name').val(),
            guard_name: $('#e_permission').val(),
        }).then(function (response) {
            toastr.success(response.data.message);
            window.location.href = location.href
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
                destroy(id);
            }
        });
        function destroy(id)
        {
            axios.delete('/dashboard/permissions/'+id)
            .then(function (response) {
                // console.log(response);
                // reference.closest('tr').remove();
                showMessage(response.data);
                window.location.href = location.href
            }).catch(function (error) {
                console.log(error);
                showMessage(error.response.data);
            })
        }
        function showMessage(data)
        {
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