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
class techub_counter extends Widget_Base
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
		return 'Counter';
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
		return __('Counter', 'elementor-hello-world');
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
		return 'eicon-counter';
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
	// Content Tab section
	protected function register_controls_section()
	{

		// Counter Items Repeater
		$this->start_controls_section(
			'counter_section',
			[
				'label' => __('Counter Items', 'elementor-custom'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'number',
			[
				'label' => esc_html__('Number', 'elementor-custom'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '2480',
			]
		);

		$repeater->add_control(
			'label',
			[
				'label' => esc_html__('Label Name', 'elementor-custom'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Satisfied Clients', 'elementor-custom'),
			]
		);

		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('Counter Items', 'elementor-custom'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [

					[
						'icon' => 'flaticon-rating',
						'number' => '2480',
						'label' => __('Satisfied Clients', 'elementor-custom'),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();
	}

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


?>

		<div class="tp-counter-bg pt-110 pb-70" data-background="<?php echo get_template_directory_uri(); ?>/assets/img/counter/counter-bg.jpg">
			<div class="row tp-counter-padding pl-95 pr-95">
				<?php foreach ($settings['item_list'] as $index => $item): ?>
					<div class="col-xl-3 col-lg-3 col-md-6">
						<div class="tp-counter-wrapper text-center mb-30 wow fadeInUp" data-wow-delay="<?php echo (0.3 + ($index * 0.2)) . 's'; ?>" data-wow-duration="1s">
							<div class="tp-counter-icon">
								<span><i class="flaticon-rating"></i></span>
							</div>
							<div class="tp-counter-number-item d-flex justify-content-center">
								<h2 class="tp-counter"><span class="purecounter" data-purecounter-duration="5" data-purecounter-end="<?php echo esc_attr($item['number']); ?>"></span>+</h2>
							</div>
							<div class="tp-counter-text text-center">
								<p class="tp-counter-text-paragraph"><?php echo esc_html($item['label']); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>









<?php

	}
}




$widgets_manager->register(new techub_counter());
