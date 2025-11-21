CREATE DATABASE IF NOT EXISTS quan_ly_web_xem_phim;
USE quan_ly_web_xem_phim;

CREATE TABLE IF NOT EXISTS the_loai(
    id int PRIMARY KEY,
    ten_the_loai varchar(50)
    );
    
CREATE TABLE IF NOT EXISTS vai_tro(
    id int PRIMARY KEY,
	ten_vai_tro varchar(20)
    );
    
CREATE TABLE IF NOT EXISTS nguoi_dung(
    id int PRIMARY KEY,
    ten_dang_nhap varchar(50),
    mat_khau varchar(50),
    ho_ten varchar(50),
	email varchar(50),
	sdt varchar(10),
	vai_tro_id int ,
	ngay_sinh datetime,
    FOREIGN KEY (vai_tro_id) REFERENCES vai_tro(id)
    );
    
CREATE TABLE IF NOT EXISTS phim_dien_vien(
	id int PRIMARY KEY,
	phim_id int,
	dien_vien_id int
    );
CREATE TABLE IF NOT EXISTS quoc_gia(
    id int PRIMARY KEY,
	ten_quoc_gia varchar(25)
    );
    
CREATE TABLE IF NOT EXISTS phim(
    id int primary key,
	ten_phim varchar(100),
	dao_dien_id int,
    dien_vien_id int,
	nam_phat_hanh int,
	poster varchar(200),
	quoc_gia_id int,
	so_tap int,
	trailer varchar(200),
	mo_ta text,
    FOREIGN KEY (quoc_gia_id) REFERENCES quoc_gia(id),
    FOREIGN KEY (dien_vien_id) REFERENCES phim_dien_vien(id)
    );

CREATE TABLE IF NOT EXISTS phim_the_loai(
    id int,
	phim_id int,
	the_loai_id int,
    FOREIGN KEY (the_loai_id) REFERENCES the_loai(id),
    FOREIGN KEY (phim_id) REFERENCES phim(id)
    );

CREATE TABLE IF NOT EXISTS tap_phim(
    id int,
	so_tap int,
	tieu_de varchar(200),
	phim_id int,
	thoi_luong float, 
	trailer varchar(200),
    FOREIGN KEY (phim_id) REFERENCES phim(id)
    );



-- chèn dữ liệu
INSERT IGNORE INTO the_loai(id, ten_the_loai) VALUES
(1, "anime"),
(2, "ngôn tình"),
(3, "kinh dị"),
(4, "hài hước"),
(5, "hành động"),
(6, "phiêu lưu"),
(7, "tâm lý"),
(8, "viễn tưởng"),
(9, "lãng mạn"),
(10, "gia đình"),
(11, "hình sự"),
(12, "bí ẩn"),
(13, "tài liệu"),
(14, "chiến tranh"),
(15, "âm nhạc"),
(16, "thể thao"),
(17, "khoa học"),
(18, "trinh thám"),
(19, "siêu nhiên"),
(20, "ma cà rồng"),
(21, "thảm họa"),
(22, "cổ trang"),
(23, "lịch sử"),
(24, "phiêu lưu kỳ ảo"),
(25, "gia trưởng"),
(26, "võ thuật"),
(27, "học đường"),
(28, "siêu anh hùng"),
(29, "điện ảnh độc lập"),
(30, "điều tra tội phạm");

INSERT IGNORE INTO vai_tro(id, ten_vai_tro) VALUES (1, "admin"), (2, "user")

INSERT IGNORE INTO nguoi_dung
(id, ten_dang_nhap, mat_khau, ho_ten, email, sdt, vai_tro_id, ngay_sinh)
VALUES
(1, 'tam_01', 'pass123', 'Nguyễn Thị Thanh Tâm', 'tam1201@gmail.com', '0966030056', 1, '2005-01-12'),
(2, 'haianh_02', 'pass123', 'Trần Vũ Hải Anh', 'hanhhhh02@gmail.com', '0966000002', 2, '2005-04-26'),
(3, 'vtc_03', 'pass123', 'Vũ Thanh Cương', 'cuong03@gmail.com', '0966000003', 1, '2005-01-26'),
(4, 'phtrang_04', 'pass123', 'Phạm Huyền Trang', 'sangsang04@gmail.com', '0966000004', 1, '2005-07-09'),
(5, 'dhang_05', 'pass123', 'Đặng Thị Thúy Hằng', 'hangpng05@gmail.com', '0966000005', 2, '2001-09-01'),
(6, 'nal_06', 'pass123', 'Nguyễn Lê Thu Ngân', 'nal06@gmail.com', '0966000006', 1, '2004-03-17'),
(7, 'quyn_07', 'pass123', 'Nguyễn Thị Như Quỳnh', 'nhuquynh07@gmail.com', '0966000007', 1, '2000-08-25'),
(8, 'thanhphong_08', 'pass123', 'Phan Thanh Phong', 'phong08@gmail.com', '0966000008', 2, '2003-10-10'),
(9, 'nhuhuynh_09', 'pass123', 'Huỳnh Như', 'nhuhuynh09@gmail.com', '0966000009', 1, '2005-12-02'),
(10, 'thuytien_10', 'pass123', 'Võ Thủy Tiên', 'thuytien10@gmail.com', '0966000010', 1, '2004-06-21'),
(11, 'trungkien_11', 'pass123', 'Hà Trung Kiên', 'kien11@gmail.com', '0966000011', 2, '2002-04-04'),
(12, 'ngoctram_12', 'pass123', 'Nguyễn Ngọc Trâm', 'ngoctram12@gmail.com', '0966000012', 1, '2001-01-30'),
(13, 'hoanglong_13', 'pass123', 'Trịnh Hoàng Long', 'hoanglong13@gmail.com', '0966000013', 1, '2003-07-07'),
(14, 'mydung_14', 'pass123', 'Đinh Mỹ Dung', 'mydung14@gmail.com', '0966000014', 2, '2005-04-28'),
(15, 'giahan_15', 'pass123', 'Lâm Gia Hân', 'giahan15@gmail.com', '0966000015', 1, '2004-02-15'),
(16, 'huynhphuc_16', 'pass123', 'Huỳnh Quốc Phúc', 'phuc16@gmail.com', '0966000016', 1, '2000-12-18'),
(17, 'khanhvy_17', 'pass123', 'Vũ Khánh Vy', 'khanhvy17@gmail.com', '0966000017', 2, '2003-03-11'),
(18, 'thienbao_18', 'pass123', 'Đỗ Thiên Bảo', 'thienbao18@gmail.com', '0966000018', 1, '2002-09-29'),
(19, 'haianh_19', 'pass123', 'Hoàng Hải Anh', 'haianh19@gmail.com', '0966000019', 1, '2005-05-25'),
(20, 'nhatlam_20', 'pass123', 'Phạm Nhật Lâm', 'nhatlam20@gmail.com', '0966000020', 2, '2001-08-08'),
(21, 'tuongvi_21', 'pass123', 'Trần Tường Vi', 'tuongvi21@gmail.com', '0966000021', 1, '2004-02-22'),
(22, 'quynhchi_22', 'pass123', 'Nguyễn Quỳnh Chi', 'quynhchi22@gmail.com', '0965000022', 1, '2005-09-16'),
(23, 'dangkhoa_23', 'pass123', 'Võ Đăng Khoa', 'khoa23@gmail.com', '0966000023', 2, '2003-11-19'),
(24, 'lethanh_24', 'pass123', 'Lê Thành', 'lethanh24@gmail.com', '0966000024', 1, '2002-04-12'),
(25, 'tramy_25', 'pass123', 'Phan Trà My', 'tramy25@gmail.com', '0966000025', 1, '2004-01-03'),
(26, 'huymanh_26', 'pass123', 'Đặng Huy Mạnh', 'huymanh26@gmail.com', '0966000026', 1, '2000-10-20'),
(27, 'thutrang_27', 'pass123', 'Hoàng Thu Trang', 'thutrang27@gmail.com', '0966000027', 2, '2001-12-23'),
(28, 'quangvinh_28', 'pass123', 'Lý Quang Vinh', 'vinh28@gmail.com', '0966000028', 1, '2003-06-14'),
(29, 'thienngan_29', 'pass123', 'Ngô Thiên Ngân', 'thienngan29@gmail.com', '0966000029', 1, '2005-08-05'),
(30, 'thanhdat_30', 'pass123', 'Bùi Thành Đạt', 'thanhdat30@gmail.com', '0966000030', 2, '2002-03-09');


INSERT IGNORE INTO phim_dien_vien(id, phim_id, dien_vien_id) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15),
(16, 6, 16),
(17, 6, 17),
(18, 6, 18),
(19, 7, 19),
(20, 7, 20),
(21, 8, 1),
(22, 8, 3),
(23, 8, 5),
(24, 9, 7),
(25, 9, 9),
(26, 9, 11),
(27, 10, 13),
(28, 10, 15),
(29, 10, 17),
(30, 10, 19);

INSERT IGNORE INTO quoc_gia(id, ten_quoc_gia) VALUES
(1, 'Việt Nam'),
(2, 'Hoa Kỳ'),
(3, 'Hàn Quốc'),
(4, 'Nhật Bản'),
(5, 'Trung Quốc'),
(6, 'Thái Lan'),
(7, 'Singapore'),
(8, 'Malaysia'),
(9, 'Philippines'),
(10, 'Indonesia'),
(11, 'Ấn Độ'),
(12, 'Anh'),
(13, 'Pháp'),
(14, 'Đức'),
(15, 'Ý'),
(16, 'Tây Ban Nha'),
(17, 'Bồ Đào Nha'),
(18, 'Canada'),
(19, 'Úc'),
(20, 'New Zealand'),
(21, 'Nga'),
(22, 'Thổ Nhĩ Kỳ'),
(23, 'Brazil'),
(24, 'Argentina'),
(25, 'Mexico'),
(26, 'Nam Phi'),
(27, 'Ai Cập'),
(28, 'Ả Rập Saudi'),
(29, 'UAE'),
(30, 'Qatar');

INSERT IGNORE INTO phim
(id, ten_phim, dao_dien_id, dien_vien_id, nam_phat_hanh, poster, quoc_gia_id, so_tap, trailer, mo_ta)
VALUES
(1, 'Beauty and the Beast', 1, 1, 2017, 'poster1.jpg', 2, 1, 'trailer1.mp4', 'Cô gái yêu con quái vật xong nó biến tành hoàng tử, do nó bị nguyền rủa.'),
(2, 'The Little Mermaid', 1, 2, 2023, 'poster2.jpg', 2, 1, 'trailer2.mp4', 'Nàng tiên cá nhiễm phóng xạ trôi dạt vào bờ và gặp được hoàng tử.'),
(3, 'Doraemon Movie 44: Cuộc Khám Phá Trong Tranh', 2, 3, 2024, 'poster3.jpg', 4, 1, 'trailer3.mp4', 'Doraemon và Nobita khám phá thế giới trong tranh.'),
(4, 'Mưa Đỏ', 3, 4, 2023, 'poster4.jpg', 1, 1, 'trailer4.mp4', 'Phim khắc họa cuộc chiến ác liệt 81 ngày đêm tại Thành cổ Quảng Trị năm 1972.'),
(5, 'Mulan', 1, 5, 2020, 'poster5.jpg', 2, 1, 'trailer5.mp4', 'Nữ cải nam đi tham gia đánh nhau.'),
(6, 'Kẻ Ăn Hồn', 4, 6, 2024, 'poster6.jpg', 1, 1, 'trailer6.mp4', 'Phim kinh dị về linh hồn bị nguyền rủa.'),
(7, 'Howl''s Moving Castle', 5, 7, 2004, 'poster7.jpg', 4, 1, 'trailer7.mp4', 'Hành trình kỳ ảo cùng phù thủy Howl.'),
(8, '5 Centimeters Per Second', 5, 8, 2007, 'poster8.jpg', 4, 1, 'trailer8.mp4', 'Câu chuyện buồn về tình yêu xa cách.'),
(9, 'Your Name', 5, 9, 2016, 'poster9.jpg', 4, 1, 'trailer9.mp4', 'Hai người hoán đổi thân xác bí ẩn.'),
(10, 'Alice in Wonderland', 1, 10, 2010, 'poster10.jpg', 2, 1, 'trailer10.mp4', 'Cô bé Alice lạc vào xứ sở thần tiên.'),
(11, 'Squid Game', 3, 11, 2021, 'poster11.jpg', 3, 9, 'trailer11.mp4', 'Trò chơi sinh tồn khốc liệt.'),
(12, 'Penthouse', 3, 12, 2020, 'poster12.jpg', 3, 3, 'trailer12.mp4', 'Cuộc chiến đẳng cấp trong giới thượng lưu.'),
(13, 'Avengers: Endgame', 6, 13, 2019, 'poster13.jpg', 2, 1, 'trailer13.mp4', 'Trận chiến cuối cùng chống Thanos.'),
(14, 'Spirited Away', 5, 14, 2001, 'poster14.jpg', 4, 1, 'trailer14.mp4', 'Cô bé lạc vào thế giới linh hồn.'),
(15, 'Naruto: The Last', 5, 15, 2014, 'poster15.jpg', 4, 1, 'trailer15.mp4', 'Cuộc chiến cuối cùng của Naruto.'),
(16, 'Train to Busan', 3, 16, 2016, 'poster16.jpg', 3, 1, 'trailer16.mp4', 'Thảm họa zombie trên tàu.'),
(17, 'Parasite', 3, 17, 2019, 'poster17.jpg', 3, 1, 'trailer17.mp4', 'Gia đình nghèo xâm nhập vào nhà giàu.'),
(18, 'The Lion King', 1, 18, 2019, 'poster18.jpg', 2, 1, 'trailer18.mp4', 'Hành trình của Simba trở thành vua.'),
(19, 'Frozen', 1, 19, 2013, 'poster19.jpg', 2, 1, 'trailer19.mp4', 'Câu chuyện về nữ hoàng băng giá.'),
(20, 'The Matrix', 6, 20, 1999, 'poster20.jpg', 2, 1, 'trailer20.mp4', 'Thế giới ảo và cuộc nổi dậy của Neo.'),
(21, 'Star Wars: A New Hope', 6, 21, 1977, 'poster21.jpg', 2, 1, 'trailer21.mp4', 'Cuộc chiến giữa Jedi và Đế chế.'),
(22, 'One Piece Film: Red', 5, 22, 2022, 'poster22.jpg', 4, 1, 'trailer22.mp4', 'Uta và băng Mũ Rơm.'),
(23, 'Conan Movie 26: The Black Iron Submarine', 5, 23, 2023, 'poster23.jpg', 4, 1, 'trailer23.mp4', 'Phá án trong căn cứ tàu ngầm tối mật.'),
(24, 'The Nun', 4, 24, 2018, 'poster24.jpg', 2, 1, 'trailer24.mp4', 'Ác quỷ Valak gieo rắc nỗi sợ.'),
(25, 'Annabelle', 4, 25, 2014, 'poster25.jpg', 2, 1, 'trailer25.mp4', 'Búp bê bị nguyền rủa đáng sợ.'),
(26, 'Shang-Chi', 6, 26, 2021, 'poster26.jpg', 2, 1, 'trailer26.mp4', 'Siêu anh hùng gốc Á của Marvel.'),
(27, 'Spiderman: No Way Home', 6, 27, 2021, 'poster27.jpg', 2, 1, 'trailer27.mp4', 'Ba phiên bản Spider-Man gặp nhau.'),
(28, 'Weathering With You', 5, 28, 2019, 'poster28.jpg', 4, 1, 'trailer28.mp4', 'Cô gái có khả năng điều khiển thời tiết.'),
(29, 'Moana', 1, 29, 2016, 'poster29.jpg', 2, 1, 'trailer29.mp4', 'Cô gái lên đường vượt biển.'),
(30, 'Cô Gái Đến Từ Hôm Qua', 3, 30, 2017, 'poster30.jpg', 1, 1, 'trailer30.mp4', 'Phim thanh xuân Việt Nam dựa trên truyện Nguyễn Nhật Ánh.');

INSERT IGNORE INTO phim_the_loai
(id, phim_id, the_loai_id)
VALUES
(1, 1, 1),
(2, 2, 9),
(3, 3, 1),
(4, 4, 14),
(5, 5, 5),
(6, 6, 3),
(7, 7, 6),
(8, 8, 8),
(9, 9, 8),
(10, 10, 6),
(11, 11, 5),
(12, 12, 7),
(13, 13, 5),
(14, 14, 1),
(15, 15, 1),
(16, 16, 3),
(17, 17, 7),
(18, 18, 9),
(19, 19, 9),
(20, 20, 8),
(21, 21, 5),
(22, 22, 1),
(23, 23, 12),
(24, 24, 3),
(25, 25, 3),
(26, 26, 28),
(27, 27, 28),
(28, 28, 8),
(29, 29, 6),
(30, 30, 9);

INSERT IGNORE INTO tap_phim(id, so_tap, tieu_de, phim_id, thoi_luong, trailer) VALUES
(1, 1, 'Người đẹp và quái vật', 1, 120, 'trailer1.mp4'),
(2, 1, 'Nàng tiên cá daden mắc cạn', 2, 115, 'trailer2.mp4'),
(3, 1, 'Lạc vào thế giới trong tranh', 3, 110, 'trailer3.mp4'),
(4, 1, 'Mưa đỏ', 4, 105, 'trailer4.mp4'),
(5, 1, 'Mulan cắt tóc lên đường', 5, 125, 'trailer5.mp4'),
(6, 1, 'Linh hồn bị nguyền', 6, 100, 'trailer6.mp4'),
(7, 1, 'Lâu đài di động', 7, 130, 'trailer7.mp4'),
(8, 1, '5cm/s', 8, 90, 'trailer8.mp4'),
(9, 1, 'Hoán đổi thân xác', 9, 106, 'trailer9.mp4'),
(10, 1, 'Alice lạc vào xứ thần tiên', 10, 115, 'trailer10.mp4'),
(11, 1, 'Trò chơi sinh tồn bắt đầu', 11, 55, 'trailer11.mp4'),
(12, 1, 'Chiến lược penthouse', 12, 60, 'trailer12.mp4'),
(13, 1, 'Avengers tập hợp', 13, 180, 'trailer13.mp4'),
(14, 1, 'Spirited Away', 14, 125, 'trailer14.mp4'),
(15, 1, 'Naruto xuất trận', 15, 110, 'trailer15.mp4'),
(16, 1, 'Zombie trên tàu', 16, 118, 'trailer16.mp4'),
(17, 1, 'Parasite', 17, 132, 'trailer17.mp4'),
(18, 1, 'Simba trở thành vua', 18, 89, 'trailer18.mp4'),
(19, 1, 'Frozen', 19, 102, 'trailer19.mp4'),
(20, 1, 'Thế giới ảo Matrix', 20, 136, 'trailer20.mp4'),
(21, 1, 'Star Wars - Jedi vs Empire', 21, 121, 'trailer21.mp4'),
(22, 1, 'One Piece Film Red', 22, 112, 'trailer22.mp4'),
(23, 1, 'Conan phá án tàu ngầm', 23, 110, 'trailer23.mp4'),
(24, 1, 'Ác quỷ Valak', 24, 95, 'trailer24.mp4'),
(25, 1, 'Búp bê Annabelle', 25, 98, 'trailer25.mp4'),
(26, 1, 'hang-Chi', 26, 132, 'trailer26.mp4'),
(27, 1, 'Spiderman gặp nhau', 27, 135, 'trailer27.mp4'),
(28, 1, 'Weathering With You', 28, 110, 'trailer28.mp4'),
(29, 1, 'Moana vượt biển', 29, 107, 'trailer29.mp4'),
(30, 1, 'Cô gái đến từ hôm qua', 30, 103, 'trailer30.mp4');


SELECT p.*, qg.ten_quoc_gia FROM phim p
join quoc_gia qg on p.quoc_gia_id = qg.id
where p.id = 10

SELECT p.ten_phim, qg.ten_quoc_gia, nd.ho_ten as ten_dao_dien, dv.ho_ten as ten_dien_vien from phim p
join quoc_gia qg on p.quoc_gia_id = qg.id
join nguoi_dung nd on p.dao_dien_id = nd.id
join phim_dien_vien pdv on p.id = pdv.phim_id
join nguoi_dung dv on pdv.dien_vien_id = dv.id
where p.id = 10;