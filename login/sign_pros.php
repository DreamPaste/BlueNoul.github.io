<?php
$conn = mysqli_connect(주소, 아이디, "비밀번호", DB 스키마 이름, 포트);
$hashedPassword = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
echo $hashedPassword;
$sql = "
    INSERT INTO user
    (ID, password, created)
    VALUES('{$_POST['id']}', '{$hashedPassword}', NOW()
    )";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "login.html";
    </script>
<?php
}
?>