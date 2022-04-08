-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2022 lúc 05:46 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `brand_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`) VALUES
(2, 'Samsung', '                                    Samsung', 1),
(6, 'Razer', '                                    Razer', 1),
(7, 'Logitech', 'Logitech', 1),
(8, 'Seagate', 'Seagate', 1),
(9, 'Intel', 'Intel', 1),
(10, 'Gigabyte', 'Sản phẩm của Gigabyte', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Thiết bị ngoại vi', 'Thiết bị ngoại vi các loại<div id=\"gtx-trans\" style=\"position: absolute; left: -299px; top: 19.3505px;\"><div class=\"gtx-trans-icon\"></div></div>', 1),
(2, 'Laptop', '                                                                        Dành cho laptop các dòng                                ', 1),
(9, 'PC', 'Linh kiện dành cho máy tính bàn (PC)', 1),
(10, 'RAM', 'RAM laptop', 1),
(11, 'CPU', 'Chip máy tính, laptop các loại', 1),
(12, 'Disk', 'Ổ đĩa cứng', 1),
(13, 'GPU', 'Card đồ họa', 1),
(14, 'Main', 'Mainboard PC', 1),
(15, 'Chuột', 'Chuột máy tính', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `customer_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `customer_password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_active` tinyint(4) NOT NULL COMMENT 'Active=1,Unactive=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_phone`, `customer_active`) VALUES
(12, 'nemo', 'nemo.tronghieu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'BLU', '123456789', 1),
(14, 'nemoth', 'nemo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', '12345678', 1),
(15, 'Hieuu', 'hieu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'cm', '123456789', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_option`
--

CREATE TABLE `tbl_option` (
  `option_id` int(11) NOT NULL,
  `site_logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_favicon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_contact_num` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_facebook_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_github_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_email_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_option`
--

INSERT INTO `tbl_option` (`option_id`, `site_logo`, `site_favicon`, `site_contact_num`, `site_facebook_link`, `site_github_link`, `site_email_link`) VALUES
(1, 'Site_logo1.jpg', 'Site_favicon.jpg', '363354261', 'https://www.facebook.com/hieun1042', 'https://github.com/xnemoth/xnemoth.github.io.git', 'tronghieu1042@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `sale_off` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `actions` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_image` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_feature` tinyint(4) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_short_description`, `product_long_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `product_category`, `product_brand`, `published_date`, `publication_status`) VALUES
(13, 'cá', '<b style=\"\"><font color=\"#ffcc66\" style=\"\" size=\"5\">tôm</font></b>', '<b style=\"\"><i style=\"\"><font size=\"4\" style=\"background-color: rgb(51, 51, 51);\" color=\"#ffcc66\">Cua mực ốc</font></i></b>', 'lg.jpg', 200, 9, 1, 9, 6, '2022-03-28 14:10:29', 1),
(14, 'khỉ', 'kó', '<span style=\"background-color: rgb(255, 102, 0); font-weight: bold;\">không</span><div id=\"gtx-trans\" style=\"font-weight: normal; position: absolute; left: -195px; top: 19.3505px;\"><div class=\"gtx-trans-icon\"></div></div>', 'Login.jpg', 22, 21, 0, 1, 2, '2022-03-28 14:23:27', 1),
(15, 'test', '                                    test product                                ', '                                    test product 2                                ', 'customer.png', 23, 20, 1, 1, 2, '2022-03-29 12:50:17', 1),
(18, 'asd', 'sd', 'asd', 'save.png', 23, 53, 1, 1, 2, '2022-03-29 13:12:08', 1),
(20, 'ad', 'ad', 'asd', 'Splash3.jpg', 32, 32, 1, 1, 2, '2022-03-29 14:43:55', 1),
(22, 'asd', 'sd', 'as', 'myInfo.jpg', 23, 12, 1, 1, 7, '2022-04-03 09:56:20', 1),
(25, 'VGA Asus RTX 3090 24G GDDR6', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <font face=\"Arial, Verdana\" style=\"\" size=\"5\" color=\"#3366ff\"><b>VGA Asus RTX 3090 24G GDDR6 OC 3Fan ROG Strix Gaming (ROG-STRIX-RTX3090-O24G-GAMING)</b></font>                                                                                                                                                                                                                                                                                                                                                                                                                                <div id=\"gtx-trans\" style=\"position: absolute; left: -39px; top: -24.0047px;\"><div class=\"gtx-trans-icon\"></div></div>                                ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <h2 style=\"font-family: Arial, Verdana; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" style=\"\" size=\"4\">Đổi mới toàn diện</font></h2><h3 style=\"font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font face=\"Arial, Verdana\" size=\"4\" style=\"font-weight: normal;\">Từ trên xuống dưới, Card màn hình ASUS ROG STRIX RTX 3090-O24G đã được cải tiến hoàn toàn để phù hợp với nền tảng Ampere hoàn toàn mới từ NVIDIA để mang đến&nbsp; hiệu suất chơi game vượt trội so với thế hệ trước. Dòng card đồ họa Strix mang một thiết kế mới và nhiều kim loại hơn bao quanh 3 quạt làm mát với công nghệ Axial. Cách bố trí tất cả các quạt xoay cùng 1 hướng đã lỗi thời, ở thế hệ mới nhất 3 quạt trên dòng card đồ họa ROG Strix được phân làm 2 nhiệm vụ quạt chính và phụ trợ quay đảo chiều nhau đem lại hiệu suất tốt hơn hẳn. Bên dưới các cánh quạt, một bộ tản nhiệt lớn hơn, ấn tượng hơn đã sẵn sàng cho các mức nhiệt độ “khủng” nhất.</font></h3><div style=\"font-family: Arial, Verdana; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal;\"><div class=\"mf-product-detail\" style=\"font-weight: normal; box-sizing: border-box; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><div class=\"woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-5 images \" data-columns=\"5\" style=\"box-sizing: border-box; position: relative; width: 353.285px; float: left; padding-bottom: 35px; margin-bottom: 0px; padding-left: 70px; opacity: 1; transition: opacity 0.25s ease-in-out 0s;\"><div class=\"flex-viewport\" style=\"box-sizing: border-box; overflow: hidden; position: relative; height: 283.29px;\"><figure class=\"woocommerce-product-gallery__wrapper\" style=\"box-sizing: border-box; display: flex; margin: 0px; max-height: 570px; overflow: hidden; align-items: stretch; transition: all 0s cubic-bezier(0.795, -0.035, 0, 1) 0s; padding: 0px; width: 3966.06px; transform: translate3d(0px, 0px, 0px);\"><div data-thumb=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1-100x100.png\" data-thumb-alt=\"\" class=\"woocommerce-product-gallery__image flex-active-slide\" style=\"box-sizing: border-box; cursor: pointer; position: relative; overflow: hidden; width: 283.29px; float: left;\"><font color=\"#0066cc\" size=\"4\"><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; transition-duration: 0.5s; transition-property: all; border-width: initial; border-color: initial; border-image: initial; height: auto; width: 283.29px;\"><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; transition-duration: 0.5s; transition-property: all; border-width: initial; border-color: initial; border-image: initial; height: auto; width: 283.29px;\"><a href=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1.png\" style=\"box-sizing: border-box; color: rgb(0, 102, 204); text-decoration-line: none; background: transparent; transition: all 0.5s ease 0s;\"><img width=\"400\" height=\"400\" src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1.png\" class=\"wp-post-image\" alt=\"\" loading=\"lazy\" title=\"AS_RTX3090_ROG_StrixOC\" data-caption=\"\" data-src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1.png\" data-large_image=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1.png\" data-large_image_width=\"400\" data-large_image_height=\"400\" srcset=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1.png 400w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1-365x365.png 365w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1-280x280.png 280w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1-370x370.png 370w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1-300x300.png 300w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/AS_RTX3090_ROG_StrixOC-1-100x100.png 100w\" sizes=\"(max-width: 400px) 100vw, 400px\" draggable=\"false\" style=\"text-align: center; box-sizing: border-box; vertical-align: middle; border: none; max-width: 100%; height: auto; display: block; width: 283.29px; box-shadow: none;\"></a></span></span></font></div></figure></div></div></div><div class=\"mf-product-summary\" style=\"box-sizing: border-box;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><div class=\"woocommerce-tabs wc-tabs-wrapper\" style=\"box-sizing: border-box; margin-bottom: 80px;\"><ul class=\"tabs wc-tabs\" role=\"tablist\" style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin: 0px 0px 50px; list-style: none; padding: 0px; overflow: hidden; position: relative; border-bottom: 1px solid rgb(225, 225, 225); width: 821.593px; background-color: transparent; border-right: none;\"><li id=\"tl-wc-tab\" class=\"tl-wc-tab\" style=\"text-align: center; box-sizing: border-box; margin: 0px; border: none; background-color: var(--mf-background-primary-color); display: inline-block; position: absolute; z-index: 10; border-radius: 0px; padding: 0px; bottom: 0px; width: 95.6215px; height: 3px; left: 0px;\"><font size=\"4\"><br></font></li></ul><div class=\"woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab\" id=\"tab-description\" role=\"tabpanel\" aria-labelledby=\"tab-title-description\" style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" size=\"4\" style=\"\">Quạt làm mát công nghệ Axial</font></h2><h4 style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><font size=\"4\" style=\"font-weight: normal;\">Công nghệ Axial giúp bố trí quạt làm mát tối ưu hơn cho các bộ tản nhiệt kích thước lớn. Số lượng cánh quạt cũng được tăng lên với 13 cho quạt trung tâm và 11 cho 2 quạt còn lại. Phần vòng chắn của 2 quạt bên được thiết kế dạng răng cưa mỏng cho phép lấy được thêm lượng gió từ hai bên, trong khi đó quạt trung tâm với kích thước lớn hơn phụ trách nhiệm vụ gia tăng áp lực của gió xuống bộ tản nhiệt kim loại.</font></h4><h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3333ff\" size=\"4\" style=\"\">Các cánh quạt quay đảo chiều</font></h2><h3 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><div style=\"font-weight: normal;\"><font size=\"4\" style=\"font-weight: normal;\">Thay vì cả 3 quạt đều vận hành theo chiều kim đồng hồ như truyền thống, giờ đây quạt trung tâm sẽ quay ngược chiều so với 2 quạt còn lại để đảm bảo toàn bộ phần heatsink sẽ được làm mát đều, qua đó tăng được hiệu quả làm mát tổng thể cho toàn bộ VGA.<br>Công nghệ của Asus còn cho phép các cánh quạt tự ngừng quay khi nhiệt độ của VGA được giữ ở dưới mức 55 độ C, mục đích vừa giảm được tiếng ồn, vừa giữ được hiệu năng làm mát tối đa.</font></div></h3><h2><font color=\"#3333ff\" size=\"4\" style=\"\">Bề mặt tiếp xúc hoàn thiện đỉnh cao ở mức độ vi mô</font></h2><div style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><font size=\"4\">Để dẫn nhiệt hiệu quả hơn, phần tiếp xúc giữa GPU và heatsink được làm siêu mịn để gia tăng từng nanomet tiếp xúc qua đó giúp truyền dẫn nhiệt hiệu quả.</font></div><p style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><img loading=\"lazy\" class=\"size-medium wp-image-183820 aligncenter\" src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-365x365.jpg\" alt=\"\" width=\"365\" height=\"365\" srcset=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-365x365.jpg 365w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-280x280.jpg 280w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-370x370.jpg 370w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-300x300.jpg 300w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-600x600.jpg 600w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3-100x100.jpg 100w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-3.jpg 700w\" sizes=\"(max-width: 365px) 100vw, 365px\" style=\"box-sizing: border-box; vertical-align: middle; border: 0px; max-width: 100%; clear: both; display: block; margin: 1em auto; text-align: center; height: auto;\"></p><h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" size=\"4\" style=\"\">Gia tăng kích thước tản nhiệt</font></h2><div style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><font size=\"4\">Bộ heatsink trên card đồ họa thế hệ mới của Asus dày đến 2,9 slot PCI. Việc tăng kích thước tản nhiệt so với thế hệ trước cung cấp nhiều không gian tản nhiệt hơn giúp chipset hoạt động ở mức hiệu năng cao hơn.</font></div><h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" size=\"4\" style=\"\">Linh kiện cao cấp</font></h2><div style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><font size=\"4\">Toàn bộ linh kiện trên các dòng sản phẩm cao cấp của Asus đều được sử dụng linh kiện có sự chọn lọc kỹ càng ở cả khía cạnh hiệu năng lẫn độ bền.</font></div><h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3333ff\" size=\"4\" style=\"\">Tích hợp đèn LED RGB bắt mắt có thể tùy chỉnh</font></h2><h4 style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><font size=\"4\" style=\"font-weight: normal;\">Phần thân của VGA giờ đây được tích hợp dải đèn LED bắt mắt và tinh tế. Chủ nhân của mỗi chiếc VGA có thể tùy ý sáng tạo với phần mềm Armoury Crate.</font></h4><h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" size=\"4\" style=\"\">Bứt phá hiệu năng dễ dàng với GPU Tweak</font></h2><h4 style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><font size=\"4\" style=\"font-weight: normal;\">Tiện ích ASUS GPU Tweak II đưa việc điều chỉnh cạc đồ họa lên một tầm cao mới. Nó cho phép bạn điều chỉnh các thông số quan trọng bao gồm tốc độ của GPU, bộ nhớ và cài đặt điện áp, với tùy chọn giám sát mọi thành phần trong thời gian thực. Điều khiển quạt nâng cao cũng được tích hợp với nhiều tính năng khác để giúp bạn tận dụng tối đa card đồ họa của mình.</font></h4><p style=\"font-weight: normal; color: rgb(102, 102, 102); box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\"><img loading=\"lazy\" class=\"size-medium wp-image-183821 aligncenter\" src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-365x365.jpg\" alt=\"\" width=\"365\" height=\"365\" srcset=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-365x365.jpg 365w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-280x280.jpg 280w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-370x370.jpg 370w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-300x300.jpg 300w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-600x600.jpg 600w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2-100x100.jpg 100w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/VGA-Asus-RTX-3090-24G-GDDR6-OC-3Fan-ROG-Strix-Gaming-ROG-STRIX-RTX3090-O24G-GAMING-2.jpg 700w\" sizes=\"(max-width: 365px) 100vw, 365px\" style=\"box-sizing: border-box; vertical-align: middle; border: 0px; max-width: 100%; clear: both; display: block; margin: 1em auto; text-align: center; height: auto;\"></p></div></div></div></div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', 'AS_RTX3090_ROG_Strix_GM-1.jpg', 50000000, 20, 0, 13, 6, '2022-04-08 02:22:53', 1),
(26, 'Mainboard Gigabyte Aorus', '                                                                                                                                                                                                                                                            <h1 class=\"product_title entry-title\" style=\"box-sizing: border-box; margin: 0px 0px 6px; line-height: 1.2; font-family: \" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" clear:=\"\" none;=\"\" padding:=\"\" 0px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font size=\"5\" style=\"\" color=\"#3366ff\">Mainboard Gigabyte Aorus Z690M Aorus Elite AX DDR4</font></h1>                                                                                                                                                                                                                                ', '                                                                                                                                                                                                                                                            <h2 style=\"font-size: 24px; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><span style=\"color: rgb(51, 102, 255); font-size: 18px;\">Thiết kế</span></h2><ul style=\"font-weight: normal; font-size: 10pt; box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; list-style-type: square; padding-left: 20px; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"box-sizing: border-box; margin-bottom: 7px;\"><font style=\"\">Gigabyte Z690M AORUS ELITE sở hữu thiết kế M-ATX với ngoại hình nam tính, đậm chất Gaming. Nổi bật là các khối heatsink đẹp mắt bao phủ ở các khu vực quan trọng trên bo mạch chủ.</font></li><li style=\"box-sizing: border-box; margin-bottom: 7px;\">Phần PCB được cấu thành từ nhiều lớp với rất nhiều đồng (Cu) – giúp truyền dẫn tín hiệu và hỗ trợ khả năng tản nhiệt cho các linh kiện.</li><li style=\"box-sizing: border-box; margin-bottom: 7px;\"><font style=\"\">Khe RAM, khe PCI-E đều được bọc thép gia cường, tăng độ bền và sự cao cấp cho sản phẩm</font></li></ul><h2 style=\"font-size: 18px; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" style=\"\">Trang bị</font></h2><p style=\"font-weight: normal; font-size: 10pt; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><img loading=\"lazy\" class=\"size-medium wp-image-185332 aligncenter\" src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-365x365.jpg\" alt=\"\" width=\"365\" height=\"365\" srcset=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-365x365.jpg 365w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-280x280.jpg 280w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-370x370.jpg 370w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-300x300.jpg 300w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-600x600.jpg 600w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5-100x100.jpg 100w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-5.jpg 700w\" sizes=\"(max-width: 365px) 100vw, 365px\" style=\"box-sizing: border-box; vertical-align: middle; border: 0px; max-width: 100%; clear: both; display: block; margin: 1em auto; text-align: center; height: auto;\"></p><p style=\"font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font style=\"\">Là bo mạch chủ Z690, Gigabyte Z690M AORUS ELITE được trang bị đầy đủ các tính năng hiện đại nhất:</font></p><ul style=\"font-weight: normal; font-size: 10pt; box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; list-style-type: square; padding-left: 20px; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"box-sizing: border-box; margin-bottom: 7px;\"><font style=\"\">12 + 1 + 2 phase nguồn cấp điện (12 cho CPU, 1 cho iGPU, 2 cho phần khiển PCIE và RAM): Đảm bảo cho mọi nhu cầu của người dùng từ cơ bản đến Overclocking các CPU đa nhân mạnh nhất.</font></li></ul><h2 style=\"font-size: 18px; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><font color=\"#3366ff\" style=\"\">Tính năng</font></h2><ul style=\"font-weight: normal; font-size: 10pt; box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; list-style-type: square; padding-left: 20px; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"box-sizing: border-box; margin-bottom: 7px;\"><font style=\"\">Gigabyte Z690M AORUS ELITE sở hữu hệ thống chân cắm ARGB cho phép chủ nhân điều khiển đến từng bóng LED của bất kỳ thiết bị kết nối nào có hỗ trợ qua phần mềm RGB Fusion</font></li><li style=\"font-weight: normal; box-sizing: border-box; margin-bottom: 7px;\">Heatsink trang bị khắp các vị trí quan trọng, nhiệt độ của bo mạch chủ Gigabyte luôn ở top đầu trong phân khúc.</li></ul><p style=\"font-weight: normal; font-size: 10pt; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><img loading=\"lazy\" class=\"size-medium wp-image-185330 aligncenter\" src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-365x365.jpg\" alt=\"\" width=\"365\" height=\"365\" srcset=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-365x365.jpg 365w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-280x280.jpg 280w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-370x370.jpg 370w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-300x300.jpg 300w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-600x600.jpg 600w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2-100x100.jpg 100w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/03/Mainboard-Gigabyte-Aorus-Z690M-Aorus-Elite-AX-DDR4-2.jpg 700w\" sizes=\"(max-width: 365px) 100vw, 365px\" style=\"box-sizing: border-box; vertical-align: middle; border: 0px; max-width: 100%; clear: both; display: block; margin: 1em auto; text-align: center; height: auto;\"></p>                                                                                                                                                                                                                                ', 'Mainboard_Gigabyte_Aorus_Elite.jpg', 5990000, 30, 0, 14, 10, '2022-04-08 02:46:21', 1),
(27, 'Chuột Logitech G203 Wired', '                                                                                                                                                <h1 class=\"product_title entry-title\" style=\"box-sizing: border-box; margin: 0px 0px 6px; line-height: 1.2; font-family: \" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" clear:=\"\" none;=\"\" padding:=\"\" 0px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font size=\"5\">Chuột Logitech G203 Lightsync Wired Gaming (910-005798) (Xanh Dương)</font></h1>                                                                                                                                ', '                                                                                                                                                <p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font face=\"Arial, Verdana\">Chuột Logitech G203 Lightsync Wired Gaming (910-005798) (Xanh Dương) được thiết kế dạng đối xứng nên người dùng có thể sử dụng bằng tay phải hoặc tay trái rất tiện lợi. Bạn có thể chỉnh mức thiết lập DPI, từ siêu chính xác ở 200 DPI hoặc cực nhanh ở 6.000 DPI cho bạn những cú click chuột cực kỳ ấn tượng. Nút click có tuổi thọ 10.000.000 lần. 6 nút nhấn có thể tùy ý gáng chức năng. Nút điều chình DPI với 4 nấc cơ bản. Bộ nhớ trong để lưu lại Profile Game. Đèn Leg RGB 16.8 triệu màu.</font><a href=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1.jpg\" style=\"color: rgb(0, 102, 204); font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; box-sizing: border-box; text-decoration-line: none; background: transparent; transition: all 0.5s ease 0s;\"><img loading=\"lazy\" class=\"size-medium wp-image-186408 aligncenter\" src=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-365x365.jpg\" alt=\"\" width=\"365\" height=\"365\" srcset=\"https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-365x365.jpg 365w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-280x280.jpg 280w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-370x370.jpg 370w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-300x300.jpg 300w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-600x600.jpg 600w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1-100x100.jpg 100w, https://tinhocngoisao.cdn.vccloud.vn/wp-content/uploads/2022/04/Chuot-Logitech-G203-Lightsync-Wired-Gaming-910-005798-Xanh-Duong-2-1.jpg 700w\" sizes=\"(max-width: 365px) 100vw, 365px\" style=\"text-align: start; box-sizing: border-box; vertical-align: middle; border: none; max-width: 100%; clear: both; display: block; margin: 1em auto; height: auto;\"></a></p>                                                                                                                                ', 'chuot_logitech.jpg', 449000, 20, 1, 15, 7, '2022-04-08 03:18:32', 1);
INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_short_description`, `product_long_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `product_category`, `product_brand`, `published_date`, `publication_status`) VALUES
(28, 'CPU Intel Core i9 12900K Alder Lake', '                                                                                                                                                                                                                                                            <h2 style=\"box-sizing: border-box; margin: 0px 0px 6px; line-height: 1.2; font-size: 24px; font-family: \" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" clear:=\"\" none;=\"\" padding:=\"\" 0px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><font color=\"#3366ff\">CPU Intel Core i9 12900K (3.20 Up to 5.20GHz | 30MB | 16C 24T | Socket 1700 | Alder Lake | UHD Graphics 770 | 125W)</font></h2>                                                                <div id=\"gtx-trans\" style=\"position: absolute; left: 435px; top: 5.68692px;\"><div class=\"gtx-trans-icon\"></div></div>                                                                                                                                                                ', '                                                                                                                                                                                                                                                            <h2 style=\"font-size: 30px; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" var(--mf-dark-color);=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><span style=\"box-sizing: border-box; color: rgb(255, 153, 0); font-weight: normal;\">Giới thiệu CPU Intel Core i9 12900K ( Socket 1700 | Alder Lake )</span></h2><div style=\"font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel Core i9-12900K là bộ xử lý dành cho máy tính để bàn có 16 nhân, ra mắt vào tháng 11 năm 2021. Nó là một phần của dòng Core i9, sử dụng kiến ​​trúc Alder Lake-S với Socket 1700. Nhờ Intel Hyper-Threading, số lõi là hiệu quả tăng gấp đôi, lên 24 luồng. Core i9-12900K có 30MB bộ nhớ đệm L3 và hoạt động ở tốc độ 3,2 GHz theo mặc định, nhưng có thể tăng lên đến 5,2 GHz, tùy thuộc vào khối lượng công việc. Intel đang chế tạo Core i9-12900K trên quy trình sản xuất 10 nm, chưa rõ số lượng bóng bán dẫn. Bạn có thể tự do điều chỉnh hệ số nhân đã mở khóa trên Core i9-12900K, điều này giúp đơn giản hóa việc ép xung rất nhiều, vì bạn có thể dễ dàng quay số ở bất kỳ tần số ép xung nào.<br>Với TDP 125 W, Core i9-12900K tiêu thụ rất nhiều điện năng, vì vậy chắc chắn cần phải làm mát tốt. Bộ xử lý của Intel hỗ trợ bộ nhớ DDR4 với giao diện kênh quảng cáo. Tốc độ bộ nhớ được hỗ trợ chính thức cao nhất là 3200 MHz, nhưng với khả năng ép xung (và các mô-đun bộ nhớ phù hợp), bạn có thể tăng cao hơn nữa. Để giao tiếp với các thành phần khác trong máy tính, Core i9-12900K sử dụng kết nối PCI-Express Gen 4. Bộ xử lý này có giải pháp đồ họa tích hợp UHD Graphics 770.<br>Ảo hóa phần cứng có sẵn trên Core i9-12900K, giúp cải thiện đáng kể hiệu suất máy ảo. Ngoài ra, ảo hóa IOMMU (truyền qua PCI) được hỗ trợ để các máy ảo khách có thể sử dụng trực tiếp phần cứng máy chủ. Các chương trình sử dụng Phần mở rộng vectơ nâng cao (AVX) sẽ chạy trên bộ xử lý này, tăng hiệu suất cho các ứng dụng nặng về tính toán. Bên cạnh AVX, Intel cũng đã hỗ trợ thêm cho các lệnh AVX2 và AVX-512 mới hơn.</div><div style=\"font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><br><h2 work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" var(--mf-dark-color);=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\" style=\"font-size: 24px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\"><strong style=\"box-sizing: border-box;\"><font color=\"#3366ff\">Thông tin kỹ thuật</font></strong></h2></div><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Số hiệu Bộ xử lý: i9-12900K</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Số lõi: 16</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"># of Performance-cores: 8</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"># of Efficient-cores: 8</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Số luồng: 24</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Tần số turbo tối đa: 5.20 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Tần Số Công Nghệ Intel® Turbo Boost Max 3.0 : 5.20 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Performance-core Max Turbo Frequency: 5.10 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Efficient-core Max Turbo Frequency: 3.90 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Performance-core Base Frequency: 3.20 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Efficient-core Base Frequency: 2.40 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Bộ nhớ đệm: 30 MB Intel® Smart Cache</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Total L2 Cache: 14 MB</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Processor Base Power: 125 W</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Maximum Turbo Power: 241 W</p><h2 style=\"font-size: 14px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><strong style=\"font-size: 24px; box-sizing: border-box;\"><font color=\"#3366ff\">Thông số bộ nhớ</font></strong></h2><h2 style=\"font-size: 14px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><span style=\"color: rgb(102, 102, 102); font-size: 10pt;\">Dung lượng bộ nhớ tối Đa (tùy vào loại bộ nhớ) : 128 GB</span></h2><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Các loại bộ nhớ: Up to DDR5 4800 MT/s | Up to DDR4 3200 MT/s</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Số Kênh Bộ Nhớ Tối Đa: 2</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Băng thông bộ nhớ tối đa: 76.8 GB/s</p><h2 style=\"font-size: 24px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" color:=\"\" var(--mf-dark-color);=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><strong style=\"box-sizing: border-box;\"><font color=\"#3366ff\">Đồ họa Bộ xử lý</font></strong></h2><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Đồ họa bộ xử lý: Intel® UHD Graphics 770</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Tần số cơ sở đồ họa: 300 MHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Tần số động tối đa đồ họa: 1.55 GHz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Đầu ra đồ họa: eDP 1.4b, DP 1.4a, HDMI 2.1</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Đơn Vị Thực Thi: 32</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Độ Phân Giải Tối Đa (HDMI 1.4) : 4096 x 2160 @ 60Hz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Độ Phân Giải Tối Đa (DP) : 7680 x 4320 @ 60Hz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Độ Phân Giải Tối Đa (eDP – Integrated Flat Panel) : 5120 x 3200 @ 120Hz</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Hỗ Trợ DirectX*: 12</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Hỗ Trợ OpenGL*: 4.5</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Multi-Format Codec Engines: 2</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Đồng bộ nhanh hình ảnh Intel®: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ video HD rõ nét Intel®: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Số màn hình được hỗ trợ : 4</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">ID Thiết Bị: 0x4680</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">OpenCL* Support: 2.1</p><h2 style=\"font-size: 24px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><strong style=\"box-sizing: border-box;\"><font color=\"#3366ff\">Các tùy chọn mở rộng</font></strong></h2><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Direct Media Interface (DMI) Revision: 4.0</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Max # of DMI Lanes: 8</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Khả năng mở rộng: 1S Only</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Phiên bản PCI Express: 5.0 and 4.0</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Cấu hình PCI Express: Up to 1×16+4, 2×8+4</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Số cổng PCI Express tối đa: 20</p><h2 style=\"font-size: 24px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><strong style=\"box-sizing: border-box;\"><font color=\"#3366ff\">Thông số gói</font></strong></h2><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Hỗ trợ socket: FCLGA 1700</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Cấu hình CPU tối đa: 1</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Thông số giải pháp Nhiệt: PCG 2020A</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">JUNCTION: 100°C</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Kích thước gói: 45.0 mm x 37.5 mm</p><h2 style=\"font-size: 24px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><strong style=\"box-sizing: border-box;\"><font color=\"#3366ff\">Các công nghệ tiên tiến</font></strong></h2><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® Gaussian &amp; Neural Accelerator: 3.0</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® Thread Director: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Tăng cường học sâu Intel® Deep Learning Boost (Intel® DL Boost) : Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Hỗ trợ bộ nhớ Intel® Optane™: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công Nghệ Intel® Speed Shift: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công Nghệ Intel® Turbo Boost Max 3.0: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ Intel® Turbo Boost: 2.0</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ siêu Phân luồng Intel®: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ ảo hóa Intel® (VT-x) : Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ ảo hóa Intel® cho nhập/xuất được hướng vào (VT-d) : Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® VT-x với bảng trang mở rộng: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® 64: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Bộ hướng dẫn: 64-bit</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Phần mở rộng bộ hướng dẫn: Intel® SSE4.1, Intel® SSE4.2, Intel® AVX2</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Trạng thái chạy không: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ Intel SpeedStep® nâng cao: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Công nghệ theo dõi nhiệt: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® Volume Management Device (VMD) : Có</p><h2 style=\"font-size: 24px; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; line-height: 1.2;\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><strong style=\"box-sizing: border-box;\"><font color=\"#3366ff\">Bảo mật &amp; độ tin cậy</font></strong></h2><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® AES New Instructions: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Khóa bảo mật: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® OS Guard: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Bit vô hiệu hoá thực thi: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® Boot Guard: Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Điều Khiển Thực Thi Theo Từng Chế Độ (MBE) : Có</p><p style=\"font-size: 10pt; font-weight: normal; box-sizing: border-box; margin-top: 0px; margin-bottom: 1.7em; color: rgb(102, 102, 102);\" work=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Intel® Control-Flow Enforcement Technology: Có</p>                                                                                                                                                                                                                                ', 'CPU-i9-12900K_BCH1.jpg', 14990000, 10, 0, 11, 9, '2022-04-08 03:40:26', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `promo_id` int(11) NOT NULL,
  `promo_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `active_code` tinyint(4) NOT NULL COMMENT 'Active=1,Unactive=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_promo`
--

INSERT INTO `tbl_promo` (`promo_id`, `promo_code`, `promo_value`, `active_code`) VALUES
(1, 'SHOP1234', '10', 1),
(5, 'NEMOTH', '99', 1),
(9, 'EEPOHS', '200000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `shipping_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `shipping_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `customer_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`) VALUES
(17, 0, 'ảg', 'tgfg@gdfg.com', 'dfwsdf', '2323'),
(18, 0, 'tt', 'asda@asd.om', 'asda', 'sdad'),
(19, 0, 'hieu', 'hieu@hieu.hieu', 'hh', '12345678'),
(38, 0, 'test', 'dsfd@df.cpo', 'fgds', '2313'),
(39, 0, 'test', 'fds@df.cvdo', 'ytg', '1231');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slider_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slider_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_title`, `slider_image`, `slider_link`, `publication_status`) VALUES
(19, 'Intel', 'intel.jpg', 'http://localhost/Shop/', 1),
(20, 'Hynix', 'hynix.jpg', 'http://localhost/Shop/', 1),
(21, 'Kingston', 'kingston.png', 'http://localhost/Shop/', 1),
(22, 'Logitech', 'logitech.jpg', 'http://localhost/Shop/', 1),
(23, 'Seagate', 'seagate.png', 'http://localhost/Shop/', 1),
(24, 'Samsung', 'Samsung.jpg', 'http://localhost/Shop/', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `created_time`, `updated_time`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2017-11-13 18:31:36', '2017-11-13 18:31:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_option`
--
ALTER TABLE `tbl_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
