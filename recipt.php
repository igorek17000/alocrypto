<?php
require("conf.php");
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="card">
  <div class="card-body mx-4">
    <div class="container">
      <p class="my-5 mx-5" style="font-size: 30px;">
      <img src="" alt="" width="50px" height="50px" >  Alocryptotrade  
    </p>
      <div class="row">
        <ul class="list-unstyled">
          <li class="text-black">John Doe</li>
          <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
          <li class="text-black mt-1" id="date">
              
              <script>
                  var date=new Date(Date.now());
              document.getElementById("date").innerHTML="Date:"+date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear()+" "+date.getHours()+":"+date.getMinutes()
          </script>
        </li>
        </ul>
        <hr>
        <div class="col-xl-10">
          <p>Pro Package</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$199.00
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Consulting</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$100.00
          </p>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-xl-10">
          <p>Support</p>
        </div>
        <div class="col-xl-2">
          <p class="float-end">$10.00
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="row text-black">

        <div class="col-xl-12">
          <p class="float-end fw-bold">Total: $10.00
          </p>
        </div>
        <hr style="border: 2px solid black;">
      </div>
      <div class="text-center" style="margin-top: 90px;">
        <a><u class="text-info">View in browser</u></a>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
      </div>

    </div>
  </div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>