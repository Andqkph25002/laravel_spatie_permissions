@extends('admin.admin_dashboard')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <style>
        .form-check-label{
            text-transform: capitalize;
        }
    </style>
@section('admin')
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Roles in Permission</h6>

                            <form method="POST" action="{{ route('role.permission.store') }}" class="forms-sample" id="myForm">
                                @csrf


                                <div class="mb-3">
                                    <label for="" class="form-label">Roles Name</label>
                                    <select name="role_id" id="role_id" class="form-select" required>
                                        <option value="" disabled selected>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                    <label class="form-check-label" for="checkDefaultmain">Permission All</label>
                                </div>
                                <hr>
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault">
                                                <label class="form-check-label"
                                                    for="checkDefault">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                            @endphp
                                            @foreach ($permissions as $item)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" name="permission[]" class="form-check-input"
                                                        id="checkDefault{{ $item->id }}" value="{{ $item->id }}">
                                                    <label class="form-check-label"
                                                        for="checkDefault{{ $item->id }}">{{ $item->name }}</label>
                                                </div>
                                            @endforeach
                                            <br>

                                        </div>
                                    </div>
                                @endforeach



                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>

    <script>
        $("#checkDefaultmain").click(function(){
             if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked' , true);
             }else{
                $('input[type=checkbox]').prop('checked' , false);
             }
        });
    </script>
@endsection
