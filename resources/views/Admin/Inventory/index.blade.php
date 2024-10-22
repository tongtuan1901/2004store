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

    <div id="myTabContent">
        <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="grid grid-cols-1 p-0 md:p-4">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-slate-700/20">
                                <tr>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">STT</th>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Sản phẩm</th>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Danh mục</th>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Thay đổi số lượng</th>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Ghi chú</th>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Thời gian</th>
                                    <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventoryLogs as $index => $log)
                                    <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $log->product->name }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $log->product->category ? $log->product->category->name : 'Không có danh mục' }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $log->quantity_change }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $log->note ?? 'Không có ghi chú' }}
                                        </td>
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $log->created_at->format('d/m/Y H:i:s') }} <!-- Hiển thị thời gian -->
                                        </td>
                                        <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            <a href="{{ route('inventory.edit', $log->id) }}" class="text-lg text-gray-500 dark:text-gray-400">Sửa</a>
                                            <form action="{{ route('inventory.destroy', $log->id) }}" method="post" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-lg text-red-500 dark:text-red-400" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này không?');">
                                                    Xoá
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($inventoryLogs->isEmpty())
                                    <tr>
                                        <td colspan="7" class="p-3 text-center text-gray-500">Không có bản ghi tồn kho nào.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('Admin/layouts/master/footer')
