@extends('Customer.layouts.master.master')

@section('content')
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
    <div class="w-full relative mb-4">
        <div class="flex-auto p-0 md:p-4">
            <div class="flex flex-wrap gap-4 mb-3">
                <div class="mb-2 w-44">
                    <select id="Category"
                        class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700">
                        <option class="dark:text-slate-700">Tất cả danh mục</option>
                        <option class="dark:text-slate-700">Admin</option>
                        <option class="dark:text-slate-700">User</option>
                    </select>
                </div>
                <div class="ms-auto">
                    <form>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i data-lucide="search" class="z-[1] w-5 h-5 stroke-slate-400"></i>
                            </div>
                            <input type="search" id="userSearch"
                                class="form-input w-52 rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700 pl-10 p-2.5"
                                placeholder="Search users">
                        </div>
                    </form>
                </div>
                <div>
                    <button
                        class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white  text-md font-medium py-2 px-4 rounded">
                        <a href="{{ route('users.create') }}"> Thêm người dùng</a>
                    </button>
                </div>
            </div>

            <div id="myTabContent">
                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
                    aria-labelledby="all-tab">
                    <div class="grid grid-cols-1 p-0 md:p-4">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-slate-700/20">
                                        <tr>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                STT
                                            </th>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Họ và tên
                                            </th>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Email
                                            </th>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Số điện thoại
                                            </th>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Role
                                            </th>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Mật Khẩu
                                            </th>
                                            <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Hoạt động
                                            </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
    @foreach ($users as $k => $user)
        <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
            <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                {{ ++$k }}
            </td>
            <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                <div class="flex items-center">
                    <div class="self-center">
                        <h5 class="text-sm font-semibold text-slate-700 dark:text-gray-400">
                            {{ $user->name }}
                        </h5>   
                    </div>
                </div>
            </td>
            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                {{ $user->email }}
            </td>
            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                {{ $user->phone_number ?? 'N/A' }}
            </td>
            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                {{ $user->role }} <!-- Hiển thị vai trò -->
            </td>
            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                {{ $user->password }} <!-- Hiển thị mật khẩu đã mã hóa -->
            </td>
            <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                @if($user->trashed())
                    <a href="{{ route('users.restore', $user->id) }}" class="btn btn-success btn-sm">Restore</a>
                @else
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
