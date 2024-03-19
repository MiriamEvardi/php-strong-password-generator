<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php


    function generateRandomPassword($length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
        $password = '';
        $chars_length = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, $chars_length)];
        }

        return $password;
    };

    ?>

    <div class="container d-flex justify-content-center mt-5">
        <form class="text-center" method="GET">
            <div class="mb-3">
                <label for="password_length">Lunghezza della password:</label>
                <input type="number" id="password_length" name="password_length" min="8" max="64" required>
            </div>
            <button type="submit" class="btn btn-primary">Genera Password</button>
        </form>
    </div>

    <?php
    if (isset($_GET['password_length'])) {
        $password_length = intval($_GET['password_length']);

        if ($password_length > 0) {

            $password = generateRandomPassword($password_length);
            echo "<div class='text-center mt-5'> La tua password generata è: $password  </div>";
        }
    } else {
        echo "<div class='text-center mt-5'> La lunghezza della password non è stata fornita. </div>";
    }
    ?>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>