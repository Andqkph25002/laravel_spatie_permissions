@extends('admin.admin_dashboard')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
@section('admin')
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Admin</h6>

                            <form method="POST" action="{{ route('store.admin') }}" class="forms-sample" id="myForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Admin User Name</label>
                                    <input type="text" class="form-control" name="username" autocomplete="off"
                                        id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admin Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admin Email</label>
                                    <input type="text" class="form-control" name="email" autocomplete="off"
                                        id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admin Phone</label>
                                    <input type="text" class="form-control" name="phone" autocomplete="off"
                                        id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admin Address</label>
                                    <input type="text" class="form-control" name="address" autocomplete="off"
                                        id="address">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Admin Password</label>
                                    <input type="password" class="form-control" name="password" autocomplete="off"
                                        id="password">

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Role Name</label>
                                   <select name="roles" class="form-select" required>
                                         <option value="" selected disabled>Select Role</option>
                                         @foreach ($roles as $item)
                                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                                         @endforeach
                                   </select>

                                </div>






                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>

  
@endsection
