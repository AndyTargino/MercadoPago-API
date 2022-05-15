<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>

    <!-- Bootstrap CSS  -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JavaScript  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <title> Form - html5</title>
</head>

<style>
    i.fab {
        width: 30px
    }
</style>

<body>

    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-1 "> </div>

            <div class="col-md-6 col-sm-10">

                <form class="text-center border border-light p-5" id="form">

                    <p class="h4 mb-4">Checkout Transparente <br> Mercado Pago</p>

                    <div class="form-row mb-4">
                        <div class="col">

                            <input type="text" id="FirstName" class="form-control" placeholder="First name" required>
                        </div>
                        <div class="col">

                            <input type="text" id="LastName" class="form-control" placeholder="Last name" required>
                        </div>
                    </div>


                    <input type="email" id="Email" class="form-control mb-4" placeholder="E-mail" required>


                    <input type="password" id="Password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 8 characters and 1 digit
                    </small>


                    <input type="text" id="PhoneNumber" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                        Optional - for two step authentication
                    </small>


                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
                    </div>


                    <button id="but_sub" class="btn btn-info my-4 btn-block" type="submit" href="#">Pagar</button>


                    <p>or sign up with:</p>

                    <a style="position:center" type="button" class="light-blue-text mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a style="position:center" type="button" class="light-blue-text mx-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a style="position:center" type="button" class="light-blue-text mx-2">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a style="position:center" type="button" class="light-blue-text mx-2 ">
                        <i class="fab fa-github"></i>
                    </a>

                    <hr>


                    <p>By clicking
                        <em>Sign up</em> you agree to our
                        <a href="" target="_blank">terms of service</a>

                </form>

            </div>
            <div class="col-md-3 col-sm-1"> </div>
        </div>
    </div>
</body>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {


        $(function() {
            var effects = "animated pulse faster";
            var effectsEnd =
                "animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd";

            $("#kk").hover(function() {
                $(this)
                    .addClass(effects)
                    .one(effectsEnd, function() {
                        $(this).removeclass(effects);
                    });
            });
        });


        $("#but_sub").click(function() {
            var first_value = $("#FirstName").val();
            var last_value = $("#LastName").val();
            var Email_value = $("#Email").val();
            var Password_value = $("#Password").val();
            var phone_value = $("#PhoneNumber").val();

            alert("First Name: " + first_value + "\nLast Name: " + last_value + "\nEmail: " + Email_value + "\nPassword: " + Password_value + "\nPhone Number: " + phone_value);
            $("#form")[0].reset();
        });
    });
</script>

</html>