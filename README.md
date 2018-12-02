# Lean Slider (WordPress plugin)

**This is work in progress.** It works, but only covers a very specific case and it hasn't been extensively tested.

**Browser compatibility**

JavaScript is in ES2015 which means no Internet Explorer. Works in Edge and everywhere else.


## Installation

`WP_CONTENT_DIR` is the directory containing `plugins`, `themes`, `uploads`, etc. Default is `/path/to/wordpress/wp-content`.

Download the [zip](https://github.com/andrejcremoznik/lean-slider/archive/1.0.zip) and extract it to `WP_CONTENT_DIR/plugins/lean-slider`.

**CLI one-liner:**

```
# Change the path at the end:

curl -L https://github.com/andrejcremoznik/lean-slider/archive/1.0.tar.gz | tar zxf - --transform=s/lean-slider-1.0/lean-slider/ -C /path/to/wordpress/wp-content/plugins/
```


## How to use

Use the shortcode: `[lean-slider ids="1,2,3" fit="cover" height="400px"]`.

IDs are attachment IDs which are tricky to get. You should use WordPress's "Add Media" functionality to insert a new Gallery. Bulk-select all images you want and insert the gallery into the post. Then change from the "Visual" editor tab to "Text" editor. You'll see that the gallery uses a shortcode like `[gallery ids="1,2,3"]`. This is exactly what we want, just rename the `gallery` part to `lean-slider`.

**Attributes:**

* `ids` (required) - IDs of uploaded images.
* `fit` (optional) - How to scale the image within available space. `cover` (default) or `contain`.
* `height` (optional) - Limit the height of the slider. Use a valid CSS `max-height` value e.g. `400px`. Default is `initial`.


## Why is this not in the WordPress plugin directory?

I don't want to bother with SVN.


## Changelog

### 1.0

* Initial public release


## License

Lean Slider is licensed under the MIT license. See LICENSE.md
