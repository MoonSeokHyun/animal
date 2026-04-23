<?php
$item = $item ?? [];
$blog = $blog ?? [];
$relatedItems = $relatedItems ?? [];
$mapData = $mapData ?? null;

echo view('includes/header', [
    'seoTitle' => $seoTitle,
    'seoDescription' => $seoDescription,
    'seoKeywords' => $seoKeywords,
    'canonicalUrl' => $canonicalUrl,
    'jsonLd' => $jsonLd,
    'config' => $config
]);
?>

<main class="container">
    <!-- 상단 광고 -->
    <div style="margin-bottom: 2rem;">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="1204098626"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 320px; gap: 2rem; align-items: start;">
        <div class="content-main">
            <!-- 기본 정보 섹션 -->
            <section class="section-block" style="margin-top: 0;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
                    <div>
                        <p style="font-size: 0.875rem; color: var(--muted); margin-bottom: 0.5rem;">
                            <a href="<?= site_url('/') ?>">홈</a> / <a href="<?= site_url($type) ?>"><?= esc($config['title']) ?></a>
                        </p>
                        <h1 style="font-size: 2.25rem; font-weight: 800; color: var(--text);"><?= esc($item['사업장명']) ?></h1>
                    </div>
                    <span style="background: <?= ($item['영업상태명'] ?? '') === '정상영업' ? '#dcfce7' : '#fee2e2' ?>; color: <?= ($item['영업상태명'] ?? '') === '정상영업' ? '#166534' : '#991b1b' ?>; font-size: 0.875rem; font-weight: 700; padding: 0.5rem 1rem; border-radius: 999px;">
                        <?= esc($item['영업상태명'] ?? '상태불명') ?>
                    </span>
                </div>
                
                <div style="display: grid; grid-template-columns: 120px 1fr; gap: 1rem; font-size: 1rem; line-height: 2;">
                    <div style="color: var(--muted); font-weight: 600;">도로명주소</div>
                    <div><?= esc($item['도로명주소'] ?: '-') ?></div>
                    
                    <div style="color: var(--muted); font-weight: 600;">지번주소</div>
                    <div><?= esc($item['지번주소'] ?: '-') ?></div>
                    
                    <div style="color: var(--muted); font-weight: 600;">전화번호</div>
                    <div style="font-weight: 700; color: var(--primary); font-size: 1.125rem;"><?= esc($item['전화번호'] ?: '정보 없음') ?></div>
                    
                    <div style="color: var(--muted); font-weight: 600;">인허가일자</div>
                    <div><?= esc($item['인허가일자'] ?: '-') ?></div>

                    <?php if (!empty($item['폐업일자'])): ?>
                    <div style="color: var(--muted); font-weight: 600;">폐업일자</div>
                    <div><?= esc($item['폐업일자']) ?></div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- 지도 섹션 -->
            <?php if ($mapData && $mapData['x'] && $mapData['y']): ?>
            <section class="section-block" style="margin-top: 2rem;">
                <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem;">위치 지도</h2>
                <div id="map" style="width:100%; height:400px; border-radius: var(--radius); border: 1px solid var(--line);"></div>
                <script>
                    var mapOptions = {
                        center: new naver.maps.LatLng(<?= $mapData['y'] ?>, <?= $mapData['x'] ?>),
                        zoom: 16
                    };
                    var map = new naver.maps.Map('map', mapOptions);
                    var marker = new naver.maps.Marker({
                        position: new naver.maps.LatLng(<?= $mapData['y'] ?>, <?= $mapData['x'] ?>),
                        map: map,
                        title: '<?= esc($item['사업장명']) ?>'
                    });
                </script>
            </section>
            <?php endif; ?>

            <!-- 중간 광고 -->
            <div style="margin-top: 2rem;">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6686738239613464"
                     data-ad-slot="1204098626"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
            </div>

            <!-- 네이버 블로그 정보 -->
            <?php if (!empty($blog['items'])): ?>
                <section class="section-block" style="margin-top: 2rem;">
                    <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #2db400; font-weight: 900;">N</span> 관련 블로그 소식
                    </h2>
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <?php foreach (array_slice($blog['items'], 0, 5) as $blog_item): ?>
                            <a href="<?= $blog_item['link'] ?>" target="_blank" rel="nofollow" style="display: block; padding: 1rem; border: 1px solid #f1f5f9; border-radius: 0.75rem; transition: background 0.2s;">
                                <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--text);"><?= $blog_item['title'] ?></h3>
                                <p style="font-size: 0.9375rem; color: var(--muted); margin-bottom: 0.5rem;"><?= strip_tags($blog_item['description']) ?></p>
                                <div style="font-size: 0.8125rem; color: var(--primary); font-weight: 600;">
                                    <?= esc($blog_item['bloggername']) ?> | <?= date('Y.m.d', strtotime($blog_item['postdate'])) ?>
                                </div>
                            </a>
                            <style>
                                .content-main a:hover { background: #f8fafc; }
                            </style>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>

        <!-- 사이드바 -->
        <aside class="sidebar">
            <div class="section-block" style="margin-top: 0; padding: 1.5rem;">
                <h2 style="font-size: 1.125rem; font-weight: 800; margin-bottom: 1.25rem;">주변 <?= esc($config['title']) ?></h2>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <?php foreach ($relatedItems as $rel): ?>
                        <a href="<?= site_url($type . '/' . $rel['id']) ?>" style="display: block; padding-bottom: 1rem; border-bottom: 1px solid var(--line); transition: color 0.2s;">
                            <div style="font-weight: 700; font-size: 0.9375rem; margin-bottom: 0.375rem;"><?= esc($rel['사업장명']) ?></div>
                            <div style="font-size: 0.8125rem; color: var(--muted); line-height: 1.4;"><?= esc($rel['지번주소'] ?: $rel['도로명주소']) ?></div>
                        </a>
                        <style>
                            .sidebar a:hover div { color: var(--primary); }
                        </style>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 사이드바 광고 -->
            <div style="margin-top: 2rem;">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6686738239613464"
                     data-ad-slot="1204098626"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
            </div>
        </aside>
    </div>
</main>

<style>
@media (max-width: 992px) {
    main > div {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?= view('includes/footer') ?>
