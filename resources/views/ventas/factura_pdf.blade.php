<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Example 2</title>
    <link rel='stylesheet' href='{{asset('css/bootstrap.min.css')}}' media='all' />
    <link rel='stylesheet' href='{{asset('css/factura.css')}}' media='all' />
  </head>
  <body>

    <header class='clearfix'>
      <table width="100%">
        <tr>
          <td>
            <div id='logo'>
              <img src='{{asset('img/logo.jpg')}}' style="width: auto; height: 100px">
            </div>
          </td>
          <td align="right">
            <div id='company'>
              <h2 class='name'>Farmacia la Económica</h2>
              <div>2DA CALLE 3-43 ZONA 4</div>
              <div>SANARATE EL PROGRESO</div>
              <div>Tel: 79253047</div>
              <div><a href='mailto:company@example.com'>company@example.com</a></div>
            </div>
          </td>
        </tr>
      </table>
    </header>
    <main style="height: auto">
      <div id='details'>
        <table width="100%">
          <tr>
            <td>
              <div id='client'>
                <div class='to'>Cliente:</div>
                <h2 class='name'>{{$cliente or 'C/F'}}</h2>
                <div class='address'>NIT:</div>
                <div class='email'>000000</div>
              </div>
            </td>
            <td align="right">
              <div id='invoice'>
                <h1>Factura A-00001</h1>
                <div class='date'>fecha: 01/06/2014</div>
                {{--<div class='date'>Due Date: 30/06/2014</div>--}}
              </div>
            </td>
          </tr>
        </table>
      </div>
      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th class='no'>#</th>
            <th class='desc'>DESCRIPCIÓN</th>
            <th class='unit'>PRECIO</th>
            <th class='qty'>CANTIDAD</th>
            <th class='total'>SUB TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @for($i = 1; $i <= 10; $i++)
          <tr style="font-size: 12px">
            <td width='10%'>{{$i}}</td>
            <td width='50%'>{{'Articulo '.$i}}</td>
            <td width='12%'>{{($i*2)}}</td>
            <td width='12%'>{{($i+2)}}</td>
            <td width='20%'>{{($i*2)*($i+2)}}</td>
          </tr>
          @endfor
        </tbody>
        <tfoot>
          <tr>
            <td colspan='3'>TOTAL</td>
            <td>{{$cantidad or 0}}</td>
            <td>Q {{$total or 0}}</td>
          </tr>
        </tfoot>
      </table>
      <div id='thanks'>Gracias por su preferencia!</div>
      {{--<div id='notices'>--}}
        {{--<div>NOTICE:</div>--}}
        {{--<div class='notice'>A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
      {{--</div>--}}
    </main>
    <footer>
      La factura se creó en un ordenador y es válida sin la firma y el sello.
    </footer>

  </body>
</html>