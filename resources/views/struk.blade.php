<!DOCTYPE html>
<html lang="en" >
 
<head>
 
  <meta charset="UTF-8">
  <title>Template Faktur</title>
 
  <style>

    body, html {
      font-family: 'Courier New', Courier, monospace;
    }

    @media print {
      .page-break { display: block; page-break-before: always; }
    }

    #invoice-POS {
      box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
      padding: 2mm;
      margin: 0 auto;
      width: 44mm;
      background: #FFF;
    }

    #invoice-POS ::selection {
      background: #f31544;
      color: #FFF;
    }

    #invoice-POS ::moz-selection {
      background: #f31544;
      color: #FFF;
    }

    #invoice-POS h1 {
      font-size: 1.5em;
      color: #222;
    }

    #invoice-POS h2 {
      font-size: .9em;
    }

    #invoice-POS h3 {
      font-size: 1.2em;
      font-weight: 300;
      line-height: 2em;
    }

    #invoice-POS p {
      font-size: .7em;
      color: #666;
      line-height: 1.2em;
    }

    #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
      /* Targets all id with 'col-' */
      border-bottom: 1px solid #EEE;
    }

    #invoice-POS #top {
      min-height: 100px;
    }

    #invoice-POS #mid {
      min-height: 80px;
    }

    #invoice-POS #bot {
      min-height: 50px;
    }

    #invoice-POS #top .logo {
      height: 40px;
      width: 150px;
      /* background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat; */
      background-size: 150px 40px;
    }
    #invoice-POS .clientlogo {
      float: left;
      height: 60px;
      width: 60px;
      background: url(https://www.sistemit.com/wp-content/uploads/2020/02/SISTEMITCOM-smlest.png) no-repeat;
      background-size: 60px 60px;
      border-radius: 50px;
    }
    #invoice-POS .info {
      display: block;
      margin-left: 0;
    }
    #invoice-POS .title {
      float: right;
    }
    #invoice-POS .title p {
      text-align: right;
    }
    #invoice-POS table {
      width: 100%;
      border-collapse: collapse;
    }
    #invoice-POS .tabletitle {
      font-size: .5em;
      background: #EEE;
    }
    #invoice-POS .service {
      border-bottom: 1px solid #EEE;
    }
    #invoice-POS .item {
      width: 24mm;
    }
    #invoice-POS .itemtext {
      font-size: .5em;
    }
    #invoice-POS #legalcopy {
      margin-top: 5mm;
    }
 
  </style>
 
  <script>
    window.print();
  </script>

  <script>
    window.console = window.console || function(t) {};
  </script>
 
  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
  </script>
</head>
 
  <body translate="no" >  
    <div id="invoice-POS">
      <center id="top">
        <div class="logo"></div>
        <div class="info"> 
          <h2>Berkah Laundry</h2>
        </div><!--End Info-->
      </center><!--End InvoiceTop-->
      <div id="mid">
        <div class="info">
          <h2>Info Kontak</h2>
          <p> 
            Nama      : {{ $data->nama }}</br>
            No Hp     : {{ $data->nohp }}</br>
          </p>
        </div>
      </div><!--End Invoice Mid-->
      <div id="bot">
        <div id="table">
          <table>
            <tr class="tabletitle">
              <td class="item"><h2>Item</h2></td>
              <td class="Hours"><h2>Qty</h2></td>
              <td class="Rate"><h2>Sub Total</h2></td>
            </tr>
            <tr class="service">
              <td class="tableitem"><p class="itemtext">{{ $pesanan->nama_jenis }}</p></td>
              <td class="tableitem"><p class="itemtext">{{ $data->qty }}</p></td>
              <td class="tableitem"><p class="itemtext">{{ $data->total }}</p></td>
            </tr>            
            <tr class="tabletitle">
              <td></td>
              <td class="Rate"><h2>Total</h2></td>
              <td class="payment"><h2>{{ $data->total }}</h2></td>
            </tr>
          </table>
        </div><!--End Table-->
        <div id="legalcopy">
          <p class="legal" style="margin-bottom : 100px;"><strong>Terimakasih telah menggunakan jasa kami! :)</strong></p>
        </div>
      </div><!--End InvoiceBot-->
    </div><!--End Invoice--> 
    <div class="container-fluid text-center">
      <a href="/" class="btn btn-outline-warning btn-back shadow"><b>Kembali</b></a>
    </div>
  </body>
</html>