<?php 
    require "./src/Utils/Form.php";
    require "./src/Config/Database.php";
    
    $validation_result;
    $query_status = null;
    $reCaptcha_valid = false;

    if (!empty($_POST)){
        $form = NULL;

        $secret_key = "6LeWXzskAAAAACDPnphSWG4_7CCEqjpActSt2zY7";
        $reCaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST["g-recaptcha-response"];
        $response = json_decode(file_get_contents($reCaptcha_url));

        $reCaptcha_valid = $response->success;
        if ($reCaptcha_valid) {
            $form = new Form(["firstname" => $_POST["firstname"], 
                              "lastname" => $_POST["lastname"],
                              "email" => $_POST["email"],
                              "comment" => $_POST["comment"]
                            ]);
    
            $validation_result = $form->validate_form();
            if (!is_array($validation_result)) {
              $db = new Database();
              $conn = $db->connect();
    
              $insert_query = "
                               INSERT INTO support_messages (firstname, lastname, email, comment)
                               VALUES (:firstname, :lastname, :email, :comment)
                              ";
    
              $statement = $conn->prepare($insert_query);
              $query_status = $statement->execute($form->get_fields());
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <title>Support | Hackers Poulette</title>
    </head>
    <body>
        <?php 
          if ($query_status){
            echo "<p style='color: green;'> Message sent successfully! </p>";
          }

          if (!$reCaptcha_valid){
            echo "<p style='color: red;'> Failed to submit form, please try again later...</p>";
          }
        ?>
        <form id="support-form" action="index.php" method="post">
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

            <input class="g-recaptcha" 
                   data-sitekey="6LeWXzskAAAAAIIqj6d7jpf1hJ4_KAcLnqp-JvMa"
                   data-callback="onSubmit"
                   data-action="submit"
                   type="submit"
                   value="Send"
            >
        </form>
         <script>
           function onSubmit(token) {
             const form = document.querySelector("#support-form");
             form.submit();
          }
         </script>
    </body>
</html>
