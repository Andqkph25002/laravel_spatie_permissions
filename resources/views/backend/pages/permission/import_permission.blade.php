@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('export') }}" class="btn btn-inverse-danger">Download Xlsx</a>
              
            </ol>
        </nav>

        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Import Permission</h6>

                            <form method="POST" action="{{ route('import') }}" class="forms-sample" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Xlsx File Import</label>
                                    <input type="file" class="form-control" name="import_file" required id="name">

                                </div>




                                <button type="submit" class="btn btn-inverse-warning me-2">Upload</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>
@endsection
