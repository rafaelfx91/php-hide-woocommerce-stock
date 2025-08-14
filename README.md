# Hide WooCommerce Stock

[![WordPress](https://img.shields.io/badge/WordPress-%23117AC9.svg?style=for-the-badge&logo=WordPress&logoColor=white)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net/)
[![WooCommerce](https://img.shields.io/badge/WooCommerce-96588A?style=for-the-badge&logo=WooCommerce&logoColor=white)](https://woocommerce.com/)

A lightweight WordPress plugin that completely hides WooCommerce stock displays.

## Features

- Removes stock display from single product pages
- Hides stock from product archives/shop pages
- Removes stock from product variations
- Optionally hides stock column in admin
- Zero configuration needed
- No database impact

## Installation

1. Download the [latest release](https://github.com/yourusername/hide-woocommerce-stock/releases)
2. Upload to your WordPress plugins directory (`/wp-content/plugins/`)
3. Activate the plugin in WordPress admin

Or install directly via WordPress:
1. Go to **Plugins > Add New**
2. Click **Upload Plugin**
3. Select the ZIP file
4. Click **Install Now** then **Activate**

## How It Works

The plugin uses WooCommerce hooks to remove stock displays:

| Location | Method Used |
|----------|-------------|
| Single product page | `remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_stock', 10)` |
| Product archives | `remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10)` |
| Variations | `add_filter('woocommerce_get_stock_html', '__return_empty_string')` |
| Admin column | `remove_column('is_in_stock')` |

## Customization

### Show stock for specific products only

```php
add_filter('woocommerce_get_stock_html', function($html, $product) {
    // Show only for product ID 42
    return ($product->get_id() === 42) ? $html : '';
}, 10, 2);
