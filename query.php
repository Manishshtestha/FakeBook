<?php
include'database.php';
class Queries extends Database{
    public function insert($tbl_name,$tableData){
        $gender = $tableData['gender'];
        $day = $tableData['day'];
        $month = $tableData['month'];
        $year = $tableData['year'];
        $date = $day."/".$month."/".$year;
        $password = md5($tableData['password']);
        for($i=0;$i<=5;$i++){
            array_pop($tableData);
        }
        $keys = implode(',',array_keys($tableData)).",password,dob,gender";
        $values = implode("','",array_values($tableData))."','".$password."','".$date."','".$gender;
        //Inserts the data into the database with tablename $tbl_name
        $sql = "INSERT INTO $tbl_name ($keys) VALUES('$values')";
        if($this->connection->query($sql)){
            echo "Data successfully added";
        }else{
            echo "Data couldn't be added";
        }
    }
    public function login($loginArr){
        $email = $loginArr['username'];
        $password = md5($loginArr['password']);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['is_login'] = true;
            $_SESSION['name'] = $row['first_name'].$row['last_name'];
            header('location:newsfeed.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid Email or Password";
        }
    }

    public function update($tbl_name,$updateData,$id){
        $updateArray = [];
        foreach($updateData as $key=>$value){
            $updateArray = "$key='$value'";
        }

    }
    static function logout(){
        session_destroy();
        unset ($_SESSION);
        header('Location:index.php');
    }
}
?>