<?php include("../config.php"); ?>
<?php include(ROOT_PATH . "/admin/includes/head_section.php"); ?>
<?php include(ROOT_PATH . "/admin/includes/admin_functions.php"); ?>
<?php include(ROOT_PATH . "/admin/includes/post_functions.php"); ?>
<?php $topics = getAllTopics(); ?>
<title>Admin |Create Posts</title>
</head>

<body>
    <?php include(ROOT_PATH . "/admin/includes/navbar.php"); ?>

    <div class="container content">
        <?php include(ROOT_PATH . "/admin/includes/menu.php"); ?>

        <div class="action create-post-div">
            <h1 class="page-title">Create/Edit Post</h1>
            <form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . "admin/create_post.php"; ?>">
                <?php include(ROOT_PATH . '/includes/errors.php') ?>

                <!-- if editing post, the id is required to indentify the post -->
                <?php if ($isEditingPost === true) : ?>
                    <input type="hidden" name="post_id" value="<?php echo $title; ?>" placeholder="Title">
                <?php endif ?>

                <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
                <label style="float: left; margin: 5px auto 5px;">Feature Image</label>
                <input type="file" name="featured_image">
                <textarea name="body" id=body cols="30" rows="10"><?php echo $body; ?></textarea>
                <select name="topic_id">
                    <option value="" selected disabled>Choose a topic</option>
                    <?php foreach ($topics as $topic) : ?>
                        <option value="<?php echo $topic['name']; ?>">
                            <?php echo $topic['name']; ?>
                        </option>
                    <?php endforeach ?>
                </select>

                <?php if ($_SESSION['user']['role'] == "Admin") : ?>
                    <?php if ($published == true): ?>
                        <label for="publish">
                            Publish
                            <input type="checbox" value="1" name="publish" checked="checked">&nbsp;
                        </label>
                    <?php else : ?>
                        <label for="publish">
                            Publish
                            <input type="checkbox" value="1" name="publish" value="1" name="publish">&nbsp;
                        </label>
                    <?php endif ?>
                <?php endif ?>

                <?php if ($isEditingPost == true) : ?>
                    <button type="submit" class="btn" name="update_post">UPDATE</button>
                <?php else : ?>
                    <button type="submit" class="btn" name="create_post">Save Post</button>
                <?php endif ?>

            </form>
        </div>

    </div>



</body>

</html>
<script>
    CKEDITOR.replace('body');
</script>