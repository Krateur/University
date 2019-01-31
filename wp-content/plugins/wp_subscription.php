<?php
/*
Plugin Name: Kv Simple Subscription
Plugin URI: http://wordpress.org/plugins/kv-simple-subscription/
Description: This plugin helps you to get subscriptions through email and you can get email for every user signup for news letters.
Author: Kvvaradha
Version: 1.0
Author URI: http://www.kvcodes.com/
*/

add_action( 'init', 'kv_register_shortcode_for_newsletter');

function kv_register_shortcode_for_newsletter(){

    add_shortcode('kv_email_subscriptions', 'kv_email_subscription_fn' );
}

class Kv_Subscription_widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'kv_email_subscription',
            'description' => 'A Simple Email Subscription Widget to get subscribers info',
        );
        parent::__construct( 'my_widget', 'Kv Subscriptions', $widget_ops );
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance ) {
        echo '<aside>';
        do_action('kv_email_subscription');
        echo '</aside>';
    }
}

add_action( 'widgets_init', function(){
    register_widget( 'Kv_Subscription_widget' );
});


if(!function_exists('kv_email_subscription_fn')) {
    add_action('kv_email_subscription' , 'kv_email_subscription_fn' );

    function kv_email_subscription_fn() {

        if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['kv_submit_subscription'])) {

            if( filter_var($_POST['subscriber_email'], FILTER_VALIDATE_EMAIL) ){

                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

                $subject = sprintf(__('New Subscription on %s','kvc'), $blogname);

                $to = get_option('admin_email');

                $headers = 'From: '. sprintf(__('%s Admin', 'kvc'), $blogname) .' <No-repy@'.$_SERVER['SERVER_NAME'] .'>' . PHP_EOL;

                $message  = sprintf(__('Hi ,', 'kvc')) . PHP_EOL . PHP_EOL;
                $message .= sprintf(__('You have a new subscription on your %s website.', 'kvc'), $blogname) . PHP_EOL . PHP_EOL;
                $message .= __('Email Details', 'kvc') . PHP_EOL;
                $message .= __('-----------------') . PHP_EOL;
                $message .= __('User E-mail: ', 'kvc') . stripslashes($_POST['subscriber_email']) . PHP_EOL;
                $message .= __('Regards,', 'kvc') . PHP_EOL . PHP_EOL;
                $message .= sprintf(__('Your %s Team', 'kvc'), $blogname) . PHP_EOL;
                $message .= trailingslashit(get_option('home')) . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL;

                if (wp_mail($to, $subject, $message, $headers)){

                    echo 'Your e-mail (' . $_POST['subscriber_email'] . ') has been added to our mailing list!';
                }	else	{
                    echo 'There was a problem with your e-mail (' . $_POST['subscriber_email'] . ')';
                }
            }else{
                echo 'There was a problem with your e-mail (' . $_POST['subscriber_email'] . ')';
            }
        }?>

        <div class="col-lg-4 col-md-4 col-sm-4 twitter-widget-area animate-onscroll">

            <form id="newsletter-footer" action="" method="POST">

                <h5><strong>Sign up</strong> for email updates</h5>
                <div class="newsletter-form">

                    <div class="newsletter-email" style="margin-bottom:10px; " >
                        <input type="email" name="subscriber_email" placeholder="Email address">
                    </div>
                    <div class="newsletter-submit">
                        <input type="hidden" name="kv_submit_subscription" value="Submit">
                        <input type="submit" name="submit_form" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    <?php }

} ?>