@extends('layouts.mainlayout')

@section('content')

<div class="home-wrapper">

  <br>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='/Monitoring-KapalSampah/public/home'>Home</a></li>
        <li class="breadcrumb-item"><a href = '/Monitoring-KapalSampah/public/permintaan_kapal/{{ $kapal_id }}'>Permintaan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Permintaan</li>
      </ol>
    </nav>
  </br>

  <div class="row">
      <div class="col-lg-6 offset-md-3">
          <div class="card card-outline-primary">
              <div class="card-body">

                <h3 align="center">{{$kapal_name}}</h3>

                <br>
                <?php if ($idmin > 0): ?>
                  <h5 align="center">Juru Mudi : {{$permintaans->juru_mudi}}</h5>
                  <h5 align="center">Tanggal Pengisian : {{$permintaanmin->tanggal_isi}}</h5>
                  <h5 align="center">Jumlah Setelah Pengisian Lalu : {{$permintaanmin->v_awal}}</h5>
                  <h5 align="center">Pemakaian Motor Induk : {{$permintaanmin->v_me}}</h5>
                  <h5 align="center">Pemakaian Motor Bantu : {{$permintaanmin->v_ae}}</h5>
                  <h5 align="center">Jumlah Pemakaian : {{$permintaanmin->v_pemakaian}}</h5>
                  <h5 align="center">Perhitungan Sisa : {{$permintaanmin->v_sisa}}</h5>
                  <h5 align="center">Permintaan Tambahan : {{$permintaans->v_permintaan}}</h5>
                  <h5 align="center">Jumlah Setelah Pengisian : {{$permintaanmin->v_awal}}</h5>
                <?php else: ?>
                  <h5 align="center">Juru Mudi : -</h5>
                  <h5 align="center">Tanggal Pengisian : -</h5>
                  <h5 align="center">Jumlah Setelah Pengisian Lalu : -</h5>
                  <h5 align="center">Pemakaian Motor Induk : -</h5>
                  <h5 align="center">Pemakaian Motor Bantu : -</h5>
                  <h5 align="center">Jumlah Pemakaian : -</h5>
                  <h5 align="center">Perhitungan Sisa : -</h5>
                  <h5 align="center">Permintaan Tambahan : {{$permintaans->v_permintaan}}</h5>
                  <h5 align="center">Jumlah Setelah Pengisian : {{$permintaans->v_awal}}</h5>
                <?php endif; ?>

                <br><br>
                    <div class="card-two">
                      <div class="desc">
                        <div class="btn-group" align="center">
                          <a href="{{action('PermintaanController@downloadPDF', $permintaans->id)}}" class="btn btn-danger m-b-10 m-1-5 "> Download Bon</a>
                          <?php if ($permintaans->v_pemakaian == 0): ?>
                            <button type="button" onclick="window.location='{{ route('permintaan_edit', $permintaans->id) }}'" class="btn btn-warning btn-flat m-b-10 m-l-5">Edit</button>
                          <?php endif; ?>
                          <button type="button" onclick="window.location='{{ route('permintaan_kapal', $kapal_id) }}'" class="btn btn-dark btn-flat m-b-10 m-l-5">Back</button>

                        </div>
                      </div>

                    </div>




              </div>
          </div>
      </div>
  </div>
</div>

@endsection
