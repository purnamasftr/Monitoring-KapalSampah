@extends('layouts.mainlayout')

@section('content')
<div class="home-wrapper">

<br>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href='/Monitoring-KapalSampah/public/home'>Home</a></li>
      <li class="breadcrumb-item"><a href = '/Monitoring-KapalSampah/public/permintaan_kapal/{{ $kapal }}'>Permintaan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pemakaian</li>
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
                            <h2>Data Pemakaian BBM {{ $kapals }}</h2>
                            <h5>Total BBM_ME : {{ $permintaan->v_me }}</h5>
                            <h5>Total BBM_AE : {{ $permintaan->v_ae }}</h5>
                            <h5>Total BBM : {{ $permintaan->v_pemakaian }}</h5>
                            <h5 ><b>Sisa BBM : {{ $permintaan->v_sisa }}</b></h5>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead class="table-info">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Pakai Jam</th>
                                            <th>BBM_ME</th>
                                            <th>BBM_AE</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($pemakaians as $pemakaian): ?>
                                        <tr>
                                          <td>{{ $pemakaian->tanggal }}</td>
                                          <td>{{ $pemakaian->mulai }}</td>
                                          <td>{{ $pemakaian->selesai }}</td>
                                          <td>{{ $pemakaian->pakai_jam }}</td>
                                          <td>{{ $pemakaian->bbm_me }}</td>
                                          <td>{{ $pemakaian->bbm_ae }}</td>
                                            <td>
                                              <div class="btn-group">
                                                <?php if ($pemakaian->tanggal == $makstgl): ?>
                                                  <button type="button" onclick="window.location='{{ route('pemakaian_edit', $pemakaian->id) }}'" class="btn btn-primary btn-flat m-b-10 m-l-5">Edit</button>
                                                  <a href = '/Monitoring-KapalSampah/public/delete_pemakaian/{{ $pemakaian->id }}' class="btn btn-danger m-b-10 m-l-5">Delete</a></div>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if ($permintaan->v_sisa > 0): ?>
                                <button type="button" onclick="window.location='{{ route('pemakaian_create', $permintaan->id) }}'" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah Data</button>
                            <?php endif; ?>

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
