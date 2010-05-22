<?php require_once '_header.php'; ?>

    <p><a href = "<?= BASE_URL ?>products/edit/">Add new product</a></p>
    
    <?php if($products) : ?>
        <table border="0" cellspacing="5" cellpadding="5" class = "list">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td></td>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($products as $p) : ?>
                    
                    <tr>
                        <td> 
                            <?= $p['name']; ?><br />
                            <span class = "list-price"><?= $p['list_price'] ?> HUF</span> <span class = "price"><?= $p['price'] ?> HUF</span>
                        </td>
                        <td class = "description"> 
                            <?= is_null($p['description']) ? '<em>no description</em>' : $p['description'] ?>  
                        </td>
                        <td>
                            <a href = "<?= BASE_URL ?>products/edit/<?= $p['id'] ?>">Edit</a>
                            <br />
                            <a href = "<?= BASE_URL ?>products/delete/<?= $p['id'] ?>">Delete</a>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

<?php require_once '_footer.php'; ?>