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
class Team_detalis extends Widget_Base
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
		return 'Team_detalis';
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
		return __('Team Detalis', 'elementor-hello-world');
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
		return 'eicon-meetup';
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
	// Tab Content Section 
	protected function register_controls_section()
	{
		$this->start_controls_section(
			'Team_detali',
			[
				'label' => esc_html__('Team Details', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'teamdetalis_image',
			[
				'label' => esc_html__('team detalis Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'techub_title',
			[
				'label' => esc_html__('Heading Name', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Liza Olivarez', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
			]
		);

		$this->add_control(
			'techub_designation',
			[
				'label' => esc_html__('Designation', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Backend Developer', 'techub_core'),
			]
		);

		$this->add_control(
			'techub_description',
			[
				'label' => esc_html__('Description', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__('Default description', 'techub_core'),
				'placeholder' => esc_html__('Type your description here', 'techub_core'),
			]
		);


		$repeater = new \Elementor\Repeater();

		// Add fields to the repeater (for example, label and value)
		$repeater->add_control(
			'label',
			[
				'label' => esc_html__('Label', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Worker Position', 'techub_core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'value',
			[
				'label' => esc_html__('Value', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Liza Olivares', 'techub_core'),
				'label_block' => true,
			]
		);

		// Add the repeater field to the controls section
		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('team item list', 'techub_core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'label' => esc_html__('Responsibility:', 'techub_core'),
						'value' => esc_html__('25 Years', 'techub_core'),
					],
					[
						'label' => esc_html__('Email Address:', 'techub_core'),
						'value' => esc_html__('techub@gmail.com', 'techub_core'),
					],
					[
						'label' => esc_html__('Phone Number:', 'techub_core'),
						'value' => esc_html__('+1 888 098-90987', 'techub_core'),
					],

					[
						'label' => esc_html__('Web Address:', 'techub_core'),
						'value' => esc_html__('www.yourdomain.com', 'techub_core'),
					],
				],
				'title_field' => '{{{ label }}}', // This shows the label in the editor
			]
		);


		// Socail Section 


		$this->add_control(
			'facebook',
			[
				'label' => __('Facebook URL', 'techub_core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://www.facebook.com', 'techub_core'),
			]
		);

		$this->add_control(
			'instagram',
			[
				'label' => __('Instagram URL', 'techub_core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://www.instagram.com', 'techub_core'),
			]
		);

		$this->add_control(
			'linkedin',
			[
				'label' => __('LinkedIn URL', 'techub_core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://www.linkedin.com', 'techub_core'),
			]
		);

		$this->add_control(
			'twiter',
			[
				'label' => __('Twiter URL', 'techub_core'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://www.instagram.com', 'techub_core'),
			]
		);

		$this->end_controls_section();
	}

	// Tab Style Section 
	protected function style_tab_content()
	{


		//Style Section 
		$this->start_controls_section(
			'team_section',
			[
				'label' => __('Team', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'team_area_padding',
			[
				'label' => __('Padding', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'default' => [
					'unit' => 'px',
					'top' => '110',
					'right' => '0',
					'bottom' => '55',
					'left' => '0',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-team-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->add_control(
			'team_content_alignment',
			[
				'label' => __('Content Alignment', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'plugin-name'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __('Center', 'plugin-name'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __('Right', 'plugin-name'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .tp-team-content' => 'text-align: {{VALUE}};',
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


		<div class="tp-team-details-information p-relative mb-60 wow fadeInUp">
			<div class="row">
				<div class="col-lg-5">
					<div class="tp-team-details-thumb">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/team/team-details-img.png" alt="">
					</div>
				</div>

				<div class="col-lg-7">
					<div class="tp-team-details-wrapper p-relative">
						<div class="shape">
							<img src="<?Php echo get_template_directory_uri(); ?>/assets/img/team/shape-star.png" alt="">
						</div>
						<?php if (!empty($settings['techub_title'])) : ?>
							<h3 class="tp-team-details-title"><?php echo esc_html($settings['techub_title']); ?></h3>
						<?php endif; ?>
						<?php if (!empty($settings['techub_designation'])) : ?>
							<span class="tp-team-details-subtitle"><?php echo esc_html($settings['techub_designation']); ?></span>
						<?php endif; ?>

						<?php if (!empty($settings['techub_description'])) : ?>
							<p><?php echo techub_kses($settings['techub_description']); ?></p>
						<?php endif; ?>

						<?php foreach ($settings['item_list'] as $detalis) : ?>

							<?php if (!empty($detalis['label'])) : ?>
								<h5 class="tp-team-details-info"><span><?php echo esc_html($detalis['label']); ?></span> <a href="#"><?php echo esc_html($detalis['value']); ?></a></h5>
							<?php endif; ?>

						<?php endforeach; ?>

						<div class="tp-team-details-social">
							<?php if (!empty($settings['facebook']['url'])) : ?>
								<a href="<?php echo esc_url($settings['facebook']['url']); ?>"><i class="fa-brands fa-facebook-f"></i></a>
							<?php endif; ?>
							<?php if (!empty($settings['instagram']['url'])) : ?>
								<a href="<?php echo esc_url($settings['instagram']['url']); ?>"><i class="fa-brands fa-instagram"></i></a>
							<?php endif; ?>

							<?php if (!empty($settings['linkedin']['url'])) : ?>
								<a href="<?php echo esc_url($settings['linkedin']['url']); ?>"><i class="fa-brands fa-linkedin-in"></i></a>

							<?php endif; ?>
							<?php if (!empty($settings['twiter']['url'])) : ?>
								<a href="<?php echo esc_url($settings['twiter']['url']); ?>"><i class="fa-brands fa-twitter"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}

$widgets_manager->register(new Team_detalis());
