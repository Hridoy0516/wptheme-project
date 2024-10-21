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
class team_gallery extends Widget_Base
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
		return 'team_gallery';
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
		return __('Team Gallery', 'elementor-hello-world');
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
	protected function register_controls()
	{

		$this->register_controls_section();
		$this->style_tab_content();
	}

	protected function register_controls_section()
	{

		$this->start_controls_section(
			'gallery_section',
			[
				'label' => esc_html__('Team Gallery', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'techub_title',
			[
				'label' => esc_html__('Heading Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Heading title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);


		$this->add_control(
			'techub_subtitle',
			[
				'label' => esc_html__('SubTitle', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Heading title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'label_block' => true,

			]
		);
		$this->add_control(
			'techub_image',
			[
				'label' => esc_html__('choice Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'techub_link',
			[
				'label' => esc_html__('Url', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('#', 'techub_core'),
				'placeholder' => esc_html__('Type your url here', 'techub_core'),
			]
		);



		$this->end_controls_section();
	}
	//   style section
	protected function style_tab_content()
	{

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
					'{{WRAPPER}} .tp-service-5-title' => 'color: {{VALUE}}',
				],
			]
		);





		$this->end_controls_section();
	}



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

		<div class="tp-team-5-thumb mb-30 p-relative wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
			<a href="<?php echo esc_url($settings['techub_link']); ?>"><img src="<?php echo esc_url($settings['techub_image']['url']); ?>" alt=""></a>
			<div class="tp-team-5-content text-center">
				
			    <?php if (!empty($settings['techub_title'])) : ?>
				  <h4 class="tp-team-5-title"><a href="<?php echo esc_url($settings['techub_link']); ?>"><?php echo esc_html($settings['techub_title']); ?></a></h4>
				<?php endif; ?>

				<?php if (!empty($settings['techub_subtitle'])) : ?>
				  <p class="tp-team-5-paragraph"><?php echo esc_html($settings['techub_subtitle']); ?></p>
				<?php endif;?>
			</div>
		</div>


<?php
	}
}


$widgets_manager->register(new team_gallery());
