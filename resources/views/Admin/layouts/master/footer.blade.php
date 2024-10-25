
<!-- <div class="absolute bottom-0 -left-4 -right-4 block print:hidden border-t p-4 h-[52px] dark:border-slate-700/40">
    <div class="container"> -->
      <!-- Footer Start -->

      <footer
        class="footer bg-transparent  text-center  font-medium text-slate-600 dark:text-slate-400 md:text-left "
      >
      </footer>
      <!-- end Footer -->
    </div>
  </div>





</div><!--end container-->
</div>
</div>

<!-- JAVASCRIPTS -->
<!-- <div class="menu-overlay"></div> -->

<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/vendor/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/chart.js/Chart.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/vendor/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/vendor/js/demo/chart-pie-demo.js') }}"></script>


<script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/%40frostui/tailwindcss/frostui.js') }}"></script>

<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/analytics-index.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
{{-- chart --}}
<script>
  
      const products = ['1','2','3'];
  const soLuong = [];
  const thanhTien = [];

  // Vòng lặp để lấy giá trị từ 'dashboard'
  $.each(dashboard, function(key, value) {
      products.push(value.products);
      soLuong.push(value.soLuong);
      thanhTien.push(value.thanhTien);
  });

  // Kết quả đầu ra dưới dạng ['data','data','data'] cho mỗi array
  console.log(products); // Ví dụ: ['data1', 'data2', 'data3']
  console.log(soLuong); // Ví dụ: ['data1', 'data2', 'data3']
  console.log(thanhTien); // Ví dụ: ['data1', 'data2', 'data3']
  const xValues = ["Italy", "France"];
  const yValues = [55, 49, 44, 24, 15];
  const barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
  ];

  new Chart("hihi", {
      type: "doughnut",
      data: {
          labels: products,
          datasets: [{
              backgroundColor: barColors,
              data: thanhTien
          }]
      },
      options: {
          title: {
              display: true,
              text: "Thống kê đơn hàng"
          }
      }
  });
</script>

</body>

<!-- Mirrored from mannatthemes.com/robotech/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 15:34:22 GMT -->

</html>
