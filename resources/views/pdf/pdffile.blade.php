<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        
     <div class="card-deck">
        <div class="card">
          <img src="{{ asset('public/logo.png') }}" width="200" class="no-opacity" alt="Online Fill">
          <div class="card-body">
              <br>
            <h2 class="card-title">{{$data->title}}</h2>
            <p class="card-text">{{$data->matter}}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted"></small>
          </div>
        </div>
     </div>

<br>
<br>
<center>
<strong>Powered by <a href="http://onlinefill.in" target="_blank">Online Fill</a></strong>
</center>
<br>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
