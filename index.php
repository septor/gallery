<!--
WARNING: IF YOU'RE USING THIS I APOLOGIZE.
ALSO: I CLAIM NO CREDIT NOR COPYRIGHT FOR ANY OF THE IMAGES DISPLAYED HERE.
-->
<?php
$use_rewrite = true;
$show_category_counts = true;
?>
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
            $count = count(glob("images/".$category."/*"));
            echo '<a href="./'.($use_rewrite ? $category : '?cat='.$category).'">'.strtoupper($category).($show_category_counts ? ' (' . $count . ')' : '').'</a>';
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
                        echo '<a href="'.$file.'"><img src="./'.$file.'" /></a>';
                    }
                } else {
                    // if the directory doesn't exist, send them home.
                    header("location: ./");
                }
            } else {
                // First list all the images not in a directory.
                foreach(glob("images/*.{".$formats."}", GLOB_BRACE) as $file) {
                    echo '<a href="'.$file.'"><img src="./'.$file.'" /></a>';
                }

                // Now cycle through all the directories and display all those images.
                foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
                    foreach(glob($category."/*.{".$formats."}", GLOB_BRACE) as $file) {
                        echo '<a href="'.$file.'"><img src="./'.$file.'" /></a>';
                    }
                }
            }
            ?>
        </section>
        <script src="sticky.js"></script>
    </body>
</html>