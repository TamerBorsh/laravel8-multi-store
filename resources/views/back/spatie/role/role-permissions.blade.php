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
                        <div class="card-block">
                           
                            @foreach ($permissions as $permission)
                                <button class="btn" style=" margin: 10px; ">
                                   
                                    <input type='checkbox' class="checkbox-color" id="{{$permission->id}}" onchange="update('{{$role->id}}', '{{$permission->id}}')" @if($permission->assigned) checked="" @endif >{{$permission->name}}</button>
        
                            @endforeach
                        </div>
                    </div>
                {{-- End Index --}}
                </div>

                </div>
            </div>
            <!-- Main-body end -->
        </div>
    </div>
@endsection
@section('script')
<script>
  function update(roleId, permissionId)
  {
    axios.put('/dashboard/roles/'+ roleId +'/permissions',{
      permission_id: permissionId,
    }).then(function (response) {
    //   console.log(response);
      toastr.success(response.data.message);

    }).catch(function (error) {
      // console.log(error);
      toastr.error(error.response.data.message);
    })
  }
</script>
@endsection