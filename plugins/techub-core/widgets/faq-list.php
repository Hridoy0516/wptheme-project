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
class faq_list extends Widget_Base
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
		return 'faq_list';
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
		return __('FAQ List', 'elementor-hello-world');
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

		$this->start_controls_section(
			'faq_section',
			[
				'label' => esc_html__('FAQ List', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'techub_title',
			[
				'label' => esc_html__('Services Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
			]
		);

		$repeater->add_control(
			'techub_description',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__('Default description', 'textdomain'),
				'placeholder' => esc_html__('Type your description here', 'textdomain'),
			]
		);


		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('Services List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'techub_title' => esc_html__('Title #1', 'textdomain'),
						'techub_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
					],
					[
						'techub_title' => esc_html__('Title #2', 'textdomain'),
						'techub_description' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
					],
				],
				'title_field' => '{{{ techub_title }}}',
			]
		);


		$this->end_controls_section();


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


		<div class="tp-faq-5-collaps-wrapper wow fadeInRight">
			<h2 class="tp-faq-5-collaps-title">Techub Have Answer</h2>
			<div class="tp-faq-5-accordion accordion-flush" id="accordionFlushExample">
			<?php foreach ($settings['item_list'] as $key => $item) : 
				$collapsed = $key == 0 ? '' : 'collapsed';
				$show = $key == 0 ? 'show' : '';

				?>
				<div class="tp-faq-5-accordion-item accordion-item mb-10">
					<h2 class="accordion-header">
						<button class="tp-faq-5-accordion-title accordion-button <?php echo esc_attr($collapsed);?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?php echo esc_attr($key); ?>" aria-expanded="false" aria-controls="flush-collapseOne-<?php echo esc_attr($key); ?>">
							<?php echo esc_html($item['techub_title']); ?>
							<span class="accordion-btn"></span>
						</button>
					</h2>
					<div id="flush-collapseOne-<?php echo esc_attr($key); ?>" class="accordion-collapse collapse<?php echo esc_attr($show);?>" data-bs-parent="#accordionFlushExample">
						<div class="tp-faq-5-accordion-pera accordion-body"><?php echo esc_html($item['techub_description']); ?></div>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>









<?php
	}
}


$widgets_manager->register(new faq_list());
