<?php 
class Userlogin{
    
    public function login(){
        //Login với user hiện tại
    $rules = [
		'email' =>'required|email',
		'password' => 'required|min:6'
	];
	$messages = [
		'email.required' => 'Email là trường bắt buộc',
		'email.email' => 'Email không đúng định dạng',
		'password.required' => 'Mật khẩu là trường bắt buộc',
		'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
	];
	$validator = Validator::make($request->all(), $rules, $messages);
	
	
	if ($validator->fails()) {
		// Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
		return redirect('login')->withErrors($validator)->withInput();
	} else {
		// Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
		$email = $request->input('email');
		$password = $request->input('password');
 
		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
			// Kiểm tra đúng email và mật khẩu sẽ chuyển trang
			return redirect('hocsinh');
		} else {
			// Kiểm tra không đúng sẽ hiển thị thông báo lỗi
			Session::flash('error', 'Email hoặc mật khẩu không đúng!');
			return redirect('login');
		}
	}
    }
}
class UserResposity{
   
    public function getUserFromDatabase(){
        // Code lấy thông tin user
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "data";

        // tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);
        // kiểm kết nối
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, firstname, lastname, email, reg_date FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // Load dữ liệu lên website
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Tên: " . $row["firstname"]. " "
        . $row["lastname"]. " - Email: ". $row["email"]. " - Ngày đăng ký: ". $row["reg_date"]."<br>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
            }
}



?>