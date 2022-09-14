<!--
WARNING: IF YOU'RE USING THIS I APOLOGIZE.
ALSO: I CLAIM NO CREDIT NOR COPYRIGHT FOR ANY OF THE IMAGES DISPLAYED HERE.
-->
<?php
$formats = file_get_contents('formats.txt');
$useRewrite = true;
$showCounts = true;

$totalImages = 0;
foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
    $totalImages += count(glob($category."/*"));
}

function displayImage($file) {
    echo '<a href="'.$file.'"><img src="./'.$file.'" /></a>';
}
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
        echo '<div id="content">
            <section id="menu">
            <div class="categories">';
            echo '<a href="./">'.($showCounts ? '<span>' . str_pad($totalImages, 3, "0", STR_PAD_LEFT) . '</span><b>.</b> ' : '').'HOME</a><br>';
            foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
                
                $category = str_replace("images/", "", $category);
                $count = count(glob("images/".$category."/*"));
                echo '<a href="./'.($useRewrite ? $category : '?cat='.$category).'">'.($showCounts ? '<span>' . str_pad($count, 3, "0", STR_PAD_LEFT) . '</span><b>.</b> ' : '').strtoupper($category).'</a><br>';
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
                            foreach(glob("images/".$_GET['cat']."/*.{".$formats."}", GLOB_BRACE) as $file) {
                                displayImage($file);
                            }
                        } else {
                            // if the directory doesn't exist, send them home.
                            header("location: ./");
                        }
                    } else {
                        // First list all the images not in a directory.
                        foreach(glob("images/*.{".$formats."}", GLOB_BRACE) as $file) {
                            displayImage($file);
                        }

                        // Now cycle through all the directories and display all those images.
                        foreach(glob("images/*", GLOB_ONLYDIR) as $category) {
                            foreach(glob($category."/*.{".$formats."}", GLOB_BRACE) as $file) {
                                displayImage($file);
                            }
                        }
                    }
                    ?>
                </section>
            </section>
        </div>
        <!-- <script src="sticky.js"></script> -->
    </body>
</html>