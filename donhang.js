function click_cart(){
    window.location.href = "donhang.html";
}

var itemList={
    "sp001":{ "name":"Sữa Chua Vị Kiwi", 
    "price":21000, 
    "photo":"images/cat-1.jpg"}, 
    "sp002":{ "name":"Sữa Chua Vị Xoài", 
    "price":22000, 
    "photo":"images/sanpham/mango.jpg"}, 
    "sp003":{ "name":"Sữa Chua Vị Dưa lưới", 
    "price":23000, 
    "photo":"images/sanpham/cantaloupe.jpg"}, 
    "sp004":{ "name":"Sữa Chua Vị Mâm Xôi", 
    "price":24000, 
    "photo":"images/sanpham/blackberry.jpg"}, 
    "sp005":{ "name":"Sữa Chua Vị Dâu Tây", 
    "price":25000, 
    "photo":"images/sanpham/strawberry.jpg"}, 
    "sp006":{ "name":"Sữa Chua Vị Việt Quất", 
    "price":26000, 
    "photo":"images/sanpham/blueberry.jpg"}, 
    "sp007":{ "name":"Sữa Chua Vị Bưởi", 
    "price":27000, 
    "photo":"images/sanpham/grapes.jpg"}, 
    "sp008":{ "name":"Sữa Chua Vị Táo Xanh", 
    "price":28000, 
    "photo":"images/sanpham/green-apple.jpg"}, 
    "sp009":{ "name":"Sữa Chua Vị Dứa", 
    "price":29000, 
    "photo":"images/sanpham/pineapple.jpg"} 
    };
    
    function addCart(code){
        var number = parseInt(document.getElementById(code).value) ;
        //san pham chau co trong don hang
    if(typeof localStorage[code] === "undefined"){
        window.localStorage.setItem(code,number);
        if (number > 0)
            alert('Đã thêm  '+ number + ' sản phẩm ' + itemList[code].name+ ' vào đơn hàng.');
        }
    else {
          var  current=parseInt(window.localStorage.getItem(code));
          // neu 100 thi set = 100
          if ( current + number >100) {
                window.localStorage.setItem(code,100) ;
                alert('so luong hang hoa toi da 100');
          }
          else {
              window.localStorage.setItem(code,current+number);
              if( number > 0)
              alert('Đã thêm  '+ number + ' sản phẩm ' + itemList[code].name+ ' vào đơn hàng.');
          }
        }
        
        
        
    
    // number=parseInt(document.getElementById(code).value);
    
}

function showCart() {
        //Tổng Trước Thuế
        var TotalPreTax = 0 ;
        for ( var key in window.localStorage) {
            if (key == 'length' ) break ;

            
            
           var item = itemList[key] ; //Thông tin sản phẩm
           var photo = item.photo ;//Hình sản phẩm
           var name = item.name ;//Tên
           var price = parseInt(item.price)  ;//Giá 
           var orderNumber= parseInt(localStorage.getItem(key));  //Số lượng đặt hàng
           if (orderNumber<1) break;
            // số lượng đặt hàng
            // var number = localStorage.getItem(number);
            // tạo các cột ô dữ liệu
            var tr = document.createElement("tr");
            
            // o hinh san pham
            var tdImage = document.createElement("td");
            tdImage.innerHTML = "<img src='"+ photo +"' class='round-figure' width='100px'/>";
            tr.appendChild(tdImage);
            tdImage.style.textAlign = "center" ;

            //ô tên sản phẩm
            var tdName = document.createElement("td");
            tdName.innerHTML = name;
            tdName.style.textAlign = "center";
            tr.appendChild(tdName);

            //ô số lượng
            var tdOrder = document.createElement("td");
            tdOrder.innerHTML = orderNumber;
            tr.appendChild(tdOrder);
            tdOrder.style.textAlign = "center" ;
            // ô giá tiền
            var tdPrice =document.createElement("td");
            tdPrice.innerHTML = price;
            tr.appendChild(tdPrice);
            tdPrice.style.textAlign = "right";

            //ô thành tiền
            var tdMoney =document.createElement("td");
            tdMoney.innerHTML =  orderNumber * price;
            tr.appendChild(tdMoney);
            tdMoney.style.textAlign = "right";
           
            // ô xóa
            var a = document.createElement("a");
            a.href = '#' ;
            a.innerHTML = "<i class='fa fa-trash icon-pink'></i>" ;
            a.style.background = "#cddc39" ;
            a.style.color = "#ed4190" ;
            a.style.padding = "4px" ;
            a.dataset.code = key;
            a.onclick = function () {
                removeCart(this.dataset.code);
            };
            var tdRemove =document.createElement("td");
            tdRemove.appendChild(a);
            tdRemove.style.textAlign = "center" ;
            tr.appendChild(tdRemove);
            
            
            var tbody = document.getElementById('tbody');
            tbody.appendChild(tr);
            TotalPreTax = TotalPreTax +(price * orderNumber);
            
        }
        
        

    document.getElementById("money-item").innerHTML = TotalPreTax;
    var discount = TotalPreTax*getDiscountRate();
    document.getElementById("money-ck").innerHTML = discount;
    var  tax = 0.1 * (TotalPreTax - discount);
    document.getElementById("money-tax").innerHTML = tax;
        var totalMoney = TotalPreTax - discount + tax ;
        document.getElementById("money-dh").innerHTML = totalMoney;
        
      
}
function getDiscountRate(){
    var d=new Date();//lấy ngày hiện tại của máy tính 
    var weekday=d.getDay();//lấy ngày trong tuần 
    var totalMins=d.getHours()*60+d.getMinutes();//đổi thời gian hiện tại ra số phút tương đối trong ngày 
    if(weekday>=1&&weekday<=3&&((totalMins>=420&&totalMins<=660)||(totalMins>=780&&totalMins<=1020)))
    return 0.1;
    return 0;
}





    function removeCart(key) { 
        if(typeof window.localStorage[key] !== "undefined")
         {
         //xóa sản phẩm khỏi localStorage 
         window.localStorage.removeItem(key);
         //Xóa nội dung của phần thân của bảng (<tbody>)
        document.getElementById("cartDetail").getElementsByTagName('tbody')[0].innerHTML="";
         //Hiển thị lại nội dung chi tiết của đơn hàng 
         showCart();
         } 
         }

         
        
    
        window.onload = function() {
            showCart();
        }

        window.onstorage = () => {
                showCart();
                }
