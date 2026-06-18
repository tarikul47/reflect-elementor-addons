<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Reflect_Hero_Widget extends Widget_Base {

	public function get_name() {
		return 'reflect-hero';
	}

	public function get_title() {
		return esc_html__( 'Reflect Hero', 'reflect-addons' );
	}

	public function get_icon() {
		return 'eicon-image-bold';
	}

	public function get_categories() {
		return [ 'reflect-addons' ];
	}

	public function get_keywords() {
		return [ 'reflect', 'hero', 'banner', 'heading', 'cta' ];
	}

	protected function register_controls() {

		// Content Section
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'reflect-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1800&q=80',
				],
			]
		);

		$this->add_control(
			'eyebrow',
			[
				'label' => esc_html__( 'Eyebrow Text', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'B2B Consultancy · Capacity Building', 'reflect-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'reflect-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Strategy, people, and the <em>capacity</em> to grow.', 'reflect-addons' ),
				'placeholder' => esc_html__( 'Enter your title here. Use <em>text</em> for gold highlighting.', 'reflect-addons' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'reflect-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Reflect Associates partners with organizations that mean to grow — helping leaders sharpen direction, build the people they need, and turn ambition into measurable progress.', 'reflect-addons' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// Buttons Section
		$this->start_controls_section(
			'section_buttons',
			[
				'label' => esc_html__( 'Buttons', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'primary_button_text',
			[
				'label' => esc_html__( 'Primary Button Text', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Book a Consultation', 'reflect-addons' ),
			]
		);

		$this->add_control(
			'primary_button_link',
			[
				'label' => esc_html__( 'Primary Button Link', 'reflect-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'reflect-addons' ),
				'default' => [
					'url' => '#contact',
				],
			]
		);

		$this->add_control(
			'secondary_button_text',
			[
				'label' => esc_html__( 'Secondary Button Text', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Explore Our Services', 'reflect-addons' ),
			]
		);

		$this->add_control(
			'secondary_button_link',
			[
				'label' => esc_html__( 'Secondary Button Link', 'reflect-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'reflect-addons' ),
				'default' => [
					'url' => '#services',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab - Section Content Style
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content Style', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'hero_height',
			[
				'label' => esc_html__( 'Min Height', 'reflect-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh', 'em' ],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1000,
					],
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'vh',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .reflect-hero' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Content Padding', 'reflect-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .reflect-hero-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' => '160',
					'right' => '0',
					'bottom' => '100',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
			]
		);

		$this->add_responsive_control(
			'content_align',
			[
				'label' => esc_html__( 'Alignment', 'reflect-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'reflect-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'reflect-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'reflect-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .reflect-hero-content .reflect-wrap' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .reflect-hero-actions' => 'justify-content: {{VALUE}} === "center" ? "center" : ({{VALUE}} === "right" ? "flex-end" : "flex-start");',
				],
			]
		);

		$this->add_control(
			'eyebrow_color',
			[
				'label' => esc_html__( 'Eyebrow Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-eyebrow' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-hero-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_highlight_color',
			[
				'label' => esc_html__( 'Title Highlight (em) Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-hero-title em' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Description Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-hero-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Background', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-hero-overlay' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab - Buttons Style
		$this->start_controls_section(
			'section_buttons_style',
			[
				'label' => esc_html__( 'Buttons Style', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'primary_heading',
			[
				'label' => esc_html__( 'Primary Button', 'reflect-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'primary_bg',
			[
				'label' => esc_html__( 'Background Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-gold' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'primary_text_color',
			[
				'label' => esc_html__( 'Text Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-gold' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'primary_hover_bg',
			[
				'label' => esc_html__( 'Hover Background Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-gold:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_heading',
			[
				'label' => esc_html__( 'Secondary Button', 'reflect-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'secondary_border_color',
			[
				'label' => esc_html__( 'Border Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-ghost' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_text_color',
			[
				'label' => esc_html__( 'Text Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-ghost' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_hover_border_color',
			[
				'label' => esc_html__( 'Hover Border Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-ghost:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_hover_text_color',
			[
				'label' => esc_html__( 'Hover Text Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-btn-ghost:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Handle Background Image
		$bg_image_url = ! empty( $settings['bg_image']['url'] ) ? $settings['bg_image']['url'] : '';

		// Decode any HTML entities first so tags like <em> render correctly, then sanitize.
		$decoded_title = html_entity_decode( htmlspecialchars_decode( $settings['title'] ), ENT_QUOTES, 'UTF-8' );
		?>
		<section class="reflect-hero">
			<?php if ( ! empty( $bg_image_url ) ) : ?>
				<img class="reflect-hero-img" src="<?php echo esc_url( $bg_image_url ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $decoded_title ) ); ?>" />
			<?php endif; ?>
			
			<div class="reflect-hero-overlay"></div>

			<div class="reflect-hero-content">
				<div class="reflect-wrap">
					<?php if ( ! empty( $settings['eyebrow'] ) ) : ?>
						<p class="reflect-eyebrow"><?php echo esc_html( $settings['eyebrow'] ); ?></p>
					<?php endif; ?>

					<?php if ( ! empty( $decoded_title ) ) : ?>
						<h1 class="reflect-hero-title"><?php echo wp_kses_post( $decoded_title ); ?></h1>
					<?php endif; ?>

					<?php if ( ! empty( $settings['description'] ) ) : ?>
						<p class="reflect-hero-desc"><?php echo esc_html( $settings['description'] ); ?></p>
					<?php endif; ?>

					<div class="reflect-hero-actions">
						<?php 
						if ( ! empty( $settings['primary_button_text'] ) && ! empty( $settings['primary_button_link']['url'] ) ) {
							$this->add_link_attributes( 'primary_button_link', $settings['primary_button_link'] );
							$this->add_render_attribute( 'primary_button_link', 'class', 'reflect-btn reflect-btn-gold' );
							?>
							<a <?php echo $this->get_render_attribute_string( 'primary_button_link' ); ?>>
								<?php echo esc_html( $settings['primary_button_text'] ); ?>
								<span class="reflect-arrow">→</span>
							</a>
							<?php
						}
						?>

						<?php 
						if ( ! empty( $settings['secondary_button_text'] ) && ! empty( $settings['secondary_button_link']['url'] ) ) {
							$this->add_link_attributes( 'secondary_button_link', $settings['secondary_button_link'] );
							$this->add_render_attribute( 'secondary_button_link', 'class', 'reflect-btn reflect-btn-ghost' );
							?>
							<a <?php echo $this->get_render_attribute_string( 'secondary_button_link' ); ?>>
								<?php echo esc_html( $settings['secondary_button_text'] ); ?>
							</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
