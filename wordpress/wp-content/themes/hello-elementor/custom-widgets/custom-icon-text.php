<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; 


class Custom_Icon_Text extends Widget_Base {
  public function get_name(){
    return 'Custom_Icon_Text_Container';
  }

  public function get_title(){
    return 'CustomIconTextContainer';
  }

  public function get_icon(){
    return 'eicon-info-box';
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

    $this->add_control(
      'description_text',
      [
        'label' => 'Description',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Example'
      ]
    );
    $this->end_controls_section();
  }

  protected function render() {
    $settings = $this->get_settings_for_display();
    
    $migrated = isset( $settings['__fa4_migrated']['new_icon_id'] );
    
    ?>
    <div class="icon-container">
      <div>
          <label class="icon-text-icon">
            <?php
              \Elementor\Icons_Manager::render_icon( $settings['new_icon_id'], [ 'aria-hidden' => 'true' ] );        
            ?>
          </label>
          <label class="icon-text-label"> <?php echo $settings['label_heading']; ?> </label>
      </div>
      <div>
          <label class="icon-text-text"> <?php echo $settings['description_text']; ?> </label>
      </div>
    </div>
    <?php
  }

}