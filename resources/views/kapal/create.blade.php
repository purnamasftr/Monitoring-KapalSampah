@extends('layouts.mainlayout')

@section('content')
<div class="home-wrapper">
  <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6 offset-md-3">
                        <div class="card card-outline-primary">
                            <div class="card-body">

                              @if(session()->has('message'))
                                <div class="alert alert-success">
                                  {{ session()->get('message') }}
                                </div>
                               @endif
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <form method="post" action="{{route('kapal.store')}}">
                                  {{ csrf_field() }}
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Tambah Data Kapal</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Nama Kapal</label>
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>HRM_ME</label>
                                                    <input type="number" class="form-control" name="hrm_me" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>HRM_AE</label>
                                                    <input type="number" class="form-control" name="hrm_ae" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Status</label>
                                            <div>
                                              <div>
                                                <div class="radio-custom radio-default radio-inline">
                                                  <input type="radio" name="status" value="aktif" >
                                                  <label  > Aktif </label>
                                                </div>

                                                <div class="radio-custom radio-default radio-inline">
                                                  <input type="radio" name="status" value="tidak aktif" >
                                                  <label  > Tidak Aktif </label>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" onclick="window.location='{{ route('home') }}'">  <i class="fa fa-check"></i> Save</button>
                                        <button type="button" onclick="window.location='{{ route('home') }}'" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>

</div>
@endsection
