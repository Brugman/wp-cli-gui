<?php

function d( $var )
{
    echo "<pre style=\"max-height: 800px; z-index: 9999; position: relative; overflow-y: scroll; white-space: pre-wrap; word-wrap: break-word; padding: 10px 15px; border: 1px solid #fff; background-color: #161616; text-align: left; line-height: 1.5; font-family: Courier; font-size: 16px; color: #fff; \">";
    print_r( $var );
    echo "</pre>";
}

function dd( $var )
{
    d( $var );
    exit;
}

function download_languages_list()
{
    return [
        ''               => 'English (United States)',
        'en_GB'          => 'English (UK)',
        'en_CA'          => 'English (Canada)',
        'en_AU'          => 'English (Australia)',
        'en_NZ'          => 'English (New Zealand)',
        'en_ZA'          => 'English (South Africa)',
        'af'             => 'Afrikaans',
        'ar'             => 'العربية',
        'ary'            => 'العربية المغربية',
        'as'             => 'অসমীয়া',
        'azb'            => 'گؤنئی آذربایجان',
        'az'             => 'Azərbaycan dili',
        'bel'            => 'Беларуская мова',
        'bg_BG'          => 'Български',
        'bn_BD'          => 'বাংলা',
        'bo'             => 'བོད་ཡིག',
        'bs_BA'          => 'Bosanski',
        'ca'             => 'Català',
        'ceb'            => 'Cebuano',
        'cs_CZ'          => 'Čeština',
        'cy'             => 'Cymraeg',
        'da_DK'          => 'Dansk',
        'de_DE'          => 'Deutsch',
        'de_CH'          => 'Deutsch (Schweiz)',
        'de_AT'          => 'Deutsch (Österreich)',
        'de_CH_informal' => 'Deutsch (Schweiz, Du)',
        'de_DE_formal'   => 'Deutsch (Sie)',
        'dzo'            => 'རྫོང་ཁ',
        'el'             => 'Ελληνικά',
        'eo'             => 'Esperanto',
        'es_ES'          => 'Español',
        'es_CO'          => 'Español de Colombia',
        'es_AR'          => 'Español de Argentina',
        'es_CL'          => 'Español de Chile',
        'es_PE'          => 'Español de Perú',
        'es_UY'          => 'Español de Uruguay',
        'es_CR'          => 'Español de Costa Rica',
        'es_GT'          => 'Español de Guatemala',
        'es_VE'          => 'Español de Venezuela',
        'es_MX'          => 'Español de México',
        'et'             => 'Eesti',
        'eu'             => 'Euskara',
        'fa_IR'          => 'فارسی',
        'fi'             => 'Suomi',
        'fr_FR'          => 'Français',
        'fr_BE'          => 'Français de Belgique',
        'fr_CA'          => 'Français du Canada',
        'fur'            => 'Friulian',
        'gd'             => 'Gàidhlig',
        'gl_ES'          => 'Galego',
        'gu'             => 'ગુજરાતી',
        'haz'            => 'هزاره گی',
        'he_IL'          => 'עִבְרִית',
        'hi_IN'          => 'हिन्दी',
        'hr'             => 'Hrvatski',
        'hsb'            => 'Hornjoserbšćina',
        'hu_HU'          => 'Magyar',
        'hy'             => 'Հայերեն',
        'id_ID'          => 'Bahasa Indonesia',
        'is_IS'          => 'Íslenska',
        'it_IT'          => 'Italiano',
        'ja'             => '日本語',
        'jv_ID'          => 'Basa Jawa',
        'ka_GE'          => 'ქართული',
        'kab'            => 'Taqbaylit',
        'kk'             => 'Қазақ тілі',
        'km'             => 'ភាសាខ្មែរ',
        'kn'             => 'ಕನ್ನಡ',
        'ko_KR'          => '한국어',
        'ckb'            => 'كوردی‎',
        'lo'             => 'ພາສາລາວ',
        'lt_LT'          => 'Lietuvių kalba',
        'lv'             => 'Latviešu valoda',
        'mk_MK'          => 'Македонски јазик',
        'ml_IN'          => 'മലയാളം',
        'mn'             => 'Монгол',
        'mr'             => 'मराठी',
        'ms_MY'          => 'Bahasa Melayu',
        'my_MM'          => 'ဗမာစာ',
        'nb_NO'          => 'Norsk bokmål',
        'ne_NP'          => 'नेपाली',
        'nl_NL'          => 'Nederlands',
        'nl_NL_formal'   => 'Nederlands (Formeel)',
        'nl_BE'          => 'Nederlands (België)',
        'nn_NO'          => 'Norsk nynorsk',
        'oci'            => 'Occitan',
        'pa_IN'          => 'ਪੰਜਾਬੀ',
        'pl_PL'          => 'Polski',
        'ps'             => 'پښتو',
        'pt_PT'          => 'Português',
        'pt_PT_ao90'     => 'Português (AO90)',
        'pt_BR'          => 'Português do Brasil',
        'pt_AO'          => 'Português de Angola',
        'rhg'            => 'Ruáinga',
        'ro_RO'          => 'Română',
        'ru_RU'          => 'Русский',
        'sah'            => 'Сахалыы',
        'snd'            => 'سنڌي',
        'si_LK'          => 'සිංහල',
        'sk_SK'          => 'Slovenčina',
        'skr'            => 'سرائیکی',
        'sl_SI'          => 'Slovenščina',
        'sq'             => 'Shqip',
        'sr_RS'          => 'Српски језик',
        'sv_SE'          => 'Svenska',
        'sw'             => 'Kiswahili',
        'szl'            => 'Ślōnskŏ gŏdka',
        'ta_IN'          => 'தமிழ்',
        'te'             => 'తెలుగు',
        'th'             => 'ไทย',
        'tl'             => 'Tagalog',
        'tr_TR'          => 'Türkçe',
        'tt_RU'          => 'Татар теле',
        'tah'            => 'Reo Tahiti',
        'ug_CN'          => 'ئۇيغۇرچە',
        'uk'             => 'Українська',
        'ur'             => 'اردو',
        'uz_UZ'          => 'O‘zbekcha',
        'vi'             => 'Tiếng Việt',
        'zh_TW'          => '繁體中文',
        'zh_CN'          => '简体中文',
        'zh_HK'          => '香港中文版   ',
    ];
}

function default_plugins_list()
{
    return [
        'akismet' => 'Akismet',
        'hello'   => 'Hello Dolly',
    ];
}

function default_posts_list()
{
    return [
        1 => 'Post: Hello World',
        2 => 'Page: Sample Page',
        3 => 'Page: Privacy Policy',
    ];
}

function date_format_list()
{
    return [
        'default' => 'Default',
        'F j, Y'  => 'May 12, 2021',
        'Y-m-d'   => '2021-05-12',
        'm/d/Y'   => '05/12/2021',
        'd/m/Y'   => '12/05/2021',
    ];
}

function time_format_list()
{
    return [
        'default' => 'Default',
        'g:i a'   => '5:14 pm',
        'g:i A'   => '5:14 PM',
        'H:i'     => '17:14',
    ];
}

function weekdays_list()
{
    return [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
    ];
}

function permalink_structure_list()
{
    return [
        'Default'                  => 'default',
        '/?p=123'                  => '',
        '/2021/05/12/sample-post/' => '/%year%/%monthnum%/%day%/%postname%/',
        '/2021/05/sample-post/'    => '/%year%/%monthnum%/%postname%/',
        '/archives/123'            => '/archives/%post_id%',
        '/sample-post/'            => '/%postname%/',
        '/blog/sample-post/'       => '/blog/%postname%/',
        '/news/sample-post/'       => '/news/%postname%/',
    ];
}

function fe_id()
{
    global $iteration, $number;

    $iteration = $iteration ?? 0;
    $number    = $number ?? 0;

    $iteration++;

    if ( $iteration % 2 )
        $number++;

    return 'fe-'.$number;
}

