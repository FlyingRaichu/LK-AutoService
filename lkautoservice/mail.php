<?php

// Validate e-mail address
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    // Set the http response code to show that an error happened
    http_response_code(400);
} else {
    // Send the inquery via e-mail
    mail(
        'mechanics-email-adress@wutwut.com',
        "You've recieved a message from {$_POST['name']}",
        $_POST['message'], "Reply-To: {$_POST['email']}"
    );
}
