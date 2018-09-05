@extends('layouts.mainlayout')

@section('content')

<div class="home-wrapper">

  <br>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='/Monitoring-KapalSampah/public/home'>Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kapal</li>
      </ol>
    </nav>
  </br>

  <div class="row">
      <div class="col-lg-6 offset-md-3">
          <div class="card card-outline-primary">
              <div class="card-body">
                  <h3 align="center">{{$kapal->name}}</h3>
                    <br><br>

                        <h5 align="center">HRM_ME   :      {{$kapal->hrm_me}}</h5>
                        <h5 align="center">HRM_AE   :      {{$kapal->hrm_ae}}</h5>
                        <h5 align="center">Status    :     {{$kapal->status}}</h5>
                        <h5 align="center">Keterangan   :      {{$kapal->keterangan}}</h5>

                      <br><br>
                      <div class="card-two">
                        <div class="desc">
                          <div class="btn-group">
                            <button type="button" onclick="window.location='{{ route('kapal_edit', $kapal->id) }}'" class="btn btn-warning btn-flat m-b-10 m-l-5">Edit</button>
                            <button type="button" onclick="window.location='{{ route('home') }}'" class="btn btn-dark btn-flat m-b-10 m-l-5">Back</button>
                          </div>
                        </div>

                      </div>


              </div>
          </div>
      </div>
  </div>
</div>

@endsection
