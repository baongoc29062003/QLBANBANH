-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 18, 2024 lúc 05:39 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlybanbanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banh`
--

CREATE TABLE `banh` (
  `Mabanh` varchar(10) NOT NULL,
  `Tenbanh` varchar(50) NOT NULL,
  `Nguyenlieu` varchar(500) NOT NULL,
  `Dongia` int(100) NOT NULL,
  `Mota` varchar(500) NOT NULL,
  `Hinh` varchar(30) NOT NULL,
  `Maloaibanh` varchar(10) NOT NULL,
  `Mahangsx` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banh`
--

INSERT INTO `banh` (`Mabanh`, `Tenbanh`, `Nguyenlieu`, `Dongia`, `Mota`, `Hinh`, `Maloaibanh`, `Mahangsx`) VALUES
('aa1', '', 'sjda', 23121, 'sdad', 'images/banhkem5.webp', 'LB03', 'HSX01'),
('B04', 'Bánh Kem Endless ', ' Vị vani đặc trưng, ngọt dịu, thơm ngậy', 380000, '', 'banhkem6.webp', 'LB01', 'HSX01'),
('B05', 'Bánh Kem Rosie Love', 'Thơm ngậy vị bơ sữa, ngọt vừa phải', 380000, 'Cốt bánh 4 lớp chiffon phô mai mềm ẩm ngậy béo, quyện giữa từng lớp bánh là nhân kem phô mai mát lạnh thơm vị bơ sữa. ', 'banhkem7.webp', 'LB01', 'HSX02'),
('B06', 'Bánh Cheesecake Matcha', 'Bột matcha, kem cheese, đường, trứng', 420000, '', 'banh8.webp', 'LB01', 'HSX02'),
('B07', 'Bánh Mousse Trái Cây', 'Kem tươi, trái cây tươi, đường', 300000, '', 'banh9.webp', 'LB01', 'HSX01'),
('B08', 'Bánh Tiramisu', 'Bột cacao, kem mascarpone, rượu vang', 390000, 'Vị cà phê và rượu nồng nàn, lý tưởng cho buổi tiệc trà', 'banh10.webp', 'LB01', 'HSX01'),
('B09', 'Bánh Brownie Chocolate', 'Socola đen, bơ, đường, bột mì', 250000, 'Brownie đậm đà vị chocolate, thích hợp ăn cùng kem', 'banh11.webp', 'LB01', 'HSX01'),
('B10', 'Bánh Su Kem Nhật Bản', 'Bột mì, kem tươi, đường', 220000, 'Vỏ bánh mỏng nhẹ, nhân kem tươi thơm ngậy, thích hợp ăn nhẹ', 'banh12.webp', 'LB01', 'HSX02'),
('B11', 'Bánh Mì Kẹp Gà Teriyaki', 'Vỏ bánh mì kẹp cỡ lớn, gà nướng bỏ lò Teriyaki, sốt bánh mỳ kẹp, dưa góp, rau mùi', 25000, 'Vỏ bánh mì kẹp cỡ lớn, gà nướng bỏ lò Teriyaki, sốt bánh mỳ kẹp, dưa góp, rau mùi', 'banhmi1.webp', 'LB02', 'HSX01'),
('B12', 'Bánh Mì Kẹp Thịt Xông Khói', 'Bánh mì, thịt xông khói, rau diếp, cà chua', 28000, 'Bánh mì nóng giòn kẹp thịt xông khói và rau tươi', 'banhmi2.webp', 'LB02', 'HSX01'),
('B13', 'Bánh Mì Kẹp Thịt Bò BBQ', 'Bánh mì, thịt bò nướng BBQ, hành tây, phô mai', 35000, 'Thịt bò nướng BBQ cùng phô mai tan chảy', 'banhmi3.png', 'LB02', 'HSX01'),
('B14', 'Bánh Mì Kẹp Phô Mai Gà Xé', 'Bánh mì, gà xé, phô mai, sốt mật ong', 30000, 'Gà xé thơm ngon kết hợp phô mai béo ngậy', 'banhmi4.webp', 'LB02', 'HSX01'),
('B15', 'Bánh Mì Kẹp Cá Hồi Sốt Mayonnaise', 'Bánh mì, cá hồi, rau thơm, sốt mayonnaise', 45000, 'Bánh mì giòn tan với cá hồi và sốt mayonnaise', 'banhmi5.webp', 'LB02', 'HSX01'),
('B16', 'Bánh Mì Kẹp Trứng Chiên', 'Bánh mì, trứng chiên, rau sống, sốt đặc biệt', 20000, 'Bánh mì kẹp trứng chiên vàng giòn với sốt đặc biệt', 'banhmi6.webp', 'LB02', 'HSX01'),
('B17', 'Bánh Ngọt Socola', 'Socola đen, bột mì, đường, bơ', 30000, 'Bánh ngọt mềm mại với hương vị socola đậm đà', 'banhngot1.webp', 'LB03', 'HSX02'),
('B18', 'Bánh Ngọt Vani', 'Bột mì, đường, bơ, vani', 25000, 'Bánh ngọt nhẹ nhàng với hương vani thơm lừng', 'banhngot2.webp', 'LB03', 'HSX02'),
('B19', 'Bánh Ngọt Matcha', 'Bột mì, bột matcha, đường, sữa', 35000, 'Bánh ngọt độc đáo với hương vị matcha tươi mát', 'banhngot3.webp', 'LB03', 'HSX02'),
('B20', 'Bánh Ngọt Phô Mai', 'Bột mì, phô mai, đường, bơ', 40000, 'Lớp phô mai mềm mịn tan chảy trong miệng', 'banhngot4.webp', 'LB03', 'HSX02'),
('B21', 'Bánh Ngọt Trà Xanh', 'Bột trà xanh, bột mì, đường, trứng', 32000, 'Bánh ngọt thơm dịu với vị trà xanh tự nhiên', 'banhngot5.webp', 'LB03', 'HSX02'),
('B22', 'Bánh Ngọt Dâu Tây', 'Dâu tây tươi, bột mì, đường, kem tươi', 38000, 'Bánh ngọt hấp dẫn với lớp kem và dâu tây tươi mát', 'banhngot6.webp', 'LB03', 'HSX02'),
('B23', 'Bánh Quy Bơ Sữa', 'Bột mì, bơ, sữa, đường', 20000, 'Bánh quy giòn tan với hương vị bơ sữa béo ngậy', 'banhquy1.webp', 'LB04', 'HSX01'),
('B24', 'Bánh Quy Socola Chip', 'Bột mì, bơ, đường, chip socola', 25000, 'Bánh quy giòn với những miếng socola chip thơm ngon', 'banhquy2.jpeg', 'LB04', 'HSX02'),
('B25', 'Bánh Quy Hạnh Nhân', 'Bột mì, bơ, đường, hạnh nhân', 30000, 'Bánh quy thơm bùi với hạnh nhân hảo hạng', 'banhquy3.jpeg', 'LB04', 'HSX01'),
('B26', 'Bánh Quy Dừa', 'Bột mì, bơ, đường, dừa', 22000, 'Bánh quy giòn rụm với hương dừa tự nhiên', 'banhquy4.webp', 'LB04', 'HSX01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `Mabanh` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `Mabanh`, `quantity`) VALUES
(10, 'rhkb9bre8gp3bqag3b2k8ad8r3', 'B12', 1),
(11, 'rhkb9bre8gp3bqag3b2k8ad8r3', 'B11', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(2, 'Hà Bảo Ngọc', 'hbna3@gmal.com', 'a', 'a', '2024-11-17 16:04:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `Mahangsx` varchar(10) NOT NULL,
  `Tenhangsx` varchar(50) NOT NULL,
  `Diachi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sdt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`Mahangsx`, `Tenhangsx`, `Diachi`, `Email`, `Sdt`) VALUES
('HSX01', 'Thành Đô', '16/3 Thượng Thuỵ, Phú Thượng, Tây Hồ', 'thanhdo@gmail.com', 986690331),
('HSX02', 'Bảo Ngọc', '18 Tam Trinh, Hoàng Mai', 'baongoc123@gmail.com', 834264728);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaibanh`
--

CREATE TABLE `loaibanh` (
  `Maloaibanh` varchar(10) NOT NULL,
  `Tenloaibanh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaibanh`
--

INSERT INTO `loaibanh` (`Maloaibanh`, `Tenloaibanh`) VALUES
('LB01', 'Bánh kem'),
('LB02', 'Bánh mì'),
('LB03', 'Bánh ngọt'),
('LB04', 'Bánh Quy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'Chọn bánh \"Quái\" cùng tiệc Halloween quá ưng', 'Nội dung bài viết Halloween...\"Cốc! Cốc! Cốc! Cho kẹo hay bị ghẹo!\"\r\n\r\nMột truyền thống không thể thiếu trong dịp Halloween chính là trò chơi Trick or Treat – trò chơi được nhiều trẻ em yêu thích trong dịp Halloween, đặc biệt là ở nước Mỹ và các quốc gia châu Âu. “Trick” trong tiếng Anh nghĩa là đánh lừa, chỉ trò đùa nghịch ngợm trong ngày Halloween. Treat là tiếp đãi, đối xử tử tế, trong trường hợp này chỉ bánh kẹo. Câu nói này mang hàm ý: \"Nếu không muốn bị chơi xấu thì hãy đãi chúng tôi món gì đi\". Thông thường, chủ nhà thường vui vẻ cho lũ trẻ rất nhiều kẹo, bánh trái để đi... dọa nhà tiếp theo.', 'news1.webp', '2024-10-28 00:00:00'),
(2, 'Khám phá Green Tea Tart mới toanh từ Fresh Garden', 'Xu hướng ẩm thực luôn vận động không ngừng, và trà xanh chính là minh chứng tiêu biểu cho sự dịch chuyển nhanh  của thị hiếu trong giới trẻ Hà Nội. Khác với những trào lưu ẩm thực chóng vánh, trà xanh vẫn giữ vững sức hút, khẳng định vị thế trong thời gian dài. Chỉ trong nửa năm trở lại đây từ Instagram, Facebook, TikTok, hay Threads đâu đâu cũng thấy những món ăn hay thức uống xanh mướt, đẹp mắt khiến hội sành ăn rần rần thử cho bằng được. Trà xanh với hương vị độc đáo và lợi ích sức khỏe vượt trội đã chinh phục trái tim của nhiều người, từ những ai đam mê vị đắng nhẹ nhàng, thanh mát của lá trà đến những thực khách tìm kiếm sự kết hợp giữa ẩm thực hiện đại và nguyên liệu truyền thống. Trong làn sóng xanh lan tỏa lan tỏa khắp mạng xã hội, Fresh Garden nổi lên như một địa chỉ uy tín cho chiếc bánh tươi ngon. Nơi bạn có thể tìm thấy Green Tea Tart – chiếc bánh không chỉ đơn thuần là sản phẩm “theo trào lưu” mà còn là lời tri ân đặc biệt đến nguồn nguyên liệu truyền thống Á Đông này.', 'news2.webp', '2024-11-14 00:00:00'),
(3, 'Coconut Tart – Chiếc bánh thay bạn tỏ vẹn yêu thương', 'Ngày 20/10 không chỉ là dịp để tôn vinh những đóng góp to lớn của phái đẹp mà còn là cơ hội để bạn bày tỏ tình yêu thương, sự trân trọng đối với những người phụ nữ quan trọng của mình. Để ngày đặc biệt này thêm phần ý nghĩa, Fresh Garden xin giới thiệu bộ sưu tập bánh kem 20/10 mang tên “Ngọt ngào gửi nàng”. Với sự kết hợp hoàn hảo giữa những hương vị tinh tế và thiết kế sang trọng, cùng chất lượng được đảm bảo, mỗi chiếc bánh sinh nhật của Fresh Garden là một món quà thay lời muốn nói, mang đến niềm vui và cảm xúc trọn vẹn cho người nhận.', 'new3.webp', '2024-11-07 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `created_at`) VALUES
(1, 2, 1548000.00, '2024-11-18 08:24:42'),
(2, 2, 380000.00, '2024-11-18 08:25:32'),
(3, 2, 35000.00, '2024-11-18 09:56:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `Mabanh` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `Mabanh`, `quantity`, `price`, `subtotal`) VALUES
(1, 1, 'B05', 3, 380000.00, 1140000.00),
(2, 1, 'B12', 1, 28000.00, 28000.00),
(3, 1, 'B04', 1, 380000.00, 380000.00),
(4, 2, 'B04', 1, 380000.00, 380000.00),
(5, 3, 'B13', 1, 35000.00, 35000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `Hoten` varchar(255) NOT NULL,
  `Diachi` text NOT NULL,
  `Dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`, `Hoten`, `Diachi`, `Dienthoai`) VALUES
(1, 'admin', '123456', 1, 'Bảo Ngọc', 'Phú Thượng Hà Nội', '0932143542'),
(2, 'member', '123456', 2, 'Xuân Dũng', 'Lĩnh Nam, Hoàng Mai', '0904229443'),
(3, 'user1', '123456', 2, 'Nguyễn Văn A', '123 Đường ABC, Hà Nội', '0123456789'),
(6, 'a', '123456', 2, 'a', 'a', '0986690331');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banh`
--
ALTER TABLE `banh`
  ADD PRIMARY KEY (`Mabanh`),
  ADD KEY `fk_Maloaibanh` (`Maloaibanh`),
  ADD KEY `fk_Mahangsx` (`Mahangsx`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Mabanh` (`Mabanh`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`Mahangsx`);

--
-- Chỉ mục cho bảng `loaibanh`
--
ALTER TABLE `loaibanh`
  ADD PRIMARY KEY (`Maloaibanh`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `Mabanh` (`Mabanh`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banh`
--
ALTER TABLE `banh`
  ADD CONSTRAINT `fk_Mahangsx` FOREIGN KEY (`Mahangsx`) REFERENCES `hangsx` (`Mahangsx`),
  ADD CONSTRAINT `fk_Maloaibanh` FOREIGN KEY (`Maloaibanh`) REFERENCES `loaibanh` (`Maloaibanh`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Mabanh`) REFERENCES `banh` (`Mabanh`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Mabanh`) REFERENCES `banh` (`Mabanh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
