@extends('admin.admin_dashboard')


@section('admin')

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">

                            <div>
                                <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/admin.png') }}"
                                    class="wd-100 rounded-circle">
                                <span class="h4 ms-3">{{ $profileData->username }}</span>
                            </div>

                        </div>

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Admin</h6>

                            <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $profileData->name }}" autocomplete="off" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ $profileData->username }}" autocomplete="off" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email address</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $profileData->email }}" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ $profileData->phone }}" autocomplete="off" placeholder="address">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $profileData->address }}" autocomplete="off" placeholder="address">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Photo</label>
                                    <input type="file" class="form-control" name="photo" id="image">
                                   
                                </div>

                                <div class="m-4">
                                    <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/admin.png') }}"
                                        class="wd-100 rounded-circle" id="showImage">
                                    <span class="h4 ms-3">{{ $profileData->username }}</span>
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

    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                 var reader = new FileReader();
                 reader.onload = function(e){
                    $('#showImage').attr('src' , e.target.result);
                 }
                 reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
