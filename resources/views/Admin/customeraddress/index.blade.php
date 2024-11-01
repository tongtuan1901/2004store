@extends('Admin/layouts/master/master')
@section('content')
    <div class="w-full relative mb-4">
        <div class="flex-auto p-0 md:p-4">
            <div class="flex flex-wrap gap-4 mb-3">
                <div class="ms-auto">
                    <form>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i data-lucide="search" class="z-[1] w-5 h-5 stroke-slate-400"></i>
                            </div>
                            <input type="search" id="productSearch"
                                class="form-input w-52 rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 pl-10 p-2.5"
                                placeholder="search">
                        </div>
                    </form>
                </div>
                <div>
                    {{-- <button
                        class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white  text-md font-medium py-2 px-4 rounded">
                        <a href="{{route('new.create')}}">Thêm tin tức</a>
                    </button> --}}
                </div>
            </div>


            <div id="myTabContent">
                <div class="active  p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
                    aria-labelledby="all-tab">
                    <div class="grid grid-cols-1 p-0 md:p-4">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-slate-700/20">
                                        <tr>
                                            <th scope="col" class="p-3">
                                                <label class="custom-label">
                                                    <div
                                                        class="bg-white dark:bg-slate-600/40 border border-slate-200 dark:border-slate-600 rounded w-5 h-5  inline-block  text-center -mb-[5px]">
                                                        <input type="checkbox" class="hidden">
                                                        <i
                                                            class="icofont-verification-check hidden text-ms text-brand-500 dark:text-slate-200 leading-5"></i>
                                                    </div>
                                                </label>
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                STT
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Address
                                            </th>
                                            <th scope="col"
                                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                Phone
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- 1 -->
                                        @foreach ($data as $item)
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                                <td class="w-4 p-4">
                                                    <label class="custom-label">
                                                        <div
                                                            class="bg-white dark:bg-slate-600/40 border border-slate-200 dark:border-slate-600 rounded w-5 h-5  inline-block  text-center -mb-[5px]">
                                                            <input type="checkbox" class="hidden">
                                                            <i
                                                                class="icofont-verification-check hidden text-ms text-brand-500 dark:text-slate-200 leading-5"></i>
                                                        </div>
                                                    </label>
                                                </td>
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        {{$item->id}}
                                                    </div>
                                                </td>
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        {{$item->name}}
                                                    </div>
                                                </td>
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        {{$item->address}}
                                                    </div>
                                                    {{-- <select id='provinces' onchange='getProvinces(event)'>
                                                        <option value=''>-- select provinces --</option>
                                                      </select>
                                                      <select id='districts' onchange='getDistricts(event)'>
                                                        <option value=''>-- select districts --</option>
                                                      </select>
                                                      <select id='wards'>
                                                        <option value=''>-- select wards --</option>
                                                      </select>
                                                      <script>
                                                        fetch('https://vn-public-apis.fpo.vn/provinces/getAll?limit=-1')
  .then(response => response.json())
  .then(data => {
    let provinces = data.data.data;
    provinces.map(value => document.getElementById('provinces').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
  })
  .catch(error => {
    console.error('Lỗi khi gọi API:', error);
  });

function fetchDistricts (provincesID) {
  fetch(`https://vn-public-apis.fpo.vn/districts/getByProvince?provinceCode=${provincesID}&limit=-1`)
    .then(response => response.json())
    .then(data => {
      let districts = data.data.data;
      document.getElementById('districts').innerHTML = `<option value=''>-- select districts --</option>`;
      if (districts !== undefined) {
        districts.map(value => document.getElementById('districts').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
      }
    })
    .catch(error => {
      console.error('Lỗi khi gọi API:', error);
    });
}

function fetchWards (districtsID) {
  fetch(`https://vn-public-apis.fpo.vn/wards/getByDistrict?districtCode=${districtsID}&limit=-1`)
    .then(response => response.json())
    .then(data => {
      let wards = data.data.data;
      document.getElementById('wards').innerHTML = `<option value=''>-- select wards --</option>`;
      if (wards !== undefined) {
        wards.map(value => document.getElementById('wards').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
      }
    })
    .catch(error => {
      console.error('Lỗi khi gọi API:', error);
    });
}

function getProvinces (event) {
  fetchDistricts(event.target.value);
  document.getElementById('wards').innerHTML = `<option value=''>-- select wards --</option>`;
}

function getDistricts (event) {
  fetchWards(event.target.value);
}
                                                      </script> --}}
                                                </td>
                                                <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        {{$item->phone}}
                                                    </div>
                                                </td>
                                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">

                                                    <a href="{{route('customeraddress.show',$item->id)}}">show</a>

                                                    {{-- <form action="{{route('customeraddress.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="confirm('Are you sure???')" type="submit"><i class="icofont-ui-delete text-lg text-red-500 dark:text-red-400">Xoá</i></button>
                                                    </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- 2 -->

                                    </tbody>
                                </table>
                            </div><!--end div-->
                        </div><!--end div-->
                    </div><!--end grid-->
                </div>
            </div>
        </div><!--end card-body-->
    </div><!--end card-->
    </div><!--end col-->
    </div> <!--e  qnd grid-->
@endsection