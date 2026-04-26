<footer class="site-footer">
  <div class="footer-inner">
    <section>
      <h2 class="footer-title">AnimalCare</h2>
      <p>전국 반려동물 및 축산 서비스 공공데이터 기반 정보 제공</p>
      <p>사업자 등록번호: 345-18-02361</p>
    </section>
    <section>
      <h2 class="footer-title">고객센터</h2>
      <p>이메일: <a href="mailto:gjqmaoslwj@naver.com">gjqmaoslwj@naver.com</a></p>
      <p>운영시간: 평일 09:00 ~ 18:00</p>
      <p>정보 수정/삭제 요청 및 이용 문의 가능</p>
    </section>
    <section>
      <h2 class="footer-title">바로가기</h2>
      <ul>
        <li><a href="<?= site_url('/') ?>">홈</a></li>
        <li><a href="<?= site_url('hospitals') ?>">동물병원 목록</a></li>
        <li><a href="<?= site_url('funerals') ?>">동물장례업 목록</a></li>
      </ul>
    </section>
  </div>
  <p class="copyright">© 2024 MoonDilogistics. All rights reserved.</p>
</footer>
</div>

<script type="text/javascript" src="//wcs.pstatic.net/wcslog.js"></script>
<script type="text/javascript">
if(!wcs_add) var wcs_add = {};
wcs_add["wa"] = "9b158284b08188";
if(window.wcs) {
  wcs_do();
}
</script>
<script>
  (function () {
    function initAd(el) {
      if (el.dataset.adInitialized === '1') {
        return;
      }

      if (!window.adsbygoogle) {
        window.setTimeout(function () {
          initAd(el);
        }, 300);
        return;
      }

      try {
        (window.adsbygoogle = window.adsbygoogle || []).push({});
        el.dataset.adInitialized = '1';
      } catch (e) {
        window.setTimeout(function () {
          initAd(el);
        }, 500);
      }
    }

    var ads = document.querySelectorAll('ins.adsbygoogle');

    if (!ads.length) {
      return;
    }

    if (!('IntersectionObserver' in window)) {
      ads.forEach(function (el) {
        initAd(el);
      });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          initAd(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, {
      rootMargin: '200px 0px',
      threshold: 0.01
    });

    ads.forEach(function (el) {
      observer.observe(el);
    });
  })();
</script>
</body>
</html>