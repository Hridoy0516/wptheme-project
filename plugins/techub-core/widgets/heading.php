<?php

namespace Techub_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Techub_heading extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'Techub-Heading';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return __('Techub-Heading', 'elementor-hello-world');
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-slider-3d';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['techub-cat-widget'];
	}


	public function get_script_depends()
	{
		return ['elementor-hello-world'];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls(){

      	$this->register_controls_section();
        $this->style_tab_content();
	}
      // Content Tab section
    protected function register_controls_section(){
				$this->start_controls_section(
			'Heading_section',
			[
				'label' => esc_html__(' Heading Title', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'techub_Subtitle',
			[
				'label' => esc_html__('SubTitle', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Input Your Text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);



		$this->add_control(
			'techub_title',
			[
				'label' => esc_html__('Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Input Your Text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);


		$this->add_control(
			'techub_description',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__('Default description', 'textdomain'),
				'placeholder' => esc_html__('Type your description here', 'textdomain'),
			    'label_block' => true,
			    'dynamic' => [
				    'active' => true,
			    ],
			]
		);


		
		$this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tp-el-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

    protected function style_tab_content(){

		$this->start_controls_section(
			'section_style',
			[
				'label' => __('Sub Title Style', 'elementor-hello-world'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .tp-el-sbtl',
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __('Text Transform', 'elementor-hello-world'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __('None', 'elementor-hello-world'),
					'uppercase' => __('UPPERCASE', 'elementor-hello-world'),
					'lowercase' => __('lowercase', 'elementor-hello-world'),
					'capitalize' => __('Capitalize', 'elementor-hello-world'),
				],
				'selectors' => [
					'{{WRAPPER}} .hero' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__(' Color', 'techub_core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-el-heading' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-el-sbtl' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


	}
	// style Tab section
	 









	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

 ?>

                <div class="row">
                    <div class="tp-section-5-title-wrapper tp-el-title wow fadeInUp">
						
					   <?php if(!empty($settings['techub_Subtitle'])) :?>
                         <span class="tp-section-5-subtitle tp-el-sub-title"><?php echo techub_kses($settings['techub_Subtitle']);?></span>
						<?php endif;?>

					    <?php if(!empty($settings['techub_title'])) :?>
                          <h3 class="tp-section-5-title tp-el-heading"><?php echo techub_kses($settings['techub_title']);?></h3>
						<?php endif;?>

						<?php if(!empty($settings['techub_description'])) :?>
                          <p class="tp-el-content"><?php echo techub_kses($settings['techub_description']);?></p>
						<?php endif;?>

                    </div>
                </div>


	


 <?php
	}
  }




$widgets_manager->register(new Techub_heading());
