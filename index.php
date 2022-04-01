<!--
WARNING: IF YOU'RE USING THIS I APOLOGIZE.
ALSO: I CLAIM NO CREDIT NOR COPYRIGHT FOR ANY OF THE IMAGES DISPLAYED HERE.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gallery</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section id="images">
            <!-- The below is generated code. It is ugly. You're welcome! -->
            <?php
            $formats = file_get_contents('formats.txt');
            foreach(glob("images/*.{".$formats."}", GLOB_BRACE) as $file) {
                echo '<div class="box">
                <div class="boxInner">
                    <a href="'.$file.'"><img src="./'.$file.'" /></a>
                </div>
            </div>';
            }
            ?>
        </section>
    </body>
</html>