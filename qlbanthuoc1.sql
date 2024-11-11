-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2024 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbanthuoc1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(3) NOT NULL,
  `userid` int(3) NOT NULL,
  `ngay_gui` varchar(20) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `gopy` varchar(300) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `userid`, `ngay_gui`, `tieude`, `gopy`, `status`) VALUES
(8, 16, '22:31 02/11/2024', 'te', 'te', 0),
(9, 16, '22:54 02/11/2024', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0),
(10, 16, '22:54 02/11/2024', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muc`
--

CREATE TABLE `muc` (
  `id` int(3) NOT NULL,
  `id_danh_muc` int(3) NOT NULL,
  `danh_muc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `muc`
--

INSERT INTO `muc` (`id`, `id_danh_muc`, `danh_muc`) VALUES
(1, 1, 'Thận, tiền liệt tuyến'),
(1, 2, 'Cơ xương khớp'),
(1, 3, 'Hô hấp, ho, xoang'),
(2, 1, 'Vi sinh - Probiotic'),
(2, 2, 'Dạ dày, tá tràng'),
(2, 3, 'Táo bón'),
(2, 4, 'Đại tràng'),
(2, 5, 'Hỗ trợ tiêu hóa'),
(2, 6, 'Khó tiêu'),
(3, 1, 'Hỗ trợ làm đẹp'),
(3, 2, 'Tóc'),
(3, 3, 'Da'),
(3, 4, 'Hỗ trợ giảm cân'),
(4, 1, 'Sinh lý nam'),
(4, 2, 'Sinh lý nữ'),
(4, 3, 'Hỗ trợ mãn kinh'),
(4, 4, 'Cân bằng nội tiết tố'),
(5, 1, 'Vitamin & Khoáng chất'),
(5, 2, 'Bổ sung Canxi & Vitamin D'),
(6, 1, 'Bổ não - cải thiện trí nhớ'),
(6, 2, 'Tuần hoàn máu'),
(6, 3, 'Thần kinh não'),
(6, 4, 'Hỗ trợ giấc ngủ ngon'),
(7, 1, 'Sức khoẻ tim mạch'),
(7, 2, 'Giảm Cholesterol'),
(8, 1, 'Sữa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muclon`
--

CREATE TABLE `muclon` (
  `id` int(3) NOT NULL,
  `ten_muc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `muclon`
--

INSERT INTO `muclon` (`id`, `ten_muc`) VALUES
(1, 'Hỗ trợ điều trị'),
(2, 'Hỗ trợ tiêu hoá'),
(3, 'Hỗ trợ làm đẹp'),
(4, 'Sinh lý - Nội tiết tố'),
(5, 'Vitamin - Khoáng chất'),
(6, 'Thần kinh não'),
(7, 'Sức khoẻ tim mạch'),
(8, 'Dinh dưỡng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `ma_don_hang` varchar(20) NOT NULL,
  `user_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `total` int(9) NOT NULL,
  `status` int(1) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `ma_don_hang`, `user_id`, `name`, `email`, `sdt`, `address`, `comment`, `total`, `status`, `time`) VALUES
(13, 'DH17306065037335', 16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', '09', '', 396000, 2, '11:01 03/11/2024'),
(14, 'DH17306069889033', 16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', '09', '', 792000, 0, '11:09 03/11/2024'),
(15, 'DH17306073676399', 16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', '09', '', 489250, 0, '11:16 03/11/2024'),
(16, 'DH17307052878200', 16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', '09', '', 1881000, 0, '14:28 04/11/2024'),
(17, 'DH17307890937704', 16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', 'Thường Tín, Hà Nội', '', 1227400, 0, '13:44 05/11/2024'),
(18, 'DH17312275265726', 16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', 'Thường Tín , Hà Nội', '', 256500, 1, '15:32 10/11/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(4) NOT NULL,
  `order_id` int(4) NOT NULL,
  `id_san_pham` int(4) NOT NULL,
  `sl` int(3) NOT NULL,
  `gia` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `id_san_pham`, `sl`, `gia`) VALUES
(9, 13, 1, 1, 396000),
(10, 14, 1, 2, 396000),
(11, 15, 26, 1, 489250),
(12, 16, 15, 2, 940500),
(13, 17, 33, 1, 376200),
(14, 17, 46, 2, 425600),
(15, 18, 11, 1, 256500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `id` int(4) NOT NULL,
  `chietkhau` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`id`, `chietkhau`) VALUES
(1, 20),
(2, 4),
(4, 30),
(14, 30),
(18, 30),
(22, 30),
(40, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(5) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia` int(9) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `danh_muc` varchar(50) DEFAULT NULL,
  `quy_cach` text DEFAULT NULL,
  `nha_san_xuat` varchar(60) DEFAULT NULL,
  `nuoc_san_xuat` varchar(15) DEFAULT NULL,
  `thanh_phan` text DEFAULT NULL,
  `cong_dung` text DEFAULT NULL,
  `doi_tuong_su_dung` text DEFAULT NULL,
  `cach_su_dung` text DEFAULT NULL,
  `thoi_han_su_dung` varchar(20) DEFAULT NULL,
  `bao_quan` text DEFAULT NULL,
  `luu_y_khi_su_dung` text DEFAULT NULL,
  `so_dang_ky` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `gia`, `img`, `danh_muc`, `quy_cach`, `nha_san_xuat`, `nuoc_san_xuat`, `thanh_phan`, `cong_dung`, `doi_tuong_su_dung`, `cach_su_dung`, `thoi_han_su_dung`, `bao_quan`, `luu_y_khi_su_dung`, `so_dang_ky`) VALUES
(1, 'Viên uống Golex Ocavill hỗ trợ chống lại sự phình to của tuyến tiền liệt, cải thiện các rối loạn tiểu tiện (30 viên)', 495000, '1.png', 'Thận, tiền liệt tuyến', 'Hộp 30 Viên', 'THE OXFORD HEALTH COMPANY LTD', 'Anh', 'Chiết xuất Cây cọ lùn (Saw Palmetto), Hạt bí ngô, Tầm ma, Kẽm, Lycopene, Vitamin E, Vitamin B6', 'Golex hỗ trợ chống lại sự phình to của tuyến tiền liệt, cải thiện các rối loạn tiểu tiện ở bệnh nhân phì đại tiền liệt tuyến: Tiểu đêm, tiểu buốt, tiểu không hết, tiểu nhiều lần. Hạn chế sự phát triển của u xơ tiền liệt tuyến lành tính hoặc sử dụng để hỗ trợ sau phẫu thuật.', 'Golex dùng trong các trường hợp: Nam giới ở tuổi trung và cao niên, có các triệu chứng như rối loạn tiểu tiện như: Tiểu đêm, tiểu buốt, tiểu rắt, tiểu không hết, tiểu nhiều lần, tia nước tiểu yếu... Nam giới bị u xơ tiền liệt tuyến lành tính hoặc sử dụng để hỗ trợ sau phẫu thuật.', 'Uống 2 viên mỗi ngày, uống sau bữa ăn.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Người đang dùng thuốc, phụ nữ mang thai hoặc cho con bú, hỏi ý kiến thầy thuốc trước khi dùng. Thực phẩm bảo vệ sức khỏe, không thể thay thế chế độ ăn uống đa dạng và cân bằng. Không dùng cho người dưới 18 tuổi.', '9471/2023/ĐKSP'),
(2, 'Viên nhai Borne Mineral New Nordic hỗ trợ phát triển xương, giúp tăng chiều cao, tăng đề kháng (120 viên)', 635000, '2.jpg', 'Cơ xương khớp', 'Hộp 120 Viên', 'LEGOSAN AB', 'Thụy Điển', 'Canxi, Magie, Vitamin D3', 'Borne Mineral hỗ trợ sự phát triển của xương giúp tăng trưởng chiều cao, giảm nguy cơ còi xương thấp bé, phòng ngừa thiếu canxi ở trẻ em và hỗ trợ tăng cường sức đề kháng.', 'Borne Mineral dùng trong các trường hợp sau: Trẻ em từ 3 tuổi trở lên. Trẻ bị thiếu canxi. Còi xương. Chậm lớn. Trẻ ở tuổi dậy thì cần tăng chiều cao.', 'Nhai 2 viên mỗi ngày.', '18 tháng kể từ ngày ', 'Đậy kín sản phẩm, bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp. Để xa tầm tay trẻ em.', 'Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Phụ nữ có thai và cho con bú, trẻ em dưới 3 tuổi phải tham khảo ý kiến của chuyên gia chăm sóc sức khỏe trước khi sử dụng. Không dùng cho người tiểu đường. Không dùng cho người tăng canxi huyết. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '6120/2023/ĐKSP'),
(3, 'Thực phẩm bảo vệ sức khỏe Calcium Premium JpanWell bổ sung canxi, giảm nguy cơ loãng xương (120 viên)', 920000, '3.jpg', 'Cơ xương khớp', 'Hộp 120 Viên', 'Have fun Factory Co., Ltd', 'Nhật Bản', 'Canxi từ vỏ sò, Chất xơ hòa tan, Vi khuẩn acid lactic, Magie, Sắt, Vitamin B2, Vitamin B1, Vitamin D3, Vitamin K2', 'Thực phẩm bảo vệ sức khỏe Calcium Premium bổ sung canxi, một số các vitamin (vitamin B1, vitamin B2, vitamin D3, vitamin K2) và khoáng chất (magie, sắt) cho cơ thể; hỗ trợ tăng khả năng hấp thụ canxi; hỗ trợ giảm nguy cơ loãng xương.', 'Thực phẩm bảo vệ sức khỏe Calcium Premium thích hợp dùng cho người trưởng thành.', 'Uống 2 - 4 viên/ngày với nước nguội hoặc nước ấm.', '3 năm kể từ ngày sản', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Người đang điều trị bệnh, người đang dùng các loại thuốc, phụ nữ mang thai, phụ nữ cho con bú vui lòng tham khảo ý kiến chuyên gia trước khi sử dụng. Không sử dụng cho người mẫn cảm, kiêng kị với bất kỳ thành phần nào của sản phẩm. Không sử dụng cho đối tượng tăng canxi huyết, canxi niệu.', '6734/2023/ĐKSP'),
(4, 'Viên uống Rama Bổ Phổi hỗ trợ bổ phổi, giảm ho (30 viên)', 132000, '4.jpg', 'Hô hấp, ho, xoang', 'Hộp 30 Viên', 'CÔNG TY TNHH CÔNG NGHỆ HERBITECH', 'Việt Nam', 'Cao hỗn hợp thảo mộc, Chiết xuất Mạch môn, chiết xuất cúc tím, Chiết xuất gừng, Chiết xuất xuyên tâm liên, Chiết xuất Trần bì, Chiết xuất Huyết giác, Chiết xuất Đông trùng hạ thảo, Vitamin C, Fucoidan 80%', 'Rama Bổ Phổi hỗ trợ bổ phổi, hỗ trợ giảm ho, giảm đờm, giảm đau rát họng, khản tiếng do viêm họng, viêm phế quản.', 'Rama Bổ Phổi thích hợp dùng cho trẻ em từ 6 tuổi trở lên và người lớn bị ho, ho có đờm, đau rát họng, khản tiếng do viêm họng, viêm phế quản.', 'Trẻ 6 - 12 tuổi: Uống 1 viên/lần x 1 lần/ngày. Trẻ trên 12 tuổi và người lớn: Uống 1 viên/lần x 2 - 3 lần/ngày. Uống sau ăn.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng mặt trời trực tiếp. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Phụ nữ có thai, người đang dùng thuốc, điều trị bệnh tham khảo ý kiến bác sĩ trước khi dùng. Không dùng trong thời gian dài. Không dùng cho người tì vị hư yếu, đi đại tiện lỏng, ăn uống chậm tiêu.', '1714/2022/ĐKSP'),
(5, 'Viên uống Ericllux Ocavill hỗ trợ tăng tiết dịch khớp, giúp khớp vận động linh hoạt (60 viên)', 650000, '5.jpg', 'Cơ xương khớp', 'Hộp 60 Viên', 'GRICAR', 'Ý', 'Glucosamin sulfat 2KCL, Methyl sulfonyl methan (MSM), Chondroitin sulfate, Nghệ, Bromelain 2500 GDU/g, Collagen thủy phân type 1, Calcium Carbonate, Vitamin D3, Vitamin K2 MK7, Kẽm (kẽm oxit), Vitamin B1', 'Ericllux hỗ trợ tăng tiết dịch khớp, giúp khớp vận động linh hoạt, giúp giảm các triệu chứng đau khớp, khô khớp do viêm khớp, thoái hóa khớp. Hỗ trợ giảm nguy cơ viêm khớp, thoái hóa khớp.', 'Ericllux thích hợp dùng cho người trưởng thành bị thoái hóa khớp, viêm khớp, khô khớp.', 'Uống 2 viên/ngày sau ăn.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Chưa có thông tin về tác dụng phụ của sản phẩm.', '6002/2022/ĐKSP'),
(6, 'Viên uống Calci Nano Hải Thượng Vương bổ sung Calci, vitamin D3 cho cơ thể (60 viên)', 347000, '6.jpg', 'Cơ xương khớp', 'Hộp 60 Viên', 'CÔNG TY DƯỢC PHẨM VÀ THƯƠNG MẠI THÀNH CÔNG - TNHH', '\r\nViệt Nam', 'Calci carbonate nano, Aquamin F, Calci gluconat, Menaquinone MK7, Magie, Kẽm Gluconat, Vitamin D3, Đường Fructose - Oligosaccharide', 'Calci Nano Hải Thượng Vương bổ sung canxi, vitamin D3 cho cơ thể, giúp xương răng chắc khỏe, hỗ trợ cho trẻ em trong giai đoạn phát triển, giảm nguy cơ còi xương ở trẻ và loãng xương ở người lớn.', 'Calci nano Hải Thượng Vương dùng trong các trường hợp sau: Người lớn và trẻ em cần bổ sung canxi và vitamin D. Người lớn bị loãng xương, trẻ em bị còi xương, chậm mọc răng do thiếu vitamin D và canxi.', 'Người lớn và trẻ em trên 6 tuổi: Ngày uống 02 viên/lần. Nên uống vào buổi sáng hoặc buổi trưa và uống với nhiều nước để đạt được hiệu quả.', '3 năm kể từ ngày sản', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp. Đậy nắp kỹ sau khi sử dụng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.', '11156/2021/ĐKSP'),
(7, 'Viên uống Triple Strength Glucosamine 1500mg Pharmekal bổ sung dưỡng chất cho khớp (60 viên)', 296000, '7.jpg', 'Cơ xương khớp', 'Hộp 60 Viên', 'NATURAL VITAMINS LABORATORY CROP', 'Hoa Kỳ', 'Glucosamine Hydrochloride, MSM, Collagen type I&III, Stearic acid, Magnesium stearate, Silicon Dioxyde, Croscamello Sodium, Chondroitin sulfate, Vitamin D3', 'Triple Strength Glucosamine bổ sung dưỡng chất cho khớp, hỗ trợ khớp vận động và linh hoạt.', 'Triple Strength Glucosamine dùng cho người trưởng thành vận động khớp khó khăn, khô khớp do thoái hóa khớp.', 'Uống 2 viên nén/ngày, có thể dùng với bữa ăn.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người có mẫn cảm với bất kỳ thành phần nào của sản phẩm. Không dùng cho phụ nữ có thai, phụ nữ cho con bú, trẻ em, trẻ vị thành niên dưới 18 tuổi. Tham khảo ý kiến của chuyên gia trước khi uống nếu bạn đang dùng bất kỳ loại thuốc nào. Ngưng sử dụng nếu có bất kỳ phản ứng bất lợi nào xảy ra. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '2814/2022/ĐKSP'),
(8, 'Siro Ginkid Ho Cam NEW 80ml hỗ trợ bổ phế, giảm ho, nhuận phế', 59000, '8.jpg', 'Hô hấp, ho, xoang', 'Hộp x 80ml', 'ABIPHA', 'Việt Nam', 'Húng chanh, Mật ong, Thymomodulin, Xuyên bối mẫu, Trần bì, Kim ngân hoa, Tang bạch bì, Cát cánh, Bách bộ, Tỳ bà diệp', 'Ginkid Ho Cam hỗ trợ bổ phế, giảm ho, nhuận phế. Hỗ trợ giảm các triệu chứng: ho, cảm lạnh, hắt hơi, sổ mũi, ho do lạnh.', 'Ginkid Ho Cam dùng cho trẻ em từ 6 tháng tuổi trở lên trong các trường hợp sau: Trẻ em ho do lạnh, ho do dị ứng thời tiết, ho gió, ho khan, viêm họng, viêm phế quản, sưng đau rát họng, khàn tiếng. Trẻ bị cảm lạnh, hắt hơi, sổ mũi.', 'Trẻ em 6 tháng đến 1 tuổi: Uống 2,5ml/lần x 2 lần/ngày.\r\nTrẻ em từ 1 - 3 tuổi: Uống 5ml/lần x 2 lần/ngày.\r\nTrẻ em từ 3 - 6 tuổi: Uống 10ml/lần x 2 lần/ngày.\r\nTrẻ em từ 6 - 12 tuổi: Uống 10ml/lần x 2 - 3 lần/ngày.\r\nTrẻ em từ 12 tuổi trở lên: Uống 15ml/lần x 2 lần/ngày.', '18 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng.', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '7144/2018/ĐKSP'),
(9, 'Viên uống Lung Care+ Jpanwell hỗ trợ hệ hô hấp, giúp phổi khỏe mạnh (60 viên)', 995000, '9.jpg', 'Hô hấp, ho, xoang', 'Hộp 60 Viên', 'GENSEI CO.,LTD', 'Nhật Bản', 'Bột hoa cúc tím', 'Lung Care+ hỗ trợ nâng cao sức khỏe, giúp tăng cường thể lực. Hỗ trợ hệ hô hấp khỏe mạnh.', 'Lung Care+ thích hợp cho người trưởng thành trong các trường hợp: Cần tăng cường thể lực, nâng cao sức khỏe. Cần hỗ trợ hệ hô hấp khỏe mạnh.', 'Uống 2 viên/ngày với nước nguội hoặc nước ấm.', '2 năm từ ngày sản xu', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp. Để xa tầm tay của trẻ em.', 'Cân bằng chế độ dinh dưỡng giữa các bữa chính, bữa phụ. Nếu bạn bị dị ứng thực phẩm, vui lòng đọc kỹ các thành phần trước khi sử dụng. Ngưng sử dụng sản phẩm khi có bất cứ dấu hiệu bất lợi nào với cơ thể. Sản phẩm này có chứa các nguyên liệu có nguồn gốc tự nhiên, nên màu sắc hương vị tổng hợp có thể hơi khác nhưng không ảnh hưởng đến chất lượng của sản phẩm.', '3408/2022/ĐKSP'),
(10, 'Xịt họng Xuyên Tâm Liên Hải Thượng Vương hỗ trợ giảm ho, giảm đờm, giảm đau rát họng, khàn tiếng (30ml)', 106000, '10.jpg', 'Hô hấp, ho, xoang', 'Hộp', 'VESTA', 'Việt Nam', 'Keo Ong, Cao lá thường xuân, Xuyên tâm liên, Chiết xuất cúc la mã, dịch chiết quả sơ ri, Tinh dầu bạc hà, chiết xuất cúc tím', 'Xuyên Tâm Liên Hải Thượng Vương hỗ trợ giảm ho, giảm đờm, giảm đau rát họng, khản tiếng do viêm họng, viêm phế quản.', 'Xuyên Tâm Liên Hải Thượng Vương thích hợp dùng cho trẻ từ 3 tuổi và người lớn bị ho, ho có đờm do viêm họng, viêm phế quản.', 'Mỗi nhịp xịt khoảng 0,2ml. Trẻ từ 3 tuổi đến 12 tuổi: Ngày xịt 2 lần, mỗi lần 2 - 3 nhịp (tương đương 0,8ml - 1,2 ml/ngày). Trẻ trên 12 tuổi và người lớn: Ngày xịt 2 lần, mỗi lần 3 - 4 nhịp (tương đương 1,2ml - 1,6ml/ngày', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không dùng trong thời gian dài ảnh hưởng tới đường tiêu hóa. Không dùng Xuyên Tâm Liên Hải Thượng Vương cho các trường hợp sau: Người bị tiêu chảy. Trẻ có tiền sử động kinh, co giật, sốt cao. Người mẫn cảm với bất cứ thành phần nào của sản phẩm. Người đang sử dụng thuốc điều trị bệnh, phụ nữ mang thai tham khảo ý kiến chuyên gia y tế trước khi sử dụng. Không dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '1397/2022/ĐKSP'),
(11, 'Bào tử lợi khuẩn Livespo DIA 30 hỗ trợ giảm các triệu chứng tiêu chảy cấp tính, rối loạn tiêu hoá (10 ống x 5ml)', 270000, '11.jpg', 'Vi sinh - Probiotic', 'Hộp 2 Vỉ x 5 Ống x 5ml', 'NHÀ MÁY SỐ 2 - CÔNG TY LIVESPO PHARMA', 'Việt Nam', 'Bacillus coagulans, Bacillus subtilis, Bacillus clausii', 'Công dụng của Bào tử lợi khuẩn DIA LiveSpo DIA 30 hỗ trợ giảm các triệu chứng tiêu chảy cấp tính, rối loạn tiêu hoá. Bổ sung lợi khuẩn ở dạng bào tử giúp hỗ trợ cân bằng hệ vi sinh đường ruột.', 'LiveSpo DIA 30 thích hợp dùng cho trẻ em và người lớn trong các trường hợp sau: Người bị rối loạn tiêu hoá, tiêu chảy cấp tính do loạn khuẩn đường ruột, ngộ độc thực phẩm, ngộ độc hoá chất. Người muốn duy trì cân bằng hệ vi sinh đường ruột.', 'Lắc kỹ ống trước khi dùng. Uống trước hoặc sau khi ăn.\r\nNgười đang bị tiêu chảy và rối loạn tiêu hóa:\r\nNgười lớn: Uống 2 ống/lần. Ngày 2 - 4 lần, mỗi lần cách nhau từ 3 giờ.\r\nTrẻ từ 2 - 6 tuổi: Uống 1 - 2 ống/lần. Ngày 2 - 4 lần, mỗi lần cách nhau từ 3 giờ.\r\nTrẻ nhỏ dưới 2 tuổi: Uống theo chỉ dẫn của bác sĩ.\r\nNgười duy trì cân bằng hệ vi sinh đường ruột: Uống 1 ống/lần. Ngày 3 lần vào các bữa ăn sáng, trưa, tối trong vòng một tuần. Tiếp theo dùng liều 1 ống/ngày trong vòng ít nhất 1 tháng.', '12/2026', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng.\r\nĐể xa tầm tay trẻ em.\r\n', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm.\r\n\r\nSản phẩm dùng được cho trẻ sơ sinh, phụ nữ mang thai và phụ nữ đang cho con bú.\r\n\r\nChỉ uống, không được tiêm.\r\n\r\nCó thể nhìn thấy các hạt nhỏ trong ống do sự tập hợp các bào tử lợi khuẩn Bacillus. Điều đó chỉ ra sản phẩm không bị thay đổi chất lượng.\r\n\r\nKhông dùng quá liều khuyến cáo.\r\n\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\n\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '\r\n6547/2019/ĐKSP\r\n'),
(12, 'Dung dịch Bảo Dạ Phương Y Nam hỗ trợ giảm acid dịch vị, bảo vệ niêm mạc dạ dày (15 gói x 15ml)', 115000, '12.jpg', 'Dạ dày, tá tràng', 'Hộp 15 Gói x 15ml', 'CHI NHÁNH CÔNG TY CỔ PHẦN DƯỢC PHẨM SYNTECH - NHÀ MÁY HẢI DƯ', 'Việt Nam', 'Hậu phác, Chè dây, Bồ Công Anh, Lá khổ sâm, Uất Kim, Nano Curcumin 5%, Cam thảo, Magnesium Trisilicate, Dried aluminium hydroxide, Cao dạ cẩm, Cao lá khôi, Bột ô tặc cốt, Ngải cứu', 'Bảo Dạ Phương Y Nam hỗ trợ giảm acid dịch vị, hỗ trợ bảo vệ niêm mạc dạ dày.\r\nHỗ trợ giảm nguy cơ viêm loét dạ dày, tá tràng.', 'Bảo Dạ Phương Y Nam thích hợp sử dụng cho các trường hợp sau:\r\nNgười viêm loét dạ dày, tá tràng.\r\nNgười có nguy cơ viêm loét dạ dày, tá tràng.', 'Uống lúc đói trước khi ăn hoặc uống khi đau.\r\nTrẻ em từ 6 - 12 tuổi: Uống 15 ml/lần, ngày 2 lần.\r\nNgười lớn và trẻ em trên 12 tuổi: Uống 15 ml/lần, ngày 3 lần.\r\nĐể đảm bảo hiệu quả sản phẩm mỗi đợt dùng ít nhất 01 tháng.', '18 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng.\r\nĐể xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. \r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '9191/2021/ĐKSP'),
(13, 'Siro Ginkid GINIC nhuận tràng, bổ sung chất xơ (3 vỉ x 5 ống x 10ml)', 100000, '13.jpg', 'Táo bón', 'Hộp 3 Vỉ x 5 Ống x 10ml', 'ABIPHA', 'Việt Nam', 'Tinh chất men bia, Inulin, Fructooligosaccharides, Phan tả diệp', 'Ginkid Nhuận Tràng bổ sung chất xơ, giúp nhuận tràng giảm táo bón, giúp tiêu hóa tốt, hỗ trợ phát triển vi khuẩn có ích đường ruột.', 'Ginkid Nhuận Tràng dùng cho trẻ em từ 1 tuổi trở lên trong các trường hợp sau:\r\nTrẻ em bị táo bón, tiêu hóa kém.\r\nTrẻ em không bổ sung đủ chất xơ trong chế độ ăn.', 'Trẻ em từ 1 - 3 tuổi: Uống 5ml/lần x 2 - 3 lần/ngày.\r\nTrẻ em từ 4 - 6 tuổi: Uống 10ml/lần x 2 lần/ngày.\r\nTrẻ em từ 6 - 9 tuổi: Uống 15ml/lần x 2 - 3 lần/ngày.\r\nTrẻ em từ 10 tuổi trở lên: Uống 20ml/lần x 2 lần/ngày.', '10/2026', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng.\r\nĐể xa tầm tay trẻ em.\r\n', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. \r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '60/2020/ĐKSP'),
(14, 'Dung dịch LiveSpo Clausy bổ sung lợi khuẩn, giúp cân bằng hệ vi sinh đường ruột (25 ống x 5ml)', 159000, '14.jpg', 'Vi sinh - Probiotic', 'Hộp 25 Ống x 5ml', 'NHÀ MÁY SỐ 2 - CÔNG TY LIVESPO PHARMA', 'Việt Nam', 'Bacillus clausii', 'LiveSpo Clausy bổ sung lợi khuẩn, giúp cải thiện hệ vi sinh đường ruột.\r\nHỗ trợ giảm các triệu chứng và nguy cơ rối loạn tiêu hóa do loạn khuẩn đường ruột.', 'LiveSpo Clausy dùng trong các trường hợp:\r\n\r\nNgười bị tiêu hoá kém, ăn không tiêu, đi ngoài phân sống, tiêu chảy do loạn khuẩn đường ruột.\r\nNgười dùng kháng sinh gây rối loạn khuẩn đường ruột.\r\nSản phẩm dùng được cho cả trẻ em, phụ nữ mang thai và đang cho con bú.', 'Lắc kỹ ống trước khi uống, có thể pha với nước nóng, sữa nóng hoặc theo chỉ dẫn của bác sĩ.\r\nNgười lớn uống: 2 - 3 ống/ngày.\r\nTrẻ từ 3 tháng tuổi trở lên uống: 2 ống/ngày.\r\nTrẻ nhỏ dưới 3 tháng tuổi: Theo chỉ dẫn của bác sĩ.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C, tránh ánh sáng trực tiếp.\r\nĐể xa tầm tay trẻ em.\r\n', 'Chỉ uống, không được tiêm.\r\nCó thể nhìn thấy các hạt nhỏ trong ống do sự tập hợp các bào tử lợi khuẩn Bacillus. Điều đó chỉ ra sản phẩm không bị thay đổi chất lượng.\r\nKhông sử dụng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm.\r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '4071/2021/ĐKSP'),
(15, 'Viên uống Bifido Plus Jpanwell bổ sung các lợi khuẩn tăng cường sức khỏe đại tràng (30 viên)', 990000, '15.jpg', 'Đại tràng', 'Hộp 30 Viên', 'ALIMENT INDUSTRY CO.,LTD', 'Nhật Bản', 'Chất xơ hòa tan, oligosaccharides trong sữa, Lactic acid bacteria, Bifidobacterium BB536', 'Bifido Plus bổ sung các lợi khuẩn tăng cường sức khỏe đại tràng; giúp giảm thiểu các chứng bệnh hay mắc ở đại tràng.\r\nGiảm nguy cơ rối loạn tiêu hóa, cải thiện các triệu chứng ăn uống kém, đầy hơi, khó tiêu, chướng bụng và táo bón.', 'Bifido Plus thích hợp dùng cho người trưởng thành muốn tăng cường sức khỏe đại tràng, người có các chứng bệnh liên quan đến đại tràng và hệ tiêu hóa.', 'Uống 1 viên/ngày với nước nguội hoặc nước ấm.', '24 tháng', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng.\r\nĐể xa tầm tay trẻ em.\r\n', 'Không dùng cho người mẫn cảm với các thành phần của sản phẩm.\r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '9918/2021/ÐKSP'),
(16, 'Viên uống hỗ trợ dạ dày Dr.Sto Jpanwell (60 viên)', 990000, '16.jpg', 'Dạ dày, tá tràng', 'Hộp 60 Viên', 'GENSEI CO.,LTD', 'Nhật Bản', '\r\nVitamin B12, Vitamin B1, Curcumin, Vitamin B2, Magie cacbonat, Mạch Nha, Lactoferrin, Đu đủ, Bột ngũ cốc, Cao men bia', 'Dr.Sto hỗ trợ giảm triệu chứng đau và viêm loét dạ dày.\r\nGiúp cải thiện các triệu chứng: Đầy hơi, ợ chua, ăn không tiêu và chán ăn.\r\nGiúp dạ dày hoạt động tốt.\r\nGiúp kích thích ăn ngon miệng, tiêu hóa tốt về tăng cưởng sức khỏe.', 'Dr.Sto dùng trong các trường hợp:\r\nNgười bị đau, viêm loét dạ dày và rối loạn tiêu hóa.\r\nNgười có các triệu chứng: Đầy hơi, ợ chua, ăn không tiêu và chán ăn.\r\nNgười có nhu cầu tăng cường sức khỏe.', 'Uống 2 viên/ngày với nước nguội hoặc nuốc ấm.', '12/2027', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C.\r\nĐể xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '6605/2021/ÐKSP'),
(17, 'Viên uống Gasso Max Vitamins For Life bổ sung enzyme và các thảo mộc, hỗ trợ tiêu hóa tốt (30 viên)', 330000, '17.jpg', 'Dạ dày, tá tràng', 'Chai 30 Viên', 'VITAMINS FOR LIFE LLC', 'Hoa Kỳ', 'Bromelain, Papain, Pancreatin, Licorice Root, Cranberry Concentrate, Cinnamon Bark', 'Gasso Max bổ sung enzyme và các thảo mộc, hỗ trợ tiêu hóa tốt.', 'Gasso Max dùng cho người tiêu hóa kém người có nhu cầu hỗ trợ tiêu hóa.', 'Uống 1 viên/ngày, uống cùng bữa ăn.', '06/2026', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng, nhiệt độ dưới 30 độ C.\r\nĐể xa tầm tay trẻ em.', 'Phụ nữ mang thai, đang cho con bú hoặc đang sử dụng bất kỳ loại thuốc nào nên hỏi ý kiến bác sĩ trước khi sử dụng.\r\nNgưng sử dụng và hỏi ý kiến bác sĩ nếu có bất kỳ phản ứng phụ.\r\nKhông sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm.\r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '9435/2020/ĐKSP'),
(18, 'Viên uống Colon Care Vitamins For Life giúp nhuận tràng, giảm táo bón (60 viên)', 390000, '18.jpg', 'Hỗ trợ tiêu hóa', 'Hộp 60 viên', 'VITAMINS FOR LIFE LABORATORIES', 'Hoa Kỳ', 'Cascara Sagrada, Aloe vera, Psyllium husk, Fennel seeds, Cayenne peppers', 'Colon Care giúp nhuận tràng, giảm táo bón, tốt cho tiêu hóa.', 'Colon Care dùng cho người trưởng thành bị táo bón. Người có nhu cầu nhuận tràng.', 'Uống 1 - 2 viên/ngày, trước khi đi ngủ.', '18 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng. Đậy nắp kỹ sau khi sử dụng.  Nên bảo quản trong ngăn mát tủ lạnh. Để xa tầm tay trẻ em.\r\n', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. \r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '7759/2020/ĐKSP'),
(19, 'Ống uống Men Tiêu Hóa Kingphar hỗ trợ giảm đầy bụng, ợ hơi, khó tiêu (10 ống x 5ml)', 29000, '19.jpg', 'Khó tiêu', 'Hộp 10 ống', 'CÔNG TY TNHH CÔNG NGHỆ HERBITECH', 'Việt Nam', 'Tá dược vừa đủ, Simethicone, Papain, alpha-Amylase', 'Hỗ trợ tiêu hóa tốt hơn. Giảm các triệu chứng đầy bụng, ợ hơi, ăn uống khó tiêu.', 'Dùng trong các trường hợp rối loạn tiêu hóa, ăn không tiêu, đầy bụng, ợ hơi.', 'Trẻ em trên 2 tuổi: 5ml/lần, ngày uống 2 lần.\r\nNgười lớn: 10ml/lần, ngày uống 3 lần.\r\nUống trước khi ăn hoặc sau khi ăn 30 phút.\r\nLắc đều trước khi dùng.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C, tránh ánh nắng trực tiếp từ mặt trời.\r\nĐể xa tầm tay trẻ em.\r\n', 'Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '10160/2020/ĐKSP'),
(20, 'Viên uống Nanocurcumin Tam Thất Xạ Đen Plus giảm viêm loét dạ dày, tá tràng (3 vỉ x 10 viên)', 312000, '20.jpg', 'Hỗ trợ tiêu hóa', 'Hộp 3 vỉ x 10 viên', 'HVQY', 'Việt Nam', 'Bioperine, Vitamin E, Collagen peptide, Cao xạ đen, Tam thất, Nano Curcumin', 'Bioperine, Vitamin E, Collagen peptide, Cao xạ đen, Tam thất, Nano Curcumin', 'Nanocurcumin Tam Thất Xạ Đen Plus thích hợp dùng cho các trường hợp sau:\r\nNgười viêm đau dạ dày, hành tá tràng.\r\nNgười đang hoặc sau quá trình hóa trị, xạ trị u bướu.', 'Uống mỗi lần 2 viên, ngày uống 2 lần.\r\nNên uống trước bữa ăn 30 phút hoặc sau ăn 1 giờ.\r\nĐợt dùng từ 3 - 6 tháng.', '12/2027', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng.\r\nĐể xa tầm tay trẻ em.\r\n', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. \r\nKhông dùng quá liều khuyến cáo.\r\nSản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh.\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.', '11787/2020/ĐKSP'),
(21, 'Viên uống BIO Hair, Nail and Skin Royal Care hỗ trợ cải thiện sạm da, khô da, móng tóc chắc khỏe (30 viên)', 160000, '21.jpg', 'Hỗ trợ làm đẹp', 'Hộp 30 Viên', 'CÔNG TY CỔ PHẦN PHÁT TRIỂN DƯỢC VESTA', 'Việt Nam', 'L-Cystine, MSM, Kẽm Gluconat, L-Glutathione, myo-inositol, Vitamin B5, Chiết xuất Cây cọ lùn (Saw Palmetto), DL-Methionine, Biotin, Magnesium gluconate, Ferronyl iron, Silic Dioxit, Đồng gluconat', 'Bio Hair, Nail & Skin hỗ trợ cải thiện sạm da, khô da, giúp móng tóc chắc khỏe.', 'Bio Hair, Nail & Skin thích hợp dùng cho người trưởng thành sạm da, khô da, rụng tóc, bạc tóc, móng dễ gãy, người có nhu cầu chăm sóc, làm đẹp da, tóc, móng.', 'Người trưởng thành: Uống 2 viên/lần/ngày. Uống với nước ấm, uống trước ăn 30 phút hoặc sau ăn 1 tiếng.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mang thai, người mẫn cảm với bất cứ thành phần nào của sản phẩm. Người đang sử dụng thuốc nên tham khảo ý kiến bác sĩ trước khi sử dụng. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '126/2023/ĐKSP'),
(22, 'Viên uống Hair Volume New Nordic giúp tóc chắc khỏe, đẹp tóc, hạn chế rụng tóc (30 viên)', 630000, '22.jpg', 'Tóc', 'Hộp 2 vỉ x 15 viên', 'NHÃN KHÁC', 'Thụy Điển', 'Biotin, vitamin B5 (D-Pantothenat, canxi), Kẽm (kẽm oxit), đồng (đồng sunfat), chiết xuất táo (Malus domestica), chiết xuất hạt kê (Panicum milliaceum L.), chiết xuất cỏ đuôi ngựa (Equisetum arvense L.), L-Cysteine, L-Methionine', 'Viên uống Hair Volume New Nodic giúp tóc chắc khỏe, duy trì sự tăng trưởng và phát triển của tóc.', 'Viên uống dưỡng tóc Hair Volume New Nodic thích hợp dùng cho nam và nữ ở lứa tuổi trưởng thành.', 'Uống 1 viên mỗi ngày với nước lọc.', '48 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp từ mặt trời. Để xa tầm tay trẻ em.', 'Không nên dùng quá liều quy định. Phụ nữ có thai hoặc đang cho con bú, người đang sử dụng các loại thuốc điều trị khác nên tham khảo ý kiến bác sĩ trước khi sử dụng. Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '11000/2020/ÐKSP'),
(23, 'Viên uống Perfect White Jpanwell hỗ trợ làm đẹp da, giúp da trắng sáng (60 viên)', 1790000, '23.jpg', 'Da', 'Hộp 60 Viên', 'JAPAN TABLET CORPRATION.', 'Nhật Bản', 'Collagen cá, L-Cystine, Hyaluronic acid, Tá dược vừa đủ, bột cà rốt, inlulin, Vitamin C, Elastin, bột hoa cúc tím, chiết xuất bột vỏ thông đỏ', 'Viên uống làm đẹp da Perfect White JpanWell hỗ trợ làm đẹp da, giúp da trắng sáng, căng mịn. Hỗ trợ cải thiện các vết thâm nám. Hạn chế lão hóa da. Giảm tác hại của tia cực tím cho da.', 'Perfect White JpanWell dùng trong những trường hợp: Người muốn cải thiện và làm đẹp làn da. Người muốn tăng cường sức khỏe cho làn da. Người thường xuyên tiếp xúc với ánh nắng mặt trời.', 'Uống 2 viên/ngày với nước nguội hoặc nước ấm.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp từ mặt trời. Để xa tầm tay trẻ em.', 'Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Không dùng quá liều khuyến cáo hằng ngày. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '10272/2019/ÐKSP'),
(24, 'Viên uống Slim Body hỗ trợ tăng cường chuyển hóa và giảm hấp thu chất béo (100 viên)', 407000, '24.jpg', 'Hỗ trợ giảm cân', 'Hộp 100 Viên', 'HVQY', 'Việt Nam', 'Lá sen, Giảo cổ lam, Sơn Tra, Bụp giấm, Chè vằng, Chitosan, L-Carnitine', 'Slim Body New HVQY hỗ trợ tăng cường chuyển hóa và giảm hấp thu chất béo, giảm tích tụ mỡ, hỗ trợ giảm mỡ máu. Hỗ trợ giảm béo.', 'Slim Body New HVQY dùng cho người thừa cân, béo phì, người muốn giảm béo, người mỡ máu cao.', 'Uống 2 viên/lần x 2 lần/ngày. Uống trước bữa ăn 30 phút. Uống vào bữa sáng và bữa trưa. Đợt dùng từ 1 - 3 tháng. Để có kết quả tốt nhất, nên kết hợp với chế độ ăn uống và luyện tập hợp lý.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30oC, tránh ánh sáng trực tiếp. Để xa tầm tay trẻ em.', 'Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '9363/2020/ÐKSP'),
(25, 'Viên uống VwhiteSkin Ocavill hỗ trợ duy trì độ ẩm cho da (30 viên)', 490000, '25.jpg', 'Da', 'Hộp 30 Viên', 'LUSTREL LABORATOIRES', 'Pháp', 'Glutathione dạng khử, Collagen thủy phân, L-Cystine, Chiết xuất rễ Dương xỉ 4/1, SkinAx2TM, Vitamin E, Vitamin B1, Vitamin B3, Vitamin B5', 'VwhiteSkin hỗ trợ duy trì độ ẩm cho da, tăng độ đàn hồi cho da, hỗ trợ giảm lão hóa da. Hỗ trợ giảm sạm da, giúp đẹp da.', 'VwhiteSkin thích hợp dùng cho người trưởng thành muốn làm đẹp da, người da khô, người bị sạm da.', 'Uống 2 viên mỗi ngày sau ăn.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm kiêng kỵ với bất cứ thành phần nào của sản phẩm. Phụ nữ có thai và cho con bú tham khảo ý kiến chuyên gia y tế trước khi sử dụng. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '1589/2022/ĐKSP'),
(26, 'Viên uống Kaki Ekisu Tohchukasou Kenkan hỗ trợ tăng cường sinh lý nam giới (60 viên)', 515000, '26.jpg', 'Sinh lý nam', 'Hộp 60 Viên', 'NAKANIHON CAPSULE CO.,LTD. YORO FACTORY', 'Nhật Bản', 'Chiết xuất bột Maca, Chiết xuất nấm men, Bột chiết xuất nấm đông trùng hạ thảo, Bột chiết xuất từ thịt hàu', 'Kenkan Kaki Ekisu Tohchukasou hỗ trợ tăng cường sinh lý nam giới.', 'Kenkan Kaki Ekisu Tohchukasou thích hợp dùng cho nam giới cần tăng cường chức năng sinh lý.', 'Uống 2 - 3 viên mỗi ngày với nước.', '36 tháng từ ngày sản', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm, kiêng kỵ với bất kỳ thành phần nào của sản phẩm. Nếu bạn đang bị bệnh hoặc đang dùng thuốc, vui lòng tham khảo ý kiến bác sĩ trước khi sử dụng. Sau khi mở hãy đóng chặt nắp và bảo quản, tiêu thụ càng sớm càng tốt. Có thể có sự thay đổi về màu sắc do tính chất của nguyên liệu nhưng không ảnh hưởng đến chất lượng sản phẩm. Người đang dùng thuốc cần tham khảo ý kiến của bác sĩ trước khi sử dụng. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '5400/2022/ĐKSP'),
(27, 'Viên uống JP Lady Jpanwell cung cấp vitamin hỗ trợ phụ nữ giai đoạn tiền mãn kinh (60 viên)', 1300000, '27.jpg', 'Hỗ trợ mãn kinh', 'Hộp 60 Viên', 'GENSEI CO.,LTD', 'Nhật Bản', 'Glucosamine, Soybean isoflavones, chiết xuất nhau thai heo, Resveratrol, Hypericum perforatum flowering top, Collagen cá, Chondroitin, GABA, nhân sâm Hàn Quốc, thực vật lên men, Coenzyme Q10, Chiết xuất hoa hồng, Hyaluronic Acids, chiết xuất tinh chất hoa anh đào', 'JP Lady cung cấp các vitamin và dưỡng chất cần thiết cho phụ nữ độ tuổi tiền mãn kinh. Giúp tăng cường sức khỏe cho phụ nữ tiền mãn kinh.', 'JP Lady thích hợp sử dụng cho phụ nữ trong giai đoạn tiền mãn kinh, mãn kinh.', 'Uống 2 viên/ngày với nước nguội hoặc nước ấm.', '48 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh sáng trực tiếp. Để xa tầm tay của trẻ em.', 'Cân bằng chế độ dinh dưỡng giữa các bữa chính, bữa phụ. Nếu bạn bị dị ứng thực phẩm, vui lòng đọc kỹ các thành phần trước khi sử dụng. Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Ngưng sử dụng sản phẩm khi có bất cứ dấu hiệu bất lợi nào với cơ thể. Sản phẩm này có chứa các nguyên liệu có nguồn gốc tự nhiên, nên màu sắc, hương vị tổng hợp có thể hơi khác nhưng không ảnh hưởng đến chất lượng của sản phẩm. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '3125/2022/ĐKSP'),
(28, 'Viên uống LéAna Ocavill hỗ trợ cân bằng nội tiết tố (60 viên)', 680000, '28.jpg', 'Cân bằng nội tiết tố', 'Hộp 60 Viên', 'PHYTOPHARMA LTD', 'Bulgaria', 'Tinh dầu hoa anh thảo, Vitamin E, Nhân Sâm, Lepidium meyenii, Trinh nữ', 'Léana Ocavill hỗ trợ cân bằng nội tiết tố. Hỗ trợ cải thiện các triệu chứng thời kỳ tiền mãn kinh, mãn kinh do suy giảm nội tiết tố. Hỗ trợ hạn chế quá trình lão hóa, giúp đẹp da.', 'Léana Ocavill dùng cho phụ nữ trong các trường hợp sau: Phụ nữ trưởng thành mong muốn hạn chế quá trình lão hóa, làm đẹp da. Phụ nữ trong thời kỳ tiền mãn kinh, mãn kinh suy giảm nội tiết tố.', 'Uống 2 viên/ngày, trong hoặc ngay sau bữa ăn.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em. ', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Nếu bạn có cơ địa dị ứng hoặc đang có bệnh lý, tham khảo bác sĩ trước khi sử dụng. Thực phẩm này không thay thế chế độ ăn đa dạng cân bằng. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '9677/2021/ĐKSP'),
(29, 'Viên uống Tố Nữ Vương Royal Care hỗ trợ cải thiện nội tiết tố nữ (30 viên)', 145000, '29.jpg', 'Sinh lý nữ', 'Hộp 30 Viên', 'CÔNG TY CỔ PHẦN PHÁT TRIỂN DƯỢC VESTA', 'Việt Nam', 'Mầm đậu nành, Hoa anh thảo, Collagen peptide, Acerola, Vitamin E, Pueraria mirifica, Bạch thược, Xuyên khung, Đương quy, Thục địa', 'Tố Nữ Vương hỗ trợ cải thiện nội tiết tố nữ, giảm các triệu chứng bốc hỏa, mất ngủ, sạm da, yếu sinh lý do suy giảm nội tiết tố nữ.', 'Tố Nữ Vương dùng trong các trường hợp: Phụ nữ suy giảm nội tiết tố nữ. Phụ nữ tiền mãn kinh, mãn kinh.', 'Mỗi lần uống 1 - 2 viên, ngày 2 lần. Nên sử dụng sản phẩm liên tục từ 2 - 3 tháng để đạt hiệu quả tốt.', '48 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C, tránh ánh sáng trực tiếp. Để xa tầm tay trẻ em.', 'Không dùng quá liều khuyến cáo. Không sử dụng cho người mẫn cảm, kiêng kỵ với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '10533/2021/ÐKSP'),
(30, 'Viên nang cứng Vương Nữ Khang Royal Care hỗ trợ hạn chế sự phát triển u xơ tử cung, u vú lành tính (60 viên)', 195000, '30.jpg', 'Cân bằng nội tiết tố', 'Hộp 60 Viên', 'CÔNG TY CỔ PHẦN PHÁT TRIỂN DƯỢC VESTA', 'Việt Nam', 'Trinh nữ hoàng cung, Hoàng cầm, Hoàng kỳ, Tam thất, Curcumin, Betaglucan, Papain', 'Vương Nữ Khang hỗ trợ hạn chế sự phát triển của u xơ tử cung, u vú lành tính ở nữ giới.', 'Vương Nữ Khang dùng trong các trường hợp: Phụ nữ có nguy cơ bị u xơ tử cung. Phụ nữ bị u vú lành tính.', 'Mỗi lần uống 2 viên, ngày 2 - 3 lần. Nên sử dụng sản phẩm liên tục từ 2 - 3 tháng để đạt hiệu quả tốt.', '48 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C. Để xa tầm tay trẻ em.', 'Không sử dụng cho phụ nữ mang thai, người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '9667/2021/ÐKSP'),
(31, 'Siro ống uống Canxi-D3-K2 5ml Kingphar bổ sung canxi & vitamin D3 cho cơ thể (6 vỉ x 5 ống)', 105000, '31.jpg', 'Bổ sung Canxi & Vitamin D', 'Hộp 6 Vỉ x 5 Ống', 'CÔNG TY TNHH SẢN XUẤT VÀ THƯƠNG MẠI VINH THỊNH VƯỢNG', 'Việt Nam', 'Calci glucoheptonat, Vitamin D3, Vitamin K2', 'Canxi-D3-K2 Kingphar bổ sung canxi, vitamin D3, K2 cho cơ thể, hỗ trợ giảm nguy cơ thiếu hụt canxi, vitamin D3, K2.', 'Canxi-D3-K2 Kingphar thích hợp dùng cho các trường hợp sau: Trẻ em từ 1 tuổi trở lên đang trong giai đoạn phát triển cần bổ sung canxi. Phụ nữ có thai và cho con bú thiếu hụt canxi. Người lớn có nguy cơ loãng xương, người lớn bị loãng xương cần bổ sung canxi.', 'Trẻ em 1 - 6 tuổi: Uống 5ml/lần, ngày 2 lần.Trẻ em từ 7 tuổi và người lớn: Uống 10ml/lần, ngày 2 lần. Nên uống vào buổi sáng hoặc trưa. Lắc đều trước khi sử dụng.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, nhiệt độ không quá 30⁰C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng đối với những người mẫn cảm, dị ứng với bất kỳ thành phần của sản phẩm. Không sử dụng cho người bị tăng canxi huyết, canxi niệu, sỏi thận, sỏi tiết niệu. Người đang dùng thuốc, điều trị bệnh, người tiểu đường tham khảo ý kiến chuyên gia y tế trước khi sử dụng. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '1399/2023/ĐKSP'),
(32, 'Siro Brauer Baby Kids D3+k2 High Potency MK-7 Drops 10ml bổ sung vitamin D3 và vitamin K2', 396000, '32.jpg', 'Vitamin & Khoáng chất', 'Hộp', 'BRAUER NATURAL MEDICINE PTY LTD', 'Úc', 'Vitamin K2, Vitamin D3', 'Brauer Baby & Kids D3 + K2 High Potency MK-7 Drops bổ sung vitamin D3 và vitamin K2 giúp hỗ trợ xương và răng chắc khỏe, tăng cường sức đề kháng.', 'Brauer Baby & Kids D3 + K2 High Potency MK-7 Drops dùng cho trẻ sơ sinh từ 0 tháng tuổi - 12 tuổi.', 'Lắc đều trước khi sử dụng. Tháo nắp và giữ chai ở góc 45° để phân phối giọt chính xác. Trẻ sơ sinh từ 0 - 12 tháng tuổi: Uống 100 mcL (2 giọt) mỗi ngày. Trẻ em từ 1 - 3 tuổi: Uống 150 mcL (3 giọt). Trẻ em từ 4 - 12 tuổi: Uống 200 mcL (4 giọt) mỗi ngày, hoặc dùng theo chỉ dẫn của chuyên gia y tế. Liều dùng có thể uống trực tiếp, cho vào thìa, hoặc thêm vào các chất lỏng khác và sử dụng ngay.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 25 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm hoặc kiêng kị với bất kỳ thành phần nào của sản phẩm. Không dùng cho người đang sử dụng thuốc chống đông máu, người đang bị bệnh gan, người có khuyết tật di truyền thiếu glucose-6-phosphate Dehydrogenase (G6PD). Không vượt quá liều khuyến cáo hàng ngày. Không sử dụng sản phẩm nếu đấu niêm phong bị hỏng. Vitamin chỉ có thể được hỗ trợ khi chế độ ăn uống không đủ. Không chất tạo màu, chất tạo hương hoặc chất tạo ngọt nhân tạo. Không chứa trứng hoặc sữa. Không chứa gluten. Không chứa hạt và đậu phộng. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '1982/2024/ĐKSP'),
(33, 'Siro Brauer Baby Kids D3+k2 High Potency MK-7 Drops 10ml bổ sung vitamin D3 và vitamin K2', 396000, '33.jpg', 'Vitamin & Khoáng chất', 'Hộp', 'BRAUER NATURAL MEDICINE PTY LTD', 'Úc', 'Vitamin K2, Vitamin D3', 'Brauer Baby & Kids D3 + K2 High Potency MK-7 Drops bổ sung vitamin D3 và vitamin K2 giúp hỗ trợ xương và răng chắc khỏe, tăng cường sức đề kháng.', 'Brauer Baby & Kids D3 + K2 High Potency MK-7 Drops dùng cho trẻ sơ sinh từ 0 tháng tuổi - 12 tuổi.', 'Lắc đều trước khi sử dụng. Tháo nắp và giữ chai ở góc 45° để phân phối giọt chính xác. Trẻ sơ sinh từ 0 - 12 tháng tuổi: Uống 100 mcL (2 giọt) mỗi ngày. Trẻ em từ 1 - 3 tuổi: Uống 150 mcL (3 giọt). Trẻ em từ 4 - 12 tuổi: Uống 200 mcL (4 giọt) mỗi ngày, hoặc dùng theo chỉ dẫn của chuyên gia y tế. Liều dùng có thể uống trực tiếp, cho vào thìa, hoặc thêm vào các chất lỏng khác và sử dụng ngay.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 25 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm hoặc kiêng kị với bất kỳ thành phần nào của sản phẩm. Không dùng cho người đang sử dụng thuốc chống đông máu, người đang bị bệnh gan, người có khuyết tật di truyền thiếu glucose-6-phosphate Dehydrogenase (G6PD). Không vượt quá liều khuyến cáo hàng ngày.Không sử dụng sản phẩm nếu đấu niêm phong bị hỏng. Vitamin chỉ có thể được hỗ trợ khi chế độ ăn uống không đủ. Không chất tạo màu, chất tạo hương hoặc chất tạo ngọt nhân tạo. Không chứa trứng hoặc sữa. Không chứa gluten. Không chứa hạt và đậu phộng. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '1982/2024/ĐKSP'),
(34, 'Viên sủi Kudos Kids Multivitamins Plus Calcium & D3 hương dưa hấu giúp bổ sung calci và vitamin cho cơ thể (20 viên)', 116800, '34.jpg', 'Vitamin & Khoáng chất', 'Tuýp 20 Viên', 'SANOTACT GMBH', 'Đức', 'Calci carbonat, Vitamin C, Niacin, Vitamin E, Acid pantothenic, Vitamin B6, Vitamin B2, Vitamin B1, Vitamin A, Acid folic, Biotin, Vitamin D3, Vitamin B12', 'Kudos Kids Multivitamins Plus Calcium & D3 hương dưa hấu giúp bổ sung canxi và vitamin (A, C, D3, E, B1, B2, B3, B5, B6, B8, B9, B12) thiết yếu cho cơ thể.', 'Kudos Kids Multivitamins Plus Calcium & D3 hương dưa thích hợp dùng cho trẻ em từ 4 tuổi trở lên có nhu cầu bổ sung calci và vitamin.', 'Dùng 1 viên mỗi ngày, hòa tan trong một cốc nước (200 ml).', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 25 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Thực phẩm này không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh. Không dùng cho người mẫn cảm, kiêng kỵ với bất cứ thành phần nào của sản phẩm. Người đang dùng thuốc nên tham khảo ý kiến thầy thuốc hoặc bác sĩ, chuyên gia y tế trước khi dùng. Không dùng quá liều khuyến nghị hàng ngày. Không phù hợp cho trẻ em dưới 4 tuổi. Không dùng sản phẩm sau ngày hết hạn. Sản phẩm là thực phẩm bảo vệ sức khỏe chứa vitamin, calci và chất tạo ngọt. Thực phẩm bảo vệ sức khỏe không thay thế cho chế độ ăn uống đa dạng cân bằng và lối sống lành mạnh. Sản phẩm không chứa lactose, gluten và thân thiện với người ăn chay. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '3805/2023/ĐKSP'),
(35, 'Viên sủi Kudos Daily Vitamins Plus Biotin & Ginseng hương cam giúp bổ sung vitamin cho cơ thể (20 viên)', 101200, '35.jpg', 'Vitamin & Khoáng chất', 'Tuýp 20 Viên', 'SANOTACT GMBH', 'Đức', 'Vitamin C, Chiết xuất nhân sâm, Niacin, Vitamin E, Acid pantothenic, Vitamin B2, Vitamin B6, Vitamin B1, Vitamin A, Acid folic, Biotin, Vitamin D3, Vitamin B12', 'Kudos Daily Vitamins Plus Biotin & Ginseng hương cam giúp bổ sung vitamin (A, C, D, E, B1, B2, B3, B5, B6, B8, B9, B12) cho cơ thể.', 'Kudos Daily Vitamins Plus Biotin & Ginseng hương cam thích hợp dùng cho người lớn và trẻ em từ 14 tuổi trở lên có nhu cầu bổ sung vitamin.', 'Dùng 1 viên mỗi ngày, hòa tan trong một cốc nước (200 ml).', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 25 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Thực phẩm này không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh. Không dùng cho người mẫn cảm, kiêng kỵ với bất cứ thành phần nào của sản phẩm. Phụ nữ có thai, đang cho con bú, người đang dùng thuốc nên tham khảo ý kiến thầy thuốc hoặc bác sĩ, chuyên gia y tế trước khi dùng. Không dùng cho người viêm loét dạ dày, người bị bệnh huyết áp, người mẫn cảm với nhân sâm. Không dùng quá liều khuyến nghị hàng ngày. Không phù hợp cho trẻ em dưới 14 tuổi. Không dùng sản phẩm sau ngày hết hạn. Sản phẩm chứa aspartam - một nguồn phenylalanin. Sản phẩm là thực phẩm bảo vệ sức khỏe chứa vitamin, nhân sâm và chất tạo ngọt. Thực phẩm bảo vệ sức khỏe không thay thế cho chế độ ăn uống đa dạng cân bằng và lối sống lành mạnh. Sản phẩm không chứa lactose, gluten và thân thiện với người ăn chay. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '3806/2023/ĐKSP'),
(36, 'Viên uống Omexxel Ginkgo 120 Premium Omexxel hỗ trợ tốt cho não và tim mạch (60 viên)', 788000, '36.jpg', 'Bổ não - cải thiện trí nhớ', 'Hộp 60 Viên', 'PHARMAXX INC', 'Hoa Kỳ', 'Bạch quả, Nhân Sâm, Coenzym Q10, magnesi, Canxi, Kẽm, Vitamin PP, Vitamin B6, Vitamin B5, Vitamin B1, Vitamin B2, Vitamin D3', 'Omexxel Ginkgo 120 Premium hỗ trợ tốt cho não và tim mạch.', 'Omexxel Ginkgo 120 Premium dùng được cho người trưởng thành.', 'Người trưởng thành: Uống 1 viên nang cứng, một hoặc hai lần mỗi ngày sau khi ăn.', '36 tháng kể từ ngày ', 'Bảo quản ở nhiệt độ phòng 15 - 25°C, độ ẩm tương đối dưới 50%. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Tham khảo ý kiến bác sĩ trước khi sử dụng nếu bạn có hoặc từng có bất kỳ vấn đề về sức khỏe nào hoặc nếu bạn đang dùng bất kỳ loại thuốc nào. Như bất kỳ thực phẩm bảo vệ sức khỏe nào, cần liên hệ với bác sĩ nếu bạn đang dùng thuốc kê đơn hoặc phụ nữ có thai hoặc cho con bú. Tuyên bố này chưa được đánh giá bởi Cục quản lý Thực phẩm và Dược phẩm. Sản phẩm này không dùng để chẩn đoán, điều trị, hay ngăn ngừa bất kỳ bệnh nào. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '6799/2023/ĐKSP'),
(37, 'Viên uống Pikolin Ocavill hỗ trợ tăng tuần hoàn máu não, giảm hình thành cục máu đông (2 vỉ x 15 viên)', 615000, '37.jpg', 'Tuần hoàn máu', 'Hộp 2 Vỉ x 15 Viên', 'PHYTOPHARMA LTD', 'Bulgaria', 'Acid folic, Vitamin B6, Vitamin B1, Coenzyme Q10, Dầu gan cá tuyết, Melatonin, Citicoline, Nattokinase, Bạch quả', 'Pikolin Ocavill hỗ trợ tăng tuần hoàn máu não. Hỗ trợ cải thiện các triệu chứng do thiểu năng tuần hoàn não. Hỗ trợ giảm nguy cơ hình thành cục máu đông và giảm di chứng sau tai biến mạch máu não do tắc mạch.', 'Pikolin Ocavill thích hợp sử dụng trong các trường hợp sau: Người thiếu năng tuần hoàn não. Người có nguy cơ hình thành cục máu đông. Người sau tai biến mạch máu não do tắc mạch.', 'Uống 1 viên/ngày vào buổi tối, sau bữa ăn.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không dùng Pikolin trong các trường hợp sau: Người đang xuất huyết hoặc người chuẩn bị phẫu thuật. Trẻ em dưới 12 tuổi. Người đang mang thai, có kế hoạch mang thai hoặc đang cho con bú. Người mẫn cảm với bất cứ thành phần nào của sản phẩm. Nếu bạn đang dùng thuốc chống đông máu hoặc thuốc chống kết tập tiểu cầu, hãy hỏi ý kiến bác sĩ trước khi dùng sản phẩm. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '9657/2021/ĐKSP'),
(38, 'Viên uống Natto Gold 3000FU Royal Care hỗ trợ hoạt huyết, tăng cường tuần hoàn não (60 viên)', 295000, '38.jpg', 'Thần kinh não', 'Hộp 60 Viên', 'HD PHARMA', 'Việt Nam', 'Coenzyme Q10, Acid folic, Vitamin B1, Kẽm Gluconat, Rutin, DHA 10%, Sữa ong chúa, Sắt fumarate, Đinh lăng, Rau đắng biển, Magnesi oxyd, Men gạo đỏ, Cao giảo cổ lam, Bạch quả, Nattokinase', 'Natto Gold 3000FU hỗ trợ hoạt huyết, tăng cường tuần hoàn não, giúp bền thành mạch, giúp giảm nguy cơ hình thành và hỗ trợ làm tan cục máu đông. Hỗ trợ giảm các triệu chứng: Đau đầu, mất ngủ, hoa mắt, chóng mặt, ù tai, suy giảm trí nhớ do thiểu năng tuần hoàn não. Hỗ trợ quá trình phục hồi sau tai biến mạch máu não do tắc mạch.', 'Natto Gold 3000FU thích hợp dùng cho các trường hợp sau: Người bị đau đầu, mất ngủ, hoa mắt, chóng mặt, ù tai, suy giảm trí nhớ do thiểu năng tuần hoàn não. Người sau tai biến mạch máu não do tắc mạch.', 'Uống 2 viên/ngày, ngày 1 lần.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30 độ C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không sử dụng cho: Người mẫn cảm với bất cứ thành phần nào của sản phẩm. Người huyết áp cao kịch phát. Người đang xuất huyết. Phụ nữ mang thai, phụ nữ sau sinh, rong kinh, rong huyết. Người chuẩn bị phẫu thuật. Người có hội chứng máu chậm đông. Trẻ dưới 18 tuổi. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '7056/2022/ĐKSP'),
(39, 'Viên uống Omexxel Ginkgo 120 OMEXXEL hỗ trợ tăng cường tuần hoàn máu não, tốt cho tim mạch (60 viên)', 688000, '39.jpg', 'Thần kinh não', 'Hộp 60 Viên', 'SABINSA CORPORATION', 'Hoa Kỳ', 'Dầu cá, Chiết xuất lá Bạch quả', 'Omexxel Ginkgo 120 hỗ trợ tăng cường tuần hoàn máu não, tốt cho tim mạch.', 'Omexxel Ginkgo 120 thích hợp sử dụng cho người trưởng thành.', 'Người lớn: Uống 1 viên nang mềm, một hoặc hai lần một ngày với nước sau bữa ăn.', '48 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, nhiệt độ không quá 30⁰C, tránh ánh sáng. Để xa tầm tay trẻ em.', 'Không dùng trong các trường hợp: Trẻ em dưới 18 tuổi. Phụ nữ có thai, cho con bú. Phụ nữ bị rong kinh, băng huyết. Người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Đối với bất kỳ chất bổ sung nào, hãy liên hệ với bác sĩ của bạn nếu bạn hiện đang dùng thuốc theo toa, hoặc đang mang thai hoặc cho con bú. Không sử dụng nếu con dấu an toàn bị hỏng hoặc bị mất. Người đang điều trị bằng thuốc kê đơn nên hỏi ý kiến bác sĩ trước khi sử dụng sản phẩm này. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '3737/2022/ĐKSP'),
(40, 'Viên uống Gaba Jpanwell giảm các triệu chứng mất ngủ, khó ngủ, giấc ngủ không sâu (60 viên)', 960000, '40.jpg', 'Hỗ trợ giấc ngủ ngon', 'Hộp 60 Viên', 'GENSEI CO.,LTD', 'Nhật Bản', 'Nữ lang, Chiết xuất hoa nghệ tây, Vintamin B6, Vitamin B1, Vitamin B12, Chiết xuất lá dâu tằm, Tâm sen, L-Tryptophan, Glycinebetaine, L-theanine, GABA', 'Viên uống Gaba hỗ trợ làm giảm các triệu chứng mất ngủ, khó ngủ, giấc ngủ không sâu. Giúp giảm cảm giác lo lắng, bồn chồn và an thần.', 'Viên uống Gaba dùng trong các trường hợp: Người muốn cải thiện giấc ngủ và có giấc ngủ sâu. Người bị bệnh mất ngủ, người hay lo lắng, bất an.', 'Uống 2 viên/ngày. Uống trước khi ngủ 2 tiếng. Dùng với nước nguội hoặc nước ấm.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '6403/2021/ÐKSP');
INSERT INTO `san_pham` (`id`, `ten_san_pham`, `gia`, `img`, `danh_muc`, `quy_cach`, `nha_san_xuat`, `nuoc_san_xuat`, `thanh_phan`, `cong_dung`, `doi_tuong_su_dung`, `cach_su_dung`, `thoi_han_su_dung`, `bao_quan`, `luu_y_khi_su_dung`, `so_dang_ky`) VALUES
(41, 'Viên uống Hato Gold Jpanwell cải thiện tim mạch, giảm khó thở, mệt mỏi, đau tức ngực (60 viên)', 995000, '41.jpg', 'Sức khoẻ tim mạch', 'Hộp 60 Viên', 'GENSEI CO.,LTD', 'Nhật Bản', 'Nho, Bạch quả, Chiết xuất Maca, Vừng đen, Nattokinase, Vitamin B12, Vitamin B6, Vitamin B2, Vitamin B1, Eicosapentaenoic acid, nhân sâm Hàn Quốc, Magie, DHA, Coenzyme Q10', 'Hato Gold hỗ trợ giúp trái tim khỏe mạnh. Giúp làm giảm khó thở, mệt mỏi, đau tức ngực. Giúp lưu thông máu ra vào tim, giảm ứ huyết tại tim, tăng lượng máu tới mạch vành, phục hồi chức năng tim. Giúp ngăn ngừa biến chứng nhồi máu cơ tim, suy tim hay rối loạn nhịp tim.', 'Hato Gold dùng trong các trường hợp: Người bị đau tim, rối loạn nhịp tim, suy tim, bệnh mạch vành. Người cao tuổi để tăng cường sức khỏe tim mạch. Người hay bị khó thở, mệt mỏi, đau tức ngực và ho phù.', 'Uống 2 viên/ngày với nước nguội hoặc nước ấm.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C. Để xa tầm tay trẻ em.', 'Không sử dụng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '6379/2021/ÐKSP'),
(42, 'Viên uống Cholesterol Aid Vitamins For Life hỗ trợ giảm cholesterol (60 viên)', 390000, '42.jpg', 'Giảm Cholesterol', 'Chai 60 viên', 'VITAMINS FOR LIFE LABORATORIES', 'Hoa Kỳ', 'Chromium, Cao Trầm, Men gạo đỏ', 'Cholesterol Aid hỗ trợ giảm cholesterol.', 'Cholesterol Aid thích hợp dùng cho người mỡ máu có chỉ số cholesterol cao.', 'Người lớn: Uống 1 - 2 viên/ngày, cùng bữa ăn.', '24 tháng kể từ ngày ', 'Để nơi khô ráo, thoáng mát, xa tầm tay trẻ em. Đậy nắp kỹ sau khi sử dụng. Nên bảo quản trong ngăn mát tủ lạnh.', 'Phụ nữ mang thai, đang cho con bú hoặc đang dùng bất kỳ loại thuốc nào, nên tham khảo ý kiến của bác sĩ trước khi sử dụng. Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm.  Ngưng sử dụng và hỏi ý kiến bác sĩ nếu có bất kỳ phản ứng phụ. Không sử dụng khi con tem dưới nắp bị mất hoặc rách. Không dùng quá liều khuyến cáo. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '7777/2020/ĐKSP'),
(43, 'Viên uống Active Legs hỗ trợ điều trị suy giãn tĩnh mạch chân (15 viên)', 340000, '43.jpg', 'Sức khoẻ tim mạch', 'Hộp 15 Viên', 'LEGOSAN AB, THỤY ĐIỂN', 'Thụy Điển', 'Hạt tiêu đen, Chiết xuất nho, Chiết xuất vỏ thông Pháp, Tá dược vừa đủ, Vitamin C', 'Active Legs giúp tăng cường lưu thông tuần hoàn máu, tăng sức bền tĩnh mạch, hạn chế hình thành huyết khối, phòng ngừa và hỗ trợ điều trị suy giãn tĩnh mạch chân, giảm các triệu chứng đau chân, nặng chân, tê chân, gân xanh nổi ở chân…', 'Active Legs dùng trong các trường hợp: Người cao tuổi, thường xuyên phải ngồi nhiều, đứng nhiều, ít vận động. Người bị mắc giãn tĩnh mạch chân.', 'Uống 1 viên mỗi ngày.', '24 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ dưới 30 độ C, tránh ánh nắng trực tiếp từ mặt trời. Để xa tầm tay trẻ em.', 'Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kĩ hướng dẫn trước khi dùng.', '1888/2019/ÐKSP'),
(44, 'Viên uống Lipitas Jpanwell giúp giảm mỡ, cholesterol và triglyceride trong máu (60 viên)', 995000, '44.jpg', 'Giảm Cholesterol', 'Hộp 60 Viên', 'JAPAN TABLET CORPRATION', 'Nhật Bản', 'Nattokinase, Inulin, Kế sữa, L-Cystine, Quercetin, Vitamin E, Selenium, Bột Gừng, Tá dược vừa đủ, Coenzym Q10, Monascus, Bột vỏ hành tây, Bột nấm ngưu chương chi', 'Viên uống Lipitas JpanWell giúp giảm mỡ, Cholesterol và Triglyceride trong máu, hỗ trợ giảm nguy cơ hình thành huyết khối, hỗ trợ giảm huyết áp do Cholesterol, tốt cho tim mạch.', 'Viên uống Lipitas JpanWell dùng trong các trường hợp: Người có mỡ máu và triglyceride trong máu cao. Người có nguy cơ tai biến mạch máu não do huyết khối, huyết áp, xơ vữa động mạch.', 'Uống 2 viên/ngày với nước nguội hoặc nước ấm.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, nhiệt độ không quá 30oC, tránh ánh sáng trực tiếp. Để xa tầm tay trẻ em.', 'Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '10274/2019/ÐKSP'),
(45, 'Viên uống KenKan Nattokinase 2400FU giảm nguy cơ hình thành huyết khối, tăng cường lưu thông máu (60 viên)', 515000, '45.jpg', 'Sức khoẻ tim mạch', 'Hộp 60 Viên', 'NAKANIHON CAPSULE CO.,LTD. YORO FACTORY', 'Nhật Bản', 'Nattokinase, DHA, EPA', 'Kenkan Nattokinase 2400 FU hỗ trợ làm giảm nguy cơ hình thành huyết khối, giúp tăng cường lưu thông máu. Tốt cho tim mạch.', 'Kenkan Nattokinase 2400 FU dùng trong các trường hợp: Người trưởng thành có nguy cơ mắc bệnh tim mạch do huyết khối. Người có nguy cơ bị tai biến mạch máu não do tắc mạch.', 'Uống 2 - 3 viên mỗi ngày với nước.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, không để quá nóng hoặc ẩm. Đậy nắp kỹ sau khi sử dụng. Để xa tầm tay trẻ em.', 'Không dùng quá liều khuyến cáo. Không sử dụng nếu mẫn cảm với bất kỳ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '10082/2021/ÐKSP'),
(46, 'Sữa Anlene Gold 5X hương vani tăng cường sức khỏe cơ-xương-khớp dành cho người trên 40 tuổi (800g)', 448000, '46.jpg', 'Sữa', 'Hộp x 800g', 'FONTERRA BRANDS', 'Malaysia', 'Sữa bột từ sữa bò, Maltodextrin, Khoáng chất, Hương sữa nhân tạo, Hương Vani nhân tạo, Collagen cá, Vitamin C, Vitamin E, Vitamin B3, Vitamin D, D-Biotin, Vitamin A, Vitamin B6, Vitamin B5, Vitamin B1, Vitamin B9', 'Sữa Anlene Gold 5X hương vani 800g giúp tăng cường sức khỏe cơ - xương - khớp, tăng độ dẻo dai và thêm năng lượng cho cơ thể với phức hợp dinh dưỡng và hoạt chất MFGM được kiểm nghiệm lâm sàng giúp tăng 40% khối cơ.', 'Sữa Anlene Gold 5X hương vani 800g là thực phẩm bổ sung dành cho người trên 40 tuổi.', 'Cho 4 muỗng Anlene (khoảng 40g) vào 180ml nước chín (sữa sẽ ngon hơn nếu pha nước ấm) và khuấy đều. Đối với người lần đầu tiên uống sữa: Để tránh hiện tượng không dung nạp lactose - thành phần tự nhiên của sữa, nên uống sau bữa ăn và bắt đầu bằng một lượng nhỏ 50ml và tăng lên 180ml trong vòng 2 tuần. 50ml: Ngày 1 - 4. 100ml: Ngày 5 - 9. 150ml: Ngày 10 - 13. 180ml: Ngày 14 trở đi.', '24 tháng kể từ ngày ', 'Luôn đậy kín và bảo quản nơi khô ráo. Sử dụng tốt nhất trong vòng 1 tháng sau khi mở nắp. Để xa tầm tay trẻ em.', 'Không dùng sản phẩm khi đã hết hạn sử dụng. Sản phẩm có chứa sữa, collagen chiết xuất từ cá. Không sử dụng cho người mẫn cảm với bất cứ thành phần nào của sản phẩm. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '02/FONTERRA BRANDS V'),
(47, 'Sữa bột CaloSure gold Vitadairy ít đường, tăng cường sức khỏe tim mạch, hồi phục sức khỏe (900g)', 459000, '47.jpg', 'Sữa', 'Hộp', 'VITADAIRY', 'Việt Nam', 'Năng lượng, Protein, Chất béo, Omega 6, Omega 3, Carbohydrate, Palatinose, Chất Xơ, Glucosamine, CaHMB, GABA, Taurine, Vitamin B2, Vitamin B1, Lysine, Vitamin D3, Vitamin B6, Vitamin B12, Vitamin K1, Vitamin E, Vitamin A, Folic Acid, Vitamin C, Biotin, Phospho, Sắt, Đồng, Kali, Mangan, Kẽm, Magie, Canxi, Natri, Pantothenate, Selen', 'VitaDairy CaloSure Gold Ít Đường là sản phẩm dinh dưỡng cao năng lượng, với hệ dưỡng chất bổ sung cao cấp, giàu Vitamin và Khoáng chất, dùng thay thế bữa ăn phụ hoặc tăng cường dinh dưỡng cho cơ thể giúp cải thiện sức khoẻ, bảo vệ xương khớp, hỗ trợ tiêu hoá và tăng cường sức khoẻ tim mạch cho người cao tuổi.', 'VitaDairy CaloSure Gold Ít Đường sử dụng cho người lớn và trẻ em trên 6 tuổi, đặc biệt trong các trường hợp: Người ốm, người cao tuổi.Người mắc bệnh tim mạch hoặc có nguy cơ mắc bệnh tim mạch. Người có nhu cầu năng lượng cao (phụ nữ có thai và cho con bú, thanh thiếu niên đang tăng trưởng).', 'Pha 6 muỗng gạt (khoảng 50mg) với 200ml nước chín ấm (50 độ C) khuấy đều để được một ly 225ml cung cấp 225 kcal. (Đậm độ năng lượng đặt 1kcal/1ml). Uống 2 - 3 ly mỗi ngày hoặc theo hướng dẫn của cán bộ y tế. Hỗn hợp sau khi pha nên sử dụng hết trong vòng 1 giờ.', '48 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, sạch sẽ, thoáng mát, tránh ánh nắng trực tiếp. Lon đã mở phải được đóng kín và sử dụng hết trong vòng 3 tuần. Để xa tầm tay trẻ em.', 'Không dùng sản phẩm khi đã hết hạn sử dụng. Sản phẩm không thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '21/2021/ÐKSP'),
(48, 'Sữa bột Glucerna Abbott bổ sung dinh dưỡng đặc biệt cho người đái tháo đường (800g)', 852630, '48.jpg', 'Sữa', 'Hộp', 'ABBOTT LABORATORIES', 'Singapore', 'Choline, Chất béo thực vật, Đạm whey, Vitamin A, Vitamin D3, Lecithins, soya, Dầu đậu nành, dầu hướng dương, Fructose, Protein, Glycerin', 'Glucerna là sản phẩm dinh dưỡng chuyên biệt với công thức đầy đủ và cân đối giúp kiểm soát đường huyết cho người đái tháo đường, tiền đái tháo đường và đái tháo đường thai kỳ.', 'Glucerna thích hợp sử dụng cho người đái tháo đường, tiền đái tháo đường và đái tháo đường thai kỳ.', 'Để pha 1 ly 237ml, cho 200ml nước chín để nguội vào ly. Vừa từ từ cho vào ly 5 muỗng gạt ngang (muỗng có sẵn trong hộp) tương đương 52,1 g bột Glucerna, vừa khuấy đều cho đến khi bột tan hết. Nuôi ăn qua ống thông: Theo hướng dẫn của bác sĩ/chuyên gia về dinh dưỡng. Khi bắt đầu nuôi ăn qua ống thông, phải điều chỉnh lưu lượng, thể tích và độ pha loãng tùy thuộc vào tình trạng và sự dung nạp của người bệnh. Lưu ý đề phòng sự nhiễm khuẩn trong quá trình chuẩn bị và nuôi ăn qua ống thông.', '36 tháng kể từ ngày ', 'Hộp đã mở phải được đậy kín, giữ ở nơi khô mát nhưng không được để trong tủ lạnh. Khi đã mở hộp, sử dụng tối đa trong vòng 3 tuần.', 'Sử dụng cho người bệnh với sự giám sát của nhân viên y tế. Không dùng cho người bệnh galactosemia. Không dùng qua đường tĩnh mạch. Không dùng cho trẻ em dưới 13 tuổi trừ khi có chỉ định của thầy thuốc hoặc chuyên viên y tế. Glucerna đã pha nên dùng ngay hoặc đậy kín, giữ lạnh và dùng trong vòng 24 giờ. Sản phẩm không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Không dùng cho người mẫn cảm với bất kỳ thành phần nào của sản phẩm. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '31/2022/ĐKSP'),
(49, 'Sữa bột Nepro 1 Gold VitaDairy bổ sung dinh dưỡng giảm protein dành cho người bệnh đái tháo đường (400g)', 218000, '49.jpg', 'Sữa', 'Hộp x 400g', 'NHÃN KHÁC', 'Việt Nam', 'FOS, Năng lượng, Protein, Chất béo, Carbohydrate, Fructose, Vitamin tổng hợp, Khoáng chất, Palatinose, Polyols', 'Nepro 1 Gold là sản phẩm dinh dưỡng được thiết kế khoa học nhằm cung cấp các dưỡng chất cần thiết cho người bệnh suy thận có ure huyết tăng hoặc người cần giảm protein trong chế độ ăn. Nepro 1 Gold sử dụng hệ bột đường hấp thu chậm giúp ổn định đường huyết, bổ sung các vitamin và khoáng chất giúp bồi bổ và tăng cường sức khỏe cho người sử dụng.', 'Nepro 1 Gold sử dụng cho người cần chế độ ăn protein thấp, giảm natri và giàu năng lượng: Người bệnh suy thận, người bệnh thận có ure huyết tăng. Sản phẩm dùng được cho người tiểu đường.', 'Pha 3 muỗng gạt với 100ml nước chín ấm (50 độ C), khuấy đều sẽ được 1 ly khoảng 120ml cung cấp 120kcal. Dùng 5 - 6 ly mỗi ngày hoặc theo hướng dẫn của cán bộ y tế. Hỗn hợp sau khi pha sử dụng hết trong vòng 3 giờ.', '36 tháng kể từ ngày ', 'Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Lon đã mở phải được đóng kín và sử dụng hết trong vòng 3 tuần. Để xa tầm tay trẻ em.', 'Không sử dụng sản phẩm cho trẻ dưới 2 tuổi. Sử dụng cho người bệnh dưới sự giám sát của nhân viên y tế. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '123/2019/ĐKSP'),
(50, 'Sữa Prosure Abbott hương vani bổ sung dinh dưỡng chuyên biệt cho người đang sụt cân (380g)', 493000, '50.jpg', 'Sữa', 'Hộp', 'ABBOTT', 'Tây Ban Nha', 'Chất Xơ, Vitamin tổng hợp, Năng lượng, Protein thuỷ phân, EPA, Taurine, Carnitine', 'Sữa bột Prosure hương Vani là sản phẩm dinh dưỡng bổ sung dành cho người có nguy cơ hoặc đang bị sụt cân không mong muốn do ung thư hoặc do các bệnh lý khác. Sữa bột Prosure hương Vani là công thức dinh dưỡng đầy đủ, giàu năng lượng, hàm lượng protein cao, được bổ sung EPA (icosapent) và các chất chống oxy hóa.', 'Sữa Prosure hương Vani thích hợp dùng cho người có nguy cơ hoặc đang bị sụt cân không mong muốn do ung thư hoặc do các bệnh lý khác.', 'Cho 95ml nước sôi để nguội vào ly, thêm 9 muỗng bột gạt ngang (75g) vào ly và khuấy đều. Đợi bột tan hết thêm 95ml nước nữa vào khuấy đều và thưởng thức.', '36 tháng kể từ ngày ', 'Hộp đã mở phải được đậy kín, bảo quản nơi khô mát và sử dụng trong vòng 2 tuần.Khi đã pha không dùng hết phải để trong tủ lạnh và dùng trong vòng 24 giờ. Để xa tầm tay trẻ em.', 'Sản phẩm này dùng để bổ sung dinh dưỡng và được chỉ định dưới sự hướng dẫn của thầy thuốc. Không dùng cho trẻ trừ khi có ý kiến của bác sĩ hoặc chuyên gia y tế. Không dùng đường tiêm truyền (qua đường tĩnh mạch). Không dùng cho người bị bệnh tăng galactose huyết. Sản phẩm này không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ hướng dẫn sử dụng trước khi dùng.', '12/2023/ĐKSP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `sdt`, `address`, `password`, `role`) VALUES
(16, 'Vũ Thành Luân', 'vuliz943@gmail.com', '0977472201', 'Thường Tín , Hà Nội', '123456', 0),
(22, 'Vũ Thành Luân', 'vuliz@gmail.com', '0977472201', '09', '123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muc`
--
ALTER TABLE `muc`
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `muclon`
--
ALTER TABLE `muclon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `muclon`
--
ALTER TABLE `muclon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `muc`
--
ALTER TABLE `muc`
  ADD CONSTRAINT `muc_ibfk_1` FOREIGN KEY (`id`) REFERENCES `muclon` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
