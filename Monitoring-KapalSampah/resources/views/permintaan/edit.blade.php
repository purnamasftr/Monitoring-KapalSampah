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


                                <form method="post" action="{{route('permintaan.update', $permintaans->id)}}">
                                  {{ csrf_field() }}
                                    <input type = "hidden" name = "id_kapal" value = "{{ $kapal_id }}">

                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Edit Data Permintaan {{ $kapal_name }}</h3>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Juru Mudi</label>
                                                    <input type="text" name="juru_mudi" class="form-control" value="<?php echo $permintaans->juru_mudi ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Tanggal Isi</label>
                                                     <input type="date" name="tanggal_isi" class="form-control" value="<?php echo $permintaans->tanggal_isi ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Permintaan BBM</label>
                                                    <input type="number" name="v_permintaan" class="form-control" value="<?php echo $permintaans->v_permintaan ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" onclick="window.location='{{ route('permintaan_view', $permintaans->id) }}'" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" onclick="window.location='{{ route('permintaan_view', $permintaans->id) }}'" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>

</div>
@endsection
