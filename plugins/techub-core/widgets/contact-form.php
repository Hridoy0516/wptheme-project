<?php

namespace Techub_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly


class Contact_form extends Widget_Base
{


	public function get_name()
	{
		return 'contact-form';
	}


	public function get_title()
	{
		return __('Contact Form', 'elementor-hello-world');
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


	protected function register_controls()
	{

		$this->register_controls_section();
		$this->style_tab_content();
	}


	protected function register_controls_section()
	{



		// about Button section
		$this->start_controls_section(
			'Contact_section',
			[
				'label' => esc_html__('Contact form', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'techub_title',
			[
				'label' => esc_html__('Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Please Insert text', 'techub_core'),
				'placeholder' => esc_html__('Type your text here', 'techub_core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'techub_shortcode',
			[
				'label' => esc_html__('Contact F7 ShortCode', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Please Insert Your ShortCode here', 'techub_core'),
				'placeholder' => esc_html__('shortcode here', 'techub_core'),
				'label_block' => true,
			]
		);


		$this->end_controls_section();;
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

		<section class="tp-portfolio-breadcrumb-area p-relative" data-background="<?php echo get_template_directory_uri();?>/assets/img/contact/contact-brdcmb-bg.jpg">
			<div class="container">
				<div class="row">
					<div class="tp-portfolio-breadcrumb-content text-center">
						<h2 class="tp-portfolio-breadcrumb-title tp-portfolio-breadcrumb-title-cntct-us">Contact Us</h2>
					</div>
				</div>
			</div>
		</section>


		<section class="tp-contact-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="tp-contact-inner-page-wrapper">
							<div class="tp-contact-box tp-contact-inner-page-box mb-120">
								<?php if (!empty($settings['techub_title'])) : ?>
									<h3 class="tp-contact-title tp-contact-title-inner-page wow fadeInUp"><?php echo techub_kses($settings['techub_title']); ?></h3>
								<?php endif; ?>
								<?php if (!empty($settings['techub_shortcode'])) : ?>
									<?php echo do_shortcode($settings['techub_shortcode']); ?>

								<?php else: ?>
									<div class="alert alert-danger" role="alert">
										Please Insert Shortcode text field. Then Form will be display.
									</div>

								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



<?php

	}
}



$widgets_manager->register(new Contact_form());
