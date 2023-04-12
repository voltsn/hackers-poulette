<?php require __DIR__."/partials/head.php"; ?>
<main class="grid place-items-center">
<?php 
session_start();

if ($query_status){
    echo "<p class='text-green-400 p-6 text-center'> Message sent successfully! </p>";
}

if (isset($reCaptcha_valid) && !$reCaptcha_valid){
    echo "<p class='text-red-400 p-6 text-center'> Failed to submit form, please try again</p>";
}
?>
    
    <form class="w-11/12 max-w-2xl text-white" id="support-form" action="/" method="post">
        <div class="form-group mb-6">
            <label for="firstname" class="inline-block mb-2">First name</label>
            <input type="text" name="firstname" id="firstname" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

            <?php echo isset($validation_result["firstname"]) ? "<p class='bg-red-100 py-2 px-4 mb-4 text-sm text-red-700 mb-3'>$validation_result[firstname]</p>" : "" ?>
        </div>
        <div class="form-group mb-6">
            <label for="lastname" class="form-label inline-block mb-2">Last name</label>
            <input type="text" name="lastname" id="lastname" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

            <?php echo isset($validation_result["lastname"]) ? "<p class='bg-red-100 py-2 px-4 mb-4 text-sm text-red-700 mb-3'>$validation_result[lastname]</p>" : "" ?>
        </div>
        <div class="form-group mb-6">
            <label for="email" class="form-label inline-block mb-2">Email</label>
            <input type="text" name="email" id="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

            <?php echo isset($validation_result["email"]) ? "<p class='bg-red-100 py-2 px-4 mb-4 text-sm text-red-700 mb-3'>$validation_result[email]</p>" : "" ?>
        </div>
        <div class="form-group mb-6">
            <label for="comment" class="form-label inline-block mb-2">Comment</label>
            <textarea name="comment" id="comment" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
            ></textarea>

            <?php echo isset($validation_result["comment"]) ? "<p class='bg-red-100 py-2 px-4 mb-4 text-sm text-red-700 mb-3'>$validation_result[comment]</p>" : "" ?>
        </div>

        <input data-sitekey="6LeWXzskAAAAAIIqj6d7jpf1hJ4_KAcLnqp-JvMa" data-callback="onSubmit" data-action="submit" type="submit" value="Send" class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out g-recaptcha">
    </form>
</main>
<script>
    function onSubmit(token) {
        const form = document.querySelector("#support-form");
        form.submit();
    }
</script>
<?php require __DIR__."/partials/footer.php"; ?>