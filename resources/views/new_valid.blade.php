<?php
use Respect\Validation\Validator as v;
require 'C:\laragon\www\myDesk-app\vendor\autoload.php';
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $dose = $_GET['dose'];
    $follow_ups = $_GET['follow_ups'];
    $address = $_GET['address'];
    $comment = $_GET['comment'];

    $errors = [];

    $nameValidator = v::notEmpty();
    $emailValidator = v::email();
    $phoneValidator = v::notEmpty();
    $doseValidator = v::notEmpty();
    $follow_upsValidator = v::notEmpty();
    $addressValidator = v::notEmpty();
    $commentValidator = v::notEmpty();

    if (!$nameValidator->validate($name)) {
        $errors[] = 'Name is required.';
    }

    if (!$emailValidator->validate($email)) {
        $errors[] = 'Invalid email format.';
    }

    if (!$phoneValidator->validate($phone)) {
        $errors[] = 'Phone number is required.';
    }

    if (!$doseValidator->validate($dose)) {
        $errors[] = 'Dose is required.';
    }

    if (!$follow_upsValidator->validate($follow_ups)) {
        $errors[] = 'Follow ups is required.';
    }

    if (!$addressValidator->validate($address)) {
        $errors[] = 'Address is required.';
    }

    if (!$commentValidator->validate($comment)) {
        $errors[] = 'Comment is required.';
    }

    if (!empty($errors)) {
        // Display the errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {
        // Process the form data
    }
}
?>
<style>
    .error {
    color: red;
    font-size: 12px;
}
</style>
<form method="get" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" >
    <span class="text-danger"></span>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" >
    <br>
    <label for="phone">Phone:</label>
    <input type="tel" name="phone" id="phone" >
    <br>
    <label for="dose">Dose:</label>
    <input type="text" name="dose" id="dose" >
    <br>
    <label for="follow_ups">Follow Ups:</label>
    <input type="text" name="follow_ups" id="follow_ups" >
    <br>
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" >
    {{-- <span class="error">Address is required.</span> --}}

    <br>
    <label for="comment">Comment:</label>
    <textarea name="comment" id="comment" ></textarea>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>



<script>
    $(document).ready(function() {

$(".eReferral-form").each(function() {

    $(this).validate({

        rules: {
            referring_doctor: {
                required: true
            },
            specialty: {
                required: true
            },
            ref_doctor_email: {
                required: true,
                email: true,
                maxlength: 255
            },
            ref_doctor_mobile: {
                required: true,
                maxlength: 10,
                minlength: 8,
                digits: true
            },
            ref_doctor_address: {
                required: true
            },
            situation: {
                required: true
            },
            medical_history: {
                required: true
            },
            examination_assessment: {
                required: true
            },
            request: {
                required: true
            },


        },
        errorElement: 'span',
        messages: {
            referring_doctor: {
                required: "Please enter doctor."
            },
            examination_assessment: {
                required: "The specialty field is required"

            },
            ref_doctor_email: {
                required:"The ref doctor email field is required."

            },
            ref_doctor_mobile: {
                required: " The ref doctor mobile field is required."
            }

        },



    });
});

});

</script>
