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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Om os
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="about_DK.php">Vores mål</a></li>
            <li><a href="advice_DK.php">Gode råd</a></li>
          </ul>
        </li>
        <li class="active"><a href="contact_EN.php">Kontakt os</a></li>
      </ul>
    </div>
  </nav>
  <div class="headpic">

  </div>
  </header>
<main class="container">
    <h3 id="heading">Hvis du har yderligere spørgsmål, skal du være velkommen til at kontakte os!</h3>




<section>
<iframe id="map"
 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19606.410247940086!2d12.407069628601597!3d55.716889602970326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465250516776f3f1%3A0xc6a0cc45c3d2b031!2sL.K.+Autoservice+v%2FLine+Kongsted!5e0!3m2!1sbg!2sdk!4v1513647517485"
 allowfullscreen></iframe>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->


<form id="contact_form" action="mail.php">
  <label for="fname"><h3 class="contact_titles">Dit navn:</h3></label><br>
  <input type="text" class="nameemail" name="fname"><br><br>

  <label for="fname"><h3 class="contact_titles">Din e-mail:</h3></label><br>
  <input type="text" class="nameemail" name="fname"><br><br>

  <label for="fname"><h3 class="contact_titles">Din besked:</h3></label><br>
  <input type="text" id="namemessage" name="fname">
</form>
<br><br>
<button id="submitbuttoncontact">Send</button>



</main>

<?php include ('includes/_footer.php') ?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
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
