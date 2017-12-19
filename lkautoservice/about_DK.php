<?php
include ('includes/_head.php');
?>
<body>
  <header>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid head-cont">
      <div class="navbar-header">
        <img src="img/logo.png" alt="logo" class="navbar-brand" href="home_DK.php"></img>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="home_DK.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle active" data-toggle="dropdown" href="#">Om os
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="about_DK.php">Vores mål</a></li>
            <li><a href="advice_DK.php">Gode råd</a></li>
          </ul>
        </li>
        <li><a href="contact_DK.php">Kontakt os</a></li>
      </ul>
    </div>
  </nav>
  <div class="headpic">

  </div>
  </header>
<main class="container">
    <h2 id="advh2">Om os</h2><br><br><br>
<article class="row">
  <img id='mechanics' src="./img/mechanics.jpg">
  <p id="aboutp">Vi er et relativt nystartet værksted, med opstart Februar 2017, derfor er det af største vigtighed for os at vi er bedre end vores konkurrenter når det kommer til kvaliteten af arbejdet og tiden det bliver udført på. Vi er yderst professionelle, med vores lange karriere som mekanikere, om det er noget så simpelt som at skifte vinduesviskere eller total afmontering og samling igen.  Vi kommer alle fra vidt forskellige baggrunde og specialisere os i forskellige områder. Dette betyder at, lige meget hvilken del der skal skiftes og lige meget hvilket mærke, gør vi det hurtigt, effektivt og professionelt. </p>
</article>


  <h2 id="advh3">"Kvalitet i topfart"</h2><br><br><br>
  <article class="row">
    <img id='mechanics2' src="./img/mechanics2.jpg">
  <p id="aboutp">Vores slogan - vi er af den overbevisning at vi sammen kan opnå hvad som helst, reparere hvilken som helst bil, hvor som helst - når som helst. Lige meget hvor kompliceret reperationen er, har vi redskaberne til jobbet, bogstaveligt talt og færdighedsmæssigt. Vores mål er at vise vores kunder hvad ægte kvalitet og effektivitet ligner, samtidig med at bevise at værkstedet ikke er så skidt et sted at være! </p>
  </article>
</main>
  <?php include ('includes/_footer.php') ?>
</body>
