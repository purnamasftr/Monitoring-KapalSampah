<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
      <tr>
        <td>
          {{$kapal->name}}
        </td>
        <td>
          {{$kapal->hrm_me}}
        </td>
      </tr>
      <tr>
        <td>
          {{$kapal->hrm_ae}}
        </td>
        <td>
          {{$kapal->keterangan}}
        </td>
      </tr>
    </table>
  </body>
</html>
