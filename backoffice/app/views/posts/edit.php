<h2>Modifier le post <?php echo $post['id'] ?></h2>
<form action="posts/update/<?php echo $post['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <div>
            <input type="text" class="form-control mr-3" value="<?php echo $post['title']?>" name="title"/>
        </div>

        <div><textarea name="resume" class="form-control" id="" cols="30" rows="10" placeholder=""><?php echo $post['resume']?></textarea></div>

        <div><textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder=""><?php echo $post['content']?></textarea></div>

        <div><input type="file" class="form-control" class=" mr-3" placeholder="" name="image"/></div>

        <div>
            <select name="author_id" id="">
                <option value="" disabled selected>Choose author</option>
                <?php foreach($authors as $author){ ?>
                <option value="<?php echo $author['id'];?>"<?php if($author['id'] == $post['author_id']) echo ' selected' ?>>
                <?php echo $author['firstname']; ?>
                <?php echo $author['lastname']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <select name="category_id" id="">
                <option value="" disabled selected>Choose category</option>
                <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category['id'];?>"<?php if($category['id'] == $post['category_id']) echo ' selected' ?>><?php echo $category['name'];?></option>
                <?php } ?>
            </select>
        </div>

        <div>Tags
            <ul>
            <?php foreach($tags as $tag){ ?>
                <li>
                    <input type="checkbox" name="tags[]" id="tag_<?php echo $tag['name'];?>" value="<?php echo $tag['id'];?>" 
                    <?php if(in_array( $tag['id'], array_column($postTags,'id'))) echo ' checked' ?>>
                    <label for="tag_<?php echo $tag['name'];?>"><?php echo $tag['name'];?></label>
                </li>
                <?php } ?>
            </ul>
        </div>

        <div><input type="submit" class="form-control btn btn-primary"></div>

    </div>
</form>