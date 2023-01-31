<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <title>Support | Hackers Poulette</title>
    </head>
    <body>
        <?php if (isset($heading)) {
            echo "
            <header class='p-6 text-3xl'>
                <h1 class='text-teal-500'>$heading</h1>
            </header>
            
            ";
        }
        ?>