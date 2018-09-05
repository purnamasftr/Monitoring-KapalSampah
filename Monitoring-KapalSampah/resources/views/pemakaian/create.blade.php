@extends('layouts.mainlayout')

@section('content')
<div class="home-wrapper">
  <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6 offset-md-3">
                        <div class="card card-outline-primary">
                            <div class="card-body">

                                <form method="post" action="{{route('pemakaian.store', $permintaan->id)}}">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Tambah Data Pemakaian</h3>
                                        {{ csrf_field() }}
                                        <input type = "hidden" name = "id_permintaan" value = "{{ $permintaan->id }}">

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">

                                                    <label>Tanggal</label>
                                                    <?php if ($permintaan->v_me>0): ?>
                                                      <input type="date" name="tanggal" class="form-control"  value="<?php echo $tggl ?>" required>
                                                    <?php else: ?>
                                                      <input type="date" name="tanggal" class="form-control" value="<?php echo $permintaan->tanggal_isi ?>" required>
                                                    <?php endif; ?>
                                                    <h6>* Catatan : Tanggal yang harus diisi sekarang {{$tggl}}</h6>
                                                </div>
                                            </div>
                                        </div>

                                          <?php if ($permintaan->v_pemakaian > 0): ?>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label>Mulai</label>
                                                        <input type="number" name="mulai" class="form-control" value="<?php echo $pakai->selesai ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                          <?php else: ?>
                                          <div class="row">
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                      <label>Mulai</label>
                                                      <input type="number" name="mulai" class="form-control" required>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php endif; ?>

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Selesai</label>
                                                    <input type="number" name="selesai" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check" onclick="window.location='{{ route('pemakaian_kapal', $permintaan->id) }}'"></i> Save</button>
                                        <button type="button" onclick="window.location='{{ route('pemakaian_kapal', $permintaan->id) }}'" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>

</div>
@endsection
