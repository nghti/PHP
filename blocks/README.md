- Ngồn
+ Design
+ Task
+ Cacoo
-------------
Cách thức hoạt động -> use
-------------

# Overview (Bắt buộc)/ 概要（必須）

Mô tả nội dung muốn thực hiện bằng chức năng này (Đại khái cũng được)
- Create reservation 
+ Thực hiện kéo chọn thời gian đặt lịch trong bản FullCalendar sẽ open modal(Create)
  -> Gọi API /api/reservation/staff/working, /api/reservation/existReservation, /api/patient/count ( Cập nhật dữ liệu ngày, giờ làm việc vào modal đặt lịch )
+ Trong modal có thể thay đổi dữ liệu ngày, giờ làm việc và thêm ghi chú mới
  -> Gọi API /api/patient/list-by-name, api/patient/listbyid, /api/reservation/type ( Cập nhật tên, id, ND kiểm tra  )
+ Submit modal
  -> Gọi API api/reservation/existReservation, /api/reservation/check-is-first-reservation, /api/reservation/store, /api/reservation ( Cập nhật, kiểm tra và đưa data lên store )

- Edit reservation
+ Thực hiện Click vào lịch đã đặt sẽ open modal(Edit)
  -> Gọi API /api/reservation/staff/working, /api/patient/count ( Cập nhật data cho form )
+ Trong modal không thể thay đổi dữ liệu ngày, giờ làm việc
+ Chỉ và thêm ghi chú mới
  -> Gọi API /api/patient/list-by-name, api/patient/listbyid, /api/reservation/type ( Cập nhật tên, id, ND kiểm tra  )

# Ảnh hưởng của mỗi service/サービスごとの影響

Mô tả có hay không bị ảnh hưởng bởi chức năng khác/ほかの機能から影響されるのかと記載する。

Chi tiết từng chức năng ảnh hưởng tới chức năng hiện tại/現在の機能に影響する機能ごとの詳細。

Mô tả có hay không ảnh hưởng tới những chức năng khác/ほかの機能に影響するのかと記載する。

Chi tiết của từng chức năng bị ảnh hưởng bởi chức năng hiện tại/現在の機能で影響される機能ごとの詳細。

# Permission/権限

Mô tả giới hạn khi sử dụng chức năng này ( như giới hạn dựa theo quyền hạn)/この機能を使用する際の制限を記載する。（権限で制限など）

Ví dụ: giới hạn dựa theo quyền hạn (tóm tắt quyền hạn + link google sheet or confluence)/例えば：権限で制限（権限をまとめて、グーグルシートまたはコンフルエンスリンク貼り）

# Nội dung chức năng (Bắt buộc)/機能のコンテンツ

Bao hàm chức năng thực hiện/実装機能を含有する

//TODO

Ví dụ: Show list patient/例えば：患者リストを表示する

Ví dụ: List thì có thể filter bằng search・リストであれば、検索でフィルタできる。

Ví dụ: Không thể xóa patient・患者が削除できる

Ví dụ: Có thể show patient detail・患者詳細が表示できる。

…

# Ticket làm/チケットID

Dán URL của ticket tương ứng/適当なチケットのURLを貼る。

# Bối cảnh/背景

Mô tả bối cảnh cần thiết của chức năng này/この機能が必要になる背景を記載する。

# Sơ đồ di chuyển màn hình (Bắt buộc)/画面遷移図（必須）

Link tới Cacoo sơ đồ di chuyển màn hình ở đây/ここの画面遷移図（Cacoo）を紐づける。

# Specs chi tiết (Bắt buộc)/仕様詳細（必須）

Mô tả tên của màn hình kèm design ID (VD: Patient List [P1-1])/画面名とデザインIDを記載する。

Ở đây sẽ đính kèm hình ảnh của màn hình/ここに画面の画像を添付する。

Bắt đầu từ đây sẽ mô tả giới hạn và ý nghĩa của từng item/各アイテムの意味と制限をここから記載する。

Yếu tố cấu thành của bảng (Có vd cụ thể bên dưới - cái này là Spreadsheet thì vẫn được)/TBLの構成要素。（以下の詳細例がある-ここはSpreadsheetでもいい）

Field

Content

Default value

Item đặc biêt・特別なアイテム

Mô tả về từng button action (Sử dụng Spreadsheet vẫn được)・各ボタンアクションの記載（Spreadsheetを使用してもいい）。

Tên button・ボタン名

Action sau khi nhấn/ Nơi đến・クリックした後のアクション・遷移先

Item đặc biêt・特別なアイテム

削除 / Delete

Patient List

Show modal nhập password của staff đang đăng nhập để xác nhận xóa bỏ・削除するため、ログインしているスタッフのパスワードを入力するモダールが表示される。

Trường hợp có input (cái này dùng Spreadsheet vẫn được)・入力がある場合（Spreadsheetを使用してもいい）

Tên item input・入力アイテム名

Bắt buộc (Yes/No)・必須（はい・いいえ）

Giới hạn input・入力制限

Item đặc biệt・特別なアイテム

Tên・名前

Yes

Nhiều nhất là 20 kí tự・最大２０文字

Không có・なし

Mã bưu điện・郵便番号

No

Nhiều nhất là 7 ký tự số・最大７数字

Nếu input đúng mã bưu điện, khi click button 住所検索 sẽ tự động điền địa chỉ vào 住所

郵便番号を正しく入力したら、住所検索をクリックすると、住所に自動的に住所が入力される。

Validation message

Tên item input・入力アイテム名

Nội dung Validation・バリデーション内容

Error message

Last name name

Trường hợp chưa input・入力しない場合

姓を入力してください

Please enter the patint last name

Lặp lại những bước trên cho các màn hình cần thiết khác・ほかの必要な画面に対して、上記のステップを繰り返す。

# Other/その他

Mô tả bằng các gạch đầu dòng・箇条書きで記載する。

