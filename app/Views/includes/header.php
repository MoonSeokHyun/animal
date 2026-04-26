<?php
helper('url');

$siteName = 'AnimalCare';
$defaultTitle = '전국 동물 서비스 종합 정보 | AnimalCare';
$defaultDescription = '전국 동물병원, 장례식장, 약국, 판매업 등 18개 동물 관련 서비스 정보를 한눈에 확인하세요.';
$defaultKeywords = '동물병원, 반려동물 서비스, 동물약국, 애견미용, 동물 수송, 동물 장례';

$seoTitle = $seoTitle ?? $defaultTitle;
$seoDescription = $seoDescription ?? $defaultDescription;
$seoKeywords = $seoKeywords ?? $defaultKeywords;
$canonicalUrl = $canonicalUrl ?? current_url();
$seoImage = base_url('favicon.ico');
$currentSearch = trim((string) service('request')->getGet('search'));
$robotsContent = $currentSearch !== ''
    ? 'noindex,follow,max-image-preview:large'
    : 'index,follow,max-image-preview:large';
$defaultAdSlot = '1204098626';
$adSlots = array_merge([
    'home_top' => getenv('AD_SLOT_HOME_TOP') ?: $defaultAdSlot,
    'home_bottom' => getenv('AD_SLOT_HOME_BOTTOM') ?: $defaultAdSlot,
    'service_list_top' => getenv('AD_SLOT_SERVICE_LIST_TOP') ?: $defaultAdSlot,
    'service_detail_top' => getenv('AD_SLOT_SERVICE_DETAIL_TOP') ?: $defaultAdSlot,
    'service_detail_mid' => getenv('AD_SLOT_SERVICE_DETAIL_MID') ?: $defaultAdSlot,
    'service_detail_sidebar' => getenv('AD_SLOT_SERVICE_DETAIL_SIDEBAR') ?: $defaultAdSlot,
    'funeral_list_top' => getenv('AD_SLOT_FUNERAL_LIST_TOP') ?: $defaultAdSlot,
    'funeral_detail_top' => getenv('AD_SLOT_FUNERAL_DETAIL_TOP') ?: $defaultAdSlot,
    'funeral_detail_bottom' => getenv('AD_SLOT_FUNERAL_DETAIL_BOTTOM') ?: $defaultAdSlot,
], $adSlots ?? []);

if (!isset($jsonLd)) {
    $jsonLd = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "name" => $siteName,
        "url" => base_url(),
    ];
}

// 현재 서비스 타입에 따른 검색 액션 URL 설정
$searchType = $type ?? 'hospitals';
$searchAction = site_url($searchType);
$includeMapScript = $includeMapScript ?? false;
$ga4MeasurementId = getenv('GA4_MEASUREMENT_ID') ?: '';
$siteJsonLd = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "WebSite",
            "name" => $siteName,
            "url" => base_url('/'),
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => site_url($searchType) . "?search={search_term_string}",
                "query-input" => "required name=search_term_string",
            ],
        ],
        [
            "@type" => "Organization",
            "name" => $siteName,
            "url" => base_url('/'),
            "logo" => $seoImage,
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?= esc($seoTitle) ?></title>
  <meta name="description" content="<?= esc($seoDescription) ?>" />
  <meta name="keywords" content="<?= esc($seoKeywords) ?>" />
  <meta name="robots" content="<?= esc($robotsContent) ?>" />
  <link rel="canonical" href="<?= esc($canonicalUrl) ?>" />
  <link rel="alternate" hreflang="ko-KR" href="<?= esc($canonicalUrl) ?>" />
  <link rel="alternate" hreflang="x-default" href="<?= esc($canonicalUrl) ?>" />
  <link rel="preconnect" href="https://pagead2.googlesyndication.com" crossorigin />
  <link rel="preconnect" href="https://googleads.g.doubleclick.net" crossorigin />
  <link rel="dns-prefetch" href="//pagead2.googlesyndication.com" />
  <link rel="dns-prefetch" href="//googleads.g.doubleclick.net" />
  <link rel="stylesheet" href="<?= base_url('assets/css/site.css') ?>" />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= esc($seoTitle) ?>" />
  <meta property="og:description" content="<?= esc($seoDescription) ?>" />
  <meta property="og:url" content="<?= esc($canonicalUrl) ?>" />
  <meta property="og:site_name" content="<?= esc($siteName) ?>" />
  <meta property="og:locale" content="ko_KR" />
  <meta property="og:image" content="<?= esc($seoImage) ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= esc($seoTitle) ?>" />
  <meta name="twitter:description" content="<?= esc($seoDescription) ?>" />
  <meta name="twitter:image" content="<?= esc($seoImage) ?>" />
  <meta name="naver-site-verification" content="1fdf8b438e524cc0c44d8c4c20cf111f754d5595" />
  <script type="application/ld+json">
  <?= json_encode($siteJsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>
  <script type="application/ld+json">
  <?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6686738239613464" crossorigin="anonymous"></script>
  <?php if ($ga4MeasurementId !== ''): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= esc($ga4MeasurementId) ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= esc($ga4MeasurementId) ?>', { 'anonymize_ip': true });
  </script>
  <?php endif; ?>
  <?php if ($includeMapScript): ?>
  <script async defer src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId=c3hsihbnx3"></script>
  <?php endif; ?>

</head>
<body>
  <header class="site-header">
    <div class="header-inner">
      <a href="<?= site_url('/') ?>" class="logo">sex</a>
      <nav class="nav-menu">
        <div class="nav-item">반려동물 서비스
            <div class="dropdown">
                <a href="<?= site_url('hospitals') ?>">동물병원</a>
                <a href="<?= site_url('funerals') ?>">동물장례업</a>
                <a href="<?= site_url('pharmacies') ?>">동물약국</a>
                <a href="<?= site_url('sales') ?>">동물판매업</a>
                <a href="<?= site_url('grooming') ?>">동물미용업</a>
                <a href="<?= site_url('transport') ?>">동물운송업</a>
                <a href="<?= site_url('trust') ?>">동물위탁관리</a>
                <a href="<?= site_url('exhibition') ?>">동물전시업</a>
                <a href="<?= site_url('import') ?>">동물수입업</a>
                <a href="<?= site_url('production') ?>">동물생산업</a>
            </div>
        </div>
        <div class="nav-item">축산/산업 서비스
            <div class="dropdown">
                <a href="<?= site_url('livestock-farming') ?>">가축사육업</a>
                <a href="<?= site_url('feed') ?>">사료제조업</a>
                <a href="<?= site_url('hatchery') ?>">부화업</a>
                <a href="<?= site_url('breeding') ?>">종축업</a>
                <a href="<?= site_url('livestock-ai') ?>">가축인공수정소</a>
                <a href="<?= site_url('medical-supply') ?>">의료기기판매업</a>
                <a href="<?= site_url('drug-wholesale') ?>">의약품도매업</a>
                <a href="<?= site_url('slaughterhouse') ?>">도축업</a>
            </div>
        </div>
      </nav>
    </div>
  </header>

  <section class="search-section">
    <div class="search-container">
        <form class="search-form" action="<?= esc($searchAction) ?>" method="get">
            <input type="text" name="search" placeholder="<?= esc($config['search_placeholder'] ?? '검색어를 입력하세요') ?>" value="<?= esc($search ?? '') ?>" />
            <button type="submit">검색</button>
        </form>
    </div>
  </section>
