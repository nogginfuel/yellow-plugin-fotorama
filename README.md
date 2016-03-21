Fotorama plugin 0.6.1
=====================
A jQuery image gallery with carousel.

How do I install this?
----------------------
1. Download and install [Yellow](https://github.com/datenstrom/yellow/).  
2. Download [fotorama.php](fotorama.php?raw=true), copy it into your `system/plugins` folder.  

To uninstall delete the plugin.

How to add a gallery?
---------------------
Create a `[fotorama]` shortcut.

The following arguments are available:
  
`PATTERN` = file name as [regular expression](https://en.wikipedia.org/wiki/Regular_expression)  
`STYLE` = gallery style  
`NAV` = navigation style, one of the following: dots, thumbs, false  
`AUTOPLAY` = play images automatically, delay time in milliseconds  

The plugin uses [Fotorama v4.6.4](http://fotorama.io/) by Artem Polikarpov, which is based on jQuery. It's licensed under [MIT license](http://opensource.org/licenses/MIT). Fotorama supports most web browsers, including Chrome, Firefox, Safari, Opera and IE. Files are served from [cdnjs](https://cdnjs.com), you can configure a different CDN or your own server.

Example
-------
Adding an image gallery:

    [fotorama]
    [fotorama photo.*jpg]
    [fotorama photo.*jpg - thumbs 5000]

Feedback
---------------
All feedback is welcome.