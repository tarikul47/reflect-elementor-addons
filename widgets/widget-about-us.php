<?php
class Elementor_Reflect_About_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'reflect_about_us';
    }
    public function get_title()
    {
        return esc_html__('Reflect About Us', 'reflect-plugin');
    }
    public function get_icon()
    {
        return 'eicon-image-box';
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
            'default' => esc_html__('About Us', 'reflect-plugin'),
        ]);
        $this->add_control('title', [
            'label' => esc_html__('Title', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Helping organisations improve, strengthen, and grow.', 'reflect-plugin'),
        ]);
        $this->add_control('desc_1', [
            'label' => esc_html__('Paragraph 1', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Reflect Associates is a standards, quality, and capacity development organisation dedicated to helping institutions and organisations improve performance, strengthen systems, and achieve lasting impact.', 'reflect-plugin'),
        ]);
        $this->add_control('desc_2', [
            'label' => esc_html__('Paragraph 2', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('We believe that organisations thrive when they invest in their people, strengthen their systems, and commit to continuous improvement.', 'reflect-plugin'),
        ]);
        $this->add_control('desc_3', [
            'label' => esc_html__('Paragraph 3', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Our work supports clients in building capability, enhancing quality, improving governance, meeting standards, and delivering better outcomes.', 'reflect-plugin'),
        ]);
        $this->add_control('image', [
            'label' => esc_html__('Choose Image', 'reflect-plugin'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => ['url' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=900&q=80'],
        ]);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section>
            <div class="container about">
                <div class="about-media">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['title']); ?>" />
                </div>
                <div>
                    <span class="eyebrow"><?php echo esc_html($settings['eyebrow']); ?></span>
                    <h2><?php echo esc_html($settings['title']); ?></h2>
                    <p><?php echo esc_html($settings['desc_1']); ?></p>
                    <p><?php echo esc_html($settings['desc_2']); ?></p>
                    <p><?php echo esc_html($settings['desc_3']); ?></p>
                </div>
            </div>
        </section>
        <?php
    }
}