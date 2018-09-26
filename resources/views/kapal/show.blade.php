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

                    <table id="tabel" align="center">
                      <tr>
                        <td id="td" align="left" >Kebutuhan Kapal Induk / Jam</td>
                        <td align="center" >  </td>
                        <td align="center" >  </td>
                        <td align="center" >:</td>
                        <td align="right" >  </td>
                        <td align="right" >{{$kapal->hrm_me}}</td>
                      </tr>

                      <tr>
                        <td id="td" align="left" >Kebutuhan Kapal Bantu / Jam</td>
                        <td align="center" >  </td>
                        <td align="center" >  </td>
                        <td align="center" >:</td>
                        <td align="right" >  </td>
                        <td align="right" > {{$kapal->hrm_ae}}</td>
                      </tr>

                      <tr>
                        <td id="td" align="left" >Status</td>
                        <td align="center" >  </td>
                        <td align="center" >  </td>
                        <td align="center" >:</td>
                        <td align="right" >  </td>
                        <td align="right" >{{$kapal->status}}</td>
                      </tr>

                      <tr>
                        <td id="td" align="left">Keterangan</td>
                        <td align="center" >  </td>
                        <td align="center" >  </td>
                        <td align="center" >:</td>
                        <td align="right" >  </td>
                        <td align="right" >{{$kapal->keterangan}}</td>
                      </tr>

                    </table>

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
