@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Property Type</h6>

                            <form method="POST" action="{{ route('update.type') }}" class="forms-sample">
                                @csrf
                                <input type="hidden" name="id" value="{{ $types->id }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Type Name</label>
                                    <input type="text" class="form-control @error('type_name') is-invalid @enderror"
                                        name="type_name" autocomplete="off" value="{{ $types->type_name }}">
                                    @error('type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Type Icon</label>
                                    <input type="text" class="form-control @error('type_icon') is-invalid @enderror"
                                        name="type_icon" autocomplete="off" value="{{ $types->type_icon }}">
                                    @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
