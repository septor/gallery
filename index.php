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
        <?php
        echo '<section id="menu">
        <div class="categories">';
        echo '<a href="./">HOME</a>';
        foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
            $category = str_replace("images/", "", $category);
            echo '<a href="./?cat='.$category.'">'.strtoupper($category).'</a>';
        }
        echo '</div>
        </section>';
        ?>
        <section id="images">
            <!-- The below is generated code. It is ugly. You're welcome! -->
            <?php
            $formats = file_get_contents('formats.txt');

            if(isset($_GET['cat'])) {
                // Pull the images from the directory and display them, if the directory exists
                if(is_dir("images/".$_GET['cat'])) {
                    foreach(glob("images/".$_GET['cat']."/*.{".$formats."}", GLOB_BRACE) as $file) {
                        echo '
                        <div class="box">
                        <div class="boxInner">
                            <a href="'.$file.'"><img src="./'.$file.'" /></a>
                        </div>
                    </div>';
                    }
                } else {
                    // if the directory doesn't exist, send them home.
                    header("location: ./");
                }
            } else {
                // First list all the images not in a directory.
                foreach(glob("images/*.{".$formats."}", GLOB_BRACE) as $file) {
                    echo '
                    <div class="box">
                    <div class="boxInner">
                        <a href="'.$file.'"><img src="./'.$file.'" /></a>
                    </div>
                </div>';
                }

                // Now cycle through all the directories and display all those images.
                foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
                    foreach(glob($category."/*.{".$formats."}", GLOB_BRACE) as $file) {
                        echo '
                        <div class="box">
                        <div class="boxInner">
                            <a href="'.$file.'"><img src="./'.$file.'" /></a>
                        </div>
                    </div>';
                    }
                }
            }
            ?>
        </section>
    </body>
</html>