@extends('Client.layouts.paginate.master')
@section('contentClient')
    <main class="main-layout">
        <div class="page-about-new" data-page-id="2522999">
            <div class="container">
                <div class="page-about-new-main">
                    <div class="page-about-new-main-item">
                        <div class="page-about-new-main-item-left">
                            <img loading="eager" decoding="sync" fetchpriority="high" title="Về Chúng Tôi"
                                src="{{asset('assets/bizweb.dktcdn.net/100/520/624/themes/959507/assets/page-about-new-image-1b1ed.jpg')}}"
                                alt="Về Chúng Tôi">
                        </div>
                        <div class="page-about-new-main-item-right">
                            <div class="section-title-all">
                                <span>Về Chúng Tôi</span>
                                <p>2004STORE chính là nơi hội tụ những thương hiệu uy tín, những sản phẩm dành cho nam chất lượng hàng đầu tại Việt Nam. Không những thế, 2004STORE mang đến
                                    cho nam giới những trải nghiệm mua sắm tuyệt vời, đáng tin cậy và cam kết cung cấp các dịch
                                    vụ chăm sóc khách hàng, tư vấn bán hàng, tư vấn sử dụng sản phẩm và các dịch vụ giao
                                    nhận hàng tốt nhất.</p>
                            </div>
                        </div>
                    </div>
                    <div class="page-about-new-main-item">
                        <div class="page-about-new-main-item-left">
                            <img loading="lazy" decoding="async" title="Liên hệ"
                                src="{{asset('assets/bizweb.dktcdn.net/100/520/624/themes/959507/assets/page-about-new-image-2b1ed.jpg')}}"
                                alt="Liên hệ">
                        </div>
                        <div class="page-about-new-main-item-right">
                            <div class="section-title-all">
                                <span>Liên hệ</span>
                                <p>Con càng lớn lên, thời gian con ở bên cha mẹ ngày càng ít dần, những người bạn bên cạnh
                                    chơi đùa cùng con ngày nào dần bị thay thế bằng những trò chơi, video trên các sản phẩm
                                    công nghệ.

                                    Khi con bước sang độ tuổi thôi nôi, là lúc con bị cuốn hút nhiều hơn từ những Video, trò
                                    chơi trên ipad. Thời gian tiếp xúc với con đã ít rồi lại còn ít hơn nữa và dần dần con
                                    chỉ có thể tìm được những người bạn, niềm vui từ những trò công nghệ này. Tình cảm, kỹ
                                    năng, sự năng động của đứa bé 1 tuổi cũng dần giảm xuống thay vì phát triển như những
                                    đứa trẻ bình thường khác.

                                    Rất may mắn cho gia đình, khi chúng tôi sớm nhìn nhận ra được vấn đề với con. Nhờ những
                                    tư vấn, lời khuyên từ bạn bè, người thân tôi cũng đã nhận ra được mình phải làm gì để
                                    mang lại niềm vui và tuổi thơ cho con trẻ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="page-about-new-contact">
                        <form method="POST" action="{{ route('user.store', ['userId' => $userId]) }}" id="contact" accept-charset="UTF-8">
                            @csrf
                            <input name="utf8" type="hidden" value="true" /><input type="hidden"
                                id="Token-6512115532924f62be47d870d54ecb0d" name="Token" />
                            <script src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script>
                            <script>
                                grecaptcha.ready(function() {
                                    grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                        action: "contact"
                                    }).then(function(token) {
                                        document.getElementById("Token-6512115532924f62be47d870d54ecb0d").value = token
                                    });
                                });
                            </script>
                            <div class="section-title-all">
                                <span>Kết nối ngay với chúng tôi</span>
                                <h1 hidden>Liên hệ</h1>
                            </div>
                            <input required type="text" id="contactFormName" class="form-control input-lg"
                                name="contact[name]" placeholder="Tên của bạn" autocapitalize="words" value="">
                            <input required type="number" id="contactFormPhone" class="form-control input-lg"
                                name="contact[phone]" placeholder="Số điện thoại của bạn" autocapitalize="words"
                                value="">
                            <input required type="email" name="contact[email]" placeholder="Email của bạn"
                                id="contactFormEmail" class="form-control input-lg" autocapitalize="off" value="">
                            <textarea required rows="6" name="contact[body]" class="form-control" placeholder="Viết bình luận"
                                id="contactFormMessage"></textarea>
                            <button type="submit" class="btn btn-outline insButton" title="Gửi thông tin">Gửi thông
                                tin</button>
                            <!-- <ul class="shop-social">
                                <li>
                                    <a href="collections/all.html" target="_blank"
                                        aria-label="F1GENZ Model Fashion - Facebook"
                                        title="F1GENZ Model Fashion - Facebook">
                                        <img width="30" height="30" loading="lazy"
                                            title="F1GENZ Model Fashion - Facebook"
                                            src="../file.hstatic.net/200000588277/file/facebook__6__53aaa8d352524d3eb025af5203eaa437_icon.png"
                                            alt="F1GENZ Model Fashion - Facebook">
                                    </a>
                                </li>

                                <li>
                                    <a href="collections/all.html" target="_blank"
                                        aria-label="F1GENZ Model Fashion - Youtube" title="F1GENZ Model Fashion - Youtube">
                                        <img width="30" height="30" loading="lazy"
                                            title="F1GENZ Model Fashion - Youtube"
                                            src="../file.hstatic.net/200000588277/file/youtube__5__4f04522e10494557a651f53a33ad4d76_icon.png"
                                            alt="F1GENZ Model Fashion - Youtube">
                                    </a>
                                </li>

                                <li>
                                    <a href="collections/all.html" target="_blank"
                                        aria-label="F1GENZ Model Fashion - Pinterest"
                                        title="F1GENZ Model Fashion - Pinterest">
                                        <img width="30" height="30" loading="lazy"
                                            title="F1GENZ Model Fashion - Pinterest"
                                            src="../file.hstatic.net/200000588277/file/pinterest_a1a15995132a4275845412deba5f1193_icon.png"
                                            alt="F1GENZ Model Fashion - Youtube">
                                    </a>
                                </li>

                                <li>
                                    <a href="collections/all.html" target="_blank"
                                        aria-label="F1GENZ Model Fashion - TikTok" title="F1GENZ Model Fashion - TikTok">
                                        <img width="30" height="30" loading="lazy"
                                            title="F1GENZ Model Fashion - TikTok"
                                            src="../file.hstatic.net/200000588277/file/tik-tok_d85bb4e7468c43ac9ed5437649b7405c_icon.png"
                                            alt="F1GENZ Model Fashion - TikTok">
                                    </a>
                                </li>

                                <li>
                                    <a href="collections/all.html" target="_blank"
                                        aria-label="F1GENZ Model Fashion - Instagram"
                                        title="F1GENZ Model Fashion - Instagram">
                                        <img width="30" height="30" loading="lazy"
                                            title="F1GENZ Model Fashion - Instagram"
                                            src="../file.hstatic.net/200000588277/file/instagram__3__7de3ebbce1f24003b516ca6c1d7c24d5_icon.png"
                                            alt="F1GENZ Model Fashion - Instagram">
                                    </a>
                                </li>
                            </ul> -->
                        </form>
                        <div class="page-about-new-contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6177130569445!2d106.6541090152164!3d10.763917262366853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eec413c9d8d%3A0xfd53ac27a1acd021!2zMTgyIMSQLiBMw6ogxJDhuqFpIEjDoG5oLCBQaMaw4budbmcgMTUsIFF14bqtbiAxMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1666321027665!5m2!1svi!2s"
                                width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
