<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];

        $uploadDirectory = './uploadedFiles/';
        $targetFilePath = $uploadDirectory . basename($fileName);


        $maxFileSize = 2 * 1024 * 1024;
        if ($fileSize > $maxFileSize) {
            echo "Le fichier est trop volumineux. Veuillez sélectionner un fichier de taille inférieure à 2 Mo.";
        } else {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                echo "L'extension du fichier n'est pas autorisée. Veuillez sélectionner un fichier avec une extension jpg, jpeg, png ou gif.";
            } else {

                if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                    echo "Le fichier a été téléchargé avec succès.";

                } else {
                    echo "Une erreur s'est produite lors du téléchargement du fichier. Veuillez réessayer.";
                }
            }
        }
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
}

?>