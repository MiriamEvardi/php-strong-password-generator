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

    include "./functions.php";

    ?>

    <div class="container d-flex justify-content-center mt-5">
        <form class="text-center" method="GET">
            <div class="mb-3">
                <label for="password_length">Lunghezza della password:</label>
                <input type="number" id="password_length" name="password_length" min="8" max="64" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="symbols" class="form-check-input" id="symbols">
                <label class="form-check-label" for="symbols">Aggiungi simboli</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="numbers" class="form-check-input" id="numbers">
                <label class="form-check-label" for="numbers">Aggiungi numeri</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="letters" class="form-check-input" id="letters">
                <label class="form-check-label" for="letters">Aggiungi lettere</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="repeat_characters" class="form-check-input" id="repeat_characters">
                <label class="form-check-label" for="repeat_characters">Permetti la ripetizione dei caratteri</label>
            </div>
            <button type="submit" class="btn btn-primary">Genera Password</button>
        </form>
    </div>



    <?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET['password_length'])) {
            $password_length = intval($_GET['password_length']);

            $chars = '';

            if (!empty($_GET['symbols']) && $_GET['symbols'] === "on") {
                $chars .= '!@#$%^&*()-_=+';
            }

            if (!empty($_GET['numbers']) && $_GET['numbers'] === "on") {
                $chars .= '0123456789';
            }

            if (!empty($_GET['letters']) && $_GET['letters'] === "on") {
                $chars .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }

            $allow_repetition = isset($_GET['repeat_characters']) && $_GET['repeat_characters'] === "on";

            if (empty($chars)) {
                echo "<div class='text-center mt-5'> Seleziona almeno una checkbox </div>";
            } else {
                $password = generateRandomPassword($password_length, $chars, $allow_repetition);

                $_SESSION['password'] = $password;

                header('Location: ./results.php');
                exit;
            }
        }
    }




    ?>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>