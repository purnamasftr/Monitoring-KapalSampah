<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
          body
          {
          counter-reset: Serial;           /* Set the Serial counter to 0 */
          }

          table
          {
          border-collapse: separate;
          }

          tr td:first-child:before
          {
          counter-increment: Serial;      /* Increment the Serial counter */
          content: "" counter(Serial); /* Display the counter */
          }
          .auto-index td:first-child:before
          {
            counter-increment: Serial;      /* Increment the Serial counter */
            content: "" counter(Serial); /* Display the counter */
          }
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div align="center">
      <h4>PEMAKAIAN BAHAN BAKAR</h4>
      <h4>KAPAL MOTOR: {{$kapal}}</h4>
      <h4> <u>DIVISI TEKNIK SIPIL PELABUHAN CABANG TANJUNG PRIOK</u> </h4>
      <br><br>
    </div>
    <table class="auto-index" border="1" >

        <tr>
          <th rowspan="2">NO.</th>
          <th rowspan="2">TANGGAL</th>
          <th colspan="2" scope="colgroup" align="center" >ME</th>
          <th rowspan="2">Pakai Jam</th>
          <th rowspan="2">Pakai BBM</th>
          <th colspan="2" scope="colgroup" align="center" >AE</th>
          <th rowspan="2">Pakai Jam</th>
          <th rowspan="2">Pakai BBM</th>
        </tr>
        <tr>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
        </tr>
        <?php foreach ($pemakaians as $p): ?>
          <tr>
            <td></td>
            <td>{{$p->tanggal}}</td>
            <td>{{$p->mulai}}</td>
            <td>{{$p->selesai}}</td>
            <td>{{$p->pakai_jam}}</td>
            <td>{{$p->bbm_me}}</td>
            <td>{{$p->mulai}}</td>
            <td>{{$p->selesai}}</td>
            <td>{{$p->pakai_jam}}</td>
            <td>{{$p->bbm_ae}}</td>
          </tr>
        <?php endforeach; ?>

    </table>

    <br><br>
    <div align="right">
      Tanjung Priok,
    </div>
    <div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui, </div>

    <div align="center">
      <div align="center">Koor. Kebersihan & Pertamanan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          Juru Mudi/Juru Mesin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <br><br><br><br><br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <u>WARSONO</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <u>{{$permintaans->juru_mudi}}</u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;
          <br>
          NIPP. 265 034 686 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      </div>
    </div>
  </body>
</html>
