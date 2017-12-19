<?php
include ('includes/_head.php');
?>
<body>
  <header>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid head-cont">
      <div class="navbar-header">
        <img src="img/logo.png" alt="logo" class="navbar-brand" href="index.php"></img>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="home_EN.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle active" data-toggle="dropdown" href="#">About us
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="about_EN.php">Our Goal</a></li>
            <li><a href="advice_EN.php">Ask for advice</a></li>
          </ul>
        </li>
        <li><a href="contact_EN.php">Contact us</a></li>
      </ul>
    </div>
  </nav>
  <div class="headpic">

  </div>
  </header>
<main class="container">
    <h2 id="advh2">About us</h2><br><br><br>
<article class="row">
  <img id='mechanics' src="./img/mechanics.jpg">
  <p id="aboutp">We’re a pretty recent service, established February 2017, and as such, it is of utmost importance to us that we are better than all of our competition when it comes to quality and speed. We’re professionals, with lifetime careers as car mechanics, doing jobs ranging from something as simple as changing your wipers, to something as big as complete car disassembly and re-assembly. We all come from vastly different backgrounds, specializing in vastly different areas. This means that, no matter the part that needs replacing, no matter the car brand, we can do it quickly, efficiently, and professionally.</p>
</article>


  <h2 id="advh3">"Quality at top speed"</h2><br><br><br>
  <article class="row">
    <img id='mechanics2' src="./img/mechanics2.jpg">
  <p id="aboutp">Our slogan, we think that together, we can achieve anything, we can repair any car, any place, any time. No matter how difficult or complicated the repair,
     we always have the tools for the job, both literally and skill-wise. Our goal is to show our customers what real quality and speed look like, while at the same time showing them
   that the car mechanic isn't sucha  bad place after all!</p>
  </article>
</main>
  <?php include ('includes/_footer.php') ?>
</body>
