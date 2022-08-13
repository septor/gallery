# Gallery

Basically an image gallery. It pulls in every (defined in `formats.txt`) image inside `/images` and displays them.

I threw this together to quickly display images that I print off for my children to color. I'm sharing it because my GitHub activity is terrible.

Enjoy, or don't.

## Image extensions

You can decide which extensions to use by editing `formats.txt` split your extentions with a `,`. Submit a pull request if you find any that matter that should be included.

## Categories

Category support exists. Just create subdirectories inside the `/images` directory. They will auto display. The main page still displays every image inside the `/images` directory.

## URL Rewrite Support

The code has been updated to support URL rewriting. You can implement this if you are on an Apache server (probably others, but on my VPN Apache is installed).

I run this script in a subdomain, so, I use the following inside the root directory's `.htaccess`

```
RewriteEngine On
RewriteRule ^gallery/([^/\.]+)/?$ /gallery/index.php?cat=$1 [L]
```

Modify it to your liking. I have not tested outside my set up, but it stands to reason removing the `gallery` bit from above will work if you are using this scipt inside your root directory.

If you do not want to do URL rewriting, modify line 23 from:

`echo '<a href="./'.$category.'">'.strtoupper($category).' (' . $count . ')</a>';`

into

`echo '<a href="./?cat='.$category.'">'.strtoupper($category).' (' . $count . ')</a>';`