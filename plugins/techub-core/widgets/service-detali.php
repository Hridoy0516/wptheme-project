<?php

namespace Techub_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly


class Service_detali extends Widget_Base
{


	public function get_name()
	{
		return 'service_detali';
	}


	public function get_title()
	{
		return __('Service sidelist', 'elementor-hello-world');
	}


	public function get_icon()
	{
		return 'eicon-list-ul';
	}

	public function get_categories()
	{
		return ['techub-cat-widget'];
	}


	public function get_script_depends()
	{
		return ['elementor-hello-world'];
	}


	protected function register_controls()
	{

		$this->register_controls_section();
		$this->style_tab_content();
	}


	protected function register_controls_section()
	{


		// Start of widget section
		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Service List', 'techub'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Repeater Control
		$repeater = new \Elementor\Repeater();

		// Service Title
		$repeater->add_control(
			'service_title',
			[
				'label' => __('Service Title', 'techub'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Service Title', 'techub'),
				'label_block' => true,
			]
		);

		// Service URL
		$repeater->add_control(
			'service_url',
			[
				'label' => __('Service URL', 'techub'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('#', 'techub'),
				'default' => [
					'url' => '',
					'is_external' => false,
				],
				'show_external' => true,
			]
		);

		// Add repeater control to the widget
		$this->add_control(
			'services_list',
			[
				'label' => __('Services List', 'techub'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'service_title' => __('Cloud service', 'techub'),
						'service_url' => ['url' => 'service-details.html'],
					],
					[
						'service_title' => __('Ui/Ux Designing', 'techub'),
						'service_url' => ['url' => 'service-details.html'],
					],
				],
				'title_field' => '{{{ service_title }}}',
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
			'text_color',
			[
				'label' => esc_html__('Text Color', 'techub_core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .techub-btn',
			]
		);


		$this->start_controls_tabs(
			'style_tabs'
		);

		// normal section 
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__('Normal', 'textdomain'),
			]
		);



		$this->end_controls_tab();

		// hover
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__('Hover', 'textdomain'),
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

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

		<ul>

			<?php foreach ($settings['services_list'] as $key => $item) :
				$active = $key === 1 ? 'active' : '';?>
			  <li><a class="<?php echo  esc_attr( $active)?>" href="<?php echo esc_url($item['service_url']['url']);?>"><?php echo esc_html($item['service_title']);?> <span><i class="flaticon-right-arrow"></i></span></a></li>
            <?php endforeach;?>

		</ul>


<?php

	}
}



$widgets_manager->register(new Service_detali());
