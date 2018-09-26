@extends('layouts.mainlayout')

@section('content')
<div class="home-wrapper">

<br>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href='/Monitoring-KapalSampah/public/home'>Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Permintaan</li>
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
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                            <h2>Data Permintaan BBM</h2>
                            <h4 class="card-title">{{ $kapal_name }}</h4>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead class="table-info">
                                        <tr>
                                            <th>Juru Mudi</th>
                                            <th>Tanggal</th>
                                            <th>Vol Awal</th>
                                            <th>Pemakaian BBM</th>
                                            <th>Vol Sisa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($permintaans as $permintaan): ?>
                                        <tr>
                                          <td>{{ $permintaan->juru_mudi }}</td>
                                          <td>{{ $permintaan->tanggal_isi }}</td>
                                          <td>{{ $permintaan->v_awal }}</td>
                                          <td>{{ $permintaan->v_pemakaian }}</td>
                                          <td>{{ $permintaan->v_sisa }}</td>

                                            <td>
                                              <div class="btn-group">
                                                  <!-- <a href="{{action('PermintaanController@downloadPDFpem', $permintaan->id)}}" class="btn btn-danger m-b-10 m-1-5 "> PDF </a> -->
                                                <button type="button" onclick="window.location='{{ route('permintaan_view', $permintaan->id) }}'" class="btn btn-info btn-flat m-b-10 m-l-5">View</button>
                                                <button type="button" onclick="window.location='{{ route('pemakaian_kapal', $permintaan->id) }}'" class="btn btn-primary m-b-10 m-l-5">Pemakaian</button>
                                                <a href = '/Monitoring-KapalSampah/public/delete_permintaan/{{ $permintaan->id }}' class="btn btn-danger m-b-10 m-l-5">Delete</a>


                                              </div>
                                            </td>

                                        </tr>
                                      <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>
                            <button type="button" onclick="window.location='{{ route('permintaan_create', $kapal_id) }}'" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
</div>
<!-- End Wrapper -->
@endsection
