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


                                <form method="post" action="{{route('kapal.update', $kapal->id)}}">
                                  {{ csrf_field() }}
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Edit Data Kapal</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Nama Kapal</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $kapal->name ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Kebutuhan Kapal Induk / Jam</label>
                                                    <input type="number" class="form-control" name="hrm_me" value="<?php echo $kapal->hrm_me ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Kebutuhan Kapal Bantu / Jam</label>
                                                    <input type="number" class="form-control" name="hrm_ae" value="<?php echo $kapal->hrm_ae ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-control-label">Status</label>
                                            <div>
                                              <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" name="status" value="operational" <?php if ($kapal->status == 'operational'): ?>
                                                  <?php echo "checked" ?>
                                                <?php endif; ?> >
                                                <label> Operational </label>
                                              </div>

                                              <div class="radio-custom radio-default radio-inline">
                                                <input type="radio" name="status" value="breakdown" <?php if ($kapal->status == 'breakdown'): ?>
                                                  <?php echo "checked" ?>
                                                <?php endif; ?> >
                                                <label> Breakdown </label>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Keterangan *</label>
                                                    <input type="text" class="form-control" name="keterangan" value="<?php echo $kapal->keterangan ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" onclick="window.location='{{ route('kapal', $kapal->id) }}'" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" onclick="window.location='{{ route('kapal', $kapal->id) }}'" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>

</div>
@endsection
