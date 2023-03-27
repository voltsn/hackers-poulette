<?php     
    use Dotenv\Dotenv;
    require "Utils/Form.php";
    require "Database/Database.php";

    $heading = "We have your back! Tell us what you need help with.";

    if (empty($_POST)) {
      require "Views/index.view.php";
      exit();
    }

    session_start();

    $dotenv = Dotenv::createImmutable(__DIR__."/../");
    $dotenv->load();

    $reCaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=".$_ENV['SECRET_KEY']."&response=".$_POST["g-recaptcha-response"];
    $response = json_decode(file_get_contents($reCaptcha_url));
    $reCaptcha_valid = $response->success;
    $_SESSION["form"] = [["firstname" => $_POST["firstname"], "lastname" => $_POST["lastname"], "email" => $_POST["email"], "comment" => $_POST["comment"]]];

    $form = new Form(["firstname" => $_POST["firstname"], "lastname" => $_POST["lastname"], "email" => $_POST["email"], "comment" => $_POST["comment"]]);
    $validation_result = $form->validate_form();

    $query_status = null;
    if ($reCaptcha_valid && !is_array($validation_result)) {
      $db = new Database();
      $conn = $db->connect();

      $insert_query = "
                        INSERT INTO support_messages (firstname, lastname, email, comment)
                        VALUES (:firstname, :lastname, :email, :comment)
                      ";

      $statement = $conn->prepare($insert_query);
      $query_status = $statement->execute($form->get_fields());
    } 
?>

<?php require "Views/index.view.php" ?>