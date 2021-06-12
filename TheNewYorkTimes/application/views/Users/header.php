<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New York Times Blog</title>
    <?php echo link_tag("Assets/css/bootstrap.min.css"); ?>
    <style>
      body, html {
      height: 100%;
      
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)), url("Assets/images/welcome.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 40%;
  left: 60%;
  transform: translate(-50%, -50%);
  color: white;  
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #2C3E50;
   text-align: center;
}

.footer a{
  color: white;
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">New York Times Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="clearfix">
      <div class="collapse navbar-collapse" id="navbarColor01"> 
        <form class="d-flex">
          <input class="form-control me-sm-2 float-right" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
    
  </div>
</nav>
<div class="hero-image">
  <div class="hero-text">
    <h1>Welcome</h1>
    <h2>To</h2>
    <h1>NewYorkTimes Blog</h1>
  </div>
</div>
