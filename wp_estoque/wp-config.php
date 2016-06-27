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
define('DB_NAME', 'altran_controle_estoque');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'altran');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'altranTeste_123456');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '`e8&O>B|_GQ3]v%+xz==Z_DUa}aDGvaP8Va_;0^e3HSYEVyAWHi/um=sjk1%X#H ');
define('SECURE_AUTH_KEY',  'C>SspH3So0Js#x;)OYQN2Up5$*Ef^|>qy-d5=9)s4/DW!q_*(Kn0.nH{8Qxo;_}g');
define('LOGGED_IN_KEY',    'AN$&`q{H<HJg:AYoufKVH!;t{NU==d2O#F$GcU|qQZYjlf93< YIv>?@yF4{btvC');
define('NONCE_KEY',        'XJ!5[]a0#K+^/e(CXAZQY<_8tCA%WX7S/VyIFaafN0})i;{Z,fO*7Bg{y5qE;o_w');
define('AUTH_SALT',        'vM*!Mn>/]U!>_OxIg2ny;yafG_EL{0elx_?`h_564T$l<28@QHZcIHp~,c= z-nz');
define('SECURE_AUTH_SALT', 'XeVwKZ ;jWTS_HWK4N):|&QM#TO8tvl;rFhm/<6)EjUtr:Y0H2{Vn?9d)|Q3,an~');
define('LOGGED_IN_SALT',   '8aT+l?z37RrVz^h*/l J^|l)=7^rymEp#W:YbOj)<ZOwi}<vc:#)3;r]:dqC<Nb.');
define('NONCE_SALT',       '%<PgCF*XAD=!R#TFd;|TQ>5a*rtCuZINX@XI>k8Co# #: .vdXpK,/Jl5~2At_Lg');

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
