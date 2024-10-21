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
class skill_list extends Widget_Base
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
		return 'skill_list';
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
		return __('Skill List', 'elementor-hello-world');
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

	protected function register_controls_section(){

		
		$this->start_controls_section(
			'Skill_section',
			[
				'label' => esc_html__('Skill List', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'label',
			[
				'label' => esc_html__('Label Name', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Satisfied Clients', 'techub_core'),
			]
		);

		$repeater->add_control(
			'number',
			[
				'name' => 'percentage',
				'label' => __('Percentage', 'text-domain'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 70,
				'min' => 0,
				'max' => 100,
				'step' => 1,
			]
		);


		$this->add_control(
			'item_list',
			[
				'label' => __('Progress range', 'techub_core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                 'default' => [
					[
						'label' => __('Design', 'text-domain'),
						'percentage' => 70,
					],
					[
						'label' => __('Web development', 'text-domain'),
						'percentage' => 85,
					],
					[
						'label' => __('Data optimization', 'text-domain'),
						'percentage' => 65,
					],
				],
				'title_field' => '{{{ label }}}',
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


		<div class="tp-management-progres-skill tp-management-progres-skill-2 mb-35 mr-60">
			<?php foreach ($settings['item_list'] as $item): ?>
				<div class="tp-skill fix pb-20">
					<?php if (!empty($item['label'])) : ?>
						<label><?php echo esc_html($item['label']); ?></label>
					<?php endif; ?>
					<?php if (!empty($item['number'])) : ?>
						<div class="progress progress-2">
							<div class="progress-bar progress-bar-2 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".8s" role="progressbar" aria-label="Example with label" style="width:<?php echo esc_attr($item['number']); ?>%;" aria-valuenow="<?php echo esc_attr($item['number']); ?>" aria-valuemin="0" aria-valuemax="100"><span class="progresscounter"><?php echo esc_attr($item['number']); ?>%</span></div>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>



<?php
	}
}



$widgets_manager->register(new skill_list());
