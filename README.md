🚀 Instalação

    Faça o download do plugin:

        Baixar ZIP direto

        Ou clone o repositório:
        sh

        git clone https://github.com/seu-usuario/hide-woocommerce-stock.git

    Instale no WordPress:

        Acesse Plugins > Adicionar Novo > Enviar Plugin e faça upload do arquivo ZIP.

        Ative o plugin.

🔧 Como Funciona

O plugin utiliza hooks nativos do WooCommerce para remover todas as exibições de estoque:
Onde o Estoque é Ocultado	Método Utilizado
Página individual do produto	Remove woocommerce_template_single_stock
Listagens (loja/categorias)	Remove woocommerce_template_loop_stock
Variações (seletor de atributos)	Filtra woocommerce_get_stock_html para retornar vazio
Coluna "Stock" no painel admin	Remove via manage_edit-product_columns (opcional)
📝 Código Personalizado (Opcional)

Se precisar reverter a ocultação em casos específicos, use este filtro no functions.php do seu tema:
php

// Reexibir stock apenas para produtos com ID específico (ex: ID 123)  
add_filter('woocommerce_get_stock_html', function($html, $product) {  
    return ($product->get_id() === 123) ? $html : '';  
}, 10, 2);  

📌 FAQ
❓ Isso afeta a gestão real do estoque?

➡ Não! Apenas a exibição é removida. O WooCommerce continua gerenciando o estoque normalmente.
❓ Funciona com cache de plugins (W3TC, WP Rocket)?

➡ Sim! Como o plugin opera via hooks, é compatível com sistemas de cache.
❓ Posso ocultar o estoque apenas para visitantes?

➡ Sim! Adicione este código ao plugin:
php

if (!current_user_can('manage_woocommerce')) {  
    add_filter('woocommerce_get_stock_html', '__return_empty_string');  
}  

🛠 Contribuições

Contribuições são bem-vindas! Envie um Pull Request ou abra uma Issue no GitHub.
📜 Licença

GPLv2 - Livre para uso e modificação.
<div align="center"> <sub>Criado com ❤️ por <strong>Seu Nome</strong></sub> </div> ```
