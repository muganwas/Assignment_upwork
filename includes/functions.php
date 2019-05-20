<?php
class assignment_19{
    public function fetch_books(){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            $query = "SELECT * FROM `inventory` ORDER BY `id` ASC";
            $connect = $mysqli->query($query);
            echo '<table>';
            while($rez= $connect->fetch_array(MYSQLI_ASSOC)){
                //var_dump($rez['id']);
                    echo '<tr>
                        <th> BOOK ID </th>
                        <th> Product </th>
                        <th> Price </th>
                        <th> Author </th>
                        <th> Picture </th>
                    </tr>
                    <tr>
                        <td>'.$rez['id'].'
                        </td>
                        <td>'.$rez['product'].'</a>
                        </td>
                        <td> AUD '.$rez['price'].'</td>
                        <td>'.$rez['author'].'</td>
                        <td> <a href="./images/'.$rez['picture'].'"> <img src="./images/'.$rez['thumb'].'" width="100" height="100" /> </a>
                        </td>
                    </tr>';
            }
            echo '</table>';
        }
    }
}
?>