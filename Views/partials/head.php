<!DOCTYPE html>
<html lang="en" class="h-screen">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link  rel="stylesheet" href="../../assets/main.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <title>Support | Hackers Poulette</title>
    </head>
    <body class="h-full bg-blue-950 flex flex-col justify-evenly checker-bg">
        <?php if (isset($heading)) {
            echo "
            <header class='p-6 text-3xl text-center text-white'>
                <h1>$heading</h1>
            </header>

            ";
        }
        ?>