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
class services_list extends Widget_Base
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
		return 'Services_List';
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
		return __('Services List', 'elementor-hello-world');
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

		$this->start_controls_section(
			'Service_section',
			[
				'label' => esc_html__('services List', 'techub_core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'techub_image',
			[
				'label' => esc_html__('choice Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'service_title',
			[
				'label' => esc_html__('Services Title', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('text title', 'techub_core'),
				'placeholder' => esc_html__('Type your title here', 'techub_core'),
			]
		);

		$repeater->add_control(
			'services_description',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => esc_html__('Default description', 'textdomain'),
				'placeholder' => esc_html__('Type your description here', 'textdomain'),
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .tp-el-scl' => 'color: {{VALUE}}'
				],
			]
		);

		$repeater->add_control(
			'service_link',
			[
				'label' => esc_html__('Services Url', 'techub_core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('#', 'techub_core'),
				'placeholder' => esc_html__('Type your url here', 'techub_core'),
			]
		);

		$this->add_control(
			'item_list',
			[
				'label' => esc_html__( 'Services List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'service_title' => esc_html__( 'Title #1', 'textdomain' ),
						'services_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'service_title' => esc_html__( 'Title #2', 'textdomain' ),
						'services_description' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ service_title }}}',
			]
		);


		$this->end_controls_section();



		$this->start_controls_section(
			'colum_num',
			[
				'label' => esc_html__( 'Select Colum', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'Xl_colum',
			[
				'label' => esc_html__( 'Decktop Colum', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'12' => esc_html__( '1 Colum', 'textdomain' ),
					'6'  => esc_html__( '2 Colum', 'textdomain' ),
					'4' => esc_html__( '3 Colum', 'textdomain' ),
				],
			]
		);

		$this->add_control(
			'lg_colum',
			[
				'label' => esc_html__( 'Laptop Colum', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'12' => esc_html__( '1 Colum', 'textdomain' ),
					'6'  => esc_html__( '2 Colum', 'textdomain' ),
					'4' => esc_html__( '3 Colum', 'textdomain' ),
				],
			]
		);

		$this->add_control(
			'md_colum',
			[
				'label' => esc_html__( 'Mobile Colum', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'12' => esc_html__( '1 Colum', 'textdomain' ),
					'6'  => esc_html__( '2 Colum', 'textdomain' ),
					'4' => esc_html__( '3 Colum', 'textdomain' ),
				],
			]
		);

		$this->add_control(
			'Xs_colum',
			[
				'label' => esc_html__( 'MIni Mobile Colum', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'' => esc_html__( 'Default', 'textdomain' ),
					'12' => esc_html__( '1 Colum', 'textdomain' ),
					'6'  => esc_html__( '2 Colum', 'textdomain' ),
					'4' => esc_html__( '3 Colum', 'textdomain' ),
				],
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
        <section class="tp-service-5-area p-relative fix">
            <div class="container">

                <div class="row">
					<?php foreach($settings['item_list'] as $item) :?>
                    <div class="col-xl-<?php echo esc_attr($settings['Xl_colum']);?> col-lg-<?php echo esc_attr($settings['lg_colum']);?> col-md-<?php echo esc_attr($settings['md_colum']);?> col-<?php echo esc_attr($settings['Xs_colum']);?>">
                        <div class="tp-service-5-wrapper elementor-repeater-item-<?php echo esc_attr( $item['_id'] );?> mb-30 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="tp-service-5-item d-flex">
								<?php if(!empty($item['techub_image'])) :?>
                                <div class="tp-service-5-thumb">
                                    <img src="<?php echo esc_url($item['techub_image']['url']);?>" alt="">
                                </div>
								<?php endif;?>
								
                                <div class="tp-service-5-content">
                                    <h4 class="tp-service-5-title tp-el-scl">
										<?php if(!empty($item['service_link'])) :?>
										<a href="<?php echo esc_url($item['service_link']);?>"><?php echo esc_html($item['service_title']);?></a>
										<?php else :?>
											<?php echo esc_html($item['service_title']);?>
										<?php endif;?>

									</h4>
                                    <p class="tp-service-5-paragraph"><?php echo esc_html($item['services_description']);?></p>

									<?php if(!empty($item['service_link'])) :?>
                                    <div class="tp-service-5-btn">
                                        <a href="<?php echo esc_url($item['service_link']);?>"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
									<?php endif;?>
                                </div>
                            </div>
                        </div>	
                    </div>
				<?php endforeach;?>

            </div>
            <div class="tp-service-5-bg-shape">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/service/service-5-bg-shape.png" alt="">
            </div>
        </section>



<?php
	}
}


$widgets_manager->register(new services_list());
