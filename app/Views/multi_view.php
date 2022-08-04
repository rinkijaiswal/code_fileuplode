<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Multiple File Upload</h1>
        
        <?php if(isset($validation)): ?>
            <?= $validation->listErrors(); ?>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data">
        Upload Avatar:<br/> <input type="file" name="avatar[]" multiple="multiple" /><br/><br/>
        <input type="submit" value="Upload" />
        </form>
    </body>
</html>
