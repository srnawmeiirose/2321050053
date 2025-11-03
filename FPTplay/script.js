let dsPhim = [
  {
    id: 1,
    tenPhim: "Mưa đỏ",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Việt Nam",
    poster: "img/muado.jpg",
    theLoai: "Phim chiếu rạp",
  },
  {
    id: 2,
    tenPhim: "Beauty and the Beast",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Việt Nam",
    poster: "img/ndvqv.jpg",
    theLoai: "Phim chiếu rạp",
  },
];

let phimHienTai = dsPhim[0];
let banner = document.getElementsByClassName("bn")[0];

function chonPhim(idPhim) {
  for (let i = 0; i < dsPhim.length; i++) {
    if (dsPhim[i].id == idPhim) {
      banner.src = dsPhim[i].poster;
      phimHienTai = dsPhim[i];
      break;
    }
  }

  //thêm trailer nhảy sang youtube, hoàn thiện hết tất cả, nhiều phi, phim l nào cũng ấy hết
}
