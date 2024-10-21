<?php

namespace Techub_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly


class Techub_about extends Widget_Base{


	public function get_name()
	{
		return 'Techub-About';
	}


	public function get_title()
	{
		return __('About', 'elementor-hello-world');
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


	protected function register_controls_section(){


		// About techub Content 
		$this->start_controls_section(
			'about_section',
			[
				'label' => esc_html__('About Content', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'techub_about_sub_title',
			[
				'label' => esc_html__('Techub Sub Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('type Your sub title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'techub_about_title',
			[
				'label' => esc_html__('Techub Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('type your title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'techub_about_des',
			[
				'label' => esc_html__('Techub Description', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__('Type your description', 'techub_core'),
				'placeholder' => esc_html__('Type your description here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);


		$this->add_control(
			'about_image',
			[
				'label' => esc_html__('Techub Font Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'about_bg_image',
			[
				'label' => esc_html__('Techub Background Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		// About Quote section 
		$this->start_controls_section(
			'Quote_section',
			[
				'label' => esc_html__('About Quote & Video ', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'about_quote_video_img',
			[
				'label' => esc_html__('Video Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'quote_video_url',
			[
				'label' => esc_html__('URL', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('#', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'quote_description',
			[
				'label' => esc_html__(' Quote Description', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__('We can help to maintain and modernize..', 'techub_core'),
				'placeholder' => esc_html__('Type your Quote here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'author_name',
			[
				'label' => esc_html__('Author Name', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('type your Text title', 'techub_core'),
				'placeholder' => esc_html__('Author Name here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'author_designation',
			[
				'label' => esc_html__('Author Designation', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('type your Text title', 'techub_core'),
				'placeholder' => esc_html__('Author Name designation', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		// about feature icon content 

		$repeater = new \Elementor\Repeater();



		$repeater->add_control(
			'icon_select',
			[
				'label' => esc_html__( 'icon Select', 'techub_core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'feature_icon',
				'options' => [
					'Icon' => esc_html__( 'Icon', 'techub_core' ),
					'Image'  => esc_html__( 'Image', 'techub_core' ),
					'SVG' => esc_html__( 'SVG', 'techub_core' ),
				],
			]
		);

		$repeater->add_control(
			'feature_icon',
			[
				'label' => esc_html__('Icon', 'techub_core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-smile',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_select' => 'Icon',
				],
			]
		);

		$repeater->add_control(
			'feature_image',
			[
				'label' => esc_html__('icon Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_select' => 'Image',
				],
			]
		);

		$repeater->add_control(
			'svg_code',
			[
				'label' => esc_html__('SVG Code', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__('Svg code here', 'techub_core'),
				'condition' => [
					'icon_select' => 'SVG',
				],
			]
		);

		$repeater->add_control(
			'feature_title',
			[
				'label' => esc_html__('Feature Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
			]
		);


		$this->add_control(
			'item_aboutlist',
			[
				'label' => esc_html__('About List', 'techub_core'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_title' => esc_html__('Title #1', 'techub_core'),
					],
					[
						'feature_title' => esc_html__('Title #2', 'techub_core'),
					],
				],
				'title_field' => '{{{ feature_title }}}',
			]
		);



	   $this->end_controls_section();


		// about Button section
		$this->start_controls_section(
			'Button_section',
			[
				'label' => esc_html__('Button', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'about_button',
			[
				'label' => esc_html__('Button Text', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Button Text', 'techub_core'),
				'placeholder' => esc_html__('Type your text here', 'techub_core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'about_button_link',
			[
				'label' => esc_html__('Link', 'techub_core'),
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

		$this->end_controls_section();

		// About Singecar section 

		$this->start_controls_section(
			'Singnaser_section',
			[
				'label' => esc_html__('Signaser Image', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'about-signaser_image',
			[
				'label' => esc_html__('Signaser Image', 'techub_core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
			'text_color',
			[
				'label' => esc_html__('Text Color', 'techub_core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-about-inner-parag' => 'color: {{VALUE}}',
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
	protected function render(){
		$settings = $this->get_settings_for_display();


		if (! empty($settings['about_button_link']['url'])) {
			$this->add_link_attributes('button_arg', $settings['about_button_link']);
			$this->add_render_attribute('button_arg', 'class', 'tp-btn');
			$this->add_render_attribute('button_arg', 'id', 'test-tp-btn');
			$this->add_render_attribute('button_arg', 'title', 'this is button');
		}
      ?>

		<section class="tp-about-5-area pt-100 pb-120 p-relative fix">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-5">
						<div class="tp-about-5-thumb p-relative wow fadeInLeft">
							<img src="<?php echo esc_url($settings['about_image']['url']); ?>" alt="">
							<div class="tp-about-5-thumb-shape">
								<img class="tp-about-5-thumb-s1" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/service-5-img-shape1.png" alt="">
								<img class="tp-about-5-thumb-s2" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/service-5-img-shape2.png" alt="">
								<img class="tp-about-5-thumb-s3" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/service-5-img-shape3.png" alt="">
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7">
						<div class="tp-about-wrapper mt-25 ml-20 wow fadeInRight">
							<div class="tp-section-title-wrapper mb-40">
								<span class="tp-section-subtitle">

									<?php if (!empty($settings['techub_about_sub_title'])) : ?>
										<?php echo techub_kses($settings['techub_about_sub_title']); ?></span>
						        	<?php endif; ?>

							<?php if (!empty($settings['techub_about_title'])) : ?>
								<h3 class="tp-section-5-title"><?php echo techub_kses($settings['techub_about_title']); ?></h3>
							<?php endif; ?>

							<?php if (!empty($settings['techub_about_des'])) : ?>
								<p><?php echo esc_html($settings['techub_about_des']); ?></p>
							<?php endif; ?>
							</div>
							<div class="tp-about-top-item d-flex mb-40">
								<div class="tp-about-video-btn">
									<a class="popup-video" href="<?php echo esc_url($settings['quote_video_url']); ?>"><img src="<?php echo esc_url($settings['about_quote_video_img']['url']); ?>" alt=""><i class="fa-sharp fa-solid fa-play"></i></a>
								</div>
								<div class="tp-about-inner-content">
									<div class="tp-about-inner-parag">
										<?php if (!empty($settings['quote_description'])) : ?>
											<p><?php echo esc_html($settings['quote_description']); ?></p>
										<?php endif; ?>
									</div>
									<div class="tp-about-inner-heading d-flex">

										<?php if (!empty($settings['author_name'])) : ?>
											<h3><?php echo esc_html($settings['author_name']); ?> </h3>
										<?php endif; ?>

										<?php if (!empty($settings['author_designation'])) : ?>
											<span><?php echo esc_html($settings['author_designation']) ?></span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="tp-about-feature-box d-flex mb-50">
								<?php foreach ($settings['item_aboutlist'] as $key=> $aboutitem) :
									$key_class= $key== 1 ? 'ml-100 tp-about-fi-margin': '';
									?>
									<div class="tp-about-feature-item d-flex <?php echo esc_attr($key_class);?>">
										<div class="tp-about-feature-icon">
											<span> 
										 	   <?php if(!empty($aboutitem['icon_select'] == 'Icon')) :?>
				  							    <?php \Elementor\Icons_Manager::render_icon( $aboutitem['feature_icon'],[ 'aria-hidden' => 'true' ] ); ?>

											   <?php elseif (!empty($aboutitem['icon_select'] == 'Image')) : ?> 
												  <img src="<?php echo esc_url($aboutitem['feature_image']['url']);?>" alt="">
												   
												<?php else:  ?>
													<?php echo techub_kses($aboutitem['svg_code']);?>
											    <?php endif;?>
											</span>
										</div>
										<div class="tp-about-feature-content">
										<?php if(!empty($aboutitem['feature_title'])) :?>
											<h4><?php echo techub_kses($aboutitem['feature_title']); ?></h4>
										<?php endif;?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="tp-about-signacer-btn d-flex">
								<?php if (!empty($settings['about_button'])) : ?>
								 <a <?php echo  $this->get_render_attribute_string('button_arg'); ?>><span> <?php echo esc_html($settings['about_button']); ?> </span></a>
								<?php endif; ?>

								<?php if (!empty($settings['about-signaser_image'])) : ?>
									<div class="tp-about-signaser-img">
										<img src="<?php echo esc_url($settings['about-signaser_image']['url']); ?>" alt="">
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if (!empty($settings['about_bg_image'])) : ?>
				<div class="tp-about-5-bg-shape">
					<img src="<?php echo esc_url($settings['about_bg_image']['url']); ?>" alt="">
				</div>
			<?php endif; ?>
		</section>
    <?php
	
    }
}



$widgets_manager->register(new Techub_about());
