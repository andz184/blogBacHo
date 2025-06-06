<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            // Thời niên thiếu
            [
                'category_name' => 'Thời niên thiếu',
                'title' => 'Nguyễn Sinh Cung chào đời',
                'content' => 'Ngày 19/5/1890, tại làng Kim Liên, huyện Nam Đàn, tỉnh Nghệ An, một người con trai đã chào đời trong gia đình nhà nho yêu nước Nguyễn Sinh Sắc. Em bé được đặt tên là Nguyễn Sinh Cung. Đây chính là tên khai sinh của Chủ tịch Hồ Chí Minh sau này.',
                'event_date' => '1890-05-19',
                'location' => 'Làng Kim Liên, Nam Đàn, Nghệ An',
                'is_published' => true,

            ],
            [
                'category_name' => 'Thời niên thiếu',
                'title' => 'Những năm tháng tuổi thơ tại quê hương Kim Liên',
                'content' => 'Sinh ra và lớn lên trong một gia đình nhà nho yêu nước, từ nhỏ Nguyễn Sinh Cung đã được thừa hưởng truyền thống hiếu học và lòng yêu nước từ cha - nhà nho Nguyễn Sinh Sắc và mẹ - bà Hoàng Thị Loan. Tuổi thơ của Người gắn liền với những sinh hoạt đời thường của người dân làng Kim Liên, với những bài học đầu đời về văn hóa dân tộc và tinh thần yêu nước.',
                'event_date' => '1895-01-01',
                'location' => 'Làng Kim Liên, Nam Đàn, Nghệ An',
                'is_published' => true,

            ],
            [
                'category_name' => 'Thời niên thiếu',
                'title' => 'Theo cha vào Huế học tập',
                'content' => 'Năm 1895, Nguyễn Sinh Cung theo cha vào Huế. Tại đây, Người bắt đầu học chữ Hán và tiếp xúc với nền văn hóa truyền thống. Môi trường học tập ở kinh đô đã giúp Người mở rộng tầm nhìn và hiểu biết về đất nước.',
                'event_date' => '1895-01-01',
                'location' => 'Huế',
                'is_published' => true,

            ],

            // Hành trình tìm đường cứu nước
            [
                'category_name' => 'Hành trình tìm đường cứu nước',
                'title' => 'Rời Việt Nam trên tàu Amiral Latouche-Tréville',
                'content' => 'Ngày 5/6/1911, với tên gọi Văn Ba, Người rời cảng Nhà Rồng - Sài Gòn trên chiếc tàu Amiral Latouche-Tréville, bắt đầu hành trình tìm đường cứu nước. Đây là bước ngoặt quan trọng không chỉ trong cuộc đời của Người mà còn của cách mạng Việt Nam.',
                'event_date' => '1911-06-05',
                'location' => 'Cảng Nhà Rồng, Sài Gòn',
                'is_published' => true,

            ],
            [
                'category_name' => 'Hành trình tìm đường cứu nước',
                'title' => 'Hoạt động tại Paris',
                'content' => 'Trong thời gian ở Paris, Người đã tham gia nhiều hoạt động chính trị và văn hóa. Người tham gia Đảng Xã hội Pháp và tích cực viết bài cho các báo tiến bộ, tố cáo tội ác của thực dân Pháp tại Đông Dương.',
                'event_date' => '1919-06-18',
                'location' => 'Paris, Pháp',
                'is_published' => true,

            ],

            // Hoạt động cách mạng
            [
                'category_name' => 'Hoạt động cách mạng',
                'title' => 'Thành lập Việt Nam Thanh niên Cách mạng Đồng chí Hội',
                'content' => 'Năm 1925, tại Quảng Châu (Trung Quốc), Nguyễn Ái Quốc thành lập Việt Nam Thanh niên Cách mạng Đồng chí Hội - tổ chức tiền thân của Đảng Cộng sản Việt Nam. Đây là bước quan trọng trong việc chuẩn bị về tổ chức và tư tưởng cho sự ra đời của Đảng.',
                'event_date' => '1925-06-19',
                'location' => 'Quảng Châu, Trung Quốc',
                'is_published' => true,

            ],
            [
                'category_name' => 'Hoạt động cách mạng',
                'title' => 'Thành lập Đảng Cộng sản Việt Nam',
                'content' => 'Ngày 3/2/1930, dưới sự chủ trì của đồng chí Nguyễn Ái Quốc, Hội nghị hợp nhất các tổ chức cộng sản đã diễn ra tại Cửu Long (Hương Cảng, Trung Quốc), quyết định thành lập Đảng Cộng sản Việt Nam.',
                'event_date' => '1930-02-03',
                'location' => 'Hương Cảng, Trung Quốc',
                'is_published' => true,

            ],

            // Kháng chiến chống Pháp
            [
                'category_name' => 'Kháng chiến chống Pháp',
                'title' => 'Đọc Tuyên ngôn Độc lập',
                'content' => 'Ngày 2/9/1945, tại Quảng trường Ba Đình (Hà Nội), Chủ tịch Hồ Chí Minh đọc Tuyên ngôn Độc lập, khai sinh nước Việt Nam Dân chủ Cộng hòa. Bản Tuyên ngôn khẳng định quyền độc lập, tự do của dân tộc Việt Nam và đánh dấu kỷ nguyên mới trong lịch sử dân tộc.',
                'event_date' => '1945-09-02',
                'location' => 'Quảng trường Ba Đình, Hà Nội',
                'is_published' => true,

            ],
            [
                'category_name' => 'Kháng chiến chống Pháp',
                'title' => 'Lời kêu gọi toàn quốc kháng chiến',
                'content' => 'Ngày 19/12/1946, Chủ tịch Hồ Chí Minh ra Lời kêu gọi toàn quốc kháng chiến. Người kêu gọi: "Chúng ta thà hy sinh tất cả, chứ nhất định không chịu mất nước, nhất định không chịu làm nô lệ".',
                'event_date' => '1946-12-19',
                'location' => 'Hà Nội',
                'is_published' => true,

            ],

            // Xây dựng CNXH ở miền Bắc
            [
                'category_name' => 'Xây dựng CNXH ở miền Bắc',
                'title' => 'Phát động phong trào thi đua yêu nước',
                'content' => 'Ngày 11/6/1948, Chủ tịch Hồ Chí Minh ra Lời kêu gọi thi đua ái quốc. Người nêu rõ: "Thi đua là yêu nước, yêu nước thì phải thi đua. Và những người thi đua là những người yêu nước nhất".',
                'event_date' => '1948-06-11',
                'location' => 'Việt Bắc',
                'is_published' => true,

            ],

            // Tư tưởng Hồ Chí Minh
            [
                'category_name' => 'Tư tưởng Hồ Chí Minh',
                'title' => 'Tư tưởng về đạo đức cách mạng',
                'content' => 'Chủ tịch Hồ Chí Minh luôn nhấn mạnh vai trò của đạo đức cách mạng. Người nói: "Cũng như sông thì có nguồn mới có nước, không có nguồn thì sông cạn. Cây phải có gốc, không có gốc thì cây héo. Người cách mạng phải có đạo đức, không có đạo đức thì dù tài giỏi mấy cũng không lãnh đạo được nhân dân".',
                'event_date' => '1947-01-01',
                'location' => 'Việt Bắc',
                'is_published' => true,

            ],

            // Di chúc và Di sản
            [
                'category_name' => 'Di chúc và Di sản',
                'title' => 'Di chúc của Chủ tịch Hồ Chí Minh',
                'content' => 'Bản Di chúc của Chủ tịch Hồ Chí Minh được Người bắt đầu viết từ năm 1965 và hoàn thành vào năm 1969. Đây là văn kiện lịch sử vô giá, là tài sản tinh thần to lớn của toàn Đảng, toàn dân ta, thể hiện tư tưởng, tình cảm, đạo đức và phong cách Hồ Chí Minh.',
                'event_date' => '1969-05-10',
                'location' => 'Hà Nội',
                'is_published' => true,

            ]
        ];

        // Tạo các bài viết
        foreach ($articles as $article) {
            $category = Category::where('name', $article['category_name'])->first();
            if ($category) {
                Article::create([
                    'category_id' => $category->id,
                    'title' => $article['title'],
                    'content' => $article['content'],
                    'event_date' => $article['event_date'],
                    'location' => $article['location'],
                    'is_published' => $article['is_published']
                ]);
            }
        }
    }
}
