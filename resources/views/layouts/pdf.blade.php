<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Title</b></td>
        <td><b>from</b></td>
        <td><b>to</b></td>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
            {{$Report->title}}
        </td>
        <td>
         {{$Report->fromd}}
        </td>

        <td> {{$Report->tod}}</td>
      </tr>
      </tbody>
    </table>
  </body>
</html>
