let dsPhim = [
  {
    id: 1,
    tenPhim: "Beauty and the Beast",
    namPhatHanh: 2017,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Anh Quốc",
    poster: "img/ndvqv.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=pnkgw6pAKkM",
  },
  {
    id: 2,
    tenPhim: "Cinderella",
    namPhatHanh: 2015,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Mỹ",
    poster: "img/cinderella-banner.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=LfR8Su4ulX0",
  },
  {
    id: 3,
    tenPhim: "Mulan",
    namPhatHanh: 2020,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Mỹ",
    poster: "img/mulan-banner.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=KK8FHdFluOQ",
  },
  {
    id: 4,
    tenPhim: "Snow White",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Mỹ",
    poster: "img/sn-banner.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=iV46TJKL8cU",
  },
  {
    id: 5,
    tenPhim: "The little mermaid",
    namPhatHanh: 2023,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Mỹ",
    poster: "img/ariel-banner.jpeg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=0-wPm99PF9U",
  },
  {
    id: 6,
    tenPhim: "Mưa đỏ",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Việt Nam",
    poster: "img/banner2.jpeg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=BD6PoZJdt_M&t=3s",
  },
  {
    id: 7,
    tenPhim: "Bố già",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Việt Nam",
    poster: "img/bogia.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=jluSu8Rw6YE",
  },
  {
    id: 8,
    tenPhim: "Inside out 2",
    namPhatHanh: 2024,
    tuoi: 10,
    thoiLuong: 2,
    quocGia: "Mỹ",
    poster: "img/phim-inside-out-2-thumb.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=LEjhY15eCx0",
  },
  {
    id: 9,
    tenPhim: "AVATAR 3",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 3,
    quocGia: "Mỹ",
    poster: "img/avatar3.jpeg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=nb_fFj_0rq8",
  },
  {
    id: 10,
    tenPhim: "DORAEMON: NOBITA VÀ CUỘC PHIÊU LƯU VÀO THẾ GIỚI TRONG TRANH",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong: 2,
    quocGia: "Nhật Bản",
    poster: "img/doramon-1747738160-1747738183-2577-6717-1747739217.jpg",
    theLoai: "Phim chiếu rạp",
    tl: "https://www.youtube.com/watch?v=pyAKQBucymk",
  },
];

let phimHienTai = dsPhim[0];
let banner = document.getElementsByClassName("bn")[0];

let nam = document.getElementsByClassName("nam")[0];
let tuoi = document.getElementsByClassName("tuoi")[0];
let thoiLuong = document.getElementsByClassName("thoi-luong")[0];
let quocGia = document.getElementsByClassName("quoc-gia")[0];
let tl = document.getElementsByClassName("tl")[0];
function chonPhim(idPhim) {
  for (let i = 0; i < dsPhim.length; i++) {
    if (dsPhim[i].id == idPhim) {
      debugger;
      banner.src = dsPhim[i].poster;
      phimHienTai = dsPhim[i];
      nam.innerHTML = "Năm phát hành: " + dsPhim[i].namPhatHanh;
      tuoi.innerHTML = "T" + dsPhim[i].tuoi;
      thoiLuong.innerHTML = "Thời lượng: " + dsPhim[i].thoiLuong + "giờ";
      quocGia.innerHTML = "Quốc gia: " + dsPhim[i].quocGia;
      tl.href = dsPhim[i].tl;
      break;
    }
  }
}
