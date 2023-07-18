@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Roles</h6>

                            <form method="POST" action="{{ route('update.roles') }}" class="forms-sample" id="myForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $roles->id }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Roles Name</label>
                                    <input type="text" class="form-control" value="{{ $roles->name }}" name="name"
                                        autocomplete="off" required id="name">

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
