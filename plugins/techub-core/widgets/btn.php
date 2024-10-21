<?php

namespace Techub_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly


class techub_btn extends Widget_Base
{


	public function get_name()
	{
		return 'techub-btn';
	}


	public function get_title()
	{
		return __('Btn', 'elementor-hello-world');
	}


	public function get_icon()
	{
		return 'eicon-blockquote';
	}

	public function get_categories()
	{
		return ['techub-cat-widget'];
	}


	public function get_script_depends()
	{
		return ['elementor-hello-world'];
	}


	protected function register_controls(){

		$this->register_controls_section();
		$this->style_tab_content();
	}


	protected function register_controls_section()
	{



		// about Button section
		$this->start_controls_section(
			'Button_section',
			[
				'label' => esc_html__('Button', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'techub_button',
			[
				'label' => esc_html__('Button', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Button Text', 'techub_core'),
				'placeholder' => esc_html__('Type your text here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__('URL', 'techub_core'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();;
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
				'types' => [ 'classic', 'gradient', 'video' ],
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
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		  );

 

		 $this->end_controls_tab();

		 // hover
		 $this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
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
	protected function render(){
		$settings = $this->get_settings_for_display();


		if (! empty($settings['techub_button'])) {
			$this->add_link_attributes('button_arg', $settings['button_link']);
			$this->add_render_attribute('button_arg', 'class', 'tp-btn');
		}
?>
        <?php if (!empty($settings['techub_button'])) : ?>
		   <div class="techub-btn">
				<a <?php echo  $this->get_render_attribute_string('button_arg'); ?>><span> <?php echo esc_html($settings['techub_button']); ?> </span></a>
		    </div>
		<?php endif; ?>


<?php

	}
}



$widgets_manager->register(new techub_btn());
