<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Icons_Manager;

class Reflect_Grid_Cards_Widget extends Widget_Base {

	public function get_name() {
		return 'reflect-grid-cards';
	}

	public function get_title() {
		return esc_html__( 'Reflect Grid Cards', 'reflect-addons' );
	}

	public function get_icon() {
		return 'eicon-grid-header';
	}

	public function get_categories() {
		return [ 'reflect-addons' ];
	}

	public function get_keywords() {
		return [ 'reflect', 'grid', 'cards', 'icon' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'reflect-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__( '1 Column', 'reflect-addons' ),
					'2' => esc_html__( '2 Columns', 'reflect-addons' ),
					'3' => esc_html__( '3 Columns', 'reflect-addons' ),
					'4' => esc_html__( '4 Columns', 'reflect-addons' ),
				],
                'prefix_class' => 'reflect-grid-cols-',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Card Title' , 'reflect-addons' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'reflect-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Card content text goes here.' , 'reflect-addons' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_icon',
			[
				'label' => esc_html__( 'Icon', 'reflect-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Cards', 'reflect-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Corporates & SMEs', 'reflect-addons' ),
						'list_content' => esc_html__( 'Scaling teams ready to professionalize operations and strategy.', 'reflect-addons' ),
					],
					[
						'list_title' => esc_html__( 'Startups', 'reflect-addons' ),
						'list_content' => esc_html__( 'Founders building the muscle to grow without breaking what works.', 'reflect-addons' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'card_bg',
			[
				'label' => esc_html__( 'Card Background', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-card' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .reflect-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'reflect-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .reflect-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .reflect-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $cols = $settings['columns'];
		?>
		<div class="reflect-grid-cards" style="grid-template-columns: repeat(<?php echo esc_attr($cols); ?>, 1fr);">
			<?php
			if ( $settings['list'] ) {
				foreach ( $settings['list'] as $item ) {
					?>
					<div class="reflect-card elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<div class="reflect-icon">
							<?php Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</div>
						<h3><?php echo esc_html( $item['list_title'] ); ?></h3>
						<p><?php echo esc_html( $item['list_content'] ); ?></p>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}
