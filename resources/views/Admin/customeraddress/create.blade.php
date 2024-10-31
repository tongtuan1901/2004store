<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tạo địa chỉ</h1>
    <form action="{{ route('customeraddress.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" name="name" class="form-control">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- <div class="row">
            <label for="" class="form-label">Địa chỉ</label>
            <input type="text" name="address" class="form-control" placeholder="Số nhà, tên đường...">
            <select id="provinces" name="province" class="form-control" onchange="getProvinces(event)">
                <option value="">-- Chọn tỉnh --</option>
            </select>
            <select id="districts" name="district" class="form-control" onchange="getDistricts(event)">
                <option value="">-- Chọn quận/huyện --</option>
            </select>
            <select id="wards" name="ward" class="form-control">
                <option value="">-- Chọn phường/xã --</option>
            </select>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}
        <div class="row">
            <label for="" class="form-label">Địa chỉ</label>
            <input type="text" name="address" class="form-control" placeholder="Số nhà, tên đường...">
        
            <!-- Select cho tỉnh -->
            <select id="provinces" name="province" class="form-control" onchange="getProvinces(event)">
                <option value="">-- Chọn tỉnh --</option>
            </select>
        
            <!-- Select cho quận/huyện -->
            <select id="districts" name="district" class="form-control" onchange="getDistricts(event)">
                <option value="">-- Chọn quận/huyện --</option>
            </select>
        
            <!-- Select cho phường/xã -->
            <select id="wards" name="ward" class="form-control">
                <option value="">-- Chọn phường/xã --</option>
            </select>
        
            <!-- Các trường ẩn để lưu tên của tỉnh, quận/huyện và phường/xã -->
            <input type="hidden" name="province_name" id="province_name">
            <input type="hidden" name="district_name" id="district_name">
            <input type="hidden" name="ward_name" id="ward_name">
        </div>
        
        <div class="row">
            <label for="" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>

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

        function fetchDistricts(provinceID) {
            fetch(`https://vn-public-apis.fpo.vn/districts/getByProvince?provinceCode=${provinceID}&limit=-1`)
                .then(response => response.json())
                .then(data => {
                    let districts = data.data.data;
                    document.getElementById('districts').innerHTML = `<option value=''>-- Chọn quận/huyện --</option>`;
                    if (districts !== undefined) {
                        districts.map(value => document.getElementById('districts').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi gọi API:', error);
                });
        }

        function fetchWards(districtID) {
            fetch(`https://vn-public-apis.fpo.vn/wards/getByDistrict?districtCode=${districtID}&limit=-1`)
                .then(response => response.json())
                .then(data => {
                    let wards = data.data.data;
                    document.getElementById('wards').innerHTML = `<option value=''>-- Chọn phường/xã --</option>`;
                    if (wards !== undefined) {
                        wards.map(value => document.getElementById('wards').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi gọi API:', error);
                });
        }

        function getProvinces(event) {
    const provinceID = event.target.value;
    const provinceName = event.target.options[event.target.selectedIndex].text;
    document.getElementById('province_name').value = provinceName; // Lưu tên tỉnh

    // Reset các trường chọn tiếp theo
    fetchDistricts(provinceID);
    document.getElementById('wards').innerHTML = `<option value=''>-- Chọn phường/xã --</option>`;
    document.getElementById('district_name').value = ''; // Xóa tên quận/huyện khi thay đổi tỉnh
    document.getElementById('ward_name').value = ''; // Xóa tên phường/xã khi thay đổi tỉnh
}

function getDistricts(event) {
    const districtID = event.target.value;
    const districtName = event.target.options[event.target.selectedIndex].text;
    document.getElementById('district_name').value = districtName; // Lưu tên quận/huyện

    fetchWards(districtID);
    document.getElementById('ward_name').value = ''; // Xóa tên phường/xã khi thay đổi quận/huyện
}

document.getElementById('wards').addEventListener('change', function(event) {
    const wardName = event.target.options[event.target.selectedIndex].text;
    document.getElementById('ward_name').value = wardName; // Lưu tên phường/xã
});

    </script>
</body>
</html>
