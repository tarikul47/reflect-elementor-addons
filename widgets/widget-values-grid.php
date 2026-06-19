<?php
class Elementor_Reflect_Values_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'reflect_values_grid';
    }
    public function get_title()
    {
        return esc_html__('Reflect Values Grid', 'reflect-plugin');
    }
    public function get_icon()
    {
        return 'eicon-inner-section';
    }
    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('content_section', [
            'label' => esc_html__('Header Content', 'reflect-plugin'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control('eyebrow', [
            'label' => esc_html__('Eyebrow', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('What Drives Us', 'reflect-plugin'),
        ]);
        $this->add_control('title', [
            'label' => esc_html__('Title', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Vision, Mission & Promise', 'reflect-plugin'),
        ]);
        $this->add_control('desc', [
            'label' => esc_html__('Description', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Our guiding principles shape every engagement and relationship we build.', 'reflect-plugin'),
        ]);
        $this->end_controls_section();

        $this->start_controls_section('items_section', [
            'label' => esc_html__('Grid Cards (3 Cards)', 'reflect-plugin'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control('card_title', [
            'label' => esc_html__('Card Title', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Our Vision', 'reflect-plugin'),
        ]);
        $repeater->add_control('card_desc', [
            'label' => esc_html__('Card Description', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('A world where organisations inspire trust.', 'reflect-plugin'),
        ]);
        $repeater->add_control('raw_svg', [
            'label' => esc_html__('Raw SVG Code (e.g. <path d="..." />)', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => '<circle cx="12" cy="12" r="10"/>',
        ]);
        $this->add_control('cards', [
            'label' => esc_html__('Cards Grid Loop', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_fields(),
            'default' => [
                ['card_title' => 'Our Vision', 'card_desc' => 'A world where organisations inspire trust, achieve excellence.'],
                ['card_title' => 'Our Mission', 'card_desc' => 'To help organisations strengthen capability and improve performance.'],
                ['card_title' => 'Our Promise', 'card_desc' => 'International Standards. Practical Solutions. Lasting Impact.'],
            ],
        ]);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="values">
            <div class="container">
                <div class="values-head">
                    <span class="eyebrow"><?php echo esc_html($settings['eyebrow']); ?></span>
                    <h2><?php echo esc_html($settings['title']); ?></h2>
                    <p><?php echo esc_html($settings['desc']); ?></p>
                </div>
                <div class="values-grid">
                    <?php foreach ($settings['cards'] as $card): ?>
                        <div class="value">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                <?php echo $card['raw_svg']; ?>
                            </svg>
                            <h4><?php echo esc_html($card['card_title']); ?></h4>
                            <p><?php echo esc_html($card['card_desc']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}