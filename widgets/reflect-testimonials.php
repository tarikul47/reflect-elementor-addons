<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Reflect_Testimonials_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'reflect_testimonials';
    }

    public function get_title()
    {
        return esc_html__('Reflect Testimonials', 'reflect-elementor-addons');
    }

    public function get_icon()
    {
        return 'eicon-testimonial';
    }

    public function get_categories()
    {
        return ['general']; // Or your custom category if you created one
    }

    protected function register_controls()
    {

        // --- Section Header Controls ---
        $this->start_controls_section(
            'section_header',
            [
                'label' => esc_html__('Section Header', 'reflect-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'eyebrow',
            [
                'label' => esc_html__('Eyebrow', 'reflect-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('In their words', 'reflect-elementor-addons'),
                'placeholder' => esc_html__('Type eyebrow here', 'reflect-elementor-addons'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'reflect-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('The result our partners come back for.', 'reflect-elementor-addons'),
                'placeholder' => esc_html__('Type section title here', 'reflect-elementor-addons'),
            ]
        );

        $this->end_controls_section();

        // --- Testimonials Repeater Controls ---
        $this->start_controls_section(
            'section_testimonials',
            [
                'label' => esc_html__('Testimonials Items', 'reflect-elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'quote',
            [
                'label' => esc_html__('Quote', 'reflect-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 4,
                'default' => esc_html__('“Reflect Associates didn\'t hand us a strategy — they helped us build one our team could actually execute.”', 'reflect-elementor-addons'),
                'placeholder' => esc_html__('Type the testimonial content', 'reflect-elementor-addons'),
            ]
        );

        $repeater->add_control(
            'author_name',
            [
                'label' => esc_html__('Author Name / Title', 'reflect-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Director of Operations', 'reflect-elementor-addons'),
                'placeholder' => esc_html__('e.g., Director of Operations', 'reflect-elementor-addons'),
            ]
        );

        $repeater->add_control(
            'author_org',
            [
                'label' => esc_html__('Organization / Context', 'reflect-elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Regional FMCG Group', 'reflect-elementor-addons'),
                'placeholder' => esc_html__('e.g., Regional FMCG Group', 'reflect-elementor-addons'),
            ]
        );

        $this->add_control(
            'testimonials_list',
            [
                'label' => esc_html__('Testimonials List', 'reflect-elementor-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'quote' => esc_html__('“Reflect Associates didn\'t hand us a strategy — they helped us build one our team could actually execute. The difference is everything.”', 'reflect-elementor-addons'),
                        'author_name' => esc_html__('Director of Operations', 'reflect-elementor-addons'),
                        'author_org' => esc_html__('Regional FMCG Group', 'reflect-elementor-addons'),
                    ],
                    [
                        'quote' => esc_html__('“Their capacity-building program reshaped how our managers lead. Six months in, we are measurably faster and more aligned.”', 'reflect-elementor-addons'),
                        'author_name' => esc_html__('Head of People', 'reflect-elementor-addons'),
                        'author_org' => esc_html__('Development Sector Partner', 'reflect-elementor-addons'),
                    ],
                ],
                'title_field' => '{{{ author_name }}} - {{{ author_org }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="sec">
            <div class="wrap">
                <?php if (!empty($settings['eyebrow']) || !empty($settings['title'])): ?>
                    <div class="sec-head">
                        <div>
                            <?php if (!empty($settings['eyebrow'])): ?>
                                <p class="eyebrow"><?php echo esc_html($settings['eyebrow']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['title'])): ?>
                                <h2><?php echo esc_html($settings['title']); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['testimonials_list'])): ?>
                    <div class="tst-grid">
                        <?php foreach ($settings['testimonials_list'] as $item): ?>
                            <figure class="tst elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                                <?php if (!empty($item['quote'])): ?>
                                    <blockquote class="q">
                                        <?php echo esc_html($item['quote']); ?>
                                    </blockquote>
                                <?php endif; ?>

                                <?php if (!empty($item['author_name']) || !empty($item['author_org'])): ?>
                                    <figcaption class="who-said">
                                        <?php if (!empty($item['author_name'])): ?>
                                            <div class="n"><?php echo esc_html($item['author_name']); ?></div>
                                        <?php endif; ?>

                                        <?php if (!empty($item['author_org'])): ?>
                                            <div class="o"><?php echo esc_html($item['author_org']); ?></div>
                                        <?php endif; ?>
                                    </figcaption>
                                <?php endif; ?>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}