<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
class assignment_19{
    public function fetch_books(){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            $query = "SELECT * FROM `inventory` ORDER BY `id` ASC";
            $connect = $mysqli->query($query);
            echo '<div class="tableContainer">';
            echo '<table>';
            while($rez= $connect->fetch_array(MYSQLI_ASSOC)){
                
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
                //checking for similar Ids and product name not the exact key words
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

    public function submitContactForm($name, $country, $message){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            if($name != null && $country != null && $message != null){
                $query = "INSERT INTO `contact` VALUES('',?,?,?)";
                $connect = $mysqli->prepare($query);
                $connect->bind_param("sss", $name, $country, $message);
                if($connect->execute()){
                    return '<div class="feedback">Message Sent, thank you.</div>';                   
                }else{
                    return '<div class="feedback">There was an error please try again later.</div>';
                }
            }
        }

    }

    public function submitBookOrder($bookId, $name, $contact, $email, $address, $city, $state, $postalCode){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            if($bookId){
                $query1 = "SELECT count(id) FROM `inventory` WHERE `id` = '".$bookId."'";
                $connect1 = $mysqli->query(($query1));
                $count = $connect1->fetch_row();
                if($count[0] > 0){
                    //use of prepared statement for security reasons
                    if($name != null && $bookId != null && $contact != null && $email != null && $address != null && $city != null && $state != null && $postalCode != null){
                        $query = "INSERT INTO `orders` VALUES('',?,?,?,?,?,?,?,?)";
                        $connect = $mysqli->prepare($query);
                        $connect->bind_param("ssssssss", $bookId, $name, $contact, $email, $address, $city, $state, $postalCode);
                        if($connect->execute()){
                            return '<div class="feedback">Your order has been submited, thank you.</div>';                   
                        }else{
                            return '<div class="feedback">There was an error please try again later.</div>';
                        }
                    }

                }else{
                    return '<div class="feedback">The book you are trying to order is not in our inventory.</div>';
                }
            }
        }

    }

    public function signupUser($name, $pass, $conPass){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            if($name != null){
                $query1 = "SELECT count(id) FROM `users` WHERE `name` = '".$name."'";
                $connect1 = $mysqli->query(($query1));
                $count = $connect1->fetch_row();
                if($count[0] == 0){
                    if($pass == $conPass){
                        if($name != null && $pass != null && $conPass != null ){
                            $pass = md5($pass);
                            $query = "INSERT INTO `users` VALUES('',?,?)";
                            $connect = $mysqli->prepare($query);
                            $connect->bind_param("ss", $name, $pass);
                            if($connect->execute()){
                                return '<div class="feedback">You signup successfully.</div>';                   
                            }else{
                                return '<div class="feedback">There was an error please try again later.</div>';
                            }
                        }
                    }else{
                        return '<div class="feedback">Passwords do not match.</div>';
                    }
                }else{
                    return '<div class="feedback">Username already exists.</div>';
                }
            }
        }
    }

    public function loginUser($name, $pass){
        require('connection.php');
        if($mysqli = new mysqli($server, $username, $password, $database)){
            if($name != null){
                $pass = md5($pass);
                $query1 = "SELECT count(id) FROM `users` WHERE `name` = '".$name."' AND `password` = '".$pass."'";
                $connect1 = $mysqli->query(($query1));
                $count = $connect1->fetch_row();
                if($count[0] == 1){
                    return "good";
                }else{
                    return '<div class="feedback">Something went wrong, please try again.</div>';
                }
            }
        }
    }

    public function logout(){
        //unset the user session 
        unset($_SESSION['user_assignment1']);
        session_destroy();
    }
}
