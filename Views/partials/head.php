<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link  rel="stylesheet" href="../../assets/main.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <title>Support | Hackers Poulette</title>
    </head>
    <body>
        <?php if (isset($heading)) {
            echo "
            <header class='p-6 text-3xl text-center text-white bg-red-700'>
                <h1>$heading</h1>
            </header>

            ";
        }
        ?>