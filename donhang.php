<?php
  include 'inc/header.php';
  include 'inc/slider.php';
?>

 

  <div class="container">

    <p>
    <h1 style=" color: #ed4190; text-align: center;">CHI TIẾT ĐƠN HÀNG
      <div style="display: flex; " class="text-h1"></div>
    </h1>
    <table id="cartDetail">
      <thead>
        <tr>
          <th>Hình sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Gía</th>
          <th>Thành tiền</th>
          <th> </th>
        </tr>
      </thead>
      <tbody id="tbody">

      </tbody>

      <tfoot>
        <tr>
          <td colspan="6">
            Tổng thành tiền (A) = <span id="money-item">0</span> đ
          </td>
        </tr>
        <tr>
          <td colspan="6">
            Chiếc khấu (B) = 0.1 x A = <span id="money-ck">0</span> đ
          </td>
        </tr>
        <tr>
          <td colspan="6">
            Thuế (C) = 10% x (A - B) = <span id="money-tax"></span> đ
          </td>
        </tr>
        <tr>
          <td colspan="6">
            Tổng đơn hàng = A - B + C = <span id="money-dh"></span> đ
          </td>
        </tr>

        <tr>
          <td style="text-align: center;" colspan="6">
            <button>Xác nhận đơn hàng</button>
          </td>
        </tr>
      </tfoot>
    </table>
    </p>
  </div>


  
<?php
  include 'inc/footer.php';
  
?>

