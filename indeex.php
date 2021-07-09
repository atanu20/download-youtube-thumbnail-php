



<?php
  if(isset($_POST['button'])){
       $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $downloadImg = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment;filename="thumbnail.jpg"');
    echo $downloadImg;
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      .container{
        margin-top: 100px;
        
        padding: 10px;
      }
      .card{
        box-shadow:0 2px 30px rgb(138, 162, 236);
      }
      .card img{
        width: 100%;
        height: 350px;
      }
      
    </style>
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-12 mx-auto">
          <div class="card ">
            <div class="card-body p-5">
              <div class="form-group">
                <label for="email">Enter Url</label>
                <input type="text" class="form-control" placeholder="Enter Url" id="urll">
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-warning" onclick="myfunc()">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div class="row">

        <div class="col-lg-6 col-md-8 col-12 mx-auto">
            <div class="card">
              <img src="one.png" alt="" class="img-fluid" id="img_one">
              <div class="p-2">
                <div class="text-center">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                     
                      <input type="hidden" class="form-control" placeholder="Enter email" id="down_url" name="imgurl">
                    </div>
                    <input type="submit" class="btn btn-primary" name="button" value="Download">
                    <br><br>
                  </form>
                </div>
              </div>
            </div>
        </div>
       
     
                   
      </div>
    </div>
    <br><br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
  const data=document.getElementById("urll");
  const img_one=document.getElementById("img_one");
  const down_url=document.getElementById("down_url");
 
function myfunc(){
  const imgurl=data.value;
  if(imgurl==="")
  {
    alert("There is No Url");
  }
  else{
    if(imgurl.indexOf("https://www.youtube.com/watch?v=") !=-1)
    {
      let vid=imgurl.split("v=")[1].substring(0,11);
      let durl=`http://img.youtube.com/vi/${vid}/hqdefault.jpg`;
     
      img_one.src=durl;
      down_url.value=durl;
    }
    else if(imgurl.indexOf("https://youtu.be/") !=-1)
    {
      let vid=imgurl.split("be/")[1].substring(0,11);
      let durl=`http://img.youtube.com/vi/${vid}/hqdefault.jpg`;
     
      img_one.src=durl;
      down_url.value=durl;
    }
    else if(imgurl.match(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i))
    {
      img_one.src=imgurl;
      down_url.value=imgurl;
     
    }else{
      alert("There is No Url");
    }
    
  }
}


</script>

  </body>
</html>
