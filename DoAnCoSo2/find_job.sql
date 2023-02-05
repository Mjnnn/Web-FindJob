-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2022 lúc 08:11 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `find_job`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `imgavata` varchar(500) NOT NULL,
  `historysearch` varchar(100) NOT NULL,
  `ngaydangky` date NOT NULL,
  `vaitro` varchar(500) NOT NULL,
  `lido` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `phonenumber`, `email`, `imgavata`, `historysearch`, `ngaydangky`, `vaitro`, `lido`) VALUES
('Binh21CE', '1231231', '0912874652', 'binht2332@gmail.com', 'thanhbinhh.png', '', '2022-12-17', 'Khách Hàng', ''),
('Dat21SE', '1231231', '01647291235', 'thanhdat01677@gmail.com', 'undraw_profile.svg', 'Công', '2022-12-05', 'Khách Hàng', ''),
('DucNghia21CE', '123123123', '09672541212', 'phungducnghia3092003@gmail.com', 'ducnghia.png', '', '2022-12-10', 'Khách Hàng', ''),
('Lan22BA', '12312311', '0912874652', 'lan09022004@gmail.com', 'tlen2.png', '', '2022-12-11', 'Khách Hàng', ''),
('newbie01', '123123123', '0926288212', 'yenvy30803@gmail.com', 'acc.png', '', '2022-12-25', 'Khách Hàng', ''),
('Nha21DA', '1231231', '0987343352', 'nha8a123@gmail.com', 'nhap.png', '', '2022-12-04', 'Khách Hàng', ''),
('ThanhPhat21IT', '123123123', '09332974893', 'thanhphat130113@gmail.com', 'thanhphat.png', 'aaaaaaaaaaaaaaa', '2022-12-09', 'Khách Hàng', ''),
('YenVy03', '123123123', '0867113134', 'yenvy3080@gmail.com', 'acc.png', 'Công nghệ ô', '2022-01-10', 'Khách Hàng', ''),
('YenVy04', '123123123', '0867113134', 'yenvy30802@gmail.com', 'acc.png', '', '2022-01-12', 'Khách Hàng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `imgad` varchar(500) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`, `imgad`, `time`) VALUES
('admin01', '1231232', 'tucongminh3008@gmail.com', 'undraw_profile.svg', '2022-12-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `idblog` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `titleblog` varchar(200) NOT NULL,
  `contentblog` text NOT NULL,
  `imgblog` varchar(500) NOT NULL,
  `timeblog` date NOT NULL,
  `topicblog` varchar(200) NOT NULL,
  `trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`idblog`, `username`, `titleblog`, `contentblog`, `imgblog`, `timeblog`, `topicblog`, `trangthai`) VALUES
(1, 'ThanhPhat21IT', 'CV là gì? Những điểm cần lưu ý khi viết CV xin việc thành công', 'Thực chất, CV là bản tóm tắt chi tiết các thông tin cá nhân liên quan đến tên tuổi, kinh nghiệm làm việc, trình độ học vấn, những kỹ năng liên quan đến tính chất của công việc mà ứng viên muốn dự tuyển. Thông qua các thông tin kể trên, nhà tuyển dụng sẽ đưa ra được những đánh giá ban đầu về ứng viên hoặc thậm chí là sàng lọc được các ứng viên phù hợp với vị trí đang tuyển dụng. <br> Nếu CV là bản tóm tắt thông tin ứng viên bao gồm trình độ, kinh nghiệm, kỹ năng thì cover letter được xem là thư xin việc hay thư ứng tuyển được gửi kèm với CV. Đây là bản mô tả khái quát của ứng viên nhằm gây ấn tượng với nhà tuyển dụng, đồng thời thể hiện mong muốn và quyết tâm đối với vị trí đang ứng tuyển.', 'blog1.png', '2022-12-13', 'Kinh Nghiệm Phỏng Vấn', 'Chấp Nhận'),
(2, 'DucNghia21CE', 'VJ là gì? VJ là nghề gì? Tố chất cần có để thành công với nghề', 'Câu hỏi “VJ là gì?” nghe có vẻ đơn giản, nhưng nó có thể lấp đầy cả một trang sách với hàng tá câu trả lời. VJ là tên viết tắt của Video Jockey. Đây là thuật ngữ chỉ những người dẫn chương trình về âm nhạc trên các kênh, nền tảng truyền thông khác nhau. Có thể hiểu đơn giản, VJ chính là một nhánh nhỏ thuộc lĩnh vực MC - người dẫn chương trình. <br> Thời gian đầu, VJ chủ yếu được biết tới với vai trò là người dẫn dắt và giới thiệu các MV ca nhạc trên các kênh truyền hình. Hiện nay, các VJ không còn đơn giản là đóng vai trò dẫn dắt trong các chương trình ca nhạc, mà họ đã kiêm nhiệm, phụ trách nhiều công việc hơn như: biên tập và sáng tạo nội dung. <br> Thuật ngữ VJ được sử dụng lần đầu tiên vào năm 1981, khi kênh truyền hình âm nhạc MTV (Music Television) được ra đời cùng với 5 người dẫn chương trình. Tại Việt Nam, thuật ngữ VJ được phổ biến rộng rãi hơn vào năm 2012, với sự ra đời của kênh truyền hình âm nhạc, giải trí dành riêng cho giới trẻ - YanTV.', 'vj.jpg', '2022-12-12', 'Hướng Nghiệp', 'Chấp Nhận'),
(3, 'Nha21DA', 'Những cách tìm việc dị ở năm 2022', 'Một công việc mới ưng ý thường không phải là một mục tiêu dễ dàng đạt kết quả ngay và luôn. Nó là một quá trình thường có thể mất hàng tháng. Nếu bạn không chuẩn bị tâm lý đó, sẽ có lúc bạn cảm thấy suy sụp và vô vọng, cảm thấy nghi ngờ bản thân.Rõ ràng, những tác động kéo dài của đại dịch như: nhiều doanh nghiệp ngừng kinh doanh, kéo theo số người nghỉ việc (khách quan và chủ động) cũng tăng lên. <br> Nhưng nhìn chung, tổng thời gian chờ đợi từ khi nộp CV đến khi chính thức đi làm mất ít nhất 3 - 5 tuần. Trong đó, thời gian để nhận được lời mời làm việc sau phỏng vấn thường mất 2 tuần. Các vị trí cấp cao hơn có thể mất nhiều thời gian hơn. <br> Đó là chưa tính đến số lượng đơn xin việc và hồ sơ ứng viên và quy trình tuyển dụng của từng nhà tuyển dụng. Một số công ty sẽ có quy trình nhanh hơn, trong khi những công ty khác có thể chậm hơn một chút. Ngoài ra, một loạt các yếu tố khách quan có thể ảnh hưởng đến những ước tính này. Ví dụ, tình hình biến động của tài chính, chính trị quốc tế có thể ảnh hưởng đến ngành của bạn theo cách nào đó. Hoặc các điều kiện kinh tế tại địa phương của bạn. Đó là những yếu tố khách quan nằm ngoài tầm kiểm soát của bạn. <br> Nhưng có một yếu tố nằm trong tay bạn: đó là mức độ linh hoạt trong khi tìm kiếm việc làm, lượng thời gian bạn dành cho việc tìm kiếm việc làm mới và khả năng sẵn sàng chấp nhận việc làm trái ngành của bạn hoặc ở những vị trí mới mẻ', 'meocs.png', '2022-12-15', 'Mẹo Công Sở', 'Chấp Nhận'),
(4, 'Dat21SE', 'Senior là gì? Intern, Fresher, Junior, Senior là gì? Có gì khác biệt', 'Senior là gì là câu hỏi được rất nhiều người quan tâm hiện nay. Đây là một chức vụ quan trọng nắm giữ nhiều quyền hạn trong doanh nghiệp. Vậy bạn đã nắm được thông tin nào liên quan đến Senior? Sự khác biệt của Intern, Fresher, Junior và Senior là gì? Hãy cùng theo chân CareerBuilder tìm hiểu trong bài viết dưới đây nhé! <br> Trong doanh nghiệp sẽ có sự phân chia cấp bậc rõ ràng nhằm tạo cơ sở để giao việc cũng như thanh toán lương sau này. Senior hay Intern, Fresher, Junior là các thuật ngữ dùng để chỉ các vị trí đó. <br> Senior là từ dùng để chỉ những nhân viên có nhiều năm kinh nghiệm trong lĩnh vực mà họ làm việc. Nhà tuyển dụng thưởng sẽ ưu tiên người nắm giữ vị trí này phải có từ 4-5 năm kinh nghiệm trở lên. So với Fresher, Intern thì Senior là vị trí “cấp trên”, cấp quản lý người khác. Do vậy, họ không chỉ cần có chuyên môn vững mà còn phải có khả năng giải quyết công việc độc lập tốt. <br> Senior được chia thành nhiều cấp bậc khác nhau, tùy thuộc quy mô và khối lượng công việc trong doanh nghiệp. <br> Để trở thành Senior chuyên nghiệp không phải điều dễ dàng đối với nhân viên bình thường. Nếu cần từ khóa để diễn tả kỹ năng cho vị trí này thì hãy nên dùng từ “toàn năng”. Các kỹ năng bạn cần nắm vững khi muốn trở thành Senior bao gồm: <br> Senior cần có kỹ năng lãnh đạo cực tốt. Phần lớn nhiệm vụ của Senior là phân công nhiệm vụ cho cấp dưới và quản lý họ. Do vậy, Senior ngoài việc vững chuyên môn còn phải học cách lãnh đạo để điều hành công việc hiệu quả. <br> Có kỹ năng làm việc nhóm. Kỹ năng này luôn cần thiết dù bạn ở vị trí nào. Hãy rèn luyện kỹ năng làm việc nhóm để hoàn thành công việc tốt hơn. Ngoài ra, việc có kỹ năng teamwork tốt cũng giúp lãnh đạo đánh giá cao về bạn hơn. <br> Senior là người có kỹ năng giao tiếp tốt. Kỹ năng này hỗ trợ đắc lực cho bạn mỗi khi muốn trình bày quan điểm hay ý kiến của mình. Trường hợp được giao huấn luyện nhân viên mới, bạn cũng dễ dàng thấu hiểu và giúp họ hòa nhập với môi trường công việc tốt hơn. ', 'goccd1.jpg', '2022-12-20', 'Góc Chuyên Gia', 'Chấp Nhận'),
(5, 'Dat21SE', 'Technical Writer là ai? Cơ hội nghề nghiệp nào dành cho Technical Writer?', 'Technical Writer là người “phiên dịch” tài liệu kỹ thuật thành ngôn ngữ dễ hiểu. Công nghệ và sản phẩm ngày càng phức tạp kéo theo sự phát triển mạnh mẽ của lĩnh vực technical writing. Khi xu hướng này vẫn đang tiếp diễn, cơ hội thăng tiến hoặc chuyển hướng sự nghiệp IT với vị trí Technical Writer vẫn rộng mở cho bạn.<br>ITviec đã trò chuyện với Amit Singh, một Technical Writer 9 năm kinh nghiệm, hiện làm việc tại Wizeline – công ty dịch vụ công nghệ hàng đầu thế giới, giúp doanh nghiệp xây dựng các sản phẩm và nền tảng kỹ thuật số đi kèm với tài liệu kỹ thuật chất lượng cao.<br>Cùng đọc những chia sẻ của Amit để có cái nhìn toàn diện về công việc, kỹ năng cần có và định hướng phát triển sự nghiệp của một Technical Writer.<br>Technical Writer là người nghiên cứu về các sản phẩm kỹ thuật hay công nghệ phức tạp, sau đó chuyển thể các khái niệm kỹ thuật chuyên ngành thành ngôn ngữ và định dạng dễ hiểu hơn, dựa trên các template và style guide mẫu.<br>Để làm điều đó, Technical Writer cần phối hợp với nhiều bên liên quan như software developer, tester, product/ project manager, sales & marketing, chăm sóc khách hàng… để thu thập tất cả thông tin cần thiết.<br>Để dễ hình dung hơn, chúng tôi hỏi Amit về mối liên hệ giữa công việc của Technical Writer với các team phát triển sản phẩm khác. Tại sao cần một team technical writing riêng khi Dev hay QA/ QC cũng có thể viết các tài liệu kỹ thuật?<br>Theo Amit, Developer hoặc QA/ QC cũng thường viết các tài liệu như user guides hay release notes, nhưng tốt nhất vẫn nên có một team viết kỹ thuật riêng. <br>Vì Dev hay QA/QC chỉ có thể viết phần kỹ thuật họ làm, trong khi Technical Writer có thể viết tất cả. Developer cũng thường giỏi viết code hơn viết văn, còn Technical Writer có nền tảng ngôn ngữ vững chắc và có chứng chỉ chuyên môn cho công việc này.', 'goccg4.webp', '2022-12-18', 'Góc Chuyên Gia', 'Chấp Nhận'),
(6, 'Dat21SE', 'Giải quyết bất đồng quan điểm trong... 7 nốt nhạc', 'Đi ngược mong muốn của số đông là một tình huống không dễ chịu gì. Bạn không chỉ khiến mọi người khó chịu, bị phản bác mà còn có khả năng bị mọi người từ chối trong tương lai. Bởi vì chúng ta đánh giá cao sự đồng thuận hơn. Và ai cũng thích những sự “trật tự” để có một quy trình dễ tuân thủ, một tương lai dễ dự đoán. <br> Nhưng khi bạn nhìn thấy quyết định riêng của mình sẽ có hiệu quả về dài hạn, bạn vẫn có thể giảm bớt sự chống đối. Đây là những việc bạn nên làm, đặc biệt khi bạn không có đủ quyền lực và địa vị cần thiết: <br> 1. Thể hiện đóng góp bạn đã mang lại cho tập thể <br> 2. Chỉ ra mối đe dọa lớn nhất <br> 3. Thông điệp nhất quán và thuyết phục <br> 4. Dựa vào thông tin khách quan <br> 5. Thẳng thắn về các trở ngại <br> 6. Kêu gọi sự hợp tác', 'meocs2.png', '2022-12-14', 'Mẹo Công Sở', 'Chấp Nhận'),
(7, 'Nha21DA', 'Tôi không muốn nghỉ, nhưng tôi không thích sếp tôi', 'Ai chẳng từng gặp phải các vị sếp tệ hại ít nhất 1 - 2 lần trong đời. Đến mức người ta có câu: “Nhân viên không bỏ công ty, nhân viên bỏ sếp”. <br> Và đó cũng không phải hiện tượng hiếm thấy. Một khảo sát của công ty tư vấn lãnh đạo toàn cầu DDI cho thấy: 57% nhân sự đã bỏ việc do không hài lòng với sếp của họ. Ngoài ra, 32% khác cân nhắc nghỉ cũng vì lý do trên. <br> Nghỉ việc, dù điều kiện công việc đang rất tốt là để tránh cho bạn bị bắt nạt, bị chèn ép hoặc phải gánh chịu những lỗi không phải do bạn gây ra.  <br> Điều này cũng để tránh cho bạn rơi vào cảnh bước ra khỏi cửa trong tâm trạng giận dữ, thiếu kiểm soát. Có thể bạn sẽ hả hê ít nhiều khi hét vào mặt sếp rằng họ không ra gì, hoặc đơn giản là không thèm nói gì và nghỉ việc luôn.<br> Tình huống này rất có thể gây ra hậu quả lâu dài, khiến mọi người trong công ty không dám giới thiệu bạn đến những vị trí việc làm mới. Hoặc xì-căng-đan của bạn lan truyền khắp ngành, khiến các công ty ngại tuyển dụng bạn. Bởi kiểu nhân viên có hành vi không chuyên nghiệp là điều tất cả các công ty muốn tránh để khỏi ảnh hưởng đến danh tiếng trong tương lai.', 'goccg1.png', '2022-12-20', 'Góc Chuyên Gia', 'Chấp Nhận'),
(8, 'ThanhPhat21IT', 'Thực tập sinh là gì? Yêu cầu của nhà tuyển dụng đối với vị trí thực tập sinh', 'Thực tập sinh là người tham gia làm việc thực tế tại các doanh nghiệp để học hỏi, tích lũy thêm kinh nghiệm về ngành nghề mà mình đã được đào tạo tại trường lớp. Thực tập sinh thường là vị trí dành cho những bạn sinh viên mới tốt nghiệp hoặc những bạn đang là sinh viên năm cuối. Công việc chính ở vị trí này là sẽ hỗ trợ công việc khác nhau cho công ty tùy vào từng vị trí và theo sự hướng dẫn của doanh nghiệp. <br> Tuy không phải là công việc chính thức nhưng là cơ hội để các bạn được làm việc trong môi trường chuyên nghiệp nhằm tích lũy kinh nghiệm. Đây cũng là môi trường mang tính cạnh tranh cao đòi hỏi các ứng viên thực tập sinh phải có nền tảng kiến thức vững chắc. <br> Hiện nay, hầu hết các bạn sinh viên đều ứng tuyển vị trí thực tập cho mình từ rất sớm ngay khi bước vào năm cuối trên giảng đường cao đẳng, đại học. Vị trí thực tập sẽ đem lại nhiều lợi ích không thể phủ nhận, vậy các lợi ích đó là gì? Cùng CareerBuilder khám phá ngay sau đây bạn nhé! <br> Thông thường các ngành học ở trường cao đẳng, đại học sẽ khá rộng và cơ hội tìm việc trong ngành cũng sẽ cao. Tuy nhiên nó cũng sẽ gây bối rối cho các bạn vì không biết nên chọn công việc nào cho phù hợp với năng lực thực sự. <br> Do đó tham gia thực tập giúp bạn định hướng cụ thể nghề nghiệp, công việc mà mình mong muốn phát triển trong tương lai. Và cũng dựa vào đó để bổ sung những kỹ năng còn thiếu cần thiết cho công việc sau này.', 'knpv.jpg', '2022-12-13', 'Kinh Nghiệm Phỏng Vấn', 'Chấp Nhận'),
(9, 'DucNghia21CE', 'Hiệu suất làm việc là gì? Phương pháp giúp cải thiện hiệu suất làm việc', 'Hiệu suất làm việc là chỉ số đo lường mức độ hiệu quả của nguồn lực trong công ty. Hiểu một cách đơn giản, nếu nhân viên tốn nhiều thời gian, công sức, chi phí để hoàn thành công việc thì tức là hiệu suất làm việc thấp. Ngược lại, nếu công việc được hoàn thành trong thời gian sớm nhất, không tốn nhiều công sức và chi phí có nghĩa là hiệu suất làm việc cao. <br> Hiệu suất làm việc là một chỉ số hữu ích giúp đánh giá nhân sự có đang thực hiện tốt công việc của mình hay không. Từ đó giúp cho doanh nghiệp có thể đo lường được các nguồn lực đang có và sử dụng như thế nào để đạt được mục tiêu công việc. <br> Có rất nhiều yếu tố có thể làm ảnh hưởng đến hiệu suất làm việc, trong đó phải kể đến 8 yếu tố cơ bản như: Nhiệm vụ công việc, các hành vi phi nhiệm vụ, giao tiếp trong công việc, tính kỷ luật, thành tích cá nhân, hiệu quả làm việc nhóm, khả năng lãnh đạo, khả năng hỗ trợ đồng đội.', 'bqtvv.png', '2022-12-11', 'Bí Quyết Tìm Việc', 'Chấp Nhận'),
(10, 'Nha21DA', 'Các bước chuẩn bị cho quá trình thực tập và kinh nghiệm làm báo cáo thực tập', 'Báo cáo thực tập là một bài tập quan trọng bắt buộc phải có trước khi sinh viên ra trường. Và để có được một bài báo cáo thực tập đạt được điểm số cao như mong muốn, trong quá trình thực tập bạn cũng cần có kết quả tốt. <br> Thực tập - Khoảng thời gian mà sinh viên sẽ có cơ hội được trải nghiệm làm việc thực tế tại các doanh nghiệp, công ty. Có thể thấy đây là khoảng thời gian vô cùng quý giá, là hành trang vững chắc cho sinh viên trước khi bước vào nghề. Vậy để có một quá trình thực tập đạt kết quả cao thì cần chuẩn bị những gì? Kinh nghiệm rút ra sau quá trình thực tập là gì và cách để có một bài báo cáo thực tập đạt kết quả cao như thế nào? <br> Thực tập là khoảng thời gian bạn thực hiện một công việc thực tế, cụ thể nào đó để áp dụng những kiến thức đã được học ở trường Đại học/Cao đẳng vào thực tiễn. Thực tập được xem là một quá trình huấn luyện, đào tạo cho những người mới, những người sắp bước chân vào một nghề nghiệp nào đó. <br> Đối tượng thực tập chính là sinh viên năm 4 hoặc sinh viên mới ra trường. Họ là những người có mong muốn tìm công ty để trải nghiệm nhiều vị trí trước khi quyết định xem mình sẽ đi theo con đường nào. <br> Mong muốn trải nghiệm của những người tham gia vào quá trình thực tập thường cao hơn là quyết tâm làm việc; cống hiến cho tổ chức nhất định. Mục đích thực tập của sinh viên là để học những kỹ năng và tìm hiểu văn hoá làm việc của một tổ chức. Những điều mà khi còn ngồi trên ghế nhà trường họ không có cơ hội được tìm hiểu, khám phá. Đôi khi mục đích thực tập của nhiều bạn sinh viên chỉ đơn giản là hiểu rõ hơn về ngành học của mình để từ đó hoàn thành tốt bài báo cáo thực tập.', 'bqtv2.jpg', '2022-12-12', 'Bí Quyết Tìm Việc', 'Chấp Nhận'),
(11, 'Dat21SE', 'Bật mí cách kiểm tra hợp đồng trả góp còn bao nhiêu tháng?', 'Vay tiền trả góp chính là một hình thức vay vốn mà những kỳ trả lãi và gốc trùng nhau. Có nghĩa là với một khoản vay thì khách hàng sẽ được chia đều theo kỳ hạn vay vốn và hàng tháng sẽ trả lãi và 1 khoản tiền gốc cho đến khi trả góp hết số tiền nợ gốc đã vay. <br> Việc vay vốn trả góp đã không còn xa lạ đối với nhiều khách hàng chưa có đủ tài chính như là học sinh/sinh viên, người lao động. Và dĩ nhiên việc vay vốn trả góp cũng sẽ góp phần giúp cho khách hàng dễ dàng kiểm soát hoạt động tài chính của bản thân. So với những hình thức vay vốn khác, vay trả góp mang tới nhiều ưu điểm như: <br> Số tiền vay trả góp được chia nhỏ ra trong nhiều tháng giúp cho khách hàng giảm áp lực tài chính. <br> Khách hàng có thể nhận được các sản phẩm để sử dụng ngay, chỉ cần thanh toán trước một khoản tiền nhất định. <br> Thủ tục đơn giản, nhanh chóng và không rườm rà giấy tờ. <br> Thời gian vay trả góp linh hoạt, tùy theo khả năng về tài chính của từng khách hàng.<br> Nhiều đơn vị có nhiều chính sách trả góp 0% lãi suất. <br> Đối với các khách hàng không dồi dào về tài chính thì đây chính là giải pháp hoàn hảo. Chỉ cần trả trước một số tiền, khách hàng có thể sở hữu rất nhiều món đồ thiết yếu cho gia đình và bản thân như là: xe máy, điện thoại, máy tính, tủ lạnh… ', 'gcg3.jpg', '2022-12-16', 'Góc Chuyên Gia', 'Chấp Nhận'),
(12, 'ThanhPhat21IT', '21 cách giúp tuyển dụng hiệu quả hơn!', '1. Thiết lập và tận dụng thương hiệu nhà tuyển dụng. <br>2. Cải thiện tin tuyển dụng với mô tả công việc hấp dẫn. <br>3. Ưu tiên thực hành tính đa dạng, công bằng và hòa nhập. <br>4. Xem ứng viên như khách hàng và tạo trải nghiệm tuyệt với cho ứng viên. <br>5. Thực hiện các cuộc phỏng vấn chất lượng, ấn tượng. <br>6. Sử dụng bảng tin tuyển dụng hấp dẫn.<br>7. Mở rộng phạm vi tiếp cận trên mạng xã hội. <br>8. Tạo thêm các video tuyển dụng.<br>9. Liên hệ với những ứng viên đủ điều kiện trong quá khứ. <br>10. Liên hệ với các nhân viên cũ (cựu nhân viên).<br>11. Nhắm mục tiêu các ứng viên thụ động bằng E-mail Marketing hoặc chương trình chăm sóc đặc biệt.<br>12. Tuyển dụng thông qua các trường cao đẳng, đại học.<br>13. Tổ chức hoặc tham dự các cuộc gặp gỡ liên quan đến ngành. <br>14. Thực hiện chương trình giới thiệu nhân viên. <br>15. Cải thiện quy trình tuyển dụng với dữ liệu và chỉ số, ưu tiên tuyển dụng tự động hoá và nhanh chóng. <br>16. Xây dựng và Đào tạo đội ngũ tuyển dụng xuất sắc.<br>18. Thuê đơn vị tuyển dụng để tạo thêm phương án dự phòng. <br>19. Các bộ phận được tham gia trực tiếp vào quá trình tuyển dụng, đánh giá và sàng lọc ứng viên.<br>20. Cần có chiến lược, mục tiêu và kế hoạch tuyển dụng trong ngắn hạn, trung hạn và dài hạn (Inbound Marketing…). <br>21. Tuyển dụng đa kênh.', 'knpv3.png', '2022-12-18', 'Kinh Nghiệm Phỏng Vấn', 'Chấp Nhận'),
(13, 'DucNghia21CE', 'Tiêu đề CV là gì? Cách đặt tên tiều đề CV ấn tượng và chuẩn', 'Và dù tiêu đề CV là một phần rất nhỏ, dường như không quan trọng nhưng nó cũng quyết định việc bạn có tạo được ấn tượng tốt với Nhà tuyển dụng hay không. Một file CV được đặt tên đúng chuẩn cho thấy ứng viên là một người chuyên nghiệp.<br>Tiêu đề CV tưởng chừng là nội dung đơn giản, ai cũng có thể viết đúng. Tuy nhiên chỉ với 3 năm hoạt động trong lĩnh vực tuyển dụng, tôi đã thấy không ít ứng viên mắc lỗi khi đặt tên file CV.<br>Rất nhiều ứng viên đặt tên file CV là tên vị trí ứng tuyển. Chẳng hạn như “CV Marketing”, “CV IT”,… Cách đặt tiêu đề CV như thế này khiến Nhà tuyển dụng gặp khó khăn vì không biết mình đã tải file CV này về hay chưa.<br>Tên file cần ngắn gọn để Nhà tuyển dụng có thể nắm bắt thông tin chỉ trong vài giây. Ngoài ra, tiêu đề CV quá dài có thể khiến thông tin quan trọng bị ẩn<br>CV là một tài liệu quan trọng, cần sự nghiêm túc. Vì thế, bạn không nên thêm nickname của mình vào tiêu đề.<br>Nhiều người sử dụng 1 CV để ứng tuyển cho nhiều vị trí. Điều đó không hẳn là sai, tuy nhiên bạn cần lưu ý thay đổi nội dung và tên CV cho phù hợp. Đừng sử dụng một chiếc CV với tên “Hà Anh Thư – Chăm sóc khách hàng” để ứng tuyển vào vị trí Nhân viên kinh doanh nhé!<br>', 'knpv4.jpg', '2022-12-19', 'Kinh Nghiệm Phỏng Vấn', 'Chấp Nhận'),
(14, 'DucNghia21CE', 'Cẩm nang sử dụng Figma hiệu quả dành cho UI/UX Designer', 'UI/ UX Designer đang là một trong những vị trí hot trên thị trường IT với tỉ lệ cạnh tranh cao. Để trở thành người được “săn đón”, bạn không chỉ cần những tố chất cần có của một UI/ UX Designer, mà còn cần sử dụng thành thạo những công cụ tiện ích như Figma để công việc dễ dàng và hiệu quả hơn.<br>\r\nDù bạn mới tìm hiểu hoặc đã biết Figma là gì bài viết này sẽ cung cấp những định hướng hữu ích để bạn có thể bắt đầu sử dụng Figma ngay hôm nay!<br>Dưới đây là 6 tính năng hữu ích khi sử dụng Figma mà dân thiết kế không thể bỏ qua:<br>1. Mạng vector<br>2. Các biến thể (Variants)<br>3. Bulleted Lists<br>4. Swap Instance Menu<br>5. Hệ thống thiết kế (Design systems)<br>6. Smart selection tool ', 'hn1.webp', '2022-12-15', 'Hướng Nghiệp', 'Chấp Nhận'),
(15, 'Nha21DA', 'RPA Developer là gì? Cơ hội nghề nghiệp RPA Developer hấp dẫn không?', 'RPA là một trong những công nghệ mới xuất hiện tại Việt Nam và đang được nhiều doanh nghiệp quan tâm và ứng dụng. Nhờ vậy, RPA Developer trở thành một trong những ngành nghề mới, hấp dẫn, thu hút được nhiều nhân tài với mức lương hấp dẫn, đãi ngộ tuyệt vời.<br>Để giúp hiểu thêm về những tố chất cần thiết của một RPA Developer cũng như mức lương, cơ hội nghề nghiệp của RPA Developer tại Việt Nam hiện nay, ITviec đã có buổi trò chuyện với Nguyễn Tấn Phát – RPA Technical Lead và Nguyễn Trọng Duy – RPA Team Leader tại CMC Global – một trong những đơn vị triển khai dịch vụ IT hàng đầu tại Việt Nam, đặc biệt là dịch vụ phát triển RPA cho doanh nghiệp.<br>Hầu hết RPA chỉ làm việc với low-code nên chỉ cần biết ở mức cơ bản để xử lý những trường hợp lỗi. Chỉ có automation truyền thống mới yêu cầu nhiều code phức tạp, còn RPA thì không cần.<br>Tuy nhiên, nếu RPA Developer biết code căn bản liên quan tới Java, Python, C++, C#, Visual Basic, SQL or JavaScript thì đó sẽ là điểm cộng và tiếp nhận RPA nhanh hơn. Có những task vụ vẫn đòi hỏi Developer phải dùng code.<br>Về bằng cấp RPA thì các RPA Developer có thể tìm học và thi lấy chứng chỉ RPA ở UIPath và Automation Anywhere. Ở đây có các khóa học và cấp bằng từ cơ bản đến nâng cao.', 'hn3.webp', '2022-12-17', 'Hướng Nghiệp', 'Chấp Nhận'),
(16, 'ThanhPhat21IT', 'TypeScript là gì? Top 20 câu hỏi đáp về TypeScript cần biết năm 2022 (Phần 1)', 'TypeScript là gì? TypeScript là ngôn ngữ lập trình được yêu thích thứ 3 trong năm 2021 và đang trở nên phổ biến trong nhiều framework hiện đại. Ngay cả khi bạn chưa có nhu cầu sử dụng, việc học TypeScript cũng giúp bạn hiểu sâu hơn về JavaScript và mở rộng cơ hội có việc làm tốt hơn trong tương lai! <br>Nhìn lại lịch sử, JavaScript là ngôn ngữ chính để viết web vì nó có thể sử dụng được trên cả front-end lẫn back-end của các framework như Node.js và Deno. Nhưng khi các trang web phát triển thành một hệ thống lớn và phức tạp hơn, thì sử dụng JavaScript sẽ gặp khó khăn trong việc đọc code và bảo trì.<br>Microsoft đã sớm nhận thấy vấn đề này và giải pháp của họ là TypeScript! Từ phiên bản đầu tiên được phát hành năm 2012, TypeScript ngày càng trở nên phổ biến và càng có nhiều công việc đòi hỏi các developer phải biết TypeScript.<br>Theo báo cáo Developer Survey 2021 của Stackoverflow, TypeScript là ngôn ngữ phổ biến thứ 5 đối với các developer chuyên nghiệp. TypeScript cũng đứng thứ 3 trong danh sách “những ngôn ngữ được yêu thích” và thứ 2 trong “những ngôn ngữ mong muốn sử dụng” đối với developer.', 'hn4.webp', '2022-12-18', 'Hướng Nghiệp', 'Chấp Nhận'),
(17, 'Dat21SE', 'Bật mí 8 mẹo giữ bí mật “Kế hoạch tìm việc mới” ', '1. Kiểm tra lại thông tin liên lạc trên CV <br>2. Sắp xếp thời gian phỏng vấn hợp lý.<br>3. Sử dụng tab ẩn danh để tìm kiếm thông tin về công việc mới. <br>4. Đặt LinkedIn về chế độ riêng tư (nếu bạn có sử dụng). <br>5. Chú ý thông tin chia sẻ trên mạng xã hội.<br>6. Tránh “tán gẫu” với đồng nghiệp. <br>7. Chuẩn bị trang phục riêng cho buổi phỏng vấn sau giờ làm. <br>8. Giữ hiệu suất làm việc ổn định.\r\n', '8biquyet.jpg', '2022-12-17', 'Mẹo Công Sở', 'Chấp Nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `idcongty` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `tencongty` varchar(500) NOT NULL,
  `loaihinhhd` varchar(200) NOT NULL,
  `trangthaicty` varchar(200) NOT NULL,
  `sonv` varchar(200) NOT NULL,
  `soluoccty` varchar(10000) NOT NULL,
  `quocgia` varchar(200) NOT NULL,
  `tinh_tp` varchar(200) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `tennguoilh` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `imgcompany` varchar(500) NOT NULL,
  `imgnguoilh` varchar(500) NOT NULL,
  `nhunglocation` varchar(5000) NOT NULL,
  `linkwebsite` varchar(1000) NOT NULL,
  `phucloicty` varchar(2000) NOT NULL,
  `masothue` varchar(100) NOT NULL,
  `trangthaichitiet` varchar(100) NOT NULL,
  `ngaydangky` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`idcongty`, `username`, `tencongty`, `loaihinhhd`, `trangthaicty`, `sonv`, `soluoccty`, `quocgia`, `tinh_tp`, `diachi`, `tennguoilh`, `sdt`, `email`, `imgcompany`, `imgnguoilh`, `nhunglocation`, `linkwebsite`, `phucloicty`, `masothue`, `trangthaichitiet`, `ngaydangky`) VALUES
(1, 'Dat21SE', 'VinGroup', 'Cổ Phần', 'Mở Cửa 24/7', '20.000-49.999', 'Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam, tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, công ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. <br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- Thiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về phong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Số 7 Đường Bằng Lăng 1, Phường Việt Hưng, Quận Long Biên', 'Trương Văn Sỹ', '+84 (24) 3974 9999', 'sytruong1993@gmail.com', 'vingroup.png', 'sytruong.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.57918331379!2d105.9145579147848!3d21.04951749244561!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a9ad6d626e77%3A0xe5c7cb51d4c6b9f!2zVOG6rXAgxJFvw6BuIFZpbiBHcm91cA!5e0!3m2!1svi!2s!4v1668247383157!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://vingroup.net/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '672625', 'Chấp Nhận', '2022-12-11'),
(2, 'Nha21DA', 'Tập đoàn Hòa Phát', 'Liên Doanh', 'Theo Giờ Hành Chính', '20.000-49.999', 'Hòa Phát là Tập đoàn sản xuất công nghiệp hàng đầu Việt Nam. Khởi đầu từ một Công ty chuyên buôn bán các loại máy xây dựng từ tháng 8/1992, Hòa Phát lần lượt mở rộng sang các lĩnh vực khác như Nội thất, ống thép, thép xây dựng, điện lạnh, bất động sản và nông nghiệp. Ngày 15/11/2007, Hòa Phát chính thức niêm yết cổ phiếu trên thị trường chứng khoán Việt Nam với mã chứng khoán HPG.<br>Hiện nay, Tập đoàn hoạt động trong 05 lĩnh vực: Gang thép (thép xây dựng, thép cuộn cán nóng) - Sản phẩm thép (gồm Ống thép, tôn mạ, thép rút dây, thép dự ứng lực) - Nông nghiệp - Bất động sản – Điện máy gia dụng. Sản xuất thép là lĩnh vực cốt lõi chiếm tỷ trọng 90% doanh thu và lợi nhuận toàn Tập đoàn. Với công suất 8 triệu tấn thép thô/năm, Hòa Phát là doanh nghiệp sản xuất thép lớn nhất khu vực Đông Nam Á.', 'Việt Nam', 'Hà Nội', ' Văn phòng Hà Nội: 66 Nguyễn Du, P. Nguyễn Du, Q. Hai Bà Trưng', 'Lê Thị Thu Len', '024.628.48.666', 'thulen02@gmail.com', 'hoaphat.jpg', 'tlen2.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3286893033437!2d105.84153593488769!3d21.019530400000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab91e2a4a31f%3A0xa12dba9ef76fc43f!2zVOG6rXAgxJFvw6BuIEjDsmEgUGjDoXQ!5e0!3m2!1svi!2s!4v1668270999232!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.hoaphat.com.vn/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '637122', 'Chấp Nhận', '2022-12-12'),
(3, 'Dat21SE', 'Công ty cổ phần FPT.', 'Liên Doanh', 'Theo Giờ Hành Chính', '20.000-49.999', 'FPT là công ty tiên phong chuyển đổi số và dẫn đầu về tư vấn, cung cấp, triển khai các dịch vụ, giải pháp công nghệ - viễn thông. Chúng tôi đồng hành cùng các khách hàng tại 27 quốc gia và vùng lãnh thổ trên toàn cầu hiện thực hóa chiến lược, mục tiêu phát triển kinh doanh dựa trên công nghệ.<br>Với kinh nghiệm triển khai dự án trên phạm vi toàn cầu trong suốt hơn ba thập kỷ qua, chúng tôi giúp khách hàng vượt qua những thách thức, rào cản và đạt được hiệu quả cao nhất trong hành trình chuyển đổi số. Dựa trên những công nghệ mới nhất trí tuệ nhân tạo, phân tích dữ liệu lớn, điện toán đám mây, tự động hóa, kết nối vạn vật…, chúng tôi đưa ra những giải pháp, dịch vụ công nghệ tiên tiến giúp khách hàng chủ động, linh hoạt thích ứng trong mọi bối cảnh.', 'Việt Nam', 'Hà Nội', ' Tòa nhà FPT, Số 10 phố Phạm Văn Bạch, Phường Dịch Vọng, Quận Cầu Giấy', 'Nguyễn Phong Nhã', '024.628.48.666', 'phongnha09gmail.com', 'fptn.png', 'nhap.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.144233821038!2d105.78650891478442!3d21.0269140932175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0bf969acc7%3A0x5c1dcc77c7244bfe!2zVOG6rXAgxJFvw6BuIEZQVCAtIFRy4bulIHPhu58gY2jDrW5o!5e0!3m2!1svi!2s!4v1668272082988!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://fpt.com.vn/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '716124', 'Chấp Nhận', '2022-12-13'),
(4, 'Dat21SE', 'Công ty ôtô Trường Hải.', 'Cổ Phần', 'Mở Cửa 24/7', '10.000-19.999', 'CÔNG TY CỔ PHẦN TẬP ĐOÀN TRƯỜNG HẢI (TRUONG HAI GROUP) tiền thân là Công ty CP Ô tô Trường Hải (THACO) được thành lập vào ngày 29/04/1997, tại Đồng Nai. Người sáng lập là ông Trần Bá Dương, hiện là Chủ tịch Hội đồng Quản trị.<br>Trải qua 25 năm hình thành và phát triển, từ một công ty chuyên nhập khẩu xe cũ, cung cấp vật tư phụ tùng sửa chữa ô tô, THACO đã phát triển vượt bậc, đưa doanh nghiệp trở thành tập đoàn công nghiệp đa ngành gồm: THACO AUTO (Ô tô), THACO AGRICULTURE (Nông Lâm nghiệp); THACO INDUSTRIES (Cơ khí và Công nghiệp hỗ trợ), THADICO (Đầu tư xây dựng), THILOGI (Logistics) và THISO (Thương mại dịch vụ), trong đó các ngành bổ trợ cho nhau và có tính tích hợp cao.<br>Cấu trúc THACO bao gồm: 6 Tập đoàn thành viên là THACO AUTO - điều hành toàn bộ mảng sản xuất, kinh doanh ô tô của THACO; THACO AGRICULTURE - điều hành mảng Nông nghiệp; THACO INDUSTRIES - phụ trách lĩnh vực Cơ khí & Công nghiệp hỗ trợ; THADICO - phụ trách lĩnh vực Đầu tư xây dựng; THILOGI - phụ trách lĩnh vực Giao nhận vận chuyển (Logictics); THISO - phụ trách lĩnh vực Thương mại - Dịch vụ', 'Việt Nam', 'Hà Nội', '541 Nguyễn Văn Cừ, Phường Gia Thuỵ, Quận Long Biên', 'Võ Thành Đạt', '(024) 38758914', 'thanhdat09@gmail.com', 'THA.jpg', 'datt.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14896.147719179384!2d105.90642793955078!3d21.031208300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a9b0f0bd10b9%3A0xc510330d9c4b7f57!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gw5QgVMO0IFRyxrDhu51uZyBI4bqjaQ!5e0!3m2!1svi!2s!4v1668272696318!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.thacogroup.vn/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '182256', 'Chấp Nhận', '2022-12-12'),
(5, 'Dat21SE', 'TẬP ĐOÀN MASAN', 'Liên Doanh', 'Theo Giờ Hành Chính', '10.000-19.999', 'Công ty Cổ phần Tập đoàn Ma San được thành lập vào tháng 11 năm 2004 dưới tên là Công ty Cổ phần Hàng Hải Ma San. Công ty chính thức đổi tên thành Công ty Cổ phần Tập đoàn Ma San (tên tiếng Anh là Ma San Group Corporation) vào tháng 8 năm 2009 và đã niêm yết thành công tại Sở Giao dịch chứng khoán Tp. HCM vào ngày 05 tháng 11 năm 2009. Công ty cũng đã chính thức thay đổi tên thành Công ty Cổ phần Tập đoàn Masan vào tháng 07 năm 2015. Dù Công ty chính thức thành lập vào năm 2004 nhưng tính đến việc thành lập và hoạt động của các cổ đông lớn, công ty con và các công ty tiền nhiệm của chúng tôi thì Masan Group đã hoạt động từ năm 1996.<br>Cùng với quá trình tăng trưởng kinh tế của Việt Nam, người tiêu dùng và nhu cầu của họ luôn không ngừng phát triển. Bên cạnh nhu yếu phẩm cơ bản hằng ngày, người tiêu dùng còn cần được phục vụ các sản phẩm và dịch vụ đa dạng, những trải nghiệm vượt trội, phù hợp với sở thích của từng cá nhân và phong cách sống hiện đại. Công nghệ và sự tiện lợi ngày càng trở thành mối quan tâm hàng đầu, được nhiều người ưa chuộng. Đón đầu xu hướng này, bên cạnh hoạt động sản xuất kinh doanh các sản phẩm có thương hiệu, Masan Group đã xây dựng hệ sinh thái tiêu dùng - công nghệ tích hợp xuyên suốt từ offline đến online.', 'Việt Nam', 'Thành Phố Hồ Chí Minh', 'P.802, Lầu 8, Central Plaza, 17 Lê Duẩn, Phường Bến Nghé, Quận 1', 'Nguyễn Trung Hiếu', '+84 28 62563862', 'trunghieu05@gmail.com', 'MasanGroup.png', 'trunghieu.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125419.38594135651!2d106.56251891640622!3d10.784036800000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f36321fabf7%3A0x5aa7af4cd799e5b3!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gVOG6rXAgxJBvw6BuIE1hc2Fu!5e0!3m2!1svi!2s!4v1668276393260!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.masangroup.com/vi/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '182925', 'Chấp Nhận', '2022-12-13'),
(6, 'Dat21SE', 'Ngân hàng TMCP ', 'Cổ Phần', 'Theo Giờ Hành Chính', '10.000-19.999', 'VPBank tiếp tục theo đuổi mục tiêu khẳng định vị thế của ngân hàng trên thị trường, đó là nằm trong nhóm 5 Ngân hàng TMCP tư nhân và nhóm 3 Ngân hàng TMCP tư nhân bán lẻ hàng đầu về quy mô cho vay khách hàng, huy động khách hàng và lợi nhuận. Để hiện thực hóa mục tiêu, VPBank xác định cần chú trọng tăng trưởng chất lượng song song với tăng trưởng quy mô một cách có chọn lọc trên các phân khúc thị trường chủ đạo. Trong đó, tăng trưởng chất lượng cần được chú trọng, xuyên suốt các chủ trương chính sách của ngân hàng:<br>Các chỉ tiêu quy mô và hiệu quả duy trì tốc độ tăng trưởng cao hơn mức trung bình của toàn ngành<br>Nâng cao năng suất bán và chất lượng của đội ngũ bán nhằm thúc đẩy tăng trưởng tín dụng và huy động<br>Củng cố và nấng cấp các hệ thống nền tảng hỗ trợ kinh doanh với mục tiêu: tập trung hóa, tự động hóa, số hóa và đơn giản hóa<br>Giá trị cốt lõi ', 'Việt Nam', 'Hà Nội', ' Trụ sở chính: 89 Láng Hạ, Quận Đống Đa', 'Phùng Đức Nghĩa', '024.628.48.666', 'ducnghia02@gmail.com', 'vbbank2.png', 'ducnghia.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.412634183919!2d105.81286631478432!3d21.016169293584298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab623c8c1d2f%3A0xb1bdd08ddacbcd46!2zVlBCQU5LIEjhu5hJIFPhu54!5e0!3m2!1svi!2s!4v1668276487762!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.vpbank.com.vn/ca-nhan', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '687122', 'Chấp Nhận', '2022-12-13'),
(7, 'Nha21DA', ' Tập đoàn đá quý DoJi.', 'Cổ Phần', 'Theo Giờ Hành Chính', '10.000-19.999', 'TẬP ĐOÀN VÀNG BẠC ĐÁ QUÝ DOJI, tiền thân là Công ty Phát triển Công nghệ và Thương mại TTD được thành lập ngày 28/07/1994. Vào thời điểm những năm 90 của thế kỉ 20, Công ty TTD chính là doanh nghiệp tiên phong trong hoạt động chuyên sâu về khai thác đá quý, chế tác cắt mài và xuất khẩu đá quý ra thị trường quốc tế, vốn là một lĩnh vực vô cùng mới mẻ tại Việt Nam. TTD trở thành Công ty đầu tiên đã đưa ra thị trường quốc tế sản phẩm đá Ruby sao Việt Nam với thương hiệu Việt Nam Star Ruby – VSR. Kể từ đó, Công ty được mệnh danh là ông hoàng Ruby sao của thế giới, đưa Việt Nam được khắc họa như một điểm sáng trên bản đồ Đá quý quốc tế.<br>Năm 2007, để kiện toàn bộ máy, Công ty TTD chính thức đổi tên thành Công ty Cổ phần Vàng bạc Đá quý & Đầu tư Thương mại DOJI. Năm 2009, để kiện toàn bộ máy cho giai đoạn chiến lược phát triển mới, DOJI đã tiến hành tái cấu trúc và chính thức trở thành Tập đoàn Vàng bạc Đá quý DOJI, hoạt động theo mô hình Công ty Mẹ – Con. ', 'Việt Nam', 'Hà Nội', ' Toà nhà DOJI Tower, 5 Lê Duẩn,\r\nP. Điện Biên, Q.Ba Đình', 'Nguyễn Quang Lợi', '024.628.48.666', 'quangloi04@gmail.com', 'doji.jpeg', 'loinguyen.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.09276846406!2d105.83960101478452!3d21.02897379314721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3fe8fef113%3A0xda107636cbe98491!2zVMOyYSBuaMOgIERPSkkgVE9XRVI!5e0!3m2!1svi!2s!4v1668274951890!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://doji.vn/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '687622', 'Chấp Nhận', '2022-12-14'),
(8, 'Nha21DA', 'Thế Giới Di Động.', 'Cổ Phần', 'Theo Giờ Hành Chính', '20.000-49.999', 'Công ty Cổ phần Đầu tư Thế Giới Di Động (MWG) là nền tảng bán lẻ đa ngành nghề số 1 Việt Nam về doanh thu và lợi nhuận.<br>Với chiến lược omni-channel, Công ty vận hành mạng lưới hàng ngàn cửa hàng trên toàn quốc song song với việc tận dụng hiểu biết sâu rộng về khách hàng thông qua nền tảng dữ liệu lớn, năng lực chủ động triển khai các hoạt động hỗ trợ bán lẻ được xây dựng nội bộ và liên tục đổi mới công nghệ nhằm tạo ra trải nghiệm khách hàng vượt trội và thống nhất ở mọi kênh cũng như nâng cao sự gắn kết của người tiêu dùng với các thương hiệu của MWG.<br>Trong hệ sinh thái của MWG, ngoài các công ty con chuyên vận hành chuỗi bán lẻ (thegioididong.com, Điện Máy Xanh, Bách Hóa Xanh, nhà thuốc An Khang...) còn có các công ty chuyên cung cấp dịch vụ có liên quan như dịch vụ hậu mãi - bảo trì - lắp đặt, dịch vụ giao hàng chặng cuối, dịch vụ quản lý kho vận logistics, mảng phân phối sản phẩm nông nghiệp an toàn 4KFarm...Công ty cũng mở rộng kinh doanh ra thị trường nước ngoài với chuỗi bán lẻ điện máy tại Campuchia và liên doanh tại Indonesia.<br>Không chỉ là một doanh nghiệp hoạt động hiệu quả được nhìn nhận bởi nhà đầu tư và các tổ chức đánh giá chuyên nghiệp, MWG còn được người lao động tin yêu khi liên tiếp được vinh danh trong TOP 50 Doanh nghiệp có môi trường làm việc tốt nhất Việt Nam và là doanh nghiệp xuất sắc nhất tại giải thưởng Vietnam HR Awards – “Chiến lược nhân sự hiệu quả”.', 'Việt Nam', 'Thành Phố Hồ Chí Minh', 'Lô T2-1.2 đường D1, Khu Công Nghệ Cao, Phường Tân Phú, TP. Thủ Đức', 'Nguyễn Thành Phát', '024.628.48.666', 'thanhphat08@gmail.com', 'tgdt.png', 'thanhphat.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4726391795266!2d106.79538631468444!3d10.851610960769012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175274501c51a19%3A0x1a8fb5646729745d!2zVMOyYSBuaMOgIE1XRyAtIEPDtG5nIHR5IEPhu5UgcGjhuqduIFRo4bq_IEdp4bubaSBEaSDEkOG7mW5n!5e0!3m2!1svi!2s!4v1668275500721!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://mwg.vn/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '614612', 'Chấp Nhận', '2022-12-13'),
(9, 'Dat21SE', 'Tập Đoàn Bảo Việt', 'Cổ Phần', 'Theo Giờ Hành Chính', '10.000-19.999', 'Bảo Việt tự hào là doanh nghiệp đầu tiên cung cấp bảo hiểm phi nhân thọ, bảo hiểm nhân thọ và chứng khoán tại thị trường Việt Nam. Hiện nay, Bảo Việt – thông qua các đơn vị thành viên - đang cung cấp các dịch vụ tài chính toàn diện bao gồm bảo hiểm phi nhân thọ, bảo hiểm nhân thọ, chứng khoán, quản lý quỹ và đầu tư với mạng lưới rộng khắp các tỉnh thành trên cả nước, phục vụ hàng chục triệu khách hàng. Nhằm không ngừng mang lại các giá trị gia tăng cho khách hàng, Bảo Việt liên tục nghiên cứu, ứng dụng công nghệ số trong kinh doanh, quản trị và phục vụ khách hàng.\r\n ', 'Việt Nam', 'Hà Nội', 'Trụ sở chính: Số 8 phố Lê Thái Tổ, phường Hàng Trống, quận Hoàn Kiếm', 'Trần Thanh Bình', '0967124221', 'thanhbinh01@gmail.com', 'baoviett.png', 'thanhbinhh.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4460.747416417745!2d105.84905944303965!3d21.031061263970745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab955efbdfc5%3A0x616f839d77647d7!2zVOG6rXAgxJBvw6BuIELhuqNvIFZp4buHdA!5e0!3m2!1svi!2s!4v1668439242418!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.baoviet.com.vn/Trang-chu', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '0299267', 'Chấp Nhận', '2022-12-13'),
(10, 'Lan22BA', 'Công Ty CP FPT', 'Liên Doanh', 'Theo Giờ Hành Chính', '10.000-19.999', 'Ngày 13/9/1988, Công ty Công nghệ Thực phẩm (The Food Processing Technology Company), tiền thân của Công ty FPT được thành lập. Ngày 27/10/1990, công ty đổi tên thành Công ty Phát triển Đầu tư Công nghệ FPT. Tháng 3/2002, công ty cổ phần hóa với tên Công ty Cổ phần Phát triển Đầu tư Công nghệ FPT. Công ty bắt đầu niêm yết với mã FPT ngày 13/12/2006, trên sàn giao dịch chứng khoán TP. Hồ Chí Minh. Ngày 19/12/2008, Công ty chính thức đổi tên thành Công ty Cổ phần FPT (FPT Corporation) <br>Khởi đầu với 13 thành viên, sau hơn 30 năm thành lập, FPT hiện là Tập đoàn Công nghệ thông tin - Viễn thông lớn nhất trong khu vực kinh tế tư nhân của Việt Nam. FPT cũng là doanh nghiệp dẫn đầu trong các lĩnh vực: Xuất khẩu phần mềm; Tích hợp hệ thống; Phát triển phần mềm; Dịch vụ CNTT; Phân phối sản phẩm công nghệ tại Việt Nam. Bên cạnh sự lớn mạnh tại thị trường trong nước, FPT đã khẳng định được vị thế trên toàn cầu với sự hiện diện tại 4 châu lục, 45 quốc gia và vùng lãnh thổ. Bên cạnh đó, FPT là đối tác cấp cao của các nhà cung cấp lớn trên thế giới như Microsoft; SAP; Apple; Cisco; IBM; Oracle; Dell; Amazon Web Services… Ngoài ra, FPT đã và đang bắt kịp những xu hướng công nghệ mới nhất trên thế giới như S.M.A.C, IoT... nhằm triển khai và cung cấp các dịch vụ/giải pháp thông minh tới khách hàng.', 'Việt Nam', 'Hà Nội', 'Tòa nhà FPT Cầu Giấy, Số 17 phố Duy Tân - Phường Dịch Vọng Hậu - Quận Cầu Giấy', 'Nguyễn Quang Huy', '0926726128', 'quanghuy09@gmail.com', 'fptn.png', 'qhuy.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0461763846047!2d105.78058911478453!3d21.030838293083622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b355336d23%3A0xb337376aa7a9622f!2zVG_DoCBuaMOgIEZQVCBD4bqndSBHaeG6pXk!5e0!3m2!1svi!2s!4v1668499528454!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://fpt.com.vn/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '562498', 'Chấp Nhận', '2022-12-15'),
(11, 'Binh21CE', 'Công Ty CP Thép NAM KIM', 'Cổ Phần', 'Theo khung giờ riêng của công ty', '5.000-9.999', 'Công ty Cổ phần Thép Nam Kim được thành lập vào ngày 23/12/2002, giấy chứng nhận đăng ký doanh nghiệp số 3700477019 do Phòng Đăng ký Kinh doanh - Sở Kế hoạch và Đầu tư Tỉnh Bình Dương cấp lần đầu ngày 23/12/2002, đăng ký thay đổi lần thứ 25, ngày 25/07/2019.<br>Trụ sở chính đặt tại Lô A1, Đường Đ2, KCN Đồng An 2, Phường Hòa Phú, Thành phố Thủ Dầu Một, Tỉnh Bình Dương. Năm 2011: Công ty Cổ phần Thép Nam Kim chính thức được niêm yết trên sàn chứng khoán vào ngày 14/01/2011 với mã cổ phiếu NKG.', 'Việt Nam', 'Bình Dương', 'Lô A1, Đường Đ2, KCN Đồng An 2 - Phường Hòa Phú - TP. Thủ Dầu Một ', 'Lê Văn Hạnh', '0926726128', 'lehanh10@gmail.com', 'namkim2.jpg', 'lehanh.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3915.1546157027165!2d106.67018971468575!3d11.101852156138508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174cefc62118f29%3A0xa009901037d2df1f!2zQ8OUTkcgVFkgQ-G7lCBQSOG6pk4gVEjDiVAgTkFNIEtJTQ!5e0!3m2!1svi!2s!4v1668675120652!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://tonnamkim.com/', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- Hỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '267212', 'Chấp Nhận', '2022-12-13'),
(13, 'YenVy03', 'Tập Đoàn ABC', 'Cá Nhân', 'Theo Giờ Hành Chính', '100-499', 'Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam, tập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, công ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. <br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- Thiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về phong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Tòa nhà FPT Cầu Giấy, Số 17 phố Duy Tân - Phường Dịch Vọng Hậu - Quận Cầu Giấy', 'Trần Thanh Bình', '0926726128', 'yenvy3080@gmail.com', 'partners-04.png', 'datt.png', '', '', 'abc', '0299267', 'Chấp Nhận', '2022-01-20'),
(14, 'YenVy03', 'Tập Đoàn DEF', 'Công Ty Đa Quốc Gia', 'Mở Cửa 24/7', '5.000-9.999', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Lô A1, Đường Đ2, KCN Đồng An 2 - Phường Hòa Phú - TP. Thủ Dầu Một ', 'Nguyễn Quang Huy', '09267261281', 'yenvy3080@gmail.com', 'partners-04.png', 'ducnghia.png', '', '', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '562498', 'Chấp Nhận', '2022-02-20'),
(15, 'YenVy03', 'Tập Đoàn GHT', 'Cổ Phần', 'Theo Giờ Hành Chính', '5.000-9.999', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Trụ sở chính: Số 8 phố Lê Thái Tổ, phường Hàng Trống, quận Hoàn Kiếm', 'Lê Văn Hạnh', '09267261281', 'yenvy3080@gmail.com', 'partners-04.png', 'lehanh.png', '', '', '- Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '267212', 'Chấp Nhận', '2022-02-20'),
(16, 'YenVy03', 'Tập Đoàn XYZ', 'Cổ Phần', 'Mở Cửa 24/7', '1.000-4.999', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Tòa nhà FPT Cầu Giấy, Số 17 phố Duy Tân - Phường Dịch Vọng Hậu - Quận Cầu Giấy', 'Lê Văn Hạnh', '09267261281', 'yenvy3080@gmail.com', 'partners-04.png', 'datt.png', '', '', ' - Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất\r\n', '267212', 'Chấp Nhận', '2022-03-20'),
(17, 'YenVy03', 'Tập Đoàn ACE', 'Công Ty Đa Quốc Gia', 'Theo Giờ Hành Chính', '5.000-9.999', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Trụ sở chính: Số 8 phố Lê Thái Tổ, phường Hàng Trống, quận Hoàn Kiếm', 'Trần Thanh Bình', '09267261281', 'yenvy3080@gmail.com', 'partners-04.png', 'thanhbinhh.png', '', '', ' - Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '0299267', 'Chấp Nhận', '2022-03-20'),
(18, 'YenVy03', 'Tập Đoàn ASH', '100% vốn nước ngoài', 'Theo khung giờ riêng của công ty', '10.000-19.999', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Lô A1, Đường Đ2, KCN Đồng An 2 - Phường Hòa Phú - TP. Thủ Dầu Một ', 'Nguyễn Quang Huy', '0967124221', 'yenvy3080@gmail.com', 'partners-04.png', 'qhuy.png', '', '', ' - Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '123122', 'Chấp Nhận', '2022-04-20'),
(19, 'YenVy03', 'Tập Đoàn PPF', 'Cổ Phần', 'Theo Giờ Hành Chính', '1.000-4.999', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Tòa nhà FPT Cầu Giấy, Số 17 phố Duy Tân - Phường Dịch Vọng Hậu - Quận Cầu Giấy', 'Trần Thanh Bình', '0967124221', 'yenvy3080@gmail.com', 'partners-04.png', 'ducnghia.png', '', '', '\r\n - Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '267212', 'Chấp Nhận', '2022-04-20'),
(20, 'YenVy03', 'Tập Đoàn SKT', 'Cổ Phần', 'Mở Cửa 24/7', '100-499', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.\r\n', 'Việt Nam', 'Hà Nội', 'Tòa nhà FPT Cầu Giấy, Số 17 phố Duy Tân - Phường Dịch Vọng Hậu - Quận Cầu Giấy', 'Trần Thanh Bình', '0967124221', 'yenvy3080@gmail.com', 'partners-04.png', 'ducnghia.png', '', '', ' - Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '267212', 'Chấp Nhận', '2022-04-20'),
(21, 'YenVy03', 'Tập Đoàn LCK', 'Công Ty Đa Quốc Gia', 'Theo khung giờ riêng của công ty', 'Hơn 50.000', ' Tiền thân của Vingroup là Tập đoàn Technocom, thành lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam,\r\ntập trung đầu tư vào lĩnh vực du lịch và bất động sản với hai thương hiệu chiến lược ban đầu là Vinpearl và Vincom. Đến tháng 1/2012, \r\ncông ty CP Vincom và Công ty CP Vinpearl sáp nhập, chính thức hoạt động dưới mô hình Tập đoàn với tên gọi Tập đoàn Vingroup – Công ty CP. \r\n<br>3 nhóm hoạt động trọng tâm của Tập đoàn bao gồm:<br>- Công nghệ - Công nghiệp<br>- Thương mại Dịch vụ<br>- \r\nThiện nguyện Xã hội<br>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo tiêu chuẩn quốc tế và những trải nghiệm hoàn toàn mới về\r\nphong cách sống hiện đại, ở bất cứ lĩnh vực nào Vingroup cũng chứng tỏ vai trò tiên phong, dẫn dắt sự thay đổi xu hướng tiêu dùng.', 'Việt Nam', 'Hà Nội', 'Trụ sở chính: Số 8 phố Lê Thái Tổ, phường Hàng Trống, quận Hoàn Kiếm', 'Nguyễn Quang Huy', '09267261281', 'yenvy3080@gmail.com', 'partners-04.png', 'qhuy.png', '', '', ' - Được tham gia các khóa đào tạo theo lĩnh vực chuyên môn của Tổng công ty ở trong nước và nước ngoài.<br>- Du Lịch, Chăm sóc sức khỏe, Bảo hiểm BHXH, BHYT đầy đủ<br>- \r\nHỗ trợ tài chính cá nhân<br>- Nghỉ có trả lương<br>- Làm việc thời gian linh hoạt<br>- Thưởng lễ, tết<br>- Lương hưu là chế độ phúc lợi cho nhân viên được yêu thích nhất', '0299267', 'Chấp Nhận', '2022-04-20'),
(24, 'Dat21SE', 'Tập Đoàn Bảo Việt', 'Cá Nhân', 'Theo Giờ Hành Chính', 'Ít hơn 10', '111', 'Việt Nam', 'Hà Nội', 'Tòa nhà FPT Cầu Giấy, Số 17 phố Duy Tân - Phường Dịch Vọng Hậu - Quận Cầu Giấy', 'Trần Thanh Bình', '0967124221', 'yenvy30803@gmail.com', 'a11.jpg', 'a88.png', '', '', '111', '267212', 'Chấp Nhận', '2022-12-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cv`
--

CREATE TABLE `cv` (
  `idcv` int(11) NOT NULL,
  `titlecv` varchar(500) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `imgcv` varchar(5000) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cv`
--

INSERT INTO `cv` (`idcv`, `titlecv`, `topic`, `imgcv`, `time`) VALUES
(1, 'Mẫu CV Lập Trình Viên', 'Kinh Nghiệm', 'cv0.png', '2022-12-10'),
(2, 'Mẫu CV Basic', 'Đơn giản', 'cv10.jpeg', '2022-12-10'),
(3, 'Mẫu CV Gradient', 'Màu sắc', 'cv8.jpeg', '2022-12-10'),
(4, 'Mẫu CV Outstanding   ', 'Công nghệ', 'cv7.png', '2022-12-10'),
(5, 'Mẫu CV Senior', 'Xã hội', 'cv9.jpeg', '2022-12-10'),
(6, 'Mẫu CV Toppier', 'Xã hội', 'cv6.jpeg', '2022-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `followblog`
--

CREATE TABLE `followblog` (
  `username` varchar(100) NOT NULL,
  `idblog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `followblog`
--

INSERT INTO `followblog` (`username`, `idblog`) VALUES
('Dat21SE', 8),
('Dat21SE', 5),
('Dat21SE', 4),
('Dat21SE', 11),
('Dat21SE', 9),
('Dat21SE', 13),
('Lan22BA', 5),
('Lan22BA', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `followcompany`
--

CREATE TABLE `followcompany` (
  `username` varchar(100) NOT NULL,
  `idcongty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `followcompany`
--

INSERT INTO `followcompany` (`username`, `idcongty`) VALUES
('Dat21SE', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `followhired`
--

CREATE TABLE `followhired` (
  `username` varchar(100) NOT NULL,
  `idcongviec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `followhired`
--

INSERT INTO `followhired` (`username`, `idcongviec`) VALUES
('Dat21SE', 4),
('Dat21SE', 1),
('Dat21SE', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hired`
--

CREATE TABLE `hired` (
  `idcongviec` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idcongty` int(11) NOT NULL,
  `nganhnghe` varchar(500) NOT NULL,
  `theloai` varchar(500) NOT NULL,
  `chucdanh` varchar(500) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mucluong` varchar(500) NOT NULL,
  `ngaydangky` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `luyy` varchar(500) NOT NULL,
  `imgcongviec` varchar(2000) NOT NULL,
  `trangthai` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hired`
--

INSERT INTO `hired` (`idcongviec`, `username`, `idcongty`, `nganhnghe`, `theloai`, `chucdanh`, `soluong`, `mucluong`, `ngaydangky`, `ngayketthuc`, `luyy`, `imgcongviec`, `trangthai`) VALUES
(1, 'Dat21SE', 1, 'Công nghệ thông tin', 'Partime', 'Developer', 5, ' 700-900', '2022-12-15', '2022-12-31', '+ Kỹ năng lập trình tốt<br>+ Tiếng Anh thành thạo<br>+ Linh hoạt, hòa đồng', 'developerr.png', 'Chấp Nhận'),
(2, 'Binh21CE', 11, 'Cơ Khí - Kỹ thuật ứng dụng', 'Hợp Đồng', 'Quản Lí', 3, ' 600-800', '2022-12-17', '2022-12-30', '- Biết sử dụng thành thạo các công nghệ cơ khí <br>- Ham học hỏi <br>- Sáng tạo tốt,chăm chỉ<br>- Thao tác tốt tin học văn phòng', 'cokhii.png', 'Chấp Nhận'),
(3, 'Dat21SE', 1, 'Công nghệ thông tin', 'Hợp Đồng', 'Front-End', 3, ' 900-1100', '2022-12-17', '2023-01-01', '- Sử dụng thành thạo ngôn ngữ html,css,js,...<br>- Am hiểu các công nghệ<br>- Biết photoshop, xử lí ảnh<br>- Ham học hỏi', 'fn-end.png', 'Chấp Nhận'),
(4, 'Dat21SE', 1, 'Công nghệ thông tin', 'Thực Tập', 'Data Specialist', 1, ' 500-700', '2022-12-17', '2023-01-25', '- Thành thạo cấu trúc dữ liệu, cơ sở dữ liệu<br>- Từng có kinh nghiệm trong việc thu thập thông tin<br> - Tình tình vui vẻ, hòa đồng', 'data.jpg', 'Chấp Nhận'),
(5, 'Dat21SE', 4, 'Công nghệ ôtô', 'Hợp Đồng', 'Bộ Phận Lắp Ráp', 7, ' 800-900', '2022-12-17', '2022-12-27', '- Tay nghề tốt, kinh nghiệm ít nhất 2 năm trở lên<br>- Siêng năng, chăm chỉ, ham học hỏi<br>- Thành thạo các máy móc công nghệ', 'laprap.jfif', 'Chấp Nhận'),
(6, 'Dat21SE', 6, 'Nhân sự - Tài chính', 'Thời Vụ', 'Kế Toán', 2, ' 700-1000', '2022-12-17', '2023-01-30', '- Thành thạo tin học văn phòng<br>- Biết sử dụng máy móc công nghệ', 'ketoant.webp', 'Chấp Nhận'),
(7, 'Dat21SE', 9, 'Nhân sự - Tài chính', 'Hợp Đồng', 'Quản Lí', 1, ' 700-900', '2022-12-17', '2023-01-10', '- Thành thạo tin học văn phòng <br>- Biết sử dụng các đồ công nghệ <br>- Siêng năng học hỏi,tìm tòi.', 'qqli.jpeg', 'Chấp Nhận'),
(8, 'Dat21SE', 5, 'Chứng khoáng', 'Hợp Đồng', 'Nhân Viên Kỹ Thuật', 2, ' 700-900', '2022-12-17', '2023-02-03', '- Đã hoạc đang chơi chứng khoáng<br>- Thành thạo các kỹ thuật trong ngành<br>- Sử dụng các đồ công nghệ cao linh hoạt', 'chungkhoaggg.jpeg', 'Chấp Nhận'),
(9, 'Dat21SE', 4, 'Công nghệ ôtô', 'Hợp Đồng', 'Bộ Phận Lắp Ráp', 7, ' 800-900', '2022-12-17', '2022-12-27', '- Tay nghề tốt, kinh nghiệm ít nhất 2 năm trở lên<br>- Siêng năng, chăm chỉ, ham học hỏi<br>- Thành thạo các máy móc công nghệ', 'laprap.jfif', 'Chấp Nhận'),
(11, 'YenVy03', 13, 'Công nghệ ôtô', 'Fulltime', 'Kế Toán', 2, ' 700-900', '2022-01-20', '2022-02-09', 'Thành thạo tin học văn phòng', 'sl16.jpg', 'Chấp Nhận'),
(12, 'YenVy03', 14, 'Công nghệ thông tin', 'Thực Tập', 'Tester', 1, ' 700-900', '2022-02-20', '2022-09-01', 'Thành Thạo Tin Học Văn Phòng', 'about-header.jpg', 'Chấp Nhận'),
(13, 'YenVy03', 15, 'Logistics', 'Hợp Đồng', 'Quản Lí', 2, ' 700-900', '2022-02-20', '2022-11-17', 'Thành Thạo Tin Học Văn Phòng', 'a77.png', 'Chấp Nhận'),
(14, 'YenVy03', 16, 'Trợ lý - Thư kí', 'Fulltime', 'Trợ Lý', 1, ' 700-900', '2022-03-20', '2022-09-22', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(15, 'YenVy03', 17, 'Khách Sạn - Nhà Hàng', 'Fulltime', 'Tiếp Khách', 3, ' 700-900', '2022-03-20', '2022-09-29', 'Vui tính, lễ phép', 'partners-04.png', 'Chấp Nhận'),
(16, 'YenVy03', 15, 'Quản lí điều hành', 'Partime', 'Quản Lí', 1, ' 700-900', '2022-03-20', '2022-06-30', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(17, 'YenVy03', 18, 'Công nghệ thông tin', 'Thực Tập', 'Developer', 2, ' 700-900', '2022-04-20', '2022-09-29', 'Thành thạo các ngôn ngữ lập trình', 'partners-04.png', 'Chấp Nhận'),
(18, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, ' 700-900', '2022-04-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(19, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-05-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(20, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-1000', '2022-05-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(21, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 5, '700-1200', '2022-05-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(22, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 1, '700-900', '2022-05-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(23, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 1, '700-900', '2022-06-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(24, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 5, '700-900', '2022-06-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(25, 'YenVy03', 20, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 5, '700-900', '2022-06-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(26, 'YenVy03', 20, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 5, '700-1200', '2022-06-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(27, 'YenVy03', 20, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 5, '700-1200', '2022-06-21', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(28, 'YenVy03', 18, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 5, '700-1200', '2022-07-21', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(29, 'YenVy03', 18, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 5, '700-1200', '2022-07-22', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(30, 'YenVy03', 18, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1200', '2022-07-22', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(31, 'YenVy03', 18, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-07-22', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(32, 'YenVy03', 17, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-07-22', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(33, 'YenVy03', 17, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-07-22', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(34, 'YenVy03', 18, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-08-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(35, 'YenVy03', 19, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(36, 'YenVy03', 19, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(37, 'YenVy03', 19, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(38, 'YenVy03', 16, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(39, 'YenVy03', 16, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(40, 'YenVy03', 15, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(41, 'YenVy03', 15, 'Công Nghệ Thông Tin', 'Fulltime', 'Developer', 4, '700-1000', '2022-08-22', '2022-12-01', '2022-08-01', 'partners-04.png', 'Chấp Nhận'),
(42, 'YenVy03', 19, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-09-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(43, 'YenVy03', 19, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-09-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(44, 'YenVy03', 19, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-09-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(45, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-10-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(46, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-10-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(47, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-10-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(48, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-10-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(49, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-11-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(50, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-11-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(51, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-11-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(52, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-11-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(53, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-11-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(54, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-11-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(55, 'YenVy03', 20, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, ' 700-900', '2022-12-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(56, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-05-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận'),
(57, 'YenVy03', 17, 'Tài chính kinh doanh', 'Fulltime', 'Quản Lí', 3, '700-900', '2022-05-20', '2022-08-01', 'Thành Thạo Tin Học Văn Phòng', 'partners-04.png', 'Chấp Nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `idnotify` int(11) NOT NULL,
  `usernametopic` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idtopic` int(11) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`idnotify`, `usernametopic`, `username`, `idtopic`, `topic`, `time`) VALUES
(1, 'Dat21SE', 'Dat21SE', 4, 'blog', '2022-11-27 05:25:33'),
(2, 'Nha21DA', 'Dat21SE', 8, 'company', '2022-11-27 05:29:53'),
(3, 'ThanhPhat21IT', 'Dat21SE', 12, 'blog', '2022-12-14 21:12:02'),
(4, 'Dat21SE', 'Dat21SE', 1, 'company', '2022-12-19 23:59:59'),
(5, 'Nha21DA', 'Lan22BA', 10, 'blog', '2022-12-20 00:05:28'),
(6, 'ThanhPhat21IT', 'Dat21SE', 1, 'blog', '2022-12-20 12:29:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notificationadmin`
--

CREATE TABLE `notificationadmin` (
  `idnotify` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `usernamead` varchar(100) NOT NULL,
  `idtopic` int(11) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `trangthai` varchar(500) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `notificationadmin`
--

INSERT INTO `notificationadmin` (`idnotify`, `username`, `usernamead`, `idtopic`, `topic`, `trangthai`, `time`) VALUES
(2, 'Dat21SE', 'admin01', 17, 'Blog', 'chấp nhận', '2022-11-27 15:10:27'),
(16, 'Dat21SE', 'admin01', 6, 'Công Ty', 'chấp nhận', '2022-12-14 23:55:12'),
(17, 'Dat21SE', 'admin01', 5, 'Blog', 'chấp nhận', '2022-12-14 23:55:45'),
(18, 'Dat21SE', 'admin01', 9, 'Công Việc', 'chấp nhận', '2022-12-14 23:56:08'),
(19, 'Dat21SE', 'admin01', 6, 'Công Ty', 'từ chối', '2022-12-15 00:32:21'),
(20, 'DucNghia21CE', 'admin01', 13, 'Blog', 'từ chối', '2022-12-15 00:32:52'),
(21, 'Dat21SE', 'admin01', 9, 'Công Việc', 'từ chối', '2022-12-15 00:33:44'),
(22, 'DucNghia21CE', 'admin01', 13, 'Blog', 'chấp nhận', '2022-12-15 00:34:21'),
(23, 'Dat21SE', 'admin01', 9, 'Công Việc', 'chấp nhận', '2022-12-15 00:34:33'),
(24, 'Dat21SE', 'admin01', 6, 'Công Ty', 'chấp nhận', '2022-12-15 00:36:14'),
(25, 'Nha21DA', 'admin01', 7, 'Công Ty', 'chấp nhận', '2022-12-15 00:37:03'),
(26, 'Dat21SE', 'admin01', 6, 'Blog', 'chấp nhận', '2022-12-15 01:13:15'),
(27, 'Dat21SE', 'admin01', 6, 'Blog', 'chấp nhận', '2022-12-15 01:13:36'),
(28, 'Dat21SE', 'admin01', 6, 'Blog', 'chấp nhận', '2022-12-15 01:16:31'),
(29, 'Dat21SE', 'admin01', 6, 'Blog', 'chấp nhận', '2022-12-15 01:17:03'),
(34, 'YenVy03', 'admin01', 13, 'Công Ty', 'chấp nhận', '2022-12-20 09:58:07'),
(35, 'YenVy03', 'admin01', 11, 'Công Việc', 'chấp nhận', '2022-12-20 09:59:55'),
(36, 'YenVy03', 'admin01', 14, 'Công Ty', 'chấp nhận', '2022-12-20 10:06:44'),
(37, 'YenVy03', 'admin01', 12, 'Công Việc', 'chấp nhận', '2022-12-20 10:08:06'),
(38, 'YenVy03', 'admin01', 15, 'Công Ty', 'chấp nhận', '2022-12-20 10:09:51'),
(39, 'YenVy03', 'admin01', 13, 'Công Việc', 'chấp nhận', '2022-12-20 10:10:51'),
(40, 'YenVy03', 'admin01', 16, 'Công Ty', 'chấp nhận', '2022-12-20 10:12:53'),
(41, 'YenVy03', 'admin01', 14, 'Công Việc', 'chấp nhận', '2022-12-20 10:14:08'),
(42, 'YenVy03', 'admin01', 17, 'Công Ty', 'chấp nhận', '2022-12-20 10:15:58'),
(43, 'YenVy03', 'admin01', 15, 'Công Việc', 'chấp nhận', '2022-12-20 10:17:39'),
(44, 'YenVy03', 'admin01', 16, 'Công Việc', 'chấp nhận', '2022-12-20 10:18:59'),
(45, 'YenVy03', 'admin01', 18, 'Công Ty', 'chấp nhận', '2022-12-20 10:23:26'),
(46, 'YenVy03', 'admin01', 17, 'Công Việc', 'chấp nhận', '2022-12-20 10:26:55'),
(47, 'YenVy03', 'admin01', 19, 'Công Ty', 'chấp nhận', '2022-12-20 10:30:07'),
(48, 'YenVy03', 'admin01', 20, 'Công Ty', 'chấp nhận', '2022-12-20 10:30:09'),
(49, 'YenVy03', 'admin01', 21, 'Công Ty', 'chấp nhận', '2022-12-20 10:32:16'),
(50, 'YenVy03', 'admin01', 18, 'Công Việc', 'chấp nhận', '2022-12-20 10:41:28'),
(51, 'YenVy03', 'admin01', 55, 'Công Việc', 'chấp nhận', '2022-12-20 12:06:10'),
(55, 'Dat21SE', 'admin01', 19, 'Blog', 'chấp nhận', '2022-12-20 12:42:50'),
(56, 'Dat21SE', 'admin01', 5, 'Blog', 'chấp nhận', '2022-12-23 13:20:17'),
(57, 'Dat21SE', 'admin01', 23, 'Công Ty', 'chấp nhận', '2022-12-25 06:50:33'),
(58, 'Dat21SE', 'admin01', 59, 'Công Việc', 'chấp nhận', '2022-12-25 06:51:38'),
(59, 'Dat21SE', 'admin01', 24, 'Công Ty', 'chấp nhận', '2022-12-25 08:28:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratingblog`
--

CREATE TABLE `ratingblog` (
  `idcmt` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idblog` int(11) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `ratingblog` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ratingblog`
--

INSERT INTO `ratingblog` (`idcmt`, `username`, `idblog`, `content`, `ratingblog`, `time`) VALUES
(37, 'Lan22BA', 2, 'Tuyệt vời , bài viết rất bổ ích', 4, '2022-11-26 02:09:09'),
(38, 'Dat21SE', 7, 'Tuyệt vời ', 3, '2022-11-27 05:15:57'),
(39, 'Dat21SE', 4, 'Hay quá, good', 3, '2022-11-27 05:25:33'),
(40, 'Dat21SE', 12, 'Bài viết bổ ích', 2, '2022-12-14 21:12:02'),
(41, 'Lan22BA', 10, 'Bài viết hay, khá bổ ích ', 4, '2022-12-20 00:05:28'),
(42, 'Dat21SE', 1, 'Bài viết bổ ích', 3, '2022-12-20 12:29:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratingcompany`
--

CREATE TABLE `ratingcompany` (
  `idrtcpn` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idcongty` int(11) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `ratingcompany` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ratingcompany`
--

INSERT INTO `ratingcompany` (`idrtcpn`, `username`, `idcongty`, `content`, `ratingcompany`, `time`) VALUES
(1, 'Dat21SE', 3, 'Khá hay', 0, '2022-11-26 16:13:03'),
(2, 'Lan22BA', 5, 'Good', 0, '2022-11-26 16:28:05'),
(3, 'Dat21SE', 8, 'Công ty Tốt', 0, '2022-11-27 05:29:53'),
(4, 'Dat21SE', 1, 'Good, quá tuyệt vời <3 ', 0, '2022-12-19 23:59:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratingjob`
--

CREATE TABLE `ratingjob` (
  `idrtjob` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idcongviec` int(11) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `ratingjob` float NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ratingjob`
--

INSERT INTO `ratingjob` (`idrtjob`, `username`, `idcongviec`, `content`, `ratingjob`, `time`) VALUES
(1, 'Lan22BA', 3, 'Good', 0, '2022-11-26 16:26:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idblog`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idcongty`),
  ADD KEY `company_ibfk_1` (`username`);

--
-- Chỉ mục cho bảng `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`idcv`);

--
-- Chỉ mục cho bảng `followblog`
--
ALTER TABLE `followblog`
  ADD KEY `followblog_ibfk_1` (`username`),
  ADD KEY `followblog_ibfk_2` (`idblog`);

--
-- Chỉ mục cho bảng `followcompany`
--
ALTER TABLE `followcompany`
  ADD KEY `followcompany_ibfk_1` (`username`),
  ADD KEY `followcompany_ibfk_2` (`idcongty`);

--
-- Chỉ mục cho bảng `followhired`
--
ALTER TABLE `followhired`
  ADD KEY `followhired_ibfk_1` (`username`),
  ADD KEY `followhired_ibfk_2` (`idcongviec`);

--
-- Chỉ mục cho bảng `hired`
--
ALTER TABLE `hired`
  ADD PRIMARY KEY (`idcongviec`),
  ADD KEY `username` (`username`),
  ADD KEY `idcongty` (`idcongty`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`idnotify`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `notificationadmin`
--
ALTER TABLE `notificationadmin`
  ADD PRIMARY KEY (`idnotify`),
  ADD KEY `usernamead` (`usernamead`);

--
-- Chỉ mục cho bảng `ratingblog`
--
ALTER TABLE `ratingblog`
  ADD PRIMARY KEY (`idcmt`),
  ADD KEY `ratingblog_ibfk_1` (`username`),
  ADD KEY `ratingblog_ibfk_2` (`idblog`);

--
-- Chỉ mục cho bảng `ratingcompany`
--
ALTER TABLE `ratingcompany`
  ADD PRIMARY KEY (`idrtcpn`),
  ADD KEY `ratingcompany_ibfk_1` (`username`),
  ADD KEY `ratingcompany_ibfk_2` (`idcongty`);

--
-- Chỉ mục cho bảng `ratingjob`
--
ALTER TABLE `ratingjob`
  ADD PRIMARY KEY (`idrtjob`),
  ADD KEY `ratingjob_ibfk_1` (`username`),
  ADD KEY `ratingjob_ibfk_2` (`idcongviec`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `idcongty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `cv`
--
ALTER TABLE `cv`
  MODIFY `idcv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hired`
--
ALTER TABLE `hired`
  MODIFY `idcongviec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `idnotify` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `notificationadmin`
--
ALTER TABLE `notificationadmin`
  MODIFY `idnotify` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `ratingblog`
--
ALTER TABLE `ratingblog`
  MODIFY `idcmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `ratingcompany`
--
ALTER TABLE `ratingcompany`
  MODIFY `idrtcpn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ratingjob`
--
ALTER TABLE `ratingjob`
  MODIFY `idrtjob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `followblog`
--
ALTER TABLE `followblog`
  ADD CONSTRAINT `followblog_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followblog_ibfk_2` FOREIGN KEY (`idblog`) REFERENCES `blog` (`idblog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `followcompany`
--
ALTER TABLE `followcompany`
  ADD CONSTRAINT `followcompany_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followcompany_ibfk_2` FOREIGN KEY (`idcongty`) REFERENCES `company` (`idcongty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `followhired`
--
ALTER TABLE `followhired`
  ADD CONSTRAINT `followhired_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followhired_ibfk_2` FOREIGN KEY (`idcongviec`) REFERENCES `hired` (`idcongviec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hired`
--
ALTER TABLE `hired`
  ADD CONSTRAINT `hired_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hired_ibfk_2` FOREIGN KEY (`idcongty`) REFERENCES `company` (`idcongty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Các ràng buộc cho bảng `notificationadmin`
--
ALTER TABLE `notificationadmin`
  ADD CONSTRAINT `notificationadmin_ibfk_1` FOREIGN KEY (`usernamead`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ratingblog`
--
ALTER TABLE `ratingblog`
  ADD CONSTRAINT `ratingblog_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratingblog_ibfk_2` FOREIGN KEY (`idblog`) REFERENCES `blog` (`idblog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ratingcompany`
--
ALTER TABLE `ratingcompany`
  ADD CONSTRAINT `ratingcompany_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratingcompany_ibfk_2` FOREIGN KEY (`idcongty`) REFERENCES `company` (`idcongty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ratingjob`
--
ALTER TABLE `ratingjob`
  ADD CONSTRAINT `ratingjob_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratingjob_ibfk_2` FOREIGN KEY (`idcongviec`) REFERENCES `hired` (`idcongviec`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
