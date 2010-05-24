<?php require_once '_header.php'; ?>
    
    <p><a href = "<?= BASE_URL ?>products/list/">Go back</a></p>
    <?php if(!empty($errors)) : ?>
        <div id="errors">
    
            <?php foreach($errors as $error) : ?>
                
                <p><?= $error ?></p>
                
            <?php endforeach; ?>
            
        </div>
        
    <?php endif; ?>    
    <form enctype="multipart/form-data" action="<?= BASE_URL ?>products/edit/<?= isset($theProduct['id']) ? $theProduct['id'] : '' ?>" method="post" accept-charset="utf-8" id = "product-form">
    
        <fieldset>
            <legend>Product details</legend>
            
            <?php if($theProduct['image']) : ?>

                <?= Display::image($theProduct['image'], 'right'); ?>
                
            <?php endif; ?>
            
            <p>
                <label for = "name">Name</label>
                <input type="text" name="name" value="<?= isset($theProduct['name']) ? $theProduct['name'] : '' ?>" id="name" size = "53" class = "required"/>
                <span class = "error-msg"></span>
            </p>
            <p>
                <label for = "list_price">List price</label>
                <input type="text" name="list_price" value="<?= isset($theProduct['list_price']) ? $theProduct['list_price'] : '' ?>" id="list_price" size = "10" class = "required numeric" />
                <span class = "error-msg"></span>
            </p>
            <p>
                <label for = "price">Price</label>
                <input type="text" name="price" value="<?= isset($theProduct['price']) ? $theProduct['price'] : '' ?>" id="price" size = "10" class = "required numeric"/>
                <span class = "error-msg"></span>
            </p>            
            <p>
                <label for = "image">Image</label>
                <input type="file" name="image" value="" id="image" size = "15" class = "required"/>
                <span class = "error-msg"></span>
            </p>
             <p>
                <label for = "description">Description</label>
                <textarea name = "description" rows = "3" cols = "40"><?= isset($theProduct['description']) ? $theProduct['description'] : '' ?></textarea>
            </p>
            
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Save" />
        </fieldset>
    
    </form>   
    
<?php require_once '_footer.php'; ?>