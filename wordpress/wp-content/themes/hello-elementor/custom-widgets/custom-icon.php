<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; 


class Custom_Icon extends Widget_Base {
  public function get_name(){
    return 'Custom_Icon_Container';
  }

  public function get_title(){
    return 'CustomIconContainer';
  }

  public function get_icon(){
    return 'eicon-favorite';
  }

  public function get_categories(){
    return ['basic'];
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'section_icon',
      [
        'label' => __( 'Icon', 'text-domain' ),
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Label',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'My Example Heading'
      ]
    );

    $this->add_control(
      'new_icon_id',
      [
        'label' => __( 'Icon', 'text-domain' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'fa4compatibility' => 'old_icon',
        'default' => [
          'value' => 'fas fa-star',
          'library' => 'solid',
        ],
      ]
    );
  }

  protected function render() {
    $settings = $this->get_settings_for_display();

    $migrated = isset( $settings['__fa4_migrated']['new_icon_id'] );
    
    ?>
    <div class="icon-container">
      <label class="icon-icon">
        <?php
          \Elementor\Icons_Manager::render_icon( $settings['new_icon_id'], [ 'aria-hidden' => 'true' ] );        
        ?>
      </label>
      <label class="icon-label"> <?php echo $settings['label_heading']; ?> </label>
    </div>
    <?php
  }

}