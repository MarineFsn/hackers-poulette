<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <script src="./js/validClientSide.js"></script>

</head>
<?php require "php/validation.php"; ?>

<div class="container">
    <header>
        <?php include "./partials/header.php"; ?>
    </header>

    <body class="bg-gray-900">

        <div id="successDialog" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Formulaire envoyé avec succès!</h2>
                <p>Votre message a été envoyé correctement.</p>
                <button id="closeDialog" class="mt-4 bg-gray-900 text-white font-bold py-2 px-4 rounded">Fermer</button>
            </div>
        </div>

        <main class="container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
            <fieldset>
                <legend class="text-2xl font-bold text-center">Contact us</legend>

                <form action="index.php" method="POST" id="contactForm" enctype="multipart/form-data">
                    <div class="mt-4">

                        <div>
                            <label for="name" class="block">Lastname:</label>
                            <input type="text" id="name" name="name" required minlength="2" maxlength="255"
                                class="w-full px-4 py-2 border rounded"
                                placeholder="we won't judge you, no matter how funny it may sound!" class="reset-input">
                        </div>
                    </div>

                    <div>
                        <label for="firstname" class="block">Firstname:</label>
                        <input type="text" id="firstname" name="firstname" required minlength="2" maxlength="255"
                            class="w-full px-4 py-2 border rounded"
                            placeholder="Enter your Firstname here. It doesn't have to be fancy or extravagant!"
                            class="reset-input">
                    </div>


                    <div class="col-span-2">
                        <label for="email" class="block">E-mail Address:</label>
                        <input type="email" id="email" name="email" required minlength="2" maxlength="255"
                            class="w-full px-4 py-2 border rounded"
                            placeholder="Provide your E-mail Address. We promise not to flood your inbox with cat pictures... unless you want us to!"
                            class="reset-input">
                    </div>


                    <div class="col-span-2">
                        <label for="file" class="block">File:</label>
                        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif" max-size="2097152"
                            class="w-full px-4 py-2 border rounded" class="reset-input">
                        <?php require "php/validationFile.php"; ?>

                    </div>


                    <div class="col-span-2">
                        <label for="description" class="block">Description:</label>
                        <textarea id="description" name="description" required minlength="2" maxlength="1000"
                            class="w-full px-4 py-2 border rounded"
                            placeholder="Describe your message here. Whether it's a funny story, a complaint, or just a random thought, we're all ears!"
                            class="reset-input"></textarea>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                            class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            Submit
                        </button>
                    </div>

                </form>

            </fieldset>
        </main>

        <footer>
            <div class="container mx-auto text-center">
                <?php include "./partials/footer.php"; ?>
            </div>
        </footer>
</div>

</body>

</html>