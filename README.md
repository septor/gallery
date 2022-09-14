# Gallery

Basically an image gallery. It pulls in every image inside `/images`, including subdirectories, and displays them.

I threw this together to quickly display images that I print off for my children to color. I'm sharing it because my GitHub activity is terrible.

Enjoy, or don't.

## Configuration

All the configuration is inside `utils/config.php`.

* You can decide on which file formats your images are by modifying `$fileFormats`. Split them up with a `,`.
* You can toggle counts next to your image categories (and HOME) by modifying `$showCounts`.
* You can swap between URL structures for URL rewriting by modifying `$useRewrite`.
    * The URL structure swaps between `https://url.com/gallery/category` and `https://url.com/gallery/?cat=category`. If your rewriting doesn't function like this, you can modify line 39 of `index.php` to reflect your set up.

## Categories

Category support exists. Just create subdirectories inside the `/images` directory. They will auto display. The main page still displays every image inside the `/images` directory. Including subdirectories.

## URL Rewrite Support

You can implement this if you are on an Apache server (probably others, but on my VPN Apache is installed. I'm not doing the leg work for any other set ups).

I run this script in a subdomain, so, I use the following inside the root directory's `.htaccess`

```
RewriteEngine On
RewriteRule ^gallery/([^/\.]+)/?$ /gallery/index.php?cat=$1 [L]
```

Modify it to your liking. I have not tested outside my set up, but it stands to reason removing the `gallery` bit from above will work if you are using this script inside your root directory.