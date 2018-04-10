<?php

/**
 * Front end my-account/my-address page.
 *
 * @since 1.0.0
 * @author Fahri Rusliyadi <fahri.rusliyadi@gmail.com>
 */
class Fr_Address_Book_for_WooCommerce_Frontend_MyAccount_MyAddress {
    /**
     * Register actions and filters with WordPress.
     * 
     * @since 1.0.0
     */
    public function init() {
        add_action('woocommerce_after_template_part', array($this, 'on_woocommerce_after_template_part'), 10, 4);
    }
 
    /**
     * <code>woocommerce_after_template_part</code> action handler.
     * 
     * @since 1.0.0
     * @param string $template_name Template name.
     * @param string $template_path Template path.
     * @param string $located Located template path.
     * @param array $args Arguments.
     */
    public function on_woocommerce_after_template_part($template_name, $template_path, $located, $args) {
        if ($template_name === 'myaccount/my-address.php') {
            $this->display_saved_addresses();
        }
    }
    
    /**
     * Display saved addresses.
     * 
     * @since 1.0.0
     */
    private function display_saved_addresses() {
        $addresses = fr_address_book_for_woocommerce()->Customer->get_addresses();
        
        fr_address_book_for_woocommerce()->Asset->enqueue_style('fabfw_front_end', 'assets/css/frontend.min.css', array(), FR_ADDRESS_BOOK_FOR_WOOCOMMERCE_VERSION);
        fr_address_book_for_woocommerce()->Frontend_Template->load('addresses.php', compact('addresses'));
    }
}
