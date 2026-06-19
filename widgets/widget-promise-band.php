<?php
class Elementor_Reflect_Promise_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'reflect_promise_band';
    }
    public function get_title()
    {
        return esc_html__('Reflect Promise Band', 'reflect-plugin');
    }
    public function get_icon()
    {
        return 'eicon-call-to-action';
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
            'label' => esc_html__('Eyebrow Text', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Our Commitment', 'reflect-plugin'),
        ]);
        $this->add_control('tagline', [
            'label' => esc_html__('Tagline Subheading', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('From Aspiration to Action. From Compliance to Excellence.', 'reflect-plugin'),
        ]);
        $this->add_control('desc', [
            'label' => esc_html__('Main Text', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Everything we do is designed to help organisations move forward with confidence.', 'reflect-plugin'),
        ]);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="promise-band">
            <div class="container">
                <span class="eyebrow" style="color:var(--gold)"><?php echo esc_html($settings['eyebrow']); ?></span>
                <div class="tagline"><?php echo esc_html($settings['tagline']); ?></div>
                <p><?php echo esc_html($settings['desc']); ?></p>
            </div>
        </section>
        <?php
    }
}