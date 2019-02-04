<?php include 'includes/header.php'; ?>

   <h1>Adicionar usuario</h1>

<?php  
    user().insertUser();
?>



<form action="/mobly/adicionar/" method="post">
    <table style="text-align: left;">
        <tbody>

            <tr>
                <td>name</td>
                <td><input type="text" name="name" ></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>website</td>
                <td><input type="text" name="website"></td>
            </tr>
            <tr>
                <td>Adress:</td>
            </tr>
            <tr>
                <td>street</td>
                <td><input type="text" name="street"></td>
            </tr>
            <tr>
                <td>suite</td>
                <td><input type="text" name="suite"></td>
            </tr>
            <tr>
                <td>city</td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td>zipcode</td>
                <td><input type="text" name="zipcode"></td>
            </tr>
            <tr>
                <td>geo_lat</td>
                <td><input type="text" name="geo_lat"></td>
            </tr>
            <tr>
                <td>geo_lng</td>
                <td><input type="text" name="geo_lng"></td>
            </tr>
            <tr>
                <td>Company:</td>
            </tr>
            <tr>
                <td>name</td>
                <td><input type="text" name="compname"></td>
            </tr>
            <tr>
                <td>catchPhrase</td>
                <td><input type="text" name="compcatchPhrase"></td>
            </tr>
            <tr>
                <td>bs</td>
                <td><input type="text" name="compbs"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit" name="submit">Salvar</button></td>
            </tr>
        </tbody>
    </table>
</form>
    
    
<?php include 'includes/footer.php'; ?>