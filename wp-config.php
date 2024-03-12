<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'bdAcademia' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=!1<5>4g&G5d8byhlE+M3F }/-!Z75?(S_g7c4*QPe.Cg!pNT7H#[}>w;8(3F5z2' );
define( 'SECURE_AUTH_KEY',  'p6%a-9WWn^@9w+#<*7zk/u,(bnSZ@`oj>9*9&SdoJS#n[D=/0ZK?=x}I#ZL|)I^}' );
define( 'LOGGED_IN_KEY',    '$zj-VkLngO-4HTUkj|-4{lT>GWyWBAwq+|HhUAOlc/5Dq6neXJAmhc}-,/])Mr>H' );
define( 'NONCE_KEY',        'E{$w~;.QCC%FYR3FxwKP!@b|b,W6G6;+M5-&?:NR/},e,?.[59A6hS$]mkDZEm X' );
define( 'AUTH_SALT',        'e}{ig=HP<7^?*gB[uw04JWpupD_)><+cWwXD?#{|QdYL8,<$ogDC:{6gUT*c;g=8' );
define( 'SECURE_AUTH_SALT', 'wXA(PjJ62+C]mx+H+>U) d3[6O&x]f,)1}jpo%@Aw[2jEAv2lm*YtVrs`**U(6D<' );
define( 'LOGGED_IN_SALT',   '5T2pBp:?bRh#Rhu3)y?A$Y|D*!2LN|t`E#Ztc]gdW~P~&9}!;&g8gQ[g?UdqJVJm' );
define( 'NONCE_SALT',       'S@o?[nb@DBhFDjk+vEIpJHX]R`.oUbqekZaM!zvtN0cS]:.xYb{mp_:ZVB5#c#5*' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
