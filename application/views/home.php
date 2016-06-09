<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <h1>Read</h1>
        <ul>
        <?php if (isset($records)) : foreach ($records as $row) : ?>
            <h2><?php echo anchor("site/delete/$row->id", $row->title); ?></h2>
            <div>Contents: <?php echo $row->contents; ?></div>
        <?php endforeach; ?>
        <?php else : ?>
            <h2>No records returned.</h2>
        <?php endif; ?>
        </ul>

        <h1>Create</h1>
        <?php echo form_open('site/create'); ?>
        <p>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo set_value(""); ?>">
        </p>
        <p>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="<?php echo set_value(""); ?>">
        </p>
        <p>
            <label for="contents">contents:</label>
            <input type="text" name="contents" id="contents" value="<?php echo set_value(""); ?>">
        </p>
        <p><input type="submit" value="Submit"/></p>
        <?php echo form_close(); ?>
    </div>

</body>
</html>