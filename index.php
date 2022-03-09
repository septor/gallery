<!-- WARNING: IF YOU'RE USING THIS I APOLOGIZE -->
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
        <section class="no-touch">
            <div class="wrap">
                <!-- The below is generated code. It is ugly. You're welcome! -->
                <?php
                foreach(glob("images/*.{jpg,gif,png,jpeg,svg}", GLOB_BRACE) as $file) {
                    echo '<div class="box">
                    <div class="boxInner">
                        <a href="'.$file.'"><img src="./'.$file.'" /></a>
                    </div>
                </div>';
                }
                ?>
            </div>
        </section>
    </body>
</html>