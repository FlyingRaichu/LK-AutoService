<?php
include ('includes/_head.php');
?>
<body>
	<header>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid head-cont">
	    <div class="navbar-header">
	      <img src="img/logo.png" alt="logo" class="navbar-brand" href="home_PL.php"></img>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home_PL.php">Home</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">O nas
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="about_PL.php">Nasz cel</a></li>
	          <li><a href="advice_PL.php">Spytaj o radę</a></li>
	        </ul>
	      </li>
	      <li><a href="contact_PL.php">Skontaktuj się</a></li>
	    </ul>
	  </div>
	</nav>
	<div class="headpic">

	</div>
	</header>
<main class="container">
<article class="row">

	<article class="col-lg-9 bigtext">
        <h2>O mnie</h2>
        Nazywam się Angelo Sarcione. Jestem mechanikiem samochodowym od 15 lat, z doświadczenia wiem, że stwierdzenie niemożliwe do naprawy nie istniej. Przez lata pracowałem w wielu różnych warsztatach, z różnymi osobami, korzystając z tych doświadczeń zdecydowałem, że otworzę własny warsztat w Roskilde. Teraz ja i mój zespół oferujemy najszybsze, najwyższej jakości naprawy w Danii za rozsądną cenę.
    </article>
    <article class="col-lg-3"><img src="LK/lkautoservice/img/mechanic.png"></article>

</article>
<article class="row">
    <article class="col-lg-12">
        <h2>Usługi</h2>
    </article>

	<img src="img/tyre.png" class="col-lg-3 resize">
	<img src="img/fluid.png" class="col-lg-3 resize">
	<img src="img/engine.png" class="col-lg-3 resize">
	<img src="img/battery.png" class="col-lg-3 resize">
</article>
<article class="row estimated-price">
  	<form action="#">
    	<button id="submitbuttoncontact">Zarezerwuj teraz!</button>
    </form>
</article>
<article class="row">
	<h1 id="OR">LUB...!</h1>
	<h1 id="problem">Możesz opisac swój problem tutaj.</h1>
</article>
<article class="row message-article">
        <form action="mail.php" method="post" class="js-form">
            <div class="col-md-6">
                <label for="name">Twoje imię:</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="col-md-6">
                <label for="email">Twój Email:</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="col-md-12 message-field">
                <label for="message">Wiadomość:</label>
                <textarea name="message" class="message" id="message"></textarea>
            </div>
            <div class="col-md-12">
            <button id="submitbuttoncontact">Wyślij</button>
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
                $validation.removeClass('error').text('Dziękujemy za wiadomość, odezwiemy się jak najszybciej możemy');

                // Clear the inputs
                $name.val('');
                $email.val('');
                $message.val('');
            })
            .fail(function() {
                // Add the error class to show that an error has occurred and set the error text
                $validation.addClass('error').text('Podano zły adres e-mail, proszę spróbować ponownie');
            });
    });

</script>
</body>
