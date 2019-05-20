<?php
class assignment_19{
    public function fetch_books(){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            $query = "SELECT * FROM `inventory` ORDER BY `id` ASC";
            $connect = $mysqli->query($query);
            echo '<div class="tableContainer">';
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
            echo '</div>';
        }
    }

    public function search_books($querr){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            if($querr != null){
                $query = "SELECT * FROM `inventory` WHERE `id` LIKE '%".$querr."%' || `product` LIKE '%".$querr."%' ORDER BY `id` ASC";
                $query1 = "SELECT count(id) FROM `inventory` WHERE `id` LIKE '%".$querr."%' || `product` LIKE '%".$querr."%'";
                $connect = $mysqli->query($query);
                $connect1 = $mysqli->query(($query1));
                $count = $connect1->fetch_row();
                if($count[0] > 0){
                    echo '<div class="tableContainer">';
                    echo '<h3> Search Results</h3>';
                    echo '<table class="table">';
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
                    echo '</div>';
                }else{
                    echo "<div class='feedback'>There were no results found for your search!</div>";
                }
            }            
        }
    }
}
?>