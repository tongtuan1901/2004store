@extends('Admin.layouts.master')
@section('contentAdmin')

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sherah-body">
                    <!-- Dashboard Inner -->
                    <div class="sherah-dsinner">
                        <div class="row">
                            <div class="col-12">
                                <div class="sherah-breadcrumb mg-top-30">
                                    <h2 class="sherah-breadcrumb__title">Danh sách khách hàng</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Search Filters -->
                        <div class="col-md-12">
                            <input type="text" id="searchKeyword" name="keyword" class="form-control" placeholder="Tìm theo họ tên, email hoặc số điện thoại">
                            <button type="button" id="clearSearch" class="btn btn-secondary btn-sm">Xóa tìm kiếm</button>
                        </div>

                        <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                            <div class="sherah-table p-0">
                                <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                    <!-- sherah Table Head -->
                                    <thead class="sherah-table__head">
                                        <tr>
                                            <th class="sherah-table__column-1 sherah-table__h1">STT</th>
                                            <th class="sherah-table__column-1 sherah-table__h1">Họ và tên</th>
                                            <th class="sherah-table__column-2 sherah-table__h2">Email</th>
                                            <th class="sherah-table__column-3 sherah-table__h3">Số điện thoại</th>
                                            <th class="sherah-table__column-4 sherah-table__h4">Mật khẩu</th> <!-- Thêm cột mật khẩu -->
                                            <th class="sherah-table__column-5 sherah-table__h5">Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody" class="sherah-table__body">
                                        @foreach ($users as $k => $user)
                                            <tr>
                                                <td>{{ ++$k }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                                <td class="sherah-table__column-6 sherah-table__data-6">
                                                    <div class="sherah-table__product-content">
                                                        <p class="sherah-table__product-desc">
                                                            {{ str_repeat('*', 8) }} <!-- Hiển thị mật khẩu dạng dấu * -->
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($user->trashed())
                                                        <a href="{{ route('users.restore', $user->id) }}" class="sherah-btn sherah-gbcolor">Restore</a>
                                                    @else
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="sherah-btn sherah-gbcolor" style="background-color: red" onclick="return confirm('Are you sure?')">Delete</button>

                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchKeyword');
    const userTableBody = document.getElementById('userTableBody');
    const clearSearchButton = document.getElementById('clearSearch');

    // Hàm gửi AJAX request để tìm kiếm người dùng
    function searchUsers(keyword) {
        fetch(`{{ route('users.search') }}?keyword=${keyword}`)
            .then(response => response.json())
            .then(data => {
                userTableBody.innerHTML = ''; // Xóa dữ liệu cũ
                if (data.length > 0) {
                    data.forEach((user, index) => {
                        const row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.phone_number ?? 'N/A'}</td>
                                <td>
                                    <div class="sherah-table__product-content">
                                        <p class="sherah-table__product-desc">${'*'.repeat(8)}</p> <!-- Hiển thị mật khẩu dạng * -->
                                    </div>
                                </td>
                                <td>
<<<<<<< HEAD
                                    ${user.deleted_at ? 
=======
<<<<<<< HEAD
                                    ${user.deleted_at ?
=======
                                    ${user.deleted_at ?
>>>>>>> fcd3511a2c0b85b28434d95ad5d7586d96bca65b
>>>>>>> baf2883bd1fb91cee499d59f21426a126e886900
                                        `<a href="/users/restore/${user.id}" class="btn btn-success btn-sm">Restore</a>` :
                                        `<form action="/users/${user.id}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>`}
                                </td>
                            </tr>
                        `;
                        userTableBody.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    userTableBody.innerHTML = '<tr><td colspan="6">Không tìm thấy kết quả</td></tr>';
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Sự kiện tìm kiếm khi nhập vào ô input
    searchInput.addEventListener('input', function () {
        const keyword = searchInput.value;
        searchUsers(keyword);
    });

    // Sự kiện xóa tìm kiếm
    clearSearchButton.addEventListener('click', function () {
        searchInput.value = '';  // Xóa nội dung ô tìm kiếm
        searchUsers('');  // Gửi yêu cầu tìm kiếm với từ khóa rỗng để lấy danh sách đầy đủ người dùng
    });

    // Nếu có từ khóa tìm kiếm ban đầu, thực hiện tìm kiếm ngay khi trang tải xong
    if (searchInput.value.trim() !== '') {
        searchUsers(searchInput.value);
    }
});
</script>
@endsection
