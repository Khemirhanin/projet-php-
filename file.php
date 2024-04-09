<?php
require_once 'components/autoload.php'; // Adjust the path if necessary

require 'vendor/autoload.php'; // Using forward slash for directory separator

use Dompdf\Dompdf;
use Dompdf\Options;

// Create Dompdf instance
$options = new Options();
$options->set('isRemoteEnabled', true); // 'true' instead of 'TRUE' for boolean value
$dompdf = new Dompdf($options);

// Use stream context to handle SSL verification
$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);

// Adjust the image paths using the appropriate function or variable
$recipeImagePath = 'img/recepie/1.jpg'; // Assuming the recipe image is located in the project directory
$logoImagePath = 'img/logo.png'; // Assuming the logo image is located in the project directory

// Encode image files to base64
$recipeImageBase64 = base64_encode(file_get_contents($recipeImagePath));
$logoImageBase64 = base64_encode(file_get_contents($logoImagePath));

// Load HTML content with images embedded
$html = '<div class="header" style="display:flex;">
    <img style="height:50px; margin-right:450px;" src="data:image/png;base64,' . $logoImageBase64 . '" alt="Logo">
    <h1 style="text-align:center; font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif;">recipe name</h1>
</div>
<div class="container" style="display:flex;">
    <div class="text">
        <div class="Ingredients">
            <h3 style="margin-left:10px;">Ingredients:</h3>
            <p style="margin:10px 40px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="description">
            <h3 style="margin-left:10px;">Steps:</h3>
            <p style="margin:10px 40px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <img style="height:350px; width:300px; border-radius:5px;margin-left:200px;" src="data:image/png;base64,' . $recipeImageBase64 . '" alt="Recipe Image">
        <h2 style="text-align:center;">Enjoy The Food!!</h2>
    </div>
</div>';

// Load HTML into Dompdf
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render PDF (note: you don't need to explicitly pass the stream context)
$dompdf->render();

// Output the generated PDF
$dompdf->stream("recipe.pdf", array("Attachment" => false));
?>
