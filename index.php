<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Support | Hackers Poulette</title>
    </head>
    <body>
        <form action="index.php" method="post">
            <div>
                <label for="firstname">First name</label>
                <input type="text" name="firstname" id="firstname">
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment"></textarea>
            </div>

            <input type="submit" name="submit" value="Send">
        </form>
    </body>
</html>