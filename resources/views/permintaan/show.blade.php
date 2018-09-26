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
              <table id="tabel" align="center">
                <?php if ($permintaans->min_id != $permintaans->id): ?>
                  <tr>
                    <td id="td" align="left" >Juru Mudi</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaans->juru_mudi}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Tanggal Pengisian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaanmin->tanggal_isi}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Jumlah Setelah Pengisian Lalu</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaanmin->v_awal}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Pemakaian Motor Induk</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaanmin->v_me}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Pemakaian Motor Bantu</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaanmin->v_ae}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Jumlah Pemakaian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaanmin->v_pemakaian}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Perhitungan Sisa Tangki Harian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaanmin->v_sisa}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Permintaan Tambahan</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" > {{$permintaans->v_permintaan}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Permintaan VTS</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaans->vts}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Jumlah Setelah Pengisian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaans->v_awal}}</td>
                  </tr>



                <?php else: ?>

                  <tr>
                    <td id="td" align="left" >Juru Mudi</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Tanggal Pengisian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Jumlah Setelah Pengisian Lalu</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Pemakaian Motor Induk</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Pemakaian Motor Bantu</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Jumlah Pemakaian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Perhitungan Sisa Tangki Harian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >-</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Permintaan Tambahan</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" > {{$permintaans->v_permintaan}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Permintaan VTS</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaans->vts}}</td>
                  </tr>

                  <tr>
                    <td id="td" align="left" >Jumlah Setelah Pengisian</td>
                    <td align="center" >  </td>
                    <td align="center" >  </td>
                    <td align="center" >:</td>
                    <td align="right" >  </td>
                    <td align="right" >{{$permintaans->v_awal}}</td>
                  </tr>
                <?php endif; ?>
              </table>

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

@endsection
