document.getElementById('quantity_1').addEventListener('change', function(e) {
    var quantity = e.target.value;
    var product_id = document.getElementById('product_id').value;
    var color = document.getElementById('color').value;
    var size = document.getElementById('size').value;

    // Tạo một đối tượng XMLHttpRequest
    var xhttp = new XMLHttpRequest();

    // Thiết lập hàm xử lý khi yêu cầu hoàn tất
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Xử lý kết quả trả về từ server
            var response = JSON.parse(this.responseText);
            if(response.status == 'error') {
                alert(response.message);
                document.getElementById('quantity_1').value = response.quantity;
            }
        }
    };

    // Mở yêu cầu
    xhttp.open("POST", "index.php?act=ct_sanpham", true);

    // Thiết lập header cho yêu cầu POST
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Gửi yêu cầu
    xhttp.send("product_id=" + product_id + "&quantity=" + quantity + "&color=" + color + "&size=" + size);
});
