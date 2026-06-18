<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Icons_Manager;

class Reflect_Services_Widget extends Widget_Base {

	public function get_name() {
		return 'reflect-services';
	}

	public function get_title() {
		return esc_html__( 'Reflect Services', 'reflect-addons' );
	}

	public function get_icon() {
		return 'eicon-columns';
	}

	public function get_categories() {
		return [ 'reflect-addons' ];
	}

	public function get_keywords() {
		return [ 'reflect', 'services', 'practice' ];
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
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Service Title' , 'reflect-addons' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'list_num',
			[
				'label' => esc_html__( 'Number', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '01' , 'reflect-addons' ),
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'reflect-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Service description goes here.' , 'reflect-addons' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_icon',
			[
				'label' => esc_html__( 'Icon', 'reflect-addons' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check-circle',
					'library' => 'solid',
				],
			]
		);

        $repeater->add_control(
			'list_link',
			[
				'label' => esc_html__( 'Link', 'reflect-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'reflect-addons' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Services', 'reflect-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Strategy & Advisory', 'reflect-addons' ),
						'list_num' => '01',
					],
					[
						'list_title' => esc_html__( 'Leadership & Talent', 'reflect-addons' ),
						'list_num' => '02',
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
					'{{WRAPPER}} .reflect-svc' => 'background-color: {{VALUE}};',
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

        $this->add_control(
			'num_color',
			[
				'label' => esc_html__( 'Number Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-num' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $cols = $settings['columns'];
		?>
		<div class="reflect-svc-grid" style="grid-template-columns: repeat(<?php echo esc_attr($cols); ?>, 1fr);">
			<?php
			if ( $settings['list'] ) {
				foreach ( $settings['list'] as $item ) {
                    $target = $item['list_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $item['list_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
					<div class="reflect-svc elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<div class="reflect-row">
							<div class="reflect-icon">
                                <?php Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <span class="reflect-num"><?php echo esc_html( $item['list_num'] ); ?></span>
						</div>
						<h3><?php echo esc_html( $item['list_title'] ); ?></h3>
						<p><?php echo esc_html( $item['list_content'] ); ?></p>
                        <a class="reflect-more" href="<?php echo esc_url( $item['list_link']['url'] ); ?>"<?php echo $target . $nofollow; ?>>Learn more →</a>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}
