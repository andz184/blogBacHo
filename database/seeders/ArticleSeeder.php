<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nienThieu = Category::where('name', 'Thời niên thiếu')->first()->id;
        $hoatDong = Category::where('name', 'Hoạt động cách mạng')->first()->id;
        $chongPhap = Category::where('name', 'Kháng chiến chống Pháp')->first()->id;
        $xayDung = Category::where('name', 'Xây dựng CNXH ở miền Bắc')->first()->id;
        $chongMy = Category::where('name', 'Kháng chiến chống Mỹ')->first()->id;
        $diSan = Category::where('name', 'Di chúc và Di sản')->first()->id;

        // Tạo thư mục lưu trữ ảnh
        Storage::disk('public')->makeDirectory('articles');

        // Giai đoạn 1: Thời niên thiếu (1890-1911)
        $giai_doan_1 = [
            [
                'title' => 'Ngày sinh và gia đình của Bác Hồ',
                'content' => "Chủ tịch Hồ Chí Minh sinh ngày 19 tháng 5 năm 1890 trong một gia đình nhà nho yêu nước tại làng Kim Liên, xã Nam Liên, huyện Nam Đàn, tỉnh Nghệ An. Tên khai sinh của Người là Nguyễn Sinh Cung.\n\nThân phụ là cụ Nguyễn Sinh Sắc (tức Nguyễn Sinh Huy), đỗ Phó bảng năm 1901, một nhà nho yêu nước. Thân mẫu là bà Hoàng Thị Loan, người làng Hoàng Trù, tỉnh Nghệ An.\n\nNgười có một người chị gái là Nguyễn Thị Thanh và một người em trai là Nguyễn Sinh Khiêm (tức Nguyễn Tất Đạt). Gia đình có truyền thống yêu nước và hiếu học.",
                'image' => $this->downloadImage('https://danviet.mediacdn.vn/296231569849192448/2023/5/18/bac-ho-16844198314311535926475.jpg', 'bac-ho-gia-dinh.jpg'),
                'period' => 'Thời niên thiếu (1890-1911)',
                'event_date' => '1890-05-19',
                'location' => 'Làng Kim Liên, Nghệ An',
                'is_published' => true,
                'category_id' => $nienThieu,
            ],
            [
                'title' => 'Tuổi thơ và học tập tại quê nhà',
                'content' => "Từ nhỏ, Nguyễn Sinh Cung đã được thân phụ dạy chữ Hán và nuôi dưỡng tinh thần yêu nước. Người học rất thông minh và ham học hỏi.\n\nNăm 1895-1896, Người theo cha vào Huế và bắt đầu học chữ Hán một cách bài bản. Thời gian này, Người đã sớm bộc lộ tư chất thông minh, ham học hỏi và có khả năng học nhanh.\n\nTrong thời gian ở Huế, Người được chứng kiến cuộc sống của nhân dân và thấy rõ sự áp bức của thực dân Pháp, từ đó hình thành ý thức dân tộc và lòng yêu nước mãnh liệt.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/Uploaded/phungthithuhuyen/2021_05_18/Bac%20Ho%20thoi%20tre.jpg', 'bac-ho-thoi-tho.jpg'),
                'period' => 'Thời niên thiếu (1890-1911)',
                'event_date' => '1895-01-01',
                'location' => 'Nghệ An - Huế',
                'is_published' => true,
                'category_id' => $nienThieu,
            ],
            [
                'title' => 'Học tập tại trường Quốc học Huế',
                'content' => "Năm 1907, Nguyễn Tất Thành thi đỗ vào trường Quốc học Huế, một ngôi trường danh tiếng thời bấy giờ. Tại đây, Người không chỉ học chữ Hán mà còn học chữ Quốc ngữ và tiếng Pháp.\n\nTrong thời gian học tại trường Quốc học, Người đã tham gia phong trào yêu nước của học sinh. Người cũng bắt đầu quan tâm đến tình hình đất nước và các phong trào đấu tranh chống Pháp của nhân dân ta.\n\nChính trong thời gian này, ý thức về con đường cứu nước đã dần hình thành trong Người. Người nhận thấy cần phải tìm hiểu xem các nước trên thế giới đã làm thế nào để có được tự do, độc lập.",
                'image' => $this->downloadImage('https://file3.qdnd.vn/data/images/0/2023/05/19/tranthuy/1%20b.jpg', 'bac-ho-quoc-hoc-hue.jpg'),
                'period' => 'Thời niên thiếu (1890-1911)',
                'event_date' => '1907-01-01',
                'location' => 'Huế',
                'is_published' => true,
                'category_id' => $nienThieu,
            ],
            [
                'title' => 'Dạy học tại trường Dục Thanh',
                'content' => "Năm 1910, với tên Nguyễn Tất Thành, Người vào Nam và dạy học tại trường Dục Thanh (Phan Thiết). Đây là thời kỳ Người trực tiếp tham gia vào sự nghiệp giáo dục.\n\nTại trường Dục Thanh, Người không chỉ dạy chữ mà còn giáo dục học sinh về lòng yêu nước, thương dân. Người thường kể cho học trò nghe về những tấm gương yêu nước và truyền thống đấu tranh của dân tộc.\n\nThời gian dạy học ở đây đã giúp Người hiểu rõ hơn về tầm quan trọng của giáo dục trong việc nâng cao dân trí và đào tạo nhân tài cho đất nước. Đây cũng là thời kỳ Người chuẩn bị cho hành trình tìm đường cứu nước sắp tới.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/5/17/bac-ho-2-16843320021171483827123.jpg', 'bac-ho-duc-thanh.jpg'),
                'period' => 'Thời niên thiếu (1890-1911)',
                'event_date' => '1910-01-01',
                'location' => 'Phan Thiết, Bình Thuận',
                'is_published' => true,
                'category_id' => $nienThieu,
            ]
        ];

        // Giai đoạn 2: Hành trình tìm đường cứu nước (1911-1920)
        $giai_doan_2 = [
            [
                'title' => 'Khởi đầu hành trình tìm đường cứu nước',
                'content' => "Ngày 5/6/1911, với tên gọi Văn Ba, Người rời bến cảng Nhà Rồng - Sài Gòn trên con tàu Amiral Latouche Tréville, bắt đầu hành trình tìm đường cứu nước.\n\nQuyết định ra đi của Người xuất phát từ nhận thức sâu sắc rằng phải tìm hiểu xem bên ngoài người ta làm thế nào để giúp đồng bào mình giành độc lập.\n\nTrong thư gửi gia đình trước khi ra đi, Người viết: 'Con đi tìm đường cứu nước, đến khi nào cứu được nước, con sẽ trở về'.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/6/5/ho-chi-minh-16859432340091483089019.jpg', 'bac-ho-roi-sai-gon.jpg'),
                'period' => 'Hành trình tìm đường cứu nước (1911-1920)',
                'event_date' => '1911-06-05',
                'location' => 'Sài Gòn',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Cuộc sống và hoạt động tại Pháp',
                'content' => "Từ năm 1917-1923, Người hoạt động tích cực trong phong trào yêu nước Việt Nam tại Pháp và tham gia Đảng Xã hội Pháp. Người lấy tên là Nguyễn Ái Quốc.\n\nTại Paris, Người tham gia nhiều hoạt động chính trị và viết nhiều bài báo tố cáo tội ác của thực dân Pháp. Đặc biệt, ngày 18/6/1919, Người gửi bản yêu sách 8 điểm tới Hội nghị Versailles đòi quyền tự do, dân chủ cho nhân dân Việt Nam.\n\nThời kỳ này, Người đã tiếp xúc với tư tưởng cách mạng tiến bộ và bắt đầu tìm hiểu về chủ nghĩa Mác-Lênin.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/6/5/ho-chi-minh-3-16859432340101843834690.jpg', 'bac-ho-paris.jpg'),
                'period' => 'Hành trình tìm đường cứu nước (1911-1920)',
                'event_date' => '1917-01-01',
                'location' => 'Paris, Pháp',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Hoạt động tại Luân Đôn',
                'content' => "Trong thời gian ở Anh (1913-1917), Người làm nhiều nghề để sinh sống: phụ bếp tại khách sạn Carlton, cào tuyết, cấp than...\n\nTại đây, Người đã học hỏi được nhiều điều từ nền dân chủ của Anh và tham gia các hoạt động của Hội những người bị áp bức thuộc địa.\n\nNgười cũng dành thời gian học tiếng Anh và nghiên cứu các tác phẩm của các nhà tư tưởng phương Tây, đặc biệt là những tác phẩm về tự do, dân chủ.",
                'image' => $this->downloadImage('https://cdnimg.vietnamplus.vn/uploaded/bokttj/2021_05_18/nguyen_ai_quoc_tai_anh.jpg', 'bac-ho-london.jpg'),
                'period' => 'Hành trình tìm đường cứu nước (1911-1920)',
                'event_date' => '1913-01-01',
                'location' => 'Luân Đôn, Anh',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Thời kỳ hoạt động tại Mỹ',
                'content' => "Trong thời gian ở Mỹ (1912-1913), Người đã làm việc tại nhiều nơi và có cơ hội tìm hiểu về bản Tuyên ngôn Độc lập của Hoa Kỳ.\n\nNgười đặc biệt ấn tượng với những tư tưởng về quyền con người và quyền dân tộc trong bản Tuyên ngôn Độc lập của Mỹ. Điều này sau này đã ảnh hưởng đến việc Người soạn thảo bản Tuyên ngôn Độc lập của Việt Nam năm 1945.\n\nThời gian ở Mỹ cũng giúp Người hiểu thêm về một nền dân chủ phương Tây và củng cố thêm quyết tâm giành độc lập cho dân tộc.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2022/12/19/bac-ho-o-my-167145170954575098928.jpg', 'bac-ho-my.jpg'),
                'period' => 'Hành trình tìm đường cứu nước (1911-1920)',
                'event_date' => '1912-01-01',
                'location' => 'Boston, Hoa Kỳ',
                'is_published' => true,
                'category_id' => $hoatDong,
            ]
        ];

        // Giai đoạn 3: Hoạt động cách mạng (1921-1940)
        $giai_doan_3 = [
            [
                'title' => 'Thành lập Hội Việt Nam Cách mạng Thanh niên',
                'content' => "Năm 1925, tại Quảng Châu (Trung Quốc), Người thành lập Hội Việt Nam Cách mạng Thanh niên - tổ chức tiền thân của Đảng Cộng sản Việt Nam.\n\nHội đã tổ chức nhiều lớp huấn luyện chính trị, đào tạo cán bộ cách mạng và xuất bản báo Thanh niên để tuyên truyền, giác ngộ thanh niên yêu nước.\n\nĐây là bước quan trọng trong việc chuẩn bị về tư tưởng và tổ chức cho sự ra đời của Đảng Cộng sản Việt Nam.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/2/2/bac-ho-16752927012141483827178.jpg', 'hoi-vn-cach-mang-thanh-nien.jpg'),
                'period' => 'Hoạt động cách mạng (1921-1940)',
                'event_date' => '1925-06-19',
                'location' => 'Quảng Châu, Trung Quốc',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Thành lập Đảng Cộng sản Việt Nam',
                'content' => "Từ ngày 6/1 đến 7/2/1930, tại Cửu Long (Hương Cảng), Người chủ trì Hội nghị hợp nhất các tổ chức cộng sản, thành lập Đảng Cộng sản Việt Nam.\n\nTại Hội nghị, Người đã thông qua Cương lĩnh chính trị đầu tiên do Người soạn thảo, xác định con đường cách mạng Việt Nam là con đường cách mạng vô sản.\n\nSự ra đời của Đảng Cộng sản Việt Nam là bước ngoặt vĩ đại trong lịch sử cách mạng Việt Nam, chấm dứt thời kỳ khủng hoảng về đường lối và giai cấp lãnh đạo.",
                'image' => $this->downloadImage('https://file3.qdnd.vn/data/images/0/2023/02/02/tranhang/1_2.jpg', 'thanh-lap-dang.jpg'),
                'period' => 'Hoạt động cách mạng (1921-1940)',
                'event_date' => '1930-02-03',
                'location' => 'Hương Cảng, Trung Quốc',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Hoạt động tại Liên Xô và Trung Quốc',
                'content' => "Từ năm 1934-1938, Người hoạt động tại Liên Xô và tham gia Quốc tế Cộng sản. Tại đây, Người đã học tập, nghiên cứu và tham gia nhiều hoạt động cách mạng quốc tế.\n\nSau đó, Người sang hoạt động tại Trung Quốc (1938-1941) để gần gũi với phong trào cách mạng trong nước. Thời gian này, Người đã chuẩn bị các điều kiện để trở về Việt Nam trực tiếp lãnh đạo cách mạng.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/5/18/bac-ho-lien-xo-16844198314121483827178.jpg', 'bac-ho-lien-xo.jpg'),
                'period' => 'Hoạt động cách mạng (1921-1940)',
                'event_date' => '1934-01-01',
                'location' => 'Liên Xô - Trung Quốc',
                'is_published' => true,
                'category_id' => $hoatDong,
            ]
        ];

        // Giai đoạn 4: Lãnh đạo cách mạng (1941-1969)
        $giai_doan_4 = [
            [
                'title' => 'Về nước trực tiếp lãnh đạo cách mạng',
                'content' => "Ngày 28/1/1941, sau 30 năm hoạt động ở nước ngoài, Người về nước tại Pác Bó (Cao Bằng). Đây là một sự kiện có ý nghĩa lịch sử trọng đại đối với cách mạng Việt Nam.\n\nTại Pác Bó, Người đã triệu tập Hội nghị Trung ương 8 (5/1941), quyết định thành lập Mặt trận Việt Nam độc lập đồng minh (Việt Minh), chuẩn bị cho Tổng khởi nghĩa giành chính quyền.\n\nNgười đã sáng lập báo Việt Nam Độc lập, viết nhiều thơ ca cách mạng để động viên tinh thần đấu tranh của nhân dân.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/1/28/bac-ho-ve-nuoc-16749399673141690157741.jpg', 'bac-ho-ve-nuoc.jpg'),
                'period' => 'Lãnh đạo cách mạng (1941-1969)',
                'event_date' => '1941-01-28',
                'location' => 'Pác Bó, Cao Bằng',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Cách mạng Tháng Tám thành công',
                'content' => "Dưới sự lãnh đạo của Đảng và Chủ tịch Hồ Chí Minh, Cách mạng Tháng Tám năm 1945 đã giành thắng lợi vẻ vang. Ngày 19/8/1945, khởi nghĩa giành chính quyền thắng lợi ở Hà Nội.\n\nNgày 25/8/1945, Người từ chiến khu Việt Bắc về Hà Nội. Người đã chỉ đạo Chính phủ lâm thời giải quyết nhiều vấn đề cấp bách của đất nước như: nạn đói, nạn dốt, khó khăn về tài chính...\n\nNgười đã thể hiện tài năng của một nhà lãnh đạo kiệt xuất trong việc giải quyết các mối quan hệ đối nội, đối ngoại phức tạp của một nước vừa giành được độc lập.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/8/19/cach-mang-thang-tam-16924561233341483827178.jpg', 'cach-mang-thang-tam.jpg'),
                'period' => 'Lãnh đạo cách mạng (1941-1969)',
                'event_date' => '1945-08-19',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Tuyên ngôn độc lập khai sinh nước Việt Nam Dân chủ Cộng hòa',
                'content' => "Ngày 2/9/1945, tại Quảng trường Ba Đình (Hà Nội), Chủ tịch Hồ Chí Minh đọc bản Tuyên ngôn Độc lập khai sinh nước Việt Nam Dân chủ Cộng hòa.\n\nBản Tuyên ngôn Độc lập do Người soạn thảo đã khẳng định: 'Nước Việt Nam có quyền hưởng tự do và độc lập, và sự thật đã thành một nước tự do độc lập. Toàn thể dân tộc Việt Nam quyết đem tất cả tinh thần và lực lượng, tính mạng và của cải để giữ vững quyền tự do, độc lập ấy'.\n\nĐây là một văn kiện lịch sử vô giá, thể hiện tư tưởng độc lập, tự do và khát vọng hòa bình của dân tộc Việt Nam.",
                'image' => $this->downloadImage('https://images2.thanhnien.vn/528068263637045248/2023/9/1/bac-ho-doc-tuyen-ngon-doc-lap-169350778510575710.jpg', 'tuyen-ngon-doc-lap.jpg'),
                'period' => 'Lãnh đạo cách mạng (1941-1969)',
                'event_date' => '1945-09-02',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Lời kêu gọi toàn quốc kháng chiến',
                'content' => "Ngày 19/12/1946, Chủ tịch Hồ Chí Minh ra Lời kêu gọi toàn quốc kháng chiến. Người viết: 'Chúng ta thà hy sinh tất cả, chứ nhất định không chịu mất nước, nhất định không chịu làm nô lệ'.\n\nLời kêu gọi của Người đã thổi bùng ngọn lửa đấu tranh trong toàn dân tộc, mở đầu cuộc kháng chiến trường kỳ chống thực dân Pháp.\n\nDưới sự lãnh đạo của Người, quân và dân ta đã kiên cường chiến đấu, từng bước đánh bại các kế hoạch quân sự của địch, tiến tới thắng lợi Điện Biên Phủ lừng lẫy năm 1954.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2022/12/19/loi-keu-goi-toan-quoc-khang-chien-167145170954575098928.jpg', 'loi-keu-goi-khang-chien.jpg'),
                'period' => 'Lãnh đạo cách mạng (1941-1969)',
                'event_date' => '1946-12-19',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Phát động phong trào thi đua yêu nước',
                'content' => "Ngày 11/6/1948, Chủ tịch Hồ Chí Minh ra Lời kêu gọi thi đua ái quốc. Người chỉ rõ: 'Thi đua là yêu nước, yêu nước thì phải thi đua. Và những người thi đua là những người yêu nước nhất'.\n\nPhong trào thi đua yêu nước do Người phát động đã nhanh chóng lan rộng trong cả nước, thúc đẩy mạnh mẽ công cuộc kháng chiến và kiến quốc.\n\nNgười luôn nhấn mạnh thi đua là để làm cho dân giàu, nước mạnh, đưa đất nước tiến lên, tiêu diệt giặc ngoại xâm, giặc dốt, giặc đói.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/Uploaded/phungthithuhuyen/2021_06_03/Bac%20Ho%20tham%20nong%20dan.jpg', 'thi-dua-yeu-nuoc.jpg'),
                'period' => 'Lãnh đạo cách mạng (1941-1969)',
                'event_date' => '1948-06-11',
                'location' => 'Việt Bắc',
                'is_published' => true,
                'category_id' => $hoatDong,
            ],
            [
                'title' => 'Chiến thắng Điện Biên Phủ',
                'content' => "Ngày 7/5/1954, chiến dịch Điện Biên Phủ toàn thắng dưới sự lãnh đạo của Đảng và Chủ tịch Hồ Chí Minh. Đây là chiến thắng có ý nghĩa lịch sử trọng đại, không chỉ với Việt Nam mà còn với phong trào giải phóng dân tộc trên thế giới.\n\nChiến thắng này đã buộc thực dân Pháp phải ký Hiệp định Genève (1954), chấm dứt chiến tranh, lập lại hòa bình ở Đông Dương.\n\nNgười đã chỉ đạo sáng suốt, kết hợp đấu tranh quân sự với đấu tranh ngoại giao, tạo nên thắng lợi toàn diện.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/5/6/dien-bien-phu-16834342340091483827178.jpg', 'dien-bien-phu.jpg'),
                'period' => 'Lãnh đạo cách mạng (1941-1969)',
                'event_date' => '1954-05-07',
                'location' => 'Điện Biên Phủ',
                'is_published' => true,
                'category_id' => $hoatDong,
            ]
        ];

        // Giai đoạn 5: Di sản của Bác
        $giai_doan_5 = [
            [
                'title' => 'Tình cảm của Bác với thiếu niên, nhi đồng',
                'content' => "Chủ tịch Hồ Chí Minh luôn dành tình cảm đặc biệt cho thiếu niên, nhi đồng. Người nói: 'Vì tương lai của dân tộc, vì hạnh phúc của thiếu nhi, chúng ta phải thương yêu, chăm sóc các cháu'.\n\nHàng năm, cứ đến Tết Trung thu, Bác lại tổ chức vui Tết cùng các cháu. Người căn dặn: 'Các cháu phải biết ơn cha mẹ, thầy cô giáo, phải chăm ngoan, học giỏi, sau này làm người có ích cho nước nhà'.\n\nBác còn viết nhiều thư gửi cho thiếu niên, nhi đồng, động viên các cháu học tập tốt, rèn luyện đạo đức để trở thành người có ích cho xã hội.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/Uploaded/phungthithuhuyen/2020_05_14/Bac%20Ho%20voi%20thieu%20nhi_QRFQ.jpg', 'bac-ho-voi-thieu-nhi.jpg'),
                'period' => 'Di sản của Bác',
                'event_date' => '1960-09-15',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $diSan,
            ],
            [
                'title' => 'Tư tưởng Hồ Chí Minh về xây dựng Đảng',
                'content' => "Chủ tịch Hồ Chí Minh luôn nhấn mạnh vai trò lãnh đạo của Đảng và tầm quan trọng của việc xây dựng, chỉnh đốn Đảng. Người chỉ rõ: 'Đảng là đạo đức, là văn minh'.\n\nNgười đặc biệt quan tâm đến việc giáo dục, rèn luyện đạo đức cách mạng cho cán bộ, đảng viên. Theo Người, người cán bộ, đảng viên phải thật sự cần, kiệm, liêm, chính, chí công vô tư.\n\nTư tưởng của Người về xây dựng Đảng vẫn còn nguyên giá trị trong công cuộc xây dựng và chỉnh đốn Đảng hiện nay.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/2/1/bac-ho-16752927012141483827178.jpg', 'bac-ho-xay-dung-dang.jpg'),
                'period' => 'Di sản của Bác',
                'event_date' => '1969-02-03',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $diSan,
            ],
            [
                'title' => 'Di chúc của Chủ tịch Hồ Chí Minh',
                'content' => "Di chúc của Chủ tịch Hồ Chí Minh được Người viết từ năm 1965 và bổ sung, sửa chữa lần cuối vào tháng 5/1969. Đây là văn kiện lịch sử vô giá, là tâm nguyện cuối cùng của Người gửi lại cho toàn Đảng, toàn dân.\n\nTrong Di chúc, Người căn dặn về nhiều vấn đề quan trọng như: việc xây dựng và chỉnh đốn Đảng, chăm lo đời sống nhân dân, đoàn kết quốc tế, và đặc biệt là việc giáo dục thế hệ trẻ.\n\nNgười viết: 'Đoàn viên và thanh niên ta nói chung là tốt, mọi việc đều hăng hái xung phong, không ngại khó khăn, có chí tiến thủ. Đảng cần phải chăm lo giáo dục đạo đức cách mạng cho họ, đào tạo họ thành những người thừa kế xây dựng xã hội chủ nghĩa vừa hồng vừa chuyên'.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/Uploaded/phungthithuhuyen/2021_08_19/di%20chuc%20Bac%20Ho.jpg', 'di-chuc-bac-ho.jpg'),
                'period' => 'Di sản của Bác',
                'event_date' => '1969-05-10',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $diSan,
            ],
            [
                'title' => 'Tấm gương đạo đức Hồ Chí Minh',
                'content' => "Chủ tịch Hồ Chí Minh là tấm gương sáng về đạo đức cách mạng: cần, kiệm, liêm, chính, chí công vô tư. Cả cuộc đời Người sống giản dị, tiết kiệm, hết lòng vì nước, vì dân.\n\nNgười thường nói: 'Muốn cho dân tin, dân phục, dân yêu thì phải thực hành đạo đức cách mạng: cần, kiệm, liêm, chính, chí công vô tư'. Bản thân Người là tấm gương mẫu mực về thực hành đạo đức cách mạng.\n\nTấm gương đạo đức của Người mãi mãi là kim chỉ nam cho cán bộ, đảng viên và nhân dân ta học tập và noi theo.",
                'image' => $this->downloadImage('https://bcp.cdnchinhphu.vn/334894974524682240/2023/5/19/bac-ho-16844198314311535926475.jpg', 'bac-ho-dao-duc.jpg'),
                'period' => 'Di sản của Bác',
                'event_date' => '1969-09-02',
                'location' => 'Hà Nội',
                'is_published' => true,
                'category_id' => $diSan,
            ]
        ];

        // Gộp tất cả các giai đoạn
        $all_articles = array_merge(
            $giai_doan_1,
            $giai_doan_2,
            $giai_doan_3,
            $giai_doan_4,
            $giai_doan_5
        );

        // Tạo các bài viết
        foreach ($all_articles as $article) {
            Article::create($article);
        }
    }

    private function downloadImage($url, $filename)
    {
        try {
            $response = Http::get($url);
            if ($response->successful()) {
                $path = 'articles/' . $filename;
                Storage::disk('public')->put($path, $response->body());
                return $path;
            }
        } catch (\Exception $e) {
            // Nếu không tải được ảnh, trả về null
            return null;
        }
        return null;
    }
}
