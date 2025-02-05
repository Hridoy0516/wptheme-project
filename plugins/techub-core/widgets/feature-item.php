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
class feature_item extends Widget_Base
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
		return 'feature_item';
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
		return __('Feature item', 'elementor-hello-world');
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
			'feature_section',
			[
				'label' => esc_html__('Feature item', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'techub_title',
			[
				'label' => esc_html__('Heading Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
			]
		);

		$repeater->add_control(
			'techub_image',
			[
				'label' => esc_html__('choice Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);




		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('Feature List', 'techub_core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'techub_title' => esc_html__('Title #1', 'techub_core'),
					],
					[
						'techub_title' => esc_html__('Title #2', 'techub_core'),
					],
				],
				'title_field' => '{{{ techub_title }}}',
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
					'{{WRAPPER}} .tp-service-5-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}  // style end




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

		<div class="swiper tp-faq-slide pb-30 fix">
			<div class="swiper-wrapper">
				<?php foreach ($settings['item_list'] as $item) : ?>
					<div class="swiper-slide">
						<div class="tp-faq-5-left-item text-center">
							<div class="tp-faq-5-left-icon">
								<img src="<?php echo esc_url($item['techub_image']['url']); ?>" alt="">
							</div>
                         <h4 class="tp-faq-5-left-title"><?php echo esc_html($item['techub_title']); ?></h4>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="tp-faq-5-pagenation"></div>
		</div>


<?php

	}
}


$widgets_manager->register(new feature_item());
