<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shayarii</title>
</head>
<body>
    <h1>Edit post</h1>
    <form action="/post/update" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php print_r($data['title']);?>">
        <label for="shayari">Shayari</label>
        <textarea id="shayari" name="shayari" rows="4" cols="50"><?php print_r($data['body']);?></textarea>
        <input type='text' name='id' value=<?php echo $data['id']; ?> hidden>
        <button type="submit">Submit</button>
    </form>
</body>
</html>