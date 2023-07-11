<?php
$cuentos = array(
    'es' => array(
        'texto' => 'Cuenta la leyenda azteca, que el dios Quetzalcóatl dejó su aspecto de serpiente emplumada para transformarse en un hombre común y así poder explorar la Tierra.

El dios se encontraba tan maravillado con los hermosos paisajes que siguió caminando hasta que el cielo se oscureció y se llenó de estrellas. Cansado y hambriento, se detuvo al lado del camino.

Un conejo pasó por su lado y le preguntó:

—¿Estás bien?

—No, me siento muy cansado y hambriento —respondió el dios.

Sin saber que estaba hablando con una deidad, el conejo rápidamente se ofreció a compartir su comida con Quetzalcóatl.

—Gracias, pero no como plantas — le dijo el dios al conejo.

El pequeño animal sintió mucha pena por el viajero:

—No tengo nada más que ofrecerte, soy una criatura insignificante y tú necesitas recuperar tus fuerzas, por favor cómeme y reanuda tu viaje.

El dios conmovido por el noble gesto de la pequeña criatura, regresó a su forma de serpiente emplumada y sostuvo al conejo tan alto que su reflejo quedó plasmado para siempre en la luna.

Luego, regresó al conejo a la Tierra y dijo:

—No eres una insignificante criatura, tu retrato pintado en la luz de la luna contará a todos los hombres la historia de tu bondad.'
    ),
    'en' => array(
        'texto' => 'Aztec legend tells that the god Quetzalcóatl left his appearance as a feathered serpent to become a common man and thus be able to explore the Earth.

The god was so amazed by the beautiful landscapes that he kept walking until the sky darkened and was filled with stars. Tired and hungry, he pulled up to the side of the road.

A rabbit passed by him and asked:

-Are you OK?

"No, I feel very tired and hungry," replied the god.

Not knowing that he was speaking to a deity, the rabbit quickly offered to share his meal with Quetzalcoatl.

Thank you, but I don t eat plants, said the god to the rabbit.

The little animal felt very sorry for the traveler:

—I have nothing more to offer you, I am an insignificant creature and you need to recover your strength, please eat me and resume your journey.

The god, moved by the noble gesture of the small creature, returned to his feathered serpent form and held the rabbit so high that its reflection was forever embodied in the moon.

Then he returned the rabbit to Earth and said:

—You are not an insignificant creature, your portrait painted in the moonlight will tell all men the story of your goodness.'
    ),
    'de' => array(
        'texto' => 'Die aztekische Legende besagt, dass der Gott Quetzalcóatl sein Aussehen als gefiederte Schlange verließ, um ein gewöhnlicher Mensch zu werden und so die Erde erkunden zu können.

Der Gott war so beeindruckt von der wunderschönen Landschaft, dass er weiterging, bis sich der Himmel verdunkelte und voller Sterne war. Müde und hungrig blieb er am Straßenrand stehen.

Ein Hase kam vorbei und fragte:

-Geht es dir gut?

„Nein, ich fühle mich sehr müde und hungrig“, antwortete der Gott.

Da er nicht wusste, dass er mit einer Gottheit sprach, bot er Quetzalcoatl schnell an, seine Mahlzeit zu teilen.

„Danke, aber ich esse keine Pflanzen“, sagte der Gott zum Kaninchen.

Dem kleinen Tier tat der Reisende sehr leid:

„Ich habe dir nichts mehr zu bieten, ich bin ein unbedeutendes Wesen und du musst wieder zu Kräften kommen, bitte iss mich und setze deine Reise fort.“

Der Gott, bewegt von der edlen Geste des kleinen Geschöpfs, kehrte in seine gefiederte Schlangengestalt zurück und hielt das Kaninchen so hoch, dass sein Spiegelbild für immer im Mond verkörpert war.

Dann brachte er das Kaninchen zur Erde zurück und sagte:

 Du bist kein unbedeutendes Geschöpf, dein im Mondlicht gemaltes Porträt wird allen Menschen die Geschichte deiner Güte erzählen.'
    )
);

$idioma = 'es';

if (isset($_POST['idioma']) && array_key_exists($_POST['idioma'], $cuentos)) {
    $idioma = $_POST['idioma'];
}



$cuento = $cuentos[$idioma]['texto'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">
</head>

<body>
    <div class="row">

        <div class="col-12">
            <form id="formulario" method="post" action="">
                <div>

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            Idiomas
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><button class="dropdown-item" type="submit" name="idioma" value="es">Español</button></li>
                            <li><button class="dropdown-item" type="submit" name="idioma" value="en">Inglés</button></li>
                            <li><button class="dropdown-item" type="submit" name="idioma" value="de">Alemán</button></li>
                        </ul>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class=" parrafo col-6">
            <h1 class="cuento text-center">El conejo plasmado en la luna</h1>
            <p class="cuento text-center">
                <?php
                echo $cuento;
                ?>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>