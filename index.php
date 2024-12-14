<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code tạo số dư ảo ACB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-6">
                <div class="card">
            <div class="card-body">
<div class="row">
    
    <div class="col-md-8">
        
             
                   <span class="d-block mb-1">
                       <span class="mdi mdi-check-circle-outline me-2 text-success"></span>Dùng đăng story sống ảo
                   </span>
                   <span class="d-block mb-1">
                       <span class="mdi mdi-check-circle-outline me-2 text-success"></span>Dùng tăng uy tín, seeding khi bán hàng
                   </span>
                   <span class="d-block mb-1">
                       <span class="mdi mdi-check-circle-outline me-2 text-success"></span>Chạy quảng cáo cho doanh nghiệp của bạn
                   </span>
                   <span class="d-block mb-1">
                       <span class="mdi mdi-check-circle-outline me-2 text-success"></span>Miễn phí không giới hạn lượt tạo
                   </span>
              
      
    </div>
    <div class="col-md-10">
       <?php 
       if(isset($_POST['name'])){
         
               $name = $_POST['name'];
           $balance = $_POST['balance'];
           $bank = $_POST['bank'];
           if($bank == 'ACB'){
              $filename = 'acb1.png';

// Tạo một ảnh mới từ tệp tin
$image = imagecreatefrompng($filename);

// Viết chữ lên ảnh
imagettftext($image, 35, 0, 235, 330, imagecolorallocate($image, 0,0,0), $_SERVER['DOCUMENT_ROOT'].'/fonts/Inter/Inter-Bold.ttf', strtoupper(substr($name, strrpos($name, ' ') + 1)));
imagettftext($image, 35, 0, 140, 585, imagecolorallocate($image, 0,112,255), $_SERVER['DOCUMENT_ROOT'].'/fonts/Inter/Inter-Bold.ttf', number_format($_POST['balance']).' VND');
imagettftext($image, 35, 0, 805, 585, imagecolorallocate($image, 0,112,255), $_SERVER['DOCUMENT_ROOT'].'/fonts/Inter/Inter-Bold.ttf', number_format($_POST['point']).' điểm');

$words = explode(' ', $name);

// Lấy chữ đầu tiên của từ đầu tiên
$firstWordFirstChar = substr($words[0], 0, 1);

// Lấy chữ đầu tiên của từ cuối cùng
$lastWordFirstChar = substr(end($words), 0, 1);

imagettftext($image, 35, 0, 100, 300, imagecolorallocate($image, 255,255,255), $_SERVER['DOCUMENT_ROOT'].'/fonts/Inter/Inter-Medium.ttf', $firstWordFirstChar.$lastWordFirstChar);
// Tạo một biến tạm để lưu ảnh
$tempImage = 'acb1.png';

// Lưu ảnh xuống tệp tin mới
imagepng($image, $tempImage);

// Đọc nội dung của ảnh
$imgData = file_get_contents($tempImage);

// Chuyển đổi thành dạng base64
$imgBase64 = base64_encode($imgData);

// Định dạng dữ liệu base64 cho thẻ <img> trong HTML
$imgBase64Data = 'data:image/png;base64,' . $imgBase64;

// Hiển thị ảnh trong thẻ <img>
echo '<img class="w-100" src="' . $imgBase64Data . '" alt="acb1_with_text">';

// Giải phóng bộ nhớ
imagedestroy($image);

          }
           
       }
       ?>
       
               <form action="" method="POST">
                    <div class="mb-3">
                    <label class="mb-1">Họ và tên</label>
                    <input class="form-control" name="name" required/>
                </div>
                  <div class="mb-3">
                    <label class="mb-1">Số dư tài khoản</label>
                    <input class="form-control" name="balance" required/>
                </div>
                   <div class="mb-3">
                    <label class="mb-1">Điểm reward (tùy chọn)</label>
                    <input class="form-control" value="0" name="point" required/>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="bank">
                        <option value="ACB">Ngân hàng ACB</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Tạo ảnh (miễn phí)</button>
               </form>
            </div>
        </div>
    </div>
</div>
           </div>
       </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>