<?php include 'includes/header.php'; ?>
    <?php 
        if (isset($_POST['submit'])) {
            
            json().uploadJson();
            global $users, $posts;
            $users = $_POST['jsonUsers'];
            $posts = $_POST['jsonPosts'];
        }
    ?>
       
    <H1>Teste - Criação de API.</H1>
    <form action="/mobly/" method="post">
        <h2>Importar usuarios:</h2>
        <input type='text' name='jsonUsers' placeholder='Insira a URL' value='http://jsonplaceholder.typicode.com/users'>
        <?php if(isset($users) && $users != "") registerUsers($users); ?>
        <h2>Importar Posts:</h2>
        <input type='text' name='jsonPosts' placeholder='Insira a URL' value='http://jsonplaceholder.typicode.com/posts'>
        <?php if(isset ($posts) && $posts != "") registerPosts($posts); ?>
         <button type='submit' name='submit'>Salvar</button>
     </form>
     
<?php include 'includes/footer.php'; ?>