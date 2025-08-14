<?php
/**
 * Plugin Name: Hide WooCommerce Stock
 * Description: Oculta todas as exibições de estoque (stock) do WooCommerce em lojas virtuais.
 * Version: 1.0.0
 * Author: Seu Nome
 * License: GPLv2 or later
 * Text Domain: hide-woocommerce-stock
 */

defined('ABSPATH') || exit;

class Hide_WooCommerce_Stock {

    public function __construct() {
        // Verifica se o WooCommerce está ativo
        add_action('plugins_loaded', [$this, 'check_woocommerce_active']);
    }

    public function check_woocommerce_active() {
        if (!class_exists('WooCommerce')) {
            add_action('admin_notices', [$this, 'show_woocommerce_missing_notice']);
            return;
        }

        $this->init_hooks();
    }

    public function show_woocommerce_missing_notice() {
        echo '<div class="error"><p>';
        _e('O plugin <strong>Hide WooCommerce Stock</strong> requer que o WooCommerce esteja instalado e ativo.', 'hide-woocommerce-stock');
        echo '</p></div>';
    }

    public function init_hooks() {
        // Remove o stock da página individual do produto
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_stock', 10);

        // Remove o stock da listagem de produtos (loja/categorias)
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10);

        // Remove o stock das variações (seletor de atributos)
        add_filter('woocommerce_get_stock_html', '__return_empty_string');

        // Oculta a coluna "Stock" no painel administrativo (opcional)
        add_filter('manage_edit-product_columns', [$this, 'remove_stock_column'], 20);
    }

    public function remove_stock_column($columns) {
        if (isset($columns['is_in_stock'])) {
            unset($columns['is_in_stock']);
        }
        return $columns;
    }
}

new Hide_WooCommerce_Stock();