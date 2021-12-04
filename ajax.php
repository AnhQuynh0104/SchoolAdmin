<?php
require("dbconnect.php");
 $a = $_POST['data'];
 $sql = "select * from student where fullname like '%$a%' ";
 $query = mysqli_query($conn, $sql);

 //execute($sql);
 $num = mysqli_num_rows($query);
 if($num >0){
     while($row = mysqli_fetch_array($query)){

    
?>

<tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['msv']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['gpa']; ?></td>
            <td width="60px"><button class="edit btn btn-outline-warning" onclick=\'window.open("input.php?id='.$std['id'].'","_self")\'>Sửa</button></td>
            <td width="60px"><button class="delete btn btn-outline-danger" onclick="deleteStudent('.$std['id'].')">Xóa</button></td>
        </tr>
        

<?php
 }
}
?>
