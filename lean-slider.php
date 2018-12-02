<?php
/**
 * Plugin Name:       Lean Slider
 * Plugin URI:        https://github.com/andrejcremoznik/lean-slider
 * Description:       Simple image slider.
 * Version:           1.0
 * Author:            Andrej Cremoznik
 * Author URI:        https://keybase.io/andrejcremoznik
 * License:           MIT
 */

if (!defined('WPINC')) die();

class LeanSlider {
  private $version = '1.0';

  public function __construct() {
    add_action('wp_enqueue_scripts', [$this, 'assets']);
    add_shortcode('lean-slider', [$this, 'shortcode']);
  }

  public function assets() {
    wp_enqueue_style('leanslider', plugins_url('src/style.css', __FILE__), [], $this->version, 'screen');
    wp_enqueue_script('leanslider', plugins_url('src/script.js', __FILE__), [], $this->version, true);
  }

  public function shortcode($atts) {
    $atts = shortcode_atts([
      'ids' => '',
      'fit' => 'cover',
      'height' => 'initial',
    ], $atts, 'lean-slider');

    $ids = array_filter(array_map(function ($id) {
      $safeId = trim($id);
      return is_numeric($safeId) ? intval($safeId) : false;
    }, explode(',', $atts['ids'])));

    if (!count($ids)) {
      return '';
    }

    $fit = in_array($atts['fit'], ['cover', 'contain']) ? $atts['fit'] : 'cover';
    $height = esc_attr($atts['height']);

    $items = array_filter(array_map(function ($id) use ($height) {
      $img = wp_get_attachment_image_src($id, 'large');
      return $img
        ? sprintf('<img class="lean-slider__item" src="%s" alt="" style="max-height:%s">', $img[0], $height)
        : false;
    }, $ids));

    return implode('', [
      '<div class="lean-slider lean-slider_' . $fit . '">',
        '<div class="lean-slider__items">',
          implode('', $items),
        '</div>',
        '<div class="lean-slider__arrow lean-slider__arrow_prev lean-slider-js" data-do="prev"></div>',
        '<div class="lean-slider__arrow lean-slider__arrow_next lean-slider-js" data-do="next"></div>',
      '</div>'
    ]);
  }
}

new LeanSlider();
