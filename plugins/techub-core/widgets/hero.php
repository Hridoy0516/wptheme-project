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
class Techub_hero extends Widget_Base
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
		return 'Techub-Hero';
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
		return __('Hero', 'elementor-hello-world');
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
			'Hero_section',
			[
				'label' => esc_html__('Title and Content', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'techub_sub_title',
			[
				'label' => esc_html__('Sub Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Input Your Text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'label_block' => true,
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
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'image_section',
			[
				'label' => esc_html__('Techub Image', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'techub_image',
			[
				'label' => esc_html__('Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);



		$this->add_control(
			'techub_bg_image',
			[
				'label' => esc_html__('Background Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'Button_section',
			[
				'label' => esc_html__( 'Button 01', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'Button_title',
			[
				'label' => esc_html__('Button Text', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Button Text', 'techub_core'),
				'placeholder' => esc_html__('Type your text here', 'techub_core'),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'Button02_section',
			[
				'label' => esc_html__( 'Button 02', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'Button2_title',
			[
				'label' => esc_html__('Button02 Text', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Button Text', 'techub_core'),
				'placeholder' => esc_html__('Type your text here', 'techub_core'),
				'dynamic' => [
					'active' => true, // Enable dynamic content
				],
			]

		);

		$this->add_control(
			'button02_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);


		$this->end_controls_section();
	}

    protected function style_tab_content(){

				$this->start_controls_section(
			'section_style',
			[
				'label' => __('Style', 'elementor-hello-world'),
				'tab' => Controls_Manager::TAB_STYLE,
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
				'label' => esc_html__('Text Color', 'techub_core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero' => 'color: {{VALUE}}',
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

		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button_arg', $settings['button_link'] );
			$this->add_render_attribute('button_arg','class', 'tp-btn');
			$this->add_render_attribute('button_arg','id', 'test-tp-btn');
			$this->add_render_attribute('button_arg','title', 'this is button');	
		}

			if ( ! empty( $settings['button02_link']['url'] ) ) {
			$this->add_link_attributes( 'button02_arg', $settings['button02_link'] );
			$this->add_render_attribute('button02_arg','class', 'tp-btn tp-btn-white');
			$this->add_render_attribute('button02_arg','id', 'test-tp-btns');
			$this->add_render_attribute('button02_arg','title', 'this is serace');	
		}


 ?>
		<section class="tp-slider-5-area p-relative z-index-1 fix">
			<div class="tp-slider-5-height">
			<?php if(!empty($settings['techub_bg_image'])) :?>
				<div class="tp-slider-5-bg"  style="background-image:url(<?php echo esc_url($settings['techub_bg_image']['url']);?>)"></div>
				 <?php endif;?>
				<div class="container">
					<div class="row align-items-end">
						<div class="col-xl-6 col-lg-6">
							<div class="tp-slider-5-content p-relative z-index-11">
								<div class="tp-slider-5-title-box mb-50 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                                    <?php if(!empty($settings['techub_sub_title'])) :?>
									<span class="tp-slider-sub-title tp-slider-sub-title-5"><?php echo techub_kses($settings['techub_sub_title']);?></span>
                                     <?php endif;?>
									 <?php if(!empty($settings['techub_title'])) :?>
									<h1 class="tp-slider-title tp-slider-title-5"><?php echo techub_kses($settings['techub_title']);?></h1>
									<?php endif;?>
									<?php if(!empty($settings['techub_description'])) :?>
									<p class="tp-slider-5-paragraph"><?php echo esc_html($settings['techub_description']);?></p>
									<?php endif;?>

								</div>
								<div class="tp-slider-5-btn-box d-inline-flex wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
									<?php if(!empty($settings['Button_title'])) :?>
										<a <?php echo  $this->get_render_attribute_string( 'button_arg' ); ?> ><span><?php echo esc_html($settings['Button_title']);?></span></a>
                                    <?php endif;?>
									<?php if(!empty($settings['Button2_title'])) :?>
					                     <a <?php echo  $this->get_render_attribute_string( 'button02_arg' ); ?> ><span><?php echo esc_html($settings['Button2_title']);?></span></a>
									 <?php endif;?>
								</div>
							</div>
						</div>
						<?php if(!empty($settings['techub_image'])) :?>
						<div class="col-xl-6 col-lg-6">
							<div class="tp-slider-5-thumb p-relative z-index-1">
								<img class="tp-slider-5-main-img" src="<?php echo esc_url($settings['techub_image']['url']); ?>" alt="">
							</div>
						</div>
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="tp-slider-5-bg-shape">
				<img class="tp-slider-5-bg-shape1" src="<?php echo get_template_directory_uri();?>/assets/img/slider/shape/slider-5-shape2.png" alt="">
			</div>
		</section>



 <?php
	}
  }




$widgets_manager->register(new Techub_hero());
