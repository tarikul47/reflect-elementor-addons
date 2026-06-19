<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

class Reflect_Why_Items_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'reflect-why-items';
	}

	public function get_title()
	{
		return esc_html__('Reflect Why Items', 'reflect-addons');
	}

	public function get_icon()
	{
		return 'eicon-editor-list-ol';
	}

	public function get_categories()
	{
		return ['reflect-addons'];
	}

	public function get_keywords()
	{
		return ['reflect', 'why', 'list', 'numbered'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'reflect-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_wrapper',
			[
				'label' => esc_html__('Enable Section Wrapper', 'reflect-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'reflect-addons'),
				'label_off' => esc_html__('Hide', 'reflect-addons'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_left_content',
			[
				'label' => esc_html__('Show Left Column Content', 'reflect-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'reflect-addons'),
				'label_off' => esc_html__('Hide', 'reflect-addons'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'left_eyebrow',
			[
				'label' => esc_html__('Left Eyebrow', 'reflect-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Why Reflect', 'reflect-addons'),
				'condition' => [
					'show_left_content' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_title',
			[
				'label' => esc_html__('Left Title', 'reflect-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('What makes our work different.', 'reflect-addons'),
				'condition' => [
					'show_left_content' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_description',
			[
				'label' => esc_html__('Left Description', 'reflect-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('We are not the largest firm you could hire. We are the one most likely to tell you the truth, stay close to the work, and leave your team stronger than we found it.', 'reflect-addons'),
				'condition' => [
					'show_left_content' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'left_seal_text',
			[
				'label' => esc_html__('Left Seal Text', 'reflect-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Confidentiality, candor, and craft — in that order.', 'reflect-addons'),
				'condition' => [
					'show_left_content' => 'yes',
				],
				'label_block' => true,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__('Title', 'reflect-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Feature Title', 'reflect-addons'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_num',
			[
				'label' => esc_html__('Number', 'reflect-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('01', 'reflect-addons'),
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__('Content', 'reflect-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Feature description goes here.', 'reflect-addons'),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__('Items', 'reflect-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__('Tailored, not templated', 'reflect-addons'),
						'list_num' => '01',
						'list_content' => esc_html__('Every engagement begins with listening — no recycled decks.', 'reflect-addons'),
					],
					[
						'list_title' => esc_html__('Practitioners, not theorists', 'reflect-addons'),
						'list_num' => '02',
						'list_content' => esc_html__('Our team has built, led, and turned around real organizations.', 'reflect-addons'),
					],
					[
						'list_title' => esc_html__('Outcomes you can measure', 'reflect-addons'),
						'list_num' => '03',
						'list_content' => esc_html__('We define success up front and report against it, candidly.', 'reflect-addons'),
					],
					[
						'list_title' => esc_html__('Local context, global rigor', 'reflect-addons'),
						'list_num' => '04',
						'list_content' => esc_html__('Methods drawn from global practice, calibrated to your reality.', 'reflect-addons'),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Style Tab - Section Style
		$this->start_controls_section(
			'section_wrapper_style',
			[
				'label' => esc_html__('Section Style', 'reflect-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_wrapper' => 'yes',
				],
			]
		);

		$this->add_control(
			'section_bg',
			[
				'label' => esc_html__('Section Background', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab - Left Column Style
		$this->start_controls_section(
			'section_left_style',
			[
				'label' => esc_html__('Left Column Style', 'reflect-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_left_content' => 'yes',
				],
			]
		);

		$this->add_control(
			'left_eyebrow_color',
			[
				'label' => esc_html__('Eyebrow Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .why-left .eyebrow' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'left_title_color',
			[
				'label' => esc_html__('Title Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .why-left h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'left_desc_color',
			[
				'label' => esc_html__('Description Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .why-left p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'left_seal_color',
			[
				'label' => esc_html__('Seal Text Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .why-left .seal span:not(.dot)' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'left_seal_dot_color',
			[
				'label' => esc_html__('Seal Dot Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .why-left .seal .dot' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab - Items Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Items Style', 'reflect-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'num_color',
			[
				'label' => esc_html__('Number Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-n' => 'color: {{VALUE}};',
					'{{WRAPPER}} .why-items .n' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__('Border Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-why-items > div' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .why-items > div' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$show_wrapper = $settings['show_wrapper'] === 'yes';
		$show_left_content = $settings['show_left_content'] === 'yes';
		$grid_class = 'why-grid' . ($show_left_content ? '' : ' no-left-content');

		if ($show_wrapper): ?>
			<section class="sec">
				<div class="wrap <?php echo esc_attr($grid_class); ?>">
				<?php else: ?>
					<div class="<?php echo esc_attr($grid_class); ?>">
					<?php endif; ?>

					<?php if ($show_left_content): ?>
						<div class="why-left">
							<?php if (!empty($settings['left_eyebrow'])): ?>
								<p class="eyebrow"><?php echo esc_html($settings['left_eyebrow']); ?></p>
							<?php endif; ?>
							<?php if (!empty($settings['left_title'])): ?>
								<h2><?php echo esc_html($settings['left_title']); ?></h2>
							<?php endif; ?>
							<?php if (!empty($settings['left_description'])): ?>
								<p><?php echo esc_html($settings['left_description']); ?></p>
							<?php endif; ?>
							<?php if (!empty($settings['left_seal_text'])): ?>
								<div class="seal">
									<span class="dot"></span>
									<span><?php echo esc_html($settings['left_seal_text']); ?></span>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="reflect-why-items why-items">
						<?php
						if ($settings['list']) {
							foreach ($settings['list'] as $item) {
								?>
								<div class="elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
									<span class="reflect-n n"><?php echo esc_html($item['list_num']); ?></span>
									<div>
										<h3><?php echo esc_html($item['list_title']); ?></h3>
										<p><?php echo esc_html($item['list_content']); ?></p>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>

					<?php if ($show_wrapper): ?>
					</div>
			</section>
		<?php else: ?>
			</div>
		<?php endif;
	}
}
