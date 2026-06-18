<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Reflect_Why_Items_Widget extends Widget_Base {

	public function get_name() {
		return 'reflect-why-items';
	}

	public function get_title() {
		return esc_html__( 'Reflect Why Items', 'reflect-addons' );
	}

	public function get_icon() {
		return 'eicon-editor-list-ol';
	}

	public function get_categories() {
		return [ 'reflect-addons' ];
	}

	public function get_keywords() {
		return [ 'reflect', 'why', 'list', 'numbered' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'reflect-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'reflect-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature Title' , 'reflect-addons' ),
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
				'default' => esc_html__( 'Feature description goes here.' , 'reflect-addons' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Items', 'reflect-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Tailored, not templated', 'reflect-addons' ),
						'list_num' => '01',
                        'list_content' => esc_html__( 'Every engagement begins with listening — no recycled decks.', 'reflect-addons' ),
					],
					[
						'list_title' => esc_html__( 'Practitioners, not theorists', 'reflect-addons' ),
						'list_num' => '02',
                        'list_content' => esc_html__( 'Our team has built, led, and turned around real organizations.', 'reflect-addons' ),
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
			'num_color',
			[
				'label' => esc_html__( 'Number Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-n' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'reflect-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-why-items > div' => 'border-top-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="reflect-why-items">
			<?php
			if ( $settings['list'] ) {
				foreach ( $settings['list'] as $item ) {
					?>
					<div class="elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
                        <span class="reflect-n"><?php echo esc_html( $item['list_num'] ); ?></span>
                        <div>
                            <h3><?php echo esc_html( $item['list_title'] ); ?></h3>
                            <p><?php echo esc_html( $item['list_content'] ); ?></p>
                        </div>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}
