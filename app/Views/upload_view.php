<html>
    <head>
        <title>File upload</title>
    </head>
    <body>
        <h1>File Uploading</h1>
        
        <?php if(isset($validation)): ?>
            <?= $validation->listErrors(); ?>
        <?php endif; ?>
        
        <?= form_open_multipart(); ?>
        Upload Avatar: <br/><input type="file" name="avatar" /><br/><br/><br/>
        <input type="submit" value="Upload" />
        <?= form_close(); ?>
    </body>
</html>