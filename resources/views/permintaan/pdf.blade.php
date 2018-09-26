<!DOCTYPE html>
<head>
  <title>Bon Permintaan BBM</title>
  <meta charset="utf-8">
  <style media="screen">
    {
      width:800;
      height:auto;
      margin:10 auto;
      background-color: #ffff99;
    }
    {
      color:black;
    }
    {
      width:auto;
      height:auto;
      padding:80px;
      background-color: #ccffff
      font-family:arial;
      color:black;
    }
    {
      color: black;
    }
    {
      width:200;
    }
  </style>
</head>
<body class="halaman">
  <div id="isi" >
    <h2 id="h2" align="center">Bon Permintaan BBM</h2>
    <h3 is="h3" align="center">{{$kapal}}</h3>
    <!-- <hr align="center"> -->
    <p align="right"></p>
    <br>
    <table id="tabel" align="center">
      <?php if ($idmin > 0): ?>
        <tr>
          <td id="td" align="left" >1. Tanggal pengisian lalu</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >{{$permintaanmin->tanggal_isi}}</td>
        </tr>
        <tr>
          <td id="td" align="left" >2. Jumlah setelah pengisian yang lalu</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >{{$permintaanmin->v_awal}}  Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >3. Pemakaian Motor induk</td>
          <td align="center" > {{$jam}} </td>
          <td align="center" >jam</td>
          <td align="center" >:</td>
          <td align="right" >{{$permintaanmin->v_me}} Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >4. Pemakaian Motor bantu</td>
          <td align="center" > {{$jam}} </td>
          <td align="center" >jam</td>
          <td align="center" >:</td>
          <td align="right" >{{$permintaanmin->v_ae}} Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >5. Jumlah pemakaian</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >{{$permintaanmin->v_pemakaian}} Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >6. Perhitungan sisa tangki Harian</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >{{$permintaanmin->v_sisa}} Liter</td>
        </tr>
      <?php else: ?>
        <tr>
          <td id="td" align="left" >1. Tanggal pengisian lalu</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >-</td>
        </tr>
        <tr>
          <td id="td" align="left" >2. Jumlah setelah pengisian yang lalu</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >- Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >3. Pemakaian Motor induk</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >- Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >4. Pemakaian Motor bantu</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >- Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >5. Jumlah pemakaian</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >- Liter</td>
        </tr>
        <tr>
          <td id="td" align="left" >6. Perhitungan sisa tangki Harian</td>
          <td align="center" >  </td>
          <td align="center" >  </td>
          <td align="center" >:</td>
          <td align="right" >- Liter</td>
        </tr>

      <?php endif; ?>
      <tr>
        <td id="td" align="left" >7. Permintaan tambahan</td>
        <td align="center" >  </td>
        <td align="center" >  </td>
        <td align="center" >:</td>
        <td align="right" >{{$permintaans->v_permintaan}} Liter</td>
      </tr>
      <tr>
        <td id="td" align="left" >8. Jumlah pengisian tangki VTS</td>
        <td align="center" >  </td>
        <td align="center" >  </td>
        <td align="center" >:</td>
        <td align="right" >{{$permintaans->vts}} Liter</td>
      </tr>
      <tr>
        <td id="td" align="left" >9. Jumlah setelah pengisian</td>
        <td align="center" >  </td>
        <td align="center" >  </td>
        <td align="center" >:</td>
        <td align="right" >{{$permintaans->v_awal}} Liter</td>
      </tr>
    </table>
    <br><br>
    <div align="right">
      Tanjung Priok,
    </div>
    <p>Mengetahui :</p>
    <p align="center">
      <div align="center">ASSISTANT DGM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          JUNIOR OFFFICER SURVEI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Yang Meminta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <br>
          TEKNIK SIPIL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Juru Mudi/Mesin
        <br><br><br><br><br><br>
        <u>ANDRIANTIO RAHMADHAN</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <u>WARSONO</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



        <u>{{$permintaans->juru_mudi}}</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <br>

        NIPP : 287057688 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        NIPP : 265034686 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      </div>
      <div align="center">
        <br><br><br>
        Yang menyerahkan.
          <br><br><br><br><br>
        ____________________
      </div>
    </p>
  </div>
</body>
</html>
