<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Icons_Manager;

class Reflect_Services_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'reflect-services';
	}

	public function get_title()
	{
		return esc_html__('Reflect Services', 'reflect-addons');
	}

	public function get_icon()
	{
		return 'eicon-columns';
	}

	public function get_categories()
	{
		return ['reflect-addons'];
	}

	public function get_keywords()
	{
		return ['reflect', 'services', 'practice'];
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
			'show_header',
			[
				'label' => esc_html__('Show Section Header', 'reflect-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'reflect-addons'),
				'label_off' => esc_html__('Hide', 'reflect-addons'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'header_eyebrow',
			[
				'label' => esc_html__('Header Eyebrow', 'reflect-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('How we help', 'reflect-addons'),
				'condition' => [
					'show_header' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'header_title',
			[
				'label' => esc_html__('Header Title', 'reflect-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Five practices. One coherent way of working.', 'reflect-addons'),
				'condition' => [
					'show_header' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'header_description',
			[
				'label' => esc_html__('Header Description', 'reflect-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Every engagement is shaped around the question you actually need answered — not the service we want to sell.', 'reflect-addons'),
				'condition' => [
					'show_header' => 'yes',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'columns',
			[
				'label' => esc_html__('Columns', 'reflect-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__('1 Column', 'reflect-addons'),
					'2' => esc_html__('2 Columns', 'reflect-addons'),
					'3' => esc_html__('3 Columns', 'reflect-addons'),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__('Title', 'reflect-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Service Title', 'reflect-addons'),
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
				'default' => esc_html__('Service description goes here.', 'reflect-addons'),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_icon',
			[
				'label' => esc_html__('Icon', 'reflect-addons'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-compass',
					'library' => 'solid',
				],
			]
		);

		$repeater->add_control(
			'list_link',
			[
				'label' => esc_html__('Link', 'reflect-addons'),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'reflect-addons'),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__('Services', 'reflect-addons'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__('Strategy & Advisory', 'reflect-addons'),
						'list_num' => '01',
						'list_content' => esc_html__('Clarity on direction, market, and the next 12–36 months of execution.', 'reflect-addons'),
						'list_icon' => [
							'value' => 'fas fa-compass',
							'library' => 'solid',
						],
					],
					[
						'list_title' => esc_html__('Leadership & Talent', 'reflect-addons'),
						'list_num' => '02',
						'list_content' => esc_html__('Develop the leaders, managers, and teams your strategy depends on.', 'reflect-addons'),
						'list_icon' => [
							'value' => 'fas fa-user-tie',
							'library' => 'solid',
						],
					],
					[
						'list_title' => esc_html__('Capacity Building', 'reflect-addons'),
						'list_num' => '03',
						'list_content' => esc_html__('Tailored training programs that move skills from theory to practice.', 'reflect-addons'),
						'list_icon' => [
							'value' => 'fas fa-chart-line',
							'library' => 'solid',
						],
					],
					[
						'list_title' => esc_html__('Organizational Development', 'reflect-addons'),
						'list_num' => '04',
						'list_content' => esc_html__('Structure, processes, and culture engineered for the next stage.', 'reflect-addons'),
						'list_icon' => [
							'value' => 'fas fa-sitemap',
							'library' => 'solid',
						],
					],
					[
						'list_title' => esc_html__('Research & Insights', 'reflect-addons'),
						'list_num' => '05',
						'list_content' => esc_html__('Evidence to make decisions you can defend in any boardroom.', 'reflect-addons'),
						'list_icon' => [
							'value' => 'fas fa-brain',
							'library' => 'solid',
						],
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
					'{{WRAPPER}} .services.sec' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab - Header Style
		$this->start_controls_section(
			'section_header_style',
			[
				'label' => esc_html__('Header Style', 'reflect-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_header' => 'yes',
				],
			]
		);

		$this->add_control(
			'header_eyebrow_color',
			[
				'label' => esc_html__('Eyebrow Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-head .eyebrow' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'header_title_color',
			[
				'label' => esc_html__('Title Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-head h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'header_desc_color',
			[
				'label' => esc_html__('Description Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sec-head p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab - Services Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Services Style', 'reflect-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_bg',
			[
				'label' => esc_html__('Card Background', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-svc' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'reflect-addons'),
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
				'label' => esc_html__('Icon Size', 'reflect-addons'),
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
				'label' => esc_html__('Number Color', 'reflect-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reflect-num' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$cols = $settings['columns'];
		$show_wrapper = $settings['show_wrapper'] === 'yes';
		$show_header = $settings['show_header'] === 'yes';

		if ($show_wrapper): ?>
			<section class="services sec" id="services">
				<div class="wrap">
				<?php endif; ?>

				<?php if ($show_header): ?>
					<div class="sec-head">
						<div>
							<?php if (!empty($settings['header_eyebrow'])): ?>
								<p class="eyebrow"><?php echo esc_html($settings['header_eyebrow']); ?></p>
							<?php endif; ?>
							<?php if (!empty($settings['header_title'])): ?>
								<h2><?php echo esc_html($settings['header_title']); ?></h2>
							<?php endif; ?>
						</div>
						<?php if (!empty($settings['header_description'])): ?>
							<p><?php echo esc_html($settings['header_description']); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="reflect-svc-grid svc-grid" style="--grid-columns: <?php echo esc_attr($cols); ?>;">
					<?php
					if ($settings['list']) {
						foreach ($settings['list'] as $item) {
							$target = $item['list_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $item['list_link']['nofollow'] ? ' rel="nofollow"' : '';
							?>
							<div class="reflect-svc svc elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
								<div class="reflect-row row">
									<div class="reflect-icon icon">
										<?php Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']); ?>
									</div>
									<span class="reflect-num num"><?php echo esc_html($item['list_num']); ?></span>
								</div>
								<h3><?php echo esc_html($item['list_title']); ?></h3>
								<p><?php echo esc_html($item['list_content']); ?></p>
								<a class="reflect-more more" href="<?php echo esc_url($item['list_link']['url']); ?>" <?php echo $target . $nofollow; ?>>Learn more →</a>
							</div>
							<?php
						}
					}
					?>
				</div>

				<?php if ($show_wrapper): ?>
				</div>
			</section>
		<?php endif;
	}
}
