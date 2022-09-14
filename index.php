<!--
WARNING: IF YOU'RE USING THIS I APOLOGIZE.
ALSO: I CLAIM NO CREDIT NOR COPYRIGHT FOR ANY OF THE IMAGES DISPLAYED HERE.
-->
<?php require_once 'utils/core.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gallery</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/<?= $css ?>">
    </head>
    <body>
        <?php
        echo '<div id="content">
            <section id="menu">
            <div class="categories">';

            echo '<a href="./">('.($showCounts ? '<span>' . padIt(totalImages($fileFormats)) . '</span><b>.</b> ' : '').'HOME)</a>'.$break;

            foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
                
                $count = count(glob($category."/*.{".$fileFormats."}", GLOB_BRACE));
                $category = str_replace("images/", "", $category);
                echo '<a href="./'.($useRewrite ? $category : '?cat='.$category).'">('.($showCounts ? '<span>' . padIt($count) . '</span><b>.</b> ' : '').strtoupper($category).')</a>'.$break;
            }

            echo '</div>
            </section>';
            ?>
            <section id="grid">
                <section id="images">
                    <!-- The below is generated code. It is ugly. You're welcome! -->
                    <?php
                    if(isset($_GET['cat'])) {
                        // Pull the images from the directory and display them, if the directory exists
                        if(is_dir("images/".$_GET['cat'])) {
                            foreach(glob("images/".$_GET['cat']."/*.{".$fileFormats."}", GLOB_BRACE) as $file) {
                                displayImage($file);
                            }
                        } else {
                            // if the directory doesn't exist, send them home.
                            header("location: ./");
                        }
                    } else {
                        // First list all the images not in a directory.
                        foreach(glob("images/*.{".$fileFormats."}", GLOB_BRACE) as $file) {
                            displayImage($file);
                        }

                        // Now cycle through all the directories and display all those images.
                        foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
                            foreach(glob($category."/*.{".$fileFormats."}", GLOB_BRACE) as $file) {
                                displayImage($file);
                            }
                        }
                    }
                    ?>
                </section>
            </section>
        </div>
        <script src="utils/sticky.js"></script>
    </body>
</html>