<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hide WooCommerce Stock - WordPress Plugin</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #24292e;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3 {
            color: #2c3e50;
            margin-top: 24px;
            margin-bottom: 16px;
            font-weight: 600;
        }
        h1 {
            font-size: 2em;
            border-bottom: 1px solid #eaecef;
            padding-bottom: 0.3em;
        }
        h2 {
            font-size: 1.5em;
            border-bottom: 1px solid #eaecef;
            padding-bottom: 0.3em;
        }
        code {
            background-color: rgba(27, 31, 35, 0.05);
            border-radius: 3px;
            padding: 0.2em 0.4em;
            font-family: SFMono-Regular, Consolas, "Liberation Mono", Menlo, monospace;
        }
        pre {
            background-color: #f6f8fa;
            border-radius: 3px;
            padding: 16px;
            overflow: auto;
        }
        .badges {
            margin: 20px 0;
            text-align: center;
        }
        .badge {
            margin: 0 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #dfe2e5;
            padding: 6px 13px;
            text-align: left;
        }
        th {
            background-color: #f6f8fa;
        }
        .faq-question {
            font-weight: 600;
            color: #0366d6;
        }
        .center {
            text-align: center;
        }
        .highlight {
            background-color: #fff8c6;
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Hide WooCommerce Stock</h1>
        <div class="badges">
            <img src="https://img.shields.io/badge/WordPress-%23117AC9.svg?style=for-the-badge&logo=WordPress&logoColor=white" alt="WordPress" class="badge">
            <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" class="badge">
            <img src="https://img.shields.io/badge/WooCommerce-96588A?style=for-the-badge&logo=WooCommerce&logoColor=white" alt="WooCommerce" class="badge">
        </div>
        <p><strong>Um plugin WordPress leve que remove completamente a exibição de estoque do WooCommerce</strong></p>
    </div>

    <h2>📌 Visão Geral</h2>
    <p>Plugin otimizado que oculta todas as referências ao estoque (stock) em lojas WooCommerce, incluindo:</p>
    <ul>
        <li>Páginas individuais de produtos</li>
        <li>Listagens de produtos (loja/categorias)</li>
        <li>Seletor de variações</li>
        <li>Coluna do painel administrativo (opcional)</li>
    </ul>

    <div class="highlight">
        <p>✅ <strong>Sem configuração necessária</strong> - Basta ativar e funcionar!</p>
        <p>🚀 <strong>100% compatível</strong> - Funciona com qualquer tema WooCommerce</p>
        <p>⚡ <strong>Otimizado para performance</strong> - Zero impacto no banco de dados</p>
    </div>

    <h2>🚀 Instalação</h2>
    <h3>Método 1: Via WordPress</h3>
    <ol>
        <li>Acesse <strong>Plugins > Adicionar Novo</strong></li>
        <li>Clique em <strong>Enviar Plugin</strong></li>
        <li>Faça upload do arquivo ZIP</li>
        <li>Ative o plugin</li>
    </ol>

    <h3>Método 2: Via FTP/Git</h3>
    <pre><code>cd /caminho/para/wp-content/plugins/
git clone https://github.com/seu-usuario/hide-woocommerce-stock.git</code></pre>

    <h2>🔧 Como Funciona</h2>
    <p>O plugin utiliza hooks nativos do WooCommerce para remover seletivamente todas as exibições de estoque:</p>

    <table>
        <thead>
            <tr>
                <th>Local Afetado</th>
                <th>Técnica Utilizada</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Página individual do produto</td>
                <td><code>remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_stock', 10)</code></td>
            </tr>
            <tr>
                <td>Listagens de produtos</td>
                <td><code>remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10)</code></td>
            </tr>
            <tr>
                <td>Variações de produtos</td>
                <td><code>add_filter('woocommerce_get_stock_html', '__return_empty_string')</code></td>
            </tr>
            <tr>
                <td>Painel administrativo</td>
                <td><code>remove_column('is_in_stock')</code> (opcional)</td>
            </tr>
        </tbody>
    </table>

    <h2>⚙️ Personalização Avançada</h2>
    <h3>1. Exibir estoque apenas para produtos específicos</h3>
    <pre><code>add_filter('woocommerce_get_stock_html', function($html, $product) {
    // Mostrar apenas para produto com ID 42
    return ($product->get_id() === 42) ? $html : '';
}, 10, 2);</code></pre>

    <h3>2. Ocultar apenas para visitantes (não administradores)</h3>
    <pre><code>if (!current_user_can('manage_woocommerce')) {
    add_filter('woocommerce_get_stock_html', '__return_empty_string');
}</code></pre>

    <h2>📌 FAQ</h2>

    <p class="faq-question">❓ O plugin afeta a gestão real do estoque?</p>
    <p>➡ <strong>Não!</strong> Apenas a exibição é removida. Todas as funcionalidades de gerenciamento de estoque continuam intactas.</p>

    <p class="faq-question">❓ É compatível com plugins de cache?</p>
    <p>➡ <strong>Sim!</strong> Funciona perfeitamente com WP Rocket, W3 Total Cache e outros sistemas de cache.</p>

    <p class="faq-question">❓ Posso manter o estoque visível no painel administrativo?</p>
    <p>➡ Sim! Comente a linha 37 no arquivo principal do plugin: <code>// add_filter('manage_edit-product_columns', [$this, 'remove_stock_column'], 20);</code></p>

    <h2>🛠 Contribuição</h2>
    <p>Contribuições são bem-vindas! Siga estes passos:</p>
    <ol>
        <li>Faça um fork do projeto</li>
        <li>Crie sua branch (<code>git checkout -b feature/nova-funcionalidade</code>)</li>
        <li>Commit suas mudanças (<code>git commit -m 'Adiciona nova funcionalidade'</code>)</li>
        <li>Push para a branch (<code>git push origin feature/nova-funcionalidade</code>)</li>
        <li>Abra um Pull Request</li>
    </ol>

    <h2>📜 Licença</h2>
    <p>Este plugin é lançado sob licença <strong>GPLv2</strong>. Veja o arquivo <a href="LICENSE">LICENSE</a> para mais detalhes.</p>

    <div class="center">
        <p><sub>Criado com ❤️ por <strong>Seu Nome</strong></sub></p>
    </div>
</body>
</html>
