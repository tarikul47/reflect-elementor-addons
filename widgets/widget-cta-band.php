<?php
class Elementor_Reflect_CTA_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'reflect_cta_band';
    }
    public function get_title()
    {
        return esc_html__('Reflect CTA Band', 'reflect-plugin');
    }
    public function get_icon()
    {
        return 'eicon-button';
    }
    public function get_categories()
    {
        return ['general'];
    }

    protected function register_controls()
    {
        $this->start_controls_section('content_section', [
            'label' => esc_html__('Content', 'reflect-plugin'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);
        $this->add_control('eyebrow', [
            'label' => esc_html__('Eyebrow', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__("Let's Talk", 'reflect-plugin'),
        ]);
        $this->add_control('title', [
            'label' => esc_html__('Title Heading', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Ready to strengthen your organisation?', 'reflect-plugin'),
        ]);
        $this->add_control('desc', [
            'label' => esc_html__('Description Text', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Start a conversation with us to explore how we can help you improve performance.', 'reflect-plugin'),
        ]);
        $this->add_control('btn_txt', [
            'label' => esc_html__('Button Text', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Get in Touch', 'reflect-plugin'),
        ]);
        $this->add_control('btn_link', [
            'label' => esc_html__('Button Anchor Link Link', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#contact',
        ]);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="cta-band">
            <div class="container">
                <span class="eyebrow"><?php echo esc_html($settings['eyebrow']); ?></span>
                <h2><?php echo esc_html($settings['title']); ?></h2>
                <p><?php echo esc_html($settings['desc']); ?></p>
                <a href="<?php echo esc_attr($settings['btn_link']); ?>"
                    class="btn"><?php echo esc_html($settings['btn_txt']); ?></a>
            </div>
        </section>
        <?php
    }
}