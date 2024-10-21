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
class testimonial_list extends Widget_Base
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
		return 'testimonial_list';
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
		return __('Testimonial List', 'elementor-hello-world');
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
		return 'eicon-testimonial-carousel';
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


		// Testimonial-About section adding 

		$this->start_controls_section(
			'testimonial_section',
			[
				'label' => esc_html__('Testimonial layout style', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'testimonial_design',
			[
				'label' => esc_html__('Testimonial layout', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'index-layout',
				'options' => [
					'index-layout' => esc_html__('About page Testimonial style', 'textdomain'),
					'page-layout'  => esc_html__('Home page Testimonial style', 'textdomain'),
				],
			]
		);

		$this->end_controls_section();





		$this->start_controls_section(
			'testimonial_section',
			[
				'label' => __('Testimonial List', 'tp-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Repeater to add multiple testimonial sections
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'techub_title',
			[
				'label' => esc_html__('Client Name', 'tp-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('John Doe', 'tp-elementor'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'techub_designation',
			[
				'label' => esc_html__('Designation', 'tp-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('CEO', 'tp-elementor'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'techub_image',
			[
				'label' => esc_html__('Client Image', 'tp-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'techub_bg_image',
			[
				'label' => esc_html__('Client round Image', 'tp-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'techub_shape_image',
			[
				'label' => esc_html__('Client Shape Image', 'tp-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$repeater->add_control(
			'client_destription',
			[
				'label' => esc_html__('Destription', 'tp-elementor'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('This is an amazing testimonial', 'tp-elementor'),
				'label_block' => true,
			]
		);

		// Add the repeater control to the section
		$this->add_control(
			'item_list',
			[
				'label' => esc_html__('testimonial List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'techub_title' => esc_html__('Title #1', 'textdomain'),
						'techub_designation' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
					],
					[
						'techub_title' => esc_html__('Title #2', 'textdomain'),
						'techub_designation' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
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
		<?php if ($settings['testimonial_design'] == 'page-layout') : ?>

			<div class="tp-testimonial-inner-slider tp-testimonial-inner-ab-slider p-relative z-index-11 wow fadeInUp">
				
				<img class="tp-testimonial-inner-shape1" src="<?php echo get_template_directory_uri();?>/assets/img/testimonial/testi-inner-shape1.png" alt="">
				<img class="tp-testimonial-inner-shape2" src="<?php echo get_template_directory_uri();?>/assets/img/testimonial/testi-inner-shape2.png" alt="">
				<div class="tp-testimonial-inner-active swiper-container">
					<div class="swiper-wrapper">
					<?php foreach ($settings['item_list'] as $key => $item) :?>
						<div class="tp-testimonial-inner-item text-center swiper-slide">
							<div class="tp-testimonial-inner-img mb-35">
								<img src="<?php echo esc_url($item['techub_image']['url']); ?>" alt="">
							</div>
							<div class="tp-testimonial-inner-paragraph">
							   <?php if (!empty($item['client_destription'])) : ?>
								  <p><?php echo esc_html($item['client_destription']); ?></p>
								<?php endif;?>
							</div>
							<div class="tp-testimonial-inner-bio">
								
							  <?php if (!empty($item['techub_title'])) : ?>
								 <h4><?php echo esc_html($item['techub_title']); ?></h4>
							  <?php endif;?>

							  <?php if (!empty($item['techub_designation'])) : ?>
								 <p><?php echo esc_html($item['techub_designation']); ?></p>
							  <?php endif;?>

							</div>
						</div>

					<?php endforeach; ?>

					</div>
				</div>
				<div class="tp-testimonial-inner-arrow-box">
					<button class="slider-prev" tabindex="0" aria-label="Previous slide">
						<i class="fa-regular fa-arrow-left"></i>
					</button>
					<button class="slider-next" tabindex="0" aria-label="Next slide">
						<i class="fa-regular fa-arrow-right"></i>
					</button>
				</div>
			</div>


		<?php else: ?>

			<div class="tp-testimonial-insu-tab-wrapper mt-20">
				<div class="row">
					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
						<div class="tp-testimonial-content wow fadeInUp">
							<div class="tp-testimonial-tab-wrapper  tab-content" id="v-pills-tabContent2">
								<?php foreach ($settings['item_list'] as $key => $item) :
									$activeclass = $key == 0 ? 'show active' : '';
								?>
									<div class="tab-pane fade <?php echo esc_attr($activeclass); ?>" id="v-pills-man1-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="v-pills-man1-<?php echo esc_attr($key); ?>-tab">
										<div class="tp-client-review p-relative">
											<div class="tp-client-caption">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/testi-star.png" alt="">
												<?php if (!empty($item['client_destription'])) : ?>
												  <p><?php echo esc_html($item['client_destription']); ?></p>
												<?php endif;?>

											</div>
											<div class="tp-client-inner d-flex">
												<div class="tp-client-image">
													<img src="<?php echo esc_url($item['techub_image']['url']); ?>" alt="client">
												</div>
												<div class="tp-client-nav-info">
												  <?php if (!empty($item['techub_title'])) : ?>
													 <h5 class="tp-client-nav-title"><?php echo esc_html($item['techub_title']); ?></h5>
												  <?php endif;?>

													<?php if (!empty($item['techub_designation'])) : ?>
													 <span class="tp-client-nav-designation"><?php echo esc_html($item['techub_designation']); ?></span>
													<?php endif;?>
												</div>
											</div>
											<div class="tp-testimonial-box-shape">
												<img src="<?php echo esc_url($item['techub_shape_image']['url']); ?>" alt="">
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
						<div class="nav tp-testimonial-list wow fadeInRight" id="v-pills-tab2" role="tablist" aria-orientation="vertical">
							<?php foreach ($settings['item_list'] as $key => $item) :
								$active = $key === 0 ? 'active' : ''; ?>

								<button class="tp-testimonial-btn tp-testimonial-item d-flex nav-link <?php echo esc_attr($active); ?>" id="v-pills-man1-<?php echo esc_attr($key); ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-man1-<?php echo esc_attr($key); ?>" type="button" role="tab" aria-controls="v-pills-man1-<?php echo esc_attr($key); ?>" aria-selected="true">
									<span class="tp-testimonial-tab-btn">
										<img src="<?php echo esc_url($item['techub_bg_image']['url']); ?>" alt="client">
									</span>
								</button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>






<?php
	}
}


$widgets_manager->register(new testimonial_list());
