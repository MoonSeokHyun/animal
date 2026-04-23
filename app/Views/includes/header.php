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
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?= esc($seoTitle) ?></title>
  <meta name="description" content="<?= esc($seoDescription) ?>" />
  <meta name="keywords" content="<?= esc($seoKeywords) ?>" />
  <link rel="canonical" href="<?= esc($canonicalUrl) ?>" />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= esc($seoTitle) ?>" />
  <meta property="og:description" content="<?= esc($seoDescription) ?>" />
  <meta property="og:url" content="<?= esc($canonicalUrl) ?>" />
  <meta property="og:site_name" content="<?= esc($siteName) ?>" />

  <script type="application/ld+json">
  <?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6686738239613464" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://oapi.map.naver.com/openapi/v3/maps.js?ncpClientId=24lj4g8fug"></script>

  <style>
    :root {
      --bg: #f8fafc;
      --surface: #ffffff;
      --text: #0f172a;
      --muted: #64748b;
      --line: #e2e8f0;
      --primary: #4f46e5;
      --primary-dark: #4338ca;
      --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      --radius: 1rem;
      --max: 1200px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Pretendard', sans-serif; background: var(--bg); color: var(--text); line-height: 1.6; }
    a { color: inherit; text-decoration: none; transition: 0.2s; }

    .site-header { background: var(--surface); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 100; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    .header-inner { max-width: var(--max); margin: 0 auto; padding: 1rem 1.25rem; display: flex; align-items: center; justify-content: space-between; }
    
    .logo { font-size: 1.5rem; font-weight: 900; color: var(--primary); letter-spacing: -0.05em; }

    .nav-menu { display: flex; gap: 1.5rem; align-items: center; }
    .nav-item { position: relative; padding: 0.5rem 0; font-weight: 600; cursor: pointer; color: var(--text); }
    .nav-item:hover { color: var(--primary); }
    .nav-item::after { content: '▼'; font-size: 0.6rem; margin-left: 0.4rem; opacity: 0.5; }
    
    .dropdown {
        position: absolute; top: 100%; left: 0; background: #fff; border: 1px solid var(--line); 
        border-radius: 0.75rem; box-shadow: var(--shadow); padding: 1rem; 
        display: none; grid-template-columns: repeat(2, 140px); gap: 0.5rem; min-width: 320px;
    }
    .nav-item:hover .dropdown { display: grid; }
    .dropdown a { padding: 0.5rem 0.75rem; border-radius: 0.5rem; font-size: 0.875rem; color: var(--muted); }
    .dropdown a:hover { background: #f1f5f9; color: var(--primary); }

    .search-section { background: #fff; border-bottom: 1px solid var(--line); padding: 1rem 0; }
    .search-container { max-width: 700px; margin: 0 auto; padding: 0 1.25rem; }
    .search-form { display: flex; gap: 0.5rem; background: #f1f5f9; border-radius: 999px; padding: 0.4rem 0.4rem 0.4rem 1.25rem; border: 1px solid transparent; }
    .search-form:focus-within { border-color: var(--primary); background: #fff; box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1); }
    .search-form input { flex: 1; border: 0; outline: 0; background: transparent; font-size: 1rem; }
    .search-form button { background: var(--primary); color: #fff; border: 0; padding: 0.6rem 1.5rem; border-radius: 999px; font-weight: 700; cursor: pointer; }
    
    .container { max-width: var(--max); margin: 0 auto; padding: 2rem 1.25rem; }
    .section-block { background: #fff; border: 1px solid var(--line); border-radius: var(--radius); padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }

    @media (max-width: 768px) {
        .nav-menu { gap: 1rem; font-size: 0.9rem; }
        .dropdown { left: -100px; grid-template-columns: 1fr; min-width: 200px; }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="header-inner">
      <a href="<?= site_url('/') ?>" class="logo">AnimalCare</a>
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
        <a href="<?= site_url('sitemap.xml') ?>" style="font-weight: 600;">사이트맵</a>
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
