<?php include "./partials/header.php"; ?>
<?php include "/php/validationFile.php"; ?>
<div class="container">
    <div id="successDialog" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Formulaire envoyé avec succès!</h2>
            <p>Votre message a été envoyé correctement.</p>
            <button id="closeDialog" class="mt-4 bg-gray-900 text-white font-bold py-2 px-4 rounded">Fermer</button>
        </div>
    </div>

    <main class="container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg">
        <form action="/php/validation.php" method="POST" id="contactForm" enctype="multipart/form-data">
            <fieldset>
                <legend class="text-2xl font-bold text-center">Contact us</legend>
                <div class="mt-4">
                    <div>
                        <label for="name" class="block">Lastname:</label>
                        <input type="text" id="name" name="name" required minlength="2" maxlength="255"
                            placeholder="we won't judge you, no matter how funny it may sound!"
                            class="w-full px-4 py-2 border rounded reset-input">
                    </div>
                </div>

                <div>
                    <label for="firstname" class="block">Firstname:</label>
                    <input type="text" id="firstname" name="firstname" required minlength="2" maxlength="255"
                        placeholder="Enter your Firstname here. It doesn't have to be fancy or extravagant!"
                        class="w-full px-4 py-2 border rounded reset-input">
                </div>

                <div>
                    <label for="email" class="block">E-mail Address:</label>
                    <input type="email" id="email" name="email" required minlength="2" maxlength="255"
                        placeholder="Provide your E-mail Address. We promise not to flood your inbox with cat pictures... unless you want us to!"
                        class="w-full px-4 py-2 border rounded reset-input">
                </div>

                <div>
                    <label for="file" class="block">File:</label>
                    <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .gif" max-size="2097152"
                        class="w-full px-4 py-2 border rounded reset-input">
                </div>

                <div>
                    <label for="description" class="block">Description:</label>
                    <textarea id="description" name="description" required minlength="2" maxlength="1000"
                        placeholder="Describe your message here. Whether it's a funny story, a complaint, or just a random thought, we're all ears!"
                        class="w-full px-4 py-2 border rounded reset-input"></textarea>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit" name="submit" onclick="submitForm(event)"
                        class="bg-gray-900 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Submit
                    </button>
                </div>
            </fieldset>
            <input type="hidden" id="recaptchaToken" name="recaptcha_token">
        </form>
    </main>
</div>

<script src="https://www.google.com/recaptcha/api.js?render=6LcLy7wmAAAAAAOaXdMdGMHI2B5qeTceNoCidRF2"></script>
<script>
    function submitForm(event) {
        event.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('6LcLy7wmAAAAAAOaXdMdGMHI2B5qeTceNoCidRF2', { action: 'submit' }).then(function (token) {
                let form = document.getElementById("contactForm");
                let tokenField = document.getElementById("recaptchaToken");
                tokenField.value = token;

                // Créer un nouvel événement de soumission du formulaire
                let submitEvent = new Event('submit', {
                    bubbles: true,
                    cancelable: true
                });

                // Déclencher l'événement de soumission sur le formulaire
                form.dispatchEvent(submitEvent);
            });
        });
    }

</script>

<?php include "./partials/footer.php"; ?>