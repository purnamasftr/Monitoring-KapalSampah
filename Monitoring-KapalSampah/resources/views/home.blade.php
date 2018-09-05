@extends('layouts.mainlayout')

@section('content')
<div class="home-wrapper">

<br>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </nav>
</br>
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Data Kapal</h2>
                            <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead class="table-info">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($details as $kapal): ?>
                                          <tr>
                                              <td>{{ $kapal->name }}</td>
                                              <td>{{ $kapal->status }}</td>
                                              <td>
                                                <div class="btn-group">
                                                  <button type="button" onclick="window.location='{{ route('kapal', $kapal->id) }}'" class="btn btn-info btn-flat m-b-10 m-l-5">View</button>
                                                  <button type="button" onclick="window.location='{{ route('permintaan_kapal', $kapal->id) }}'" class="btn btn-primary m-b-10 m-l-5">Permintaan</button>
                                                  <a href = 'delete_kapal/{{ $kapal->id }}' class="btn btn-danger m-b-10 m-l-5">Delete</a>
                                                </div>
                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" onclick="window.location='{{ route('kapal_create') }}'" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
@endsection
