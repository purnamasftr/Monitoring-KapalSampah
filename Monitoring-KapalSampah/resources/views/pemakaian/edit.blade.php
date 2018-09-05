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


                                <form method="post" action="{{route('pemakaian.update', $pemakaians->id)}}">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Edit Data Pemakaian</h3>
                                        {{ csrf_field() }}
                                        <input type = "hidden" name = "id_permintaan" value = "{{ $permintaan_id }}">

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                      <input type="date" name="tanggal" class="form-control"  value="<?php echo $pemakaians->tanggal ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="row">
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                      <label>Mulai</label>
                                                      <input type="number" name="mulai" class="form-control" value="<?php echo $pemakaians->mulai ?>" required>
                                                  </div>
                                              </div>
                                          </div>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Selesai</label>
                                                    <input type="number" name="selesai" class="form-control" value="<?php echo $pemakaians->selesai ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check" onclick="window.location='{{ route('pemakaian_kapal', $permintaan_id) }}'"></i> Save</button>
                                        <button type="button" onclick="window.location='{{ route('pemakaian_kapal', $permintaan_id) }}'" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>

</div>
@endsection
