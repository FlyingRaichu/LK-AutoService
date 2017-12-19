<?php
include ('includes/_head.php');
?>
<body>
	<header>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid head-cont">
	    <div class="navbar-header">
	      <img src="img/logo.png" alt="logo" class="navbar-brand" href="home_EN.php"></img>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="home_EN.php">Home</a></li>
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us
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
<article class="row">

	<article class="col-lg-9 bigtext">
        <h2>About me</h2>
        My name is Angelo Sarcione. I’ve been a car mechanic for over 15 years and during my experience
        i’ve found out that there is no such thing as “impossible to repair”. Throughout the years i’ve worked in many different
        workshops, with many different bosses, and, using that experience, i decided to open up shop in Roskilde. Now, me and my crew are
        here to offer the fastest, most quality car-repairs in Denmark, at an affordable price too!
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
    	<button id="submitbuttoncontact">Reserve now!</button>
    </form>
</article>
<article class="row">
	<h1 id="OR">OR...!</h1>
	<h1 id="problem">You can describe your problem below.</h1>
</article>
<article class="row message-article">
        <form action="mail.php" method="post" class="js-form">
            <div class="col-md-6">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="col-md-6">
                <label for="email">Your Email:</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="col-md-12 message-field">
                <label for="message">Message:</label>
                <textarea name="message" class="message" id="message"></textarea>
            </div>
            <div class="col-md-12">
            <button id="submitbuttoncontact">Submit</button>
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
                $validation.removeClass('error').text('Thank you for your message, we will respond as soon as possible');

                // Clear the inputs
                $name.val('');
                $email.val('');
                $message.val('');
            })
            .fail(function() {
                // Add the error class to show that an error has occurred and set the error text
                $validation.addClass('error').text('Not a valid email address, please try again');
            });
    });

</script>
</body>
