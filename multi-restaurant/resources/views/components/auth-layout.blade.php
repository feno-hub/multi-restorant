<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.0.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweatAlert/sweat.js') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="auth">
        {{ $slot }}
    </div>

    <script src="{{ asset('assets/fontawesome-free-6.0.0-web/js/all.min.js') }}"></script>
    <script>
        const togglePassword = document.querySelector(".toggle-password");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {

            if (password.type === "password") {

                password.type = "text";

                this.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';

            } else {

                password.type = "password";

                this.innerHTML = '<i class="fa-solid fa-eye"></i>';

            }

        });
    </script>
</body>

</html>
