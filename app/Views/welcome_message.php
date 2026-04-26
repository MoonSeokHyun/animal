<?= view('includes/header') ?>

<main class="container">
    <!-- 메인 히어로 섹션 -->
    <section style="text-align: center; padding: 4rem 1rem; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border-radius: var(--radius); color: #fff; margin-bottom: 3rem;">
        <h1 style="font-size: 3rem; font-weight: 900; margin-bottom: 1.5rem; letter-spacing: -0.05em;">우리 아이를 위한<br/>모든 동물 서비스 정보</h1>
        <p style="font-size: 1.25rem; opacity: 0.9; margin-bottom: 2.5rem; max-width: 600px; margin-left: auto; margin-right: auto;">
            전국 18개 카테고리의 동물병원, 약국, 미용, 장례 등 공공데이터 기반의 정확한 정보를 실시간으로 확인하세요.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= site_url('hospitals') ?>" style="background: #fff; color: var(--primary); padding: 1rem 2rem; border-radius: 999px; font-weight: 800; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">동물병원 찾기</a>
            <a href="<?= site_url('pharmacies') ?>" style="background: rgba(255,255,255,0.2); color: #fff; padding: 1rem 2rem; border-radius: 999px; font-weight: 800; backdrop-filter: blur(10px);">동물약국 찾기</a>
        </div>
    </section>

    <!-- 메인 광고 -->
    <div style="margin-bottom: 3rem;">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="<?= esc($adSlots['home_top']) ?>"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <!-- 카테고리 퀵 링크 -->
        <section class="section-block">
            <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">반려동물 인기 서비스</h2>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                <a href="<?= site_url('hospitals') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🏥</div>
                    <div style="font-weight: 700;">동물병원</div>
                </a>
                <a href="<?= site_url('grooming') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">✂️</div>
                    <div style="font-weight: 700;">동물미용업</div>
                </a>
                <a href="<?= site_url('pharmacies') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">💊</div>
                    <div style="font-weight: 700;">동물약국</div>
                </a>
                <a href="<?= site_url('funerals') ?>" style="padding: 1.5rem; border: 1px solid var(--line); border-radius: 1rem; text-align: center;">
                    <div style="font-size: 2rem; margin-bottom: 0.5rem;">🕯️</div>
                    <div style="font-weight: 700;">동물장례업</div>
                </a>
            </div>
        </section>

        <!-- 최신 등록 정보 -->
        <section class="section-block">
            <h2 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">최신 등록 동물병원</h2>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <?php foreach ($latestHospitals as $hospital): ?>
                <a href="<?= site_url('hospitals/' . $hospital['id']) ?>" style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.75rem; border-bottom: 1px solid #f1f5f9;">
                    <div>
                        <div style="font-weight: 700;"><?= esc($hospital['사업장명']) ?></div>
                        <div style="font-size: 0.875rem; color: var(--muted);"><?= esc($hospital['지번주소'] ?: $hospital['도로명주소']) ?></div>
                    </div>
                    <div style="font-size: 0.75rem; color: var(--primary); font-weight: 600;">상세보기 ›</div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <!-- 하단 광고 -->
    <div style="margin-top: 3rem;">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6686738239613464"
             data-ad-slot="<?= esc($adSlots['home_bottom']) ?>"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
    </div>
</main>

<?= view('includes/footer') ?>
