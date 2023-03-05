<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_grid_gallery extends Widget_Base {

    public function get_name() {
        return 'modina_grid_gallery';
    }

    public function get_title() {
        return esc_html__( 'Grid Gallery', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_keywords() {
        return [ 'image', 'grid', 'fundbux', 'gallery', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {              


        $this->start_controls_section(
            'grid_gallery_section',
            [
                'label' => esc_html__( 'Grid Gallery', 'modina-core' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'grid_img',
            [
                'label' => esc_html__( 'Image Upload', 'modina-core' ),
                'type' =>Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugin_dir_url( __DIR__ ).'assets/img/grid/1.jpg',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gallery_images',
            [
                'label' => esc_html__( 'Gallery Images', 'modina-core' ),
                'type' =>Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'grid_img' => [
                            'url' => plugin_dir_url( __DIR__ ).'assets/img/grid/1.jpg',
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();    


        $this->start_controls_section(
            'year_sec',
            [
                'label' => esc_html__( 'Years Of Experience', 'modina-core' ),
            ]
        );

        $this->add_control(
            'year_digit',
            [
                'label' => esc_html__( 'Enter Your Years', 'modina-core' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 19,
            ]
        );

        $this->add_control(
            'digit_wrapper_bg', [
                'label' => esc_html__( 'Years Box Background', 'modina-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid-gallery-wrapper .digit-count' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
    $settings = $this->get_settings();

    $gallery_images = $settings['gallery_images'];

    ?>
    <?php if (!empty($settings['gallery_images'])) : ?>
        <div class="grid-gallery-wrapper">
            <div class="grid-gallery">
            <?php if (!empty($gallery_images)) {
                foreach ($gallery_images as $item) { ?>
                <div class="single-photo bg-cover" style="background-image: url('<?php echo esc_url($item['grid_img']['url']); ?>');"></div>
              	<?php }
                } ?>                
            </div>
            <?php if (!empty($settings['year_digit'])) : ?>
            <div class="digit-count text-white">
                <span><?php echo esc_html($settings['year_digit']) ?></span>+
                <p><?php echo esc_html__( 'Years Experience', 'modina-core' ); ?></p>
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php
    }
}