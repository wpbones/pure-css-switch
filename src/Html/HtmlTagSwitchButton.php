<?php

namespace WPKirk\PureCSSSwitch\Html;

use WPKirk\WPBones\Html\HtmlTag;

class HtmlTagSwitchButton extends HtmlTag
{
  protected $attributes = [
    'name'        => null,
    'id'          => null,
    'theme'       => 'flat-round',
    'right_label' => null,
    'left_label'  => null,
    'value'       => '1'
  ];

  public static function __callStatic( $name, $arguments )
  {
    $args = ( isset( $arguments[ 0 ] ) && ! is_null( $arguments[ 0 ] ) ) ? $arguments[ 0 ] : [];

    $instance = new self();

    return $instance->{$name}( $args );
  }

  public function html()
  {
    if ( empty( $this->id ) ) {
      $this->id = $this->name;
    }

    if ( empty( $this->name ) ) {
      $this->name = $this->id;
    }

    $leftLabel = $this->left_label;
    $leftLabel = empty( $leftLabel ) ? '' : "<label for=\"{$this->id}\">{$leftLabel}</label>";

    $rightLabel = $this->right_label;
    $rightLabel = empty( $rightLabel ) ? '' : "<label for=\"{$this->id}\">{$rightLabel}</label>";

    ob_start(); ?>

    <div class="wpbones-switch-button wpbones-switch-button-<?php echo $this->theme ?>">
      <?php echo $leftLabel ?>
      <input id="<?php echo $this->id ?>"
             name="<?php echo $this->name ?>"
             type="checkbox"
             value="<?php echo $this->value ?>"/>
      <label for="<?php echo $this->id ?>"></label>
      <?php echo $rightLabel ?>
    </div>

    <?php
    $html = ob_get_contents();
    ob_end_clean();

    return $html;
  }
}