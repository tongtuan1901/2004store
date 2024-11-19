@extends('Admin.layouts.master')
@section('contentAdmin')
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12 sherah-main__column">
                    <div class="sherah-body">
                        <div class="sherah-table sherah-page-inner sherah-border sherah-default-bg mg-top-25">
                            <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                <!-- sherah Table Head -->
                                <thead class="sherah-table__head">
                                    <tr>
                                        <th class="sherah-table__column-1 sherah-table__h1">Id</th>
                                        <th class="sherah-table__column-2 sherah-table__h2">Người dùng</th>
                                        <th class="sherah-table__column-3 sherah-table__h3">Sản phẩm</th>
                                        <th class="sherah-table__column-4 sherah-table__h4">Nội dung</th>
                                        <th class="sherah-table__column-6 sherah-table__h6">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="sherah-table__body">
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td class="sherah-table__column-1 sherah-table__data-1">
                                                <div class="sherah-language-form__input">
                                                    <p class="crany-table__product--number">{{ $comment->id }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-2 sherah-table__data-2">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">
                                                        {{ $comment->user ? $comment->user->name : 'N/A' }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-3 sherah-table__data-3">
                                                <div class="sherah-table__product-content">
                                                    <div
                                                        class="sherah-table__status sherah-color2 sherah-color2__bg--opactity">
                                                        {{ $comment->product ? $comment->product->name : 'N/A' }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-4 sherah-table__data-4">
                                                <div class="sherah-table__product-content">
                                                    <p class="sherah-table__product-desc">{{ $comment->content }}</p>
                                                </div>
                                            </td>
                                            <td class="sherah-table__column-7 sherah-table__data-7">
                                                <form action="{{ route('admin-comments.destroy', $comment->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="sherah-table__action sherah-color2 sherah-color2__bg--offset"
                                                        style="border: none; outline: none;"
                                                        onclick="return confirm('Bạn có chắc muốn xóa không?')"
                                                        type="submit">
                                                        <svg class="sherah-color2__fill" xmlns="http://www.w3.org/2000/svg"
                                                            width="16.247" height="18.252" viewBox="0 0 16.247 18.252">
                                                            <!-- SVG nội dung của icon xóa -->
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

