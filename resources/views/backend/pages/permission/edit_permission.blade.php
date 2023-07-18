@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Permission</h6>

                            <form method="POST" action="{{ route('update.permission') }}" class="forms-sample" id="myForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $permission->id }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Permission Name</label>
                                    <input type="text" class="form-control" value="{{ $permission->name }}"
                                        name="name" autocomplete="off" required id="name">

                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Group Name</label>
                                    <select name="group_name" id="group_name" class="form-select" required>
                                        <option value="" disabled selected>Select Group</option>
                                        <option value="property"
                                            {{ $permission->group_name == 'property' ? 'selected' : '' }}>Property</option>
                                        <option value="amentities"
                                            {{ $permission->group_name == 'amentities' ? 'selected' : '' }}>Amentities
                                        </option>

                                    </select>
                                </div>



                                <button type="submit" class="btn btn-primary me-2">Update</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>
@endsection
