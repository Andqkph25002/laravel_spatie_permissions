@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Permission</h6>

                            <form method="POST" action="{{ route('store.permission') }}" class="forms-sample" id="myForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Permission Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off" required
                                        id="name">

                                </div>
                               
                                <div class="mb-3">
                                    <label for="" class="form-label">Group Name</label>
                                    <select name="group_name" id="group_name" class="form-select" required>
                                          <option value="" disabled>Select Group</option>
                                          <option value="amentities">Amentities</option>
                                          <option value="property">Property</option>
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
