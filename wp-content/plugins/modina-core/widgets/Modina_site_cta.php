<?php
namespace ModinaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Modina_site_cta extends Widget_Base {

    public function get_name() {
        return 'modina_site_cta';
    }

    public function get_title() {
        return esc_html__( 'Site Info CTA', 'modina-core' );
    }

    public function get_icon() {
        return 'eicon-site-logo';
    }

    public function get_keywords() {
        return [ 'cta', 'site', 'social', 'image', 'contact', 'modina'];
    }

    public function get_categories() {
        return [ 'modina-elements' ];
    }

    protected function _register_controls() {              

        // Logo Image
        $this->start_controls_section(
            'site_logo_sec',
            [
                'label' => esc_html__( 'Logo', 'modina-core' ),
            ]
        );

        $this->add_control(
            'logo', [
                'label' => esc_html__( 'Upload Image', 'modina-core' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Contact Info
        $this->start_controls_section(
            'contact_info_sec',
            [
                'label' => esc_html__( 'Contact Info', 'modina-core' ),
            ]
        );

        $this->add_control(
            'email_address',
            [
                'label' => esc_html__( 'Email Address', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'info@webmail.com',
            ]
        );

        $this->add_control(
            'phone_number',
            [
                'label' => esc_html__( 'Phone Number', 'modina-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '980-987-098-09',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'social_profile_links',
            [
                'label' => esc_html__( 'Social Page Links', 'modina-core' ),                                
            ]
        );

        $this->add_control(
            'facebook_link',
            [
                'label' => esc_html__( 'Facebook Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'twitter_link',
            [
                'label' => esc_html__( 'Twitter Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'behance_link',
            [
                'label' => esc_html__( 'Behance Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'youtube_link',
            [
                'label' => esc_html__( 'Youtube Link', 'modina-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_tab', [
                'label' => esc_html__( 'Section Style', 'modina-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bg_color', [
                'label'   => esc_html__( 'Section Bottom BG Color', 'modina-core' ),
                'type'    => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .footer-top-bar::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => esc_html__( 'Section Padding', 'modina-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
    $settings = $this->get_settings();

    ?>

    <div class="footer-top-bar text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <?php if (!empty( $settings['logo']['url']) ) : ?>
                    <div class="footer-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="Charity" /></a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us">
                        <div class="single-info">
                            <div class="icon"> <i class="fal fa-envelope"></i> </div>
                            <div class="contact-info">
                                <h4><?php echo esc_html__('Email Address', 'modia-core'); ?></h4>
                                <p><?php echo htmlspecialchars_decode( esc_html( $settings['email_address'] ) ); ?></p>
                            </div>
                        </div>
                        <div class="single-info">
                            <div class="icon"> <i class="fal fa-phone"></i> </div>
                            <div class="contact-info">
                                <h4><?php echo esc_html__('Phone Number', 'modia-core'); ?></h4>
                                <p><?php echo htmlspecialchars_decode( esc_html( $settings['phone_number'] ) ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="social-link text-lg-right">
                        <?php if (!empty($settings['facebook_link']['url'])) : ?>
                        <a href="<?php echo esc_url($settings['facebook_link']['url']); ?>" <?php modina_is_external($settings['facebook_link']); ?> <?php modina_is_nofollow($settings['facebook_link']); ?>><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>

                        <?php if (!empty($settings['twitter_link']['url'])) : ?>
                        <a href="<?php echo esc_url($settings['twitter_link']['url']); ?>" <?php modina_is_external($settings['twitter_link']); ?> <?php modina_is_nofollow($settings['twitter_link']); ?>><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>

                        <?php if (!empty($settings['behance_link']['url'])) : ?>
                        <a href="<?php echo esc_url($settings['behance_link']['url']); ?>" <?php modina_is_external($settings['behance_link']); ?> <?php modina_is_nofollow($settings['behance_link']); ?>><i class="fab fa-behance"></i></a>
                        <?php endif; ?>

                        <?php if ( !empty($settings['youtube_link']['url']) ) : ?>
                        <a href="<?php echo esc_url($settings['youtube_link']['url']); ?>" <?php modina_is_external($settings['youtube_link']); ?> <?php modina_is_nofollow($settings['youtube_link']); ?>><i class="fab fa-youtube"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    }
}