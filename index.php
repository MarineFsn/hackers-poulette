<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php include "connect.php" ?>

<body class="bg-gray-900">
    <div class="container">
        <header>
            <div class="container mx-auto text-center">
                <?php include "./partials/header.php"; ?>
            </div>
        </header>

        <main class="container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
            <fieldset>
                <legend class="text-2xl font-bold text-center">Contact us</legend>
                <form action="index.php" method="POST">
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="name" class="block">Lastname:</label>
                            <input type="text" id="name" name="name" required minlength="2" maxlength="255"
                                class="w-full px-4 py-2 border rounded">
                            <p id="Lastname-description" class="text-sm text-gray-500">Enter your Lastname here.
                                we won't judge you, no matter how funny it may sound!</p>
                        </div>
                    </div>
                    <div>
                        <label for="firstname" class="block">Firstname:</label>
                        <input type="text" id="firstname" name="firstname" required minlength="2" maxlength="255"
                            class="w-full px-4 py-2 border rounded">
                        <p id="firstname-description" class="text-sm text-gray-500">Enter your Firstname here. It
                            doesn't have to be fancy or extravagant!</p>
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block">E-mail Address:</label>
                        <input type="email" id="email" name="email" required minlength="2" maxlength="255"
                            class="w-full px-4 py-2 border rounded">
                        <p id="email-description" class="text-sm text-gray-500"> Provide your E-mail Address. We
                            promise not to flood your inbox with cat pictures... unless
                            you want us to!</p>
                    </div>
                    <div class="col-span-2">
                        <label for="file" class="block">File:</label>
                        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif" max-size="2097152"
                            class="w-full px-4 py-2 border rounded">
                        <p id="file-description" class="text-sm text-gray-500">Select a file (JPG, JPEG, PNG, GIF) up
                            to 2MB in size. Memes are always welcome!</p>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block">Description:</label>
                        <textarea id="description" name="description" required minlength="2" maxlength="1000"
                            class="w-full px-4 py-2 border rounded"></textarea>
                        <p id="description-description" class="text-sm text-gray-500">Describe your message here.
                            Whether it's a funny story, a complaint, or just a random thought, we're all ears!</p>
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