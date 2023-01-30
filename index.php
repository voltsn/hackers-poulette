<?php 
    require "./src/Utils/Form.php";
    
    $validation_result;

    if (!empty($_POST)){
        $form = new Form(["firstname" => $_POST["firstname"], 
                          "lastname" => $_POST["lastname"],
                          "email" => $_POST["email"],
                          "comment" => $_POST["comment"]
                        ]);

        $validation_result = $form->validate_form();
    }
?>
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
                <?php echo isset($validation_result["firstname"]) ? "<p style='color:red;'>$validation_result[firstname]</p>" : "" ?>
            </div>
            <div>
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname">
                <?php echo isset($validation_result["lastname"]) ? "<p style='color:red;'>$validation_result[lastname]</p>" : "" ?>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <?php echo isset($validation_result["email"]) ? "<p style='color:red;'>$validation_result[email]</p>" : "" ?>
            </div>
            <div>
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment"></textarea>
                <?php echo isset($validation_result["comment"]) ? "<p style='color:red;'>$validation_result[comment]</p>" : "" ?>
            </div>

            <input type="submit" name="submit" value="Send">
        </form>
    </body>
</html>