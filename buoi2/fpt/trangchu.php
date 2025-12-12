<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FPT play</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="shortcut icon"
      href="https://fptplay.vn/favicon.ico"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
<body>
  <!-- MAIN -->
    <main>
      <div class="main-left"></div>
      <!-- MAIN-CENTER -->
      <div class="main-center">
        <div class="banner-QC">
          <div>
            <div class="QC">
              <img src="img/QC.png" alt="" />
            </div>
            <div class="banner">
              <div class="danhsach-tt">
                <div class="tt">
                  <ul>
                    <li class="nam">Năm phát hành: 2025</li>
                    <li class="tuoi">Tuổi: T16</li>
                    <li class="thoi-luong">Thời lượng: 2 giờ</li>
                    <li class="quoc-gia">Quốc gia: Việt Nam</li>
                  </ul>
                </div>
                <div style="display: flex; align-items: center; gap: 3px">
                  <button class="xemngay">
                    <i class="fa fa-play"></i>Xem ngay
                  </button>
                  <button class="trailer">
                    <a
                      class="tl"
                      href="https://www.youtube.com/watch?v=BD6PoZJdt_M"
                      >Trailer</a
                    >
                  </button>
                </div>
              </div>
              <div class="anh-bn">
                <img class="bn" src="img/banner2.jpeg" alt="" />
              </div>
            </div>
            <div class="QC">
              <img src="img/qc.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="list">
          <?php 
      include ("../admin/connect.php");
      $sql = "SELECT * FROM the_loai";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){
        $theLoaiId = $row['id'];
$sql2 = "SELECT p.* FROM phim p 
           WHERE p.the_loai_id = $theLoaiId 
           ORDER BY id DESC 
           LIMIT 5";
  $result2 = mysqli_query($conn, $sql2);

  if(mysqli_num_rows($result2)== 0){
    continue;

  }
        ?>
            <div class="the_loai">
<div class="tentheloai" style="font-size: 32px; font-weight: 700;margin: 25px 0 15px;padding-left: 14px;text-transform: uppercase;" >
  <?php echo $row["ten_the_loai"]; ?>
</div>
<div class="film-container">
<?php
  
  while($phim = mysqli_fetch_array($result2)){
?>
  <div onclick="chonPhim(1)" class="film">
  <div class="film-poster">
    <img src="../admin/<?php echo $phim['poster']; ?>">
  </div>
  <p><?php echo $phim["ten_phim"]; ?></p>
</div>

<?php } ?>
</div>
            </div>
            <?php 

            }
          ?>
        </div>
      </div>
      <div class="main-right"></div>
    </main>
</body>
</html>