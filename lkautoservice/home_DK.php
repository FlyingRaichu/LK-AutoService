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
	      <li class="active"><a href="home_DK.php">Home</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Om os
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
<article class="row">

	<article class="col-lg-9 bigtext">
        <h2>Om mig</h2>
        Mit navn er Angelo Sarcione. Jeg har arbejdet som mekaniker i over 15 år nu og er kommet til den overbevisning at der ikke er noget på bil som er “umuligt at reparere”. Igennem årene har jeg arbejdet på mange forskellige værksteder med mange forskellige chefer, med den erfaring har jeg valgt at åbne mit eget værksted her i Roskilde. Nu er mit personale og jeg her for at tilbyde de hurtigste, mest professionelle reparationer i Danmark, til en overkommelig pris! 
    </article>
    <article class="col-lg-3"><img src="img/mechanic.png"></article>

</article>
<article class="row">
    <article class="col-lg-12">
        <h2>Services</h2>
    </article>

	<img src="img/tyre.png" class="col-lg-3 resize">
	<img src="img/fluid.png" class="col-lg-3 resize">
	<img src="img/engine.png" class="col-lg-3 resize">
	<img src="img/battery.png" class="col-lg-3 resize">
</article>
<article class="row estimated-price">
  	<form action="#">
    	<button id="submitbuttoncontact">Reserver nu!</button>
    </form>
</article>
<article class="row">
	<h1 id="OR">Eller...!</h1>
	<h1 id="problem">Du kan beskrive dit problem nedenunder, så vender vi tilbage til dig.</h1>
</article>
<article class="row message-article">
        <form action="mail.php" method="post" class="js-form">
            <div class="col-md-6">
                <label for="name">Dit navn:</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="col-md-6">
                <label for="email">Din e-mail:</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="col-md-12 message-field">
                <label for="message">Din besked:</label>
                <textarea name="message" class="message" id="message"></textarea>
            </div>
            <div class="col-md-12">
            <button id="submitbuttoncontact">Send</button>
            </div>
        </form>
</article>
        <div class="validation"></div>
</main>
<?php include 'includes/_footer.php' ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    var $validation = $('.validation');
    var $name = $('#name');
    var $email = $('#email');
    var $message = $('#message');

    $('.js-form').on('submit', function(e) {
        e.preventDefault();

        $.post('mail.php', {
            name: $name.val(),
            email: $email.val(),
            message: $message.val()
        })
            .done(function() {
                // Remove the error class if an error was previously set and set the proper text
                $validation.removeClass('error').text('Tak for din besked, vi bestræber os på at svare hurtigst muligt');

                // Clear the inputs
                $name.val('');
                $email.val('');
                $message.val('');
            })
            .fail(function() {
                // Add the error class to show that an error has occurred and set the error text
                $validation.addClass('error').text('Ugyldig e-mail addresse, prøv venligst igen');
            });
    });

</script>
</body>
