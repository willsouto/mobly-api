<?php

$connection = mysqli_connect('localhost','root','','mobly_api');
function user()
{
    function insertUser(){
        global $connection;
        if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $website = $_POST['website'];
                $street = $_POST['street'];
                $suite = $_POST['suite'];
                $city = $_POST['city'];
                $zipcode = $_POST['zipcode'];
                $geo_lat = $_POST['geo_lat'];
                $geo_lng = $_POST['geo_lng'];
                $compname = $_POST['compname'];
                $compcatchPhrase = $_POST['compcatchPhrase'];
                $compbs = $_POST['compbs'];
                
                $name = mysqli_real_escape_string($connection, $name);
                $username = mysqli_real_escape_string($connection, $username);
                $email = mysqli_real_escape_string($connection, $email);
                $phone = mysqli_real_escape_string($connection, $phone);
                $website = mysqli_real_escape_string($connection, $website);
                $street = mysqli_real_escape_string($connection, $street);
                $suite = mysqli_real_escape_string($connection, $suite);
                $city = mysqli_real_escape_string($connection, $city);
                $zipcode = mysqli_real_escape_string($connection, $zipcode);
                $geo_lat = mysqli_real_escape_string($connection, $geo_lat);
                $geo_lng = mysqli_real_escape_string($connection, $geo_lng);
                $compname = mysqli_real_escape_string($connection, $compname);
                $compcatchPhrase = mysqli_real_escape_string($connection, $compcatchPhrase);
                $compbs = mysqli_real_escape_string($connection, $compbs);
                
                $insertUser = "INSERT INTO users ( name, username, email, phone, website) VALUES ";
                $insertAddress = "INSERT INTO address (id_user, street, suite, city, zipcode, geo_lat, geo_lng) VALUES ";
                $insertCompany = "INSERT INTO company (id_user, name, catchPhrase, bs) VALUES ";
                
                
                $updateUser = "('". $name ."', '". $username ."', '". $email ."', '". $phone ."', '". $website ."')";
                $updateAddress = "( LAST_INSERT_ID() , '". $street ."', '". $suite ."', '". $city ."', '". $zipcode ."', '". $geo_lat ."', '". $geo_lng ."')";
                $updateCompany = "( LAST_INSERT_ID() , '". $compname ."', '". $compcatchPhrase ."', '". $compbs ."')";
                //QUERY
               
                
                $query = $insertUser . $updateUser . "; " . $insertAddress . $updateAddress . "; " . $insertCompany . $updateCompany . " ;";
                
                
                $result = mysqli_multi_query($connection, $query);
                if(!$result){
                    echo "<br>";
                    die(mysqli_error($connection));
                }else{
                    echo "<h2 style='color: green;'>Usuario adicionado com sucesso!</h2>";
                }
            }
    } 
    
    function getUsers(){
        global $connection;
        $query = "SELECT * FROM users;";
        $result = mysqli_query($connection, $query);
        global $users;
        while($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }
        $query = "SELECT * FROM company;";
        $result = mysqli_query($connection, $query);
        global $company;
        while($row = mysqli_fetch_assoc($result)){
            $company[] = $row;
        }
        $query = "SELECT * FROM address;";
        $result = mysqli_query($connection, $query);
        global $address;
        while($row = mysqli_fetch_assoc($result)){
            $address[] = $row;
        }

        
            $i = 0;
            foreach($users as $user){
                echo "<table>";
                    foreach($user as $key => $val){
                        echo "<tr><td>{$key}</td><td>{$val}</td></tr>";
                        
                   }
                    foreach($address[$i] as $key => $aaddress){
                        if($key == "id_user"){
                            echo "<tr><td>Adress:</td></tr>";
                       }else{
                            echo "<tr><td>{$key}</td><td>{$aaddress}</td></tr>";
                       }
                   }
                    foreach($company[$i] as $key => $ccompany){
                        if($key == "id_user"){
                            echo "<tr><td>Company:</td></tr>";
                       }else{
                            echo "<tr><td>{$key}</td><td>{$ccompany}</td></tr>";
                       }
                   }
                    echo "<tr><td colspan='2' style='text-align: center;'><a href='/mobly/posts/{$user['id']}'>Ver posts</a><a href='/mobly/editar/{$user['id']}'>Editar</a><a href='/mobly/listar/?delete={$user['id']}'>Excluir</a></td></tr>";
                echo "</table>";
                $i++;
            }
        
    }
    
    function deleteUser(){
        global $connection;
        if (isset($_GET['delete'])) {
            $query = "DELETE FROM users WHERE id = ". $_GET['delete'];
            $result = mysqli_query($connection, $query);
            if(!$result){
                echo "<br>";
            die(mysqli_error($connection));
            }else{
                echo "<h2 style='color: red;'>Usuario deletado com sucesso!</h2>";
            }
        }
    }
    
    function updateUser(){
        global $connection;
        if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $website = $_POST['website'];
                $street = $_POST['street'];
                $suite = $_POST['suite'];
                $city = $_POST['city'];
                $zipcode = $_POST['zipcode'];
                $geo_lat = $_POST['geo_lat'];
                $geo_lng = $_POST['geo_lng'];
                $compname = $_POST['compname'];
                $compcatchPhrase = $_POST['compcatchPhrase'];
                $compbs = $_POST['compbs'];
                $name = mysqli_real_escape_string($connection, $name);
                $username = mysqli_real_escape_string($connection, $username);
                $email = mysqli_real_escape_string($connection, $email);
                $phone = mysqli_real_escape_string($connection, $phone);
                $website = mysqli_real_escape_string($connection, $website);
                $street = mysqli_real_escape_string($connection, $street);
                $suite = mysqli_real_escape_string($connection, $suite);
                $city = mysqli_real_escape_string($connection, $city);
                $zipcode = mysqli_real_escape_string($connection, $zipcode);
                $geo_lat = mysqli_real_escape_string($connection, $geo_lat);
                $geo_lng = mysqli_real_escape_string($connection, $geo_lng);
                $compname = mysqli_real_escape_string($connection, $compname);
                $compcatchPhrase = mysqli_real_escape_string($connection, $compcatchPhrase);
                $compbs = mysqli_real_escape_string($connection, $compbs);
                
                $updateUser = "UPDATE users SET name = '". $name ."', username = '". $username ."', email = '". $email ."', phone = '". $phone ."', website = '". $website ."'";
                $updateAddress = "UPDATE address SET street = '". $street ."', suite = '". $suite ."', city = '". $city ."', zipcode = '". $zipcode ."', geo_lat = '". $geo_lat ."', geo_lng = '". $geo_lng ."'";
                $updateCompany = "UPDATE company SET name = '". $compname ."', catchPhrase = '". $compcatchPhrase ."', bs = '". $compbs ."'";
                //QUERY
                $query = $updateUser . " WHERE id = ". $id . "; " . $updateAddress ." WHERE id_user = ". $id . "; " . $updateCompany . " WHERE id_user = ". $id . ";";
                
              
                $result = mysqli_multi_query($connection, $query);
                if(!$result){
                    echo "<br>";
                    die(mysqli_error($connection));
                }else{
                    
                    echo "<h2 style='color: green';>Dados atualizados com sucesso!</h2>";
                }
            }
           
            $connection2 = mysqli_connect('localhost','root','','mobly_api');
            sleep(1);
            $query = "SELECT * FROM users WHERE id = " . $_GET['id'] . ";";
            $result = mysqli_query($connection2, $query);
            global $users;
            while($row = mysqli_fetch_assoc($result)){
                $users[] = $row;
            }
            $query = "SELECT * FROM company WHERE id_user = " . $_GET['id'] . ";";
            $result = mysqli_query($connection2, $query);
            global $company;
            while($row = mysqli_fetch_assoc($result)){
                $company[] = $row;
            }
            $query = "SELECT * FROM address WHERE id_user = " . $_GET['id'] . ";";
            $result = mysqli_query($connection2, $query);
            global $address;
            while($row = mysqli_fetch_assoc($result)){
                $address[] = $row;
            }

        
                if($users == ""){ 
                    echo "<h2 style='color: red'>Usuario de id: {$_GET['id']} nao encontrado.</h2>";
                }else{
                    echo "<table style='text-align: left;'>";
                        foreach($users[0] as $key => $val){
                            if($key == "id"){
                                 echo "<tr><td>{$key}</td><td><input name='{$key}' value='{$val}' style='border:0;pointer-events: none;' readonly></tr>";
                            }else{
                                 echo "<tr><td>{$key}</td><td><input type='text' name='{$key}' value='{$val}'></input></td></tr>";
                            } 
                        }
                        foreach($address[0] as $key => $val){
                            if($key == "id_user"){
                                echo "<tr><td>Adress:</td></tr>";
                            }else{
                                echo "<tr><td>{$key}</td><td><input type='text' name='{$key}' value='{$val}'></input></td></tr>";
                            }
                        }
                        foreach($company[0] as $key => $val){
                            if($key == "id_user"){
                                echo "<tr><td>Company:</td></tr>";
                            }else{
                                echo "<tr><td>{$key}</td><td><input type='text' name='comp{$key}' value='{$val}'></input></td></tr>";
                            }
                        }
                        echo "<tr><td colspan='2' style='text-align: center;'><button type='submit' name='submit'>Salvar</button></td></tr>";
                    echo "</table>";
                }
    }
    
    function getPosts(){
        global $connection;
            $query = "SELECT * FROM posts WHERE userId = " . $_GET["id"] . ";";
            $result = mysqli_query($connection, $query);
            global $posts;
                while($row = mysqli_fetch_assoc($result)){
                    $posts[] = $row;
                }
            if($posts != ""){
                foreach($posts as $post){
                    echo "<table>";
                        foreach($post as $key => $val){
                            echo "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
                        }
                    echo "</table>";
                }
            }else{
                echo "<h2 style='color: red'>Este usuario não tem posts.</h2>";
            }
        
    }
}

function json()
{
    function uploadJson(){

        
        function registerUsers($url){
        $json = file_get_contents($url);
        $jsonDecode = json_decode($json, true);

        global $connection,$userQuerieValue, $addressQuerieValue, $companyQuerieValue, $clearRows;
            $clearRows = "DELETE from users WHERE id IN (";
            foreach($jsonDecode as $key => $user){
                $address = $user["address"];
                $geo = $address["geo"];
                $company = $user["company"];
                unset($user["address"]);
                unset($user["company"]);
                unset($address["geo"]);
                //clear rows
                
                $clearRows .= "'" . $user["id"] . "',";
                //VALUE User
                $userQuerieValue .= "('" . join("', '", array_filter($user)) . "'), ";
                //VALUE ADDRESS
                $addressQuerieValue .= "('" . $user["id"] . "', '" . join("', '", array_filter($address)) . "', '" . $geo['lat'] . "', '" . $geo['lng']. "'), ";
                //VALUE COMPANY
                $companyQuerieValue .= "('" . $user["id"] . "', '" . join("', '", array_filter($company)) . "'), ";
                //INSERT's
                $insertUser = "INSERT INTO users (id, name, username, email, phone, website) VALUES ";
                $insertAddress = "INSERT INTO address (id_user, street, suite, city, zipcode, geo_lat, geo_lng) VALUES ";
                $insertCompany = "INSERT INTO company (id_user, name, catchPhrase, bs) VALUES ";
            }
                //QUERIES
                $clearRows = substr($clearRows, 0, -1) . ")";
                $userQuerieValue = substr($userQuerieValue, 0, -2);
                $addressQuerieValue = substr($addressQuerieValue, 0, -2);
                $companyQuerieValue = substr($companyQuerieValue, 0, -2);
                $query = $clearRows . "; " . $insertUser . $userQuerieValue . "; " . $insertAddress . $addressQuerieValue . "; " . $insertCompany . $companyQuerieValue;
                
               
                $result = mysqli_multi_query($connection, $query);
                if(!$result){
                    echo "<br>";
                    die(mysqli_error($connection));
                }else{
                    echo "<br><h3 style='color: green;'>Usuarios importados com sucesso!</h3><br>";
                }
        }
        function registerPosts($url){
            global $connection;
            $json = file_get_contents($url);
            $jsonDecode = json_decode($json, true);

            global $postQuerieValue, $clearRows;
                $clearRows = "DELETE from posts WHERE id IN (";
                foreach($jsonDecode as $key => $post){
                    $userId = $post["userId"];
                    $ido = $post["id"];
                    $title = $post["title"];
                    $body = $post["body"];

                    $clearRows .= "'" . $post["id"] . "',";
                    //VALUE User
                    $postQuerieValue .= "('" . join("', '", array_filter($post)) . "'), ";
                    //INSERT's
                    $insertPost = "INSERT INTO posts (userId, id, title, body) VALUES ";
                }
                    //QUERIES
                    $clearRows = substr($clearRows, 0, -1) . ")";
                    $postQuerieValue = substr($postQuerieValue, 0, -2);
                    $connection = mysqli_connect('localhost','root','','mobly_api');
                    $query = $clearRows . "; " . $insertPost /*str_replace("\/","/",  )*/ . $postQuerieValue . ";";

                    $result = mysqli_multi_query($connection, $query);
                    if(!$result){
                        echo "<br>";
                        die(mysqli_error($connection));
                    }else{
                        echo "<br><h3 style='color: green;'>Posts importados com sucesso!</h3><br>";
                    }
        }
    }
    
    
    
    function getPosts(){
        global $connection;
        $userid = $_GET["id"];
        $query = "SELECT * FROM posts WHERE userId = " . $userid;
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)){
                $posts[] = $row;
        }
        if($posts == ""){
            echo "{não há posts}";
        }else{
            echo json_encode($posts, JSON_PRETTY_PRINT);
        }
    }
    
    
    function getUsers(){
        global $connection;
        $userid = $_GET["id"];
        $query = "SELECT * FROM users WHERE id = " . $userid;
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);

        $query = "SELECT * FROM address WHERE id_user = " . $userid;
        $result = mysqli_query($connection, $query);
        $address = mysqli_fetch_assoc($result);

        $query = "SELECT * FROM company WHERE id_user = " . $userid;
        $result = mysqli_query($connection, $query);
        $company = mysqli_fetch_assoc($result);

        $geo["lat"] = $address["geo_lat"];
        $geo["lng"] = $address["geo_lng"];
        $address["geo"] = $geo;
        $user = array_slice($user, 0, 4, true) +  array("address" => "") + array_slice($user, 3, count($user) - 1, true) ;

        unset($address["geo_lat"],$address["geo_lng"],$address["id_user"],$company["id_user"]);

         $user["address"] = $address;
         $user["company"] = $company;

        echo json_encode($user, JSON_PRETTY_PRINT);
    }
    
    function getAllUsers(){
        global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }
        $query = "SELECT * FROM address";
        $result = mysqli_query($connection, $query);
        $address = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)){
            $address[] = $row;
        }
        $query = "SELECT * FROM company";
        $result = mysqli_query($connection, $query);
        $company = mysqli_fetch_assoc($result);
        while($row = mysqli_fetch_assoc($result)){
            $company[] = $row;
        }
        $i = 0;
        $allUsers = [];
            foreach($users as $user){
                $geo[$i]["lat"] = $address[$i]["geo_lat"];
                $geo[$i]["lng"] = $address[$i]["geo_lng"];
                $address[$i]["geo"] = $geo[$i];
                $user = array_slice($user, 0, 4, true) +  array("address" => "") + array_slice($user, 3, count($user) - 1, true) ;
                unset($address[$i]["geo_lat"],$address[$i]["geo_lng"],$address[$i]["id_user"],$company[$i]["id_user"]);
                 $user["address"] = $address[$i];
                 $user["company"] = $company[$i];
                array_push($allUsers, $user);
                $i++;
            }
        echo json_encode($allUsers, JSON_PRETTY_PRINT);
    }
}

?>