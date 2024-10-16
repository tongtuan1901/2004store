@extends('Client.layouts.paginate.master')
@section('contentClient')
    <aside>
        <button class="order-summary-toggle" data-toggle="#order-summary" data-toggle-class="order-summary--is-collapsed">
            <span class="wrap">
                <span class="order-summary-toggle__inner">
                    <span class="order-summary-toggle__text expandable">
                        Đơn hàng (2 sản phẩm)
                    </span>
                    <span class="order-summary-toggle__total-recap" data-bind="getTextTotalPrice()"></span>
                </span>
            </span>
        </button>
    </aside>




    <div data-tg-refresh="checkout" id="checkout" class="content">
        <form id="checkoutForm" method="post"
            data-define="{
            loadingShippingErrorMessage: 'Không thể load phí vận chuyển. Vui lòng thử lại',
            loadingReductionCodeErrorMessage: 'Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại',
            submitingCheckoutErrorMessage: 'Có lỗi xảy ra khi xử lý. Vui lòng thử lại',
            requireShipping: true,
            requireDistrict: false,
            requireWard: false,
            shouldSaveCheckoutAbandon: false}"
            action="/checkout/7223b17515f74986bd49b27e1a755c89" data-bind-event-submit="handleCheckoutSubmit(event)"
            data-bind-event-keypress="handleCheckoutKeyPress(event)" data-bind-event-change="handleCheckoutChange(event)">
            <input type="hidden" name="_method" value="patch" />
            <div class="wrap">
                <main class="main">
                    <header class="main__header">
                        <div class="logo logo--left">

                            <h1 class="shop__name">
                                <a href="/">F1GENZ Model Fashion</a>
                            </h1>

                        </div>
                    </header>
                    <div class="main__content">
                        <article class="animate-floating-labels row">
                            <div class="col col--two">
                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>

                                                Thông tin nhận hàng

                                            </h2>


                                            <a href="/account/logout?returnUrl=/checkout/7223b17515f74986bd49b27e1a755c89">
                                                <i class="fa fa-sign-out fa-lg"></i>
                                                <span>Đăng xuất</span>
                                            </a>


                                        </div>
                                    </div>
                                    <div class="section__content">
                                        <div class="fieldset">

                                            <div class="field field--show-floating-label">
                                                <div class="field__input-wrapper">
                                                    <label for="customer-address" class="field__label">Sổ địa chỉ</label>
                                                    <select size="1" class="field__input field__input--select"
                                                        id="customer-address" data-bind="customerAddress">
                                                        <option value="0">Địa chỉ khác...</option>

                                                    </select>
                                                    <div class="field__caret">
                                                        <i class="fa fa-caret-down"></i>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="field field--show-floating-label field--disabled">
                                                <input name="email" type="hidden" value="cut0266@gmail.com">
                                                <div class="field__input-wrapper">
                                                    <label for="email" class="field__label">
                                                        Email
                                                    </label>
                                                    <input id="email" type="email" class="field__input"
                                                        data-bind="email" value="cut0266@gmail.com" disabled>
                                                </div>
                                            </div>



                                            <div class="field "
                                                data-bind-class="{'field--show-floating-label': billing.name}">
                                                <div class="field__input-wrapper">
                                                    <label for="billingName" class="field__label">Họ và tên</label>
                                                    <input name="billingName" id="billingName" type="text"
                                                        class="field__input" data-bind="billing.name" value="Trần Đức Đại">
                                                </div>

                                            </div>

                                            <div class="field "
                                                data-bind-class="{'field--show-floating-label': billing.phone}">
                                                <div class="field__input-wrapper field__input-wrapper--connected"
                                                    data-define="{phoneInput: new InputPhone(this)}">
                                                    <label for="billingPhone" class="field__label">
                                                        Số điện thoại (tùy chọn)
                                                    </label>
                                                    <input name="billingPhone" id="billingPhone" type="tel"
                                                        class="field__input" data-bind="billing.phone" value="+84961697384">
                                                    <div class="field__input-phone-region-wrapper">
                                                        <select class="field__input select-phone-region"
                                                            name="billingPhoneRegion" data-init-value="VN"></select>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="field "
                                                data-bind-class="{'field--show-floating-label': billing.address}">
                                                <div class="field__input-wrapper">
                                                    <label for="billingAddress" class="field__label">
                                                        Địa chỉ (tùy chọn)
                                                    </label>
                                                    <input name="billingAddress" id="billingAddress" type="text"
                                                        class="field__input" data-bind="billing.address" value="">
                                                </div>

                                            </div>


                                            <div class="field field--show-floating-label ">
                                                <div class="field__input-wrapper field__input-wrapper--select2">
                                                    <label for="billingProvince" class="field__label">Tỉnh thành</label>
                                                    <select name="billingProvince" id="billingProvince" size="1"
                                                        class="field__input field__input--select"
                                                        data-bind="billing.province" value=""
                                                        data-address-type="province" data-address-zone="billing">

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="field field--show-floating-label ">
                                                <div class="field__input-wrapper field__input-wrapper--select2">
                                                    <label for="billingDistrict" class="field__label">
                                                        Quận huyện (tùy chọn)
                                                    </label>
                                                    <select name="billingDistrict" id="billingDistrict" size="1"
                                                        class="field__input field__input--select" value=""
                                                        data-bind="billing.district" data-address-type="district"
                                                        data-address-zone="billing">

                                                    </select>
                                                </div>

                                            </div>

                                            <div class="field field--show-floating-label ">
                                                <div class="field__input-wrapper field__input-wrapper--select2">
                                                    <label for="billingWard" class="field__label">
                                                        Phường xã (tùy chọn)
                                                    </label>
                                                    <select name="billingWard" id="billingWard" size="1"
                                                        class="field__input field__input--select" value=""
                                                        data-bind="billing.ward" data-address-type="ward"
                                                        data-address-zone="billing">

                                                    </select>
                                                </div>

                                            </div>




                                        </div>
                                    </div>
                                </section>

                                <div class="fieldset">
                                    <h3 class="visually-hidden">Ghi chú</h3>
                                    <div class="field " data-bind-class="{'field--show-floating-label': note}">
                                        <div class="field__input-wrapper">
                                            <label for="note" class="field__label">
                                                Ghi chú (tùy chọn)
                                            </label>
                                            <textarea name="note" id="note" class="field__input" data-bind="note"></textarea>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col col--two">








                                <section class="section" data-define="{shippingMethod: ''}">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                                                Vận chuyển
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content" data-tg-refresh="refreshShipping"
                                        id="shippingMethodList"
                                        data-define="{isAddressSelecting: true, shippingMethods: []}">
                                        <div class="alert alert--loader spinner spinner--active"
                                            data-bind-show="isLoadingShippingMethod">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                <use href="#spinner"></use>
                                            </svg>
                                        </div>


                                        <div class="alert alert--danger"
                                            data-bind-show="!isLoadingShippingMethod && !isAddressSelecting && !isLoadingShippingError">
                                            Khu vực không hỗ trợ vận chuyển
                                        </div>

                                        <div class="alert alert-retry alert--danger hide"
                                            data-bind-event-click="handleShippingMethodErrorRetry()"
                                            data-bind-show="!isLoadingShippingMethod && !isAddressSelecting && isLoadingShippingError">
                                            <span data-bind="loadingShippingErrorMessage"></span> <i
                                                class="fa fa-refresh"></i>
                                        </div>


                                        <div class="content-box"
                                            data-bind-show="!isLoadingShippingMethod && !isAddressSelecting && !isLoadingShippingError">


                                        </div>

                                        <div class="alert alert--info hide"
                                            data-bind-show="!isLoadingShippingMethod && isAddressSelecting">
                                            Vui lòng nhập thông tin giao hàng
                                        </div>
                                    </div>
                                </section>

                                <section class="section">
                                    <div class="section__header">
                                        <div class="layout-flex">
                                            <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                                                <i
                                                    class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                Thanh toán
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="section__content">


                                        <div class="content-box" data-define="{paymentMethod: undefined}">


                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-780744"
                                                            type="radio" class="input-radio" data-bind="paymentMethod"
                                                            value="780744" data-provider-id="3">
                                                    </div>
                                                    <label for="paymentMethod-780744" class="radio__label">
                                                        <span class="radio__label__primary">Chuyển khoản</span>
                                                        <span class="radio__label__accessory">
                                                            <span class="radio__label__icon">
                                                                <i class="payment-icon payment-icon--3"></i>
                                                            </span>
                                                        </span>



                                                    </label>
                                                </div>

                                            </div>

                                            <div class="content-box__row">
                                                <div class="radio-wrapper">
                                                    <div class="radio__input">
                                                        <input name="paymentMethod" id="paymentMethod-780746"
                                                            type="radio" class="input-radio" data-bind="paymentMethod"
                                                            value="780746" data-provider-id="4">
                                                    </div>
                                                    <label for="paymentMethod-780746" class="radio__label">
                                                        <span class="radio__label__primary">Thu hộ (COD)</span>
                                                        <span class="radio__label__accessory">
                                                            <span class="radio__label__icon">
                                                                <i class="payment-icon payment-icon--4"></i>
                                                            </span>
                                                        </span>



                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </section>
                            </div>
                        </article>
                        <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                            <button type="submit" class="btn btn-checkout spinner"
                                data-bind-class="{'spinner--active': isSubmitingCheckout}"
                                data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
                                <span class="spinner-label">ĐẶT HÀNG</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                    <use href="#spinner"></use>
                                </svg>
                            </button>

                            <a href="/cart" class="previous-link">
                                <i class="previous-link__arrow">❮</i>
                                <span class="previous-link__content">Quay về giỏ hàng</span>
                            </a>

                        </div>

                        <div id="common-alert" data-tg-refresh="refreshError">


                            <div class="alert alert--danger hide-on-desktop"
                                data-bind-show="!isSubmitingCheckout && isSubmitingCheckoutError"
                                data-bind="submitingCheckoutErrorMessage">
                            </div>
                        </div>
                    </div>

                </main>
                <aside class="sidebar">
                    <div class="sidebar__header">
                        <h2 class="sidebar__title">
                            Đơn hàng (2 sản phẩm)
                        </h2>
                    </div>
                    <div class="sidebar__content">
                        <div id="order-summary" class="order-summary order-summary--is-collapsed">
                            <div class="order-summary__sections">
                                <div
                                    class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                    <table class="product-table" id="product-table" data-tg-refresh="refreshDiscount">
                                        <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                        <thead class="product-table__header">
                                            <tr>
                                                <th>
                                                    <span class="visually-hidden">Ảnh sản phẩm</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Mô tả</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Sổ lượng</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Đơn giá</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="product">
                                                <td class="product__image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail__wrapper" data-tg-static>
                                                            <img src="//bizweb.dktcdn.net/thumb/thumb/100/520/624/products/adf9e2b08a5a6215605d38e8d56d8502-b8884d5f0ae8497b8c48fc9be0adf717-51eb4f9b44f344939e2e9d46cb971d3f.jpg?v=1720423442500"
                                                                alt="" class="product-thumbnail__image" />
                                                        </div>
                                                        <span class="product-thumbnail__quantity">1</span>
                                                    </div>
                                                </td>
                                                <th class="product__description">
                                                    <span class="product__description__name">
                                                        CỔ CHỮ U TAY ÁO XÁM
                                                    </span>

                                                    <span class="product__description__property">
                                                        Xám / S
                                                    </span>



                                                </th>
                                                <td class="product__quantity visually-hidden"><em>Số lượng:</em> 1</td>
                                                <td class="product__price">

                                                    1.489.000₫

                                                </td>
                                            </tr>

                                            <tr class="product">
                                                <td class="product__image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail__wrapper" data-tg-static>
                                                            <img src="//bizweb.dktcdn.net/thumb/thumb/100/520/624/products/7e90ffcaa3cafff714d7d270d302c8b9.jpg?v=1720423660143"
                                                                alt="" class="product-thumbnail__image" />
                                                        </div>
                                                        <span class="product-thumbnail__quantity">1</span>
                                                    </div>
                                                </td>
                                                <th class="product__description">
                                                    <span class="product__description__name">
                                                        TWO LINE HALTER NECK TOP
                                                    </span>

                                                    <span class="product__description__property">
                                                        Trắng / S
                                                    </span>



                                                </th>
                                                <td class="product__quantity visually-hidden"><em>Số lượng:</em> 1</td>
                                                <td class="product__price">

                                                    1.390.000₫

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-summary__section order-summary__section--discount-code"
                                    data-tg-refresh="refreshDiscount" id="discountCode">
                                    <h3 class="visually-hidden">Mã khuyến mại</h3>
                                    <div class="edit_checkout animate-floating-labels">
                                        <div class="fieldset">
                                            <div class="field ">
                                                <div class="field__input-btn-wrapper">
                                                    <div class="field__input-wrapper">
                                                        <label for="reductionCode" class="field__label">Nhập mã giảm
                                                            giá</label>
                                                        <input name="reductionCode" id="reductionCode" type="text"
                                                            class="field__input" autocomplete="off"
                                                            data-bind-disabled="isLoadingReductionCode"
                                                            data-bind-event-keypress="handleReductionCodeKeyPress(event)"
                                                            data-define="{reductionCode: null}" data-bind="reductionCode">
                                                    </div>
                                                    <button class="field__input-btn btn spinner" type="button"
                                                        data-bind-disabled="isLoadingReductionCode || !reductionCode"
                                                        data-bind-class="{'spinner--active': isLoadingReductionCode, 'btn--disabled': !reductionCode}"
                                                        data-bind-event-click="applyReductionCode()">
                                                        <span class="spinner-label">Áp dụng</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                            <use href="#spinner"></use>
                                                        </svg>
                                                    </button>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element"
                                    data-define="{subTotalPriceText: '2.879.000₫'}"
                                    data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                                    <table class="total-line-table">
                                        <caption class="visually-hidden">Tổng giá trị</caption>
                                        <thead>
                                            <tr>
                                                <td><span class="visually-hidden">Mô tả</span></td>
                                                <td><span class="visually-hidden">Giá tiền</span></td>
                                            </tr>
                                        </thead>
                                        <tbody class="total-line-table__tbody">
                                            <tr class="total-line total-line--subtotal">
                                                <th class="total-line__name">
                                                    Tạm tính
                                                </th>
                                                <td class="total-line__price">2.879.000₫</td>
                                            </tr>



                                            <tr class="total-line total-line--shipping-fee">
                                                <th class="total-line__name">
                                                    Phí vận chuyển
                                                </th>
                                                <td class="total-line__price">
                                                    <span class="origin-price"
                                                        data-bind="getTextShippingPriceOriginal()"></span>
                                                    <span data-bind="getTextShippingPriceFinal()"></span>
                                                </td>
                                            </tr>



                                        </tbody>
                                        <tfoot class="total-line-table__footer">
                                            <tr class="total-line payment-due">
                                                <th class="total-line__name">
                                                    <span class="payment-due__label-total">
                                                        Tổng cộng
                                                    </span>
                                                </th>
                                                <td class="total-line__price">
                                                    <span class="payment-due__price"
                                                        data-bind="getTextTotalPrice()"></span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div
                                    class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                    <button type="submit" class="btn btn-checkout spinner"
                                        data-bind-class="{'spinner--active': isSubmitingCheckout}"
                                        data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
                                        <span class="spinner-label">ĐẶT HÀNG</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                            <use href="#spinner"></use>
                                        </svg>
                                    </button>


                                    <a href="/cart" class="previous-link">
                                        <i class="previous-link__arrow">❮</i>
                                        <span class="previous-link__content">Quay về giỏ hàng</span>
                                    </a>

                                </div>
                                <div id="common-alert-sidebar" data-tg-refresh="refreshError">


                                    <div class="alert alert--danger hide-on-mobile hide"
                                        data-bind-show="!isSubmitingCheckout && isSubmitingCheckoutError"
                                        data-bind="submitingCheckoutErrorMessage">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </form>


        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="spinner">

            </symbol>
        </svg>
    </div>
@endsection
