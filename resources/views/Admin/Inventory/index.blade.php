@extends('Admin/layouts/master/header')
@extends('Admin/layouts/master/master')

@section('content')
<div class="w-full relative mb-4">
    <h1 class="text-2xl font-semibold">Quản Lý Tồn Kho</h1>

    <!-- Nút thêm bản ghi tồn kho -->
    <div class="mb-4">
        <a href="{{ route('inventory.create') }}" class="inline-flex items-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
            Thêm Bản Ghi Tồn Kho
        </a>
    </div>

    <!-- Form lọc theo ngày -->
    <form action="{{ route('inventory.index') }}" method="GET" class="mb-4">
        @csrf
        <div class="flex mb-4">
            <div class="mr-4">
                <label for="start_date" class="block text-sm font-medium">Ngày Bắt Đầu</label>
                <input type="date" id="start_date" name="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium">Ngày Kết Thúc</label>
                <input type="date" id="end_date" name="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div class="ml-4 flex items-end">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Lọc</button>
            </div>
        </div>
    </form>

    <!-- Bảng tồn kho -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">STT</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Sản phẩm</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Danh mục</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Tồn kho</th> <!-- Cột Tồn kho -->
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Thay đổi số lượng</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Ghi chú</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Thời gian</th>
                    <th class="py-2 px-4 border-b text-left text-sm font-medium text-gray-700">Hoạt động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventoryLogs as $index => $log)
                    <tr class="hover:bg-gray-100 border-b">
                        <td class="py-2 px-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 text-sm text-gray-500">
                            {{ $log->product->name }}
                        </td>
                        <td class="py-2 px-4 text-sm text-gray-500">
                            {{ $log->product->category ? $log->product->category->name : 'Không có danh mục' }}
                        </td>
                        <td class="py-2 px-4 text-sm text-gray-500">{{ $log->product->quantity }} sản phẩm</td> <!-- Hiển thị số lượng tồn kho -->
                        <td class="py-2 px-4 text-sm text-gray-500">{{ $log->quantity_change }}</td>
                        <td class="py-2 px-4 text-sm text-gray-500">{{ $log->note ?? 'Không có ghi chú' }}</td>
                        <td class="py-2 px-4 text-sm text-gray-500">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                        <td class="py-2 px-4 text-sm text-gray-500">
                            <a href="{{ route('inventory.edit', $log->id) }}" class="text-blue-600 hover:underline">Sửa</a>
                            <form action="{{ route('inventory.destroy', $log->id) }}" method="post" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này không?');">
                                    Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($inventoryLogs->isEmpty())
                    <tr>
                        <td colspan="8" class="py-2 px-4 text-center text-gray-500">Không có bản ghi tồn kho nào.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('Admin/layouts/master/footer')
