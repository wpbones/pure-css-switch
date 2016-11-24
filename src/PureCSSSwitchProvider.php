<?php

namespace WPKirk\PureCSSSwitch;

class PureCSSSwitchProvider
{

  public static function css( $minified = true )
  {
    $file = __FILE__;

    $path = rtrim( plugin_dir_url( $file ), '\/' );

    $minified = $minified ? ".min" : "";

    $css = "{$path}/public/css/wpbones-switch{$minified}.css";

    return $css;
  }

  public static function enqueueStyles( $minified = true )
  {
    wp_enqueue_style( 'wpbones-switch', self::css( $minified ),
                      [],
                      WPKirk()->Version );
  }
}