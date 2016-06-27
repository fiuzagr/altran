<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'altran_4rodas');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'altran');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'altranTeste_123456');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NqUW=;^W;cac<6@n#3@I_!#OA$EXMl:&=gX9j*X7f/7lB-[AMcmmXh86(fn Zb)b');
define('SECURE_AUTH_KEY',  'Q^jPA%7Cl,<s,WR:#4;}04e%3S+;B~z6o5L^[fHy1}Au|dW]<K<7eNBCVj:x|,7G');
define('LOGGED_IN_KEY',    ' r$7[xTHd#?9L!0f{%.XjfD-6]c5@nhpS{3cv-(&+iV5|Zflg@%6hSzZxQ<Ur{D)');
define('NONCE_KEY',        'S5M> Y[[qM}UHu/#]^RznfK{_Q8`aSKJk5a3$EGbp6l0U.VruRHVt-Vi*+aFFJ3^');
define('AUTH_SALT',        '*clmN&>RQ9AR-@.U?ep.~ @IM71SOU~1Gex%3k`U$<<FLrsK}r0*[|pXC[d,J!y6');
define('SECURE_AUTH_SALT', 'qIeQ&N@3?e3M.xu3jD/UKS?:x9vApZn:Or$W72!+LBBfm@!1f,&2%J`Xs|}Ye)wj');
define('LOGGED_IN_SALT',   'tNRp%>y_alvX2MMM-/a?g@1Gp(?AuF7@6i% *tY*Ad+,4v+`_]wJ~V:~gL7V|!<5');
define('NONCE_SALT',       'RFY!b_r>8VE;p0.E4H8)wyw:%DNnv|0yKJo@q(t$2:x)#uaPR=(N6.A&kH3kSUh ');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
