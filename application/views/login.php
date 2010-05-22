<?php require_once '_header.php'; ?>

    <p><a href = "<?= BASE_URL ?>">Go back</a></p>

    <?php if(!empty($errors)) : ?>
        <div id="errors">
    
            <?php foreach($errors as $error) : ?>
                
                <p><?= $error ?></p>
                
            <?php endforeach; ?>
            
        </div>
        
    <?php endif; ?>

    <form action="<?= BASE_URL ?>login" method="post" accept-charset="utf-8">
        
        <fieldset>
            <legend>Login</legend>
            
            <p>
                <label for = "username">Username</label>
                <input type="text" name="username" value="" id="username" size = "30" class = "required" />
            </p>
            <p>
                <label for = "password">Password</label>
                <input type="password" name="password" value="" id="password" size = "30" class = "required" />
            </p>            
            
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Login" />
        </fieldset>
    
    </form>

<?php require_once '_footer.php'; ?>