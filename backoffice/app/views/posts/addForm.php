<h2>Ajout d'un post</h2>
<form action="posts/add" method="post" enctype="multipart/form-data">
    <div class="mb-3">

        <div>
            <input type="text" class="form-control mr-3" placeholder="Post Title" name="title" />
        </div>

        <div><textarea name="resume" class="form-control" id="" cols="30" rows="10" placeholder="Post resume"></textarea></div>

        <div><textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Post content"></textarea></div>

        <div><input type="file" class="form-control" class=" mr-3" placeholder="Post Title" name="image" /></div>

        <div>
            <select name="author_id" id="">
                <option value="" disabled selected>Choose author</option>
                <?php foreach($authors as $author){ ?>
                <option value="<?php echo $author['id'];?>">
                <?php echo $author['firstname']; ?>
                <?php echo $author['lastname']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <select name="categorie_id" id="">
                <option value="" disabled selected>Choose category</option>
                <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                <?php } ?>
            </select>
        </div>

        <div>Tags
            <ul>
            <?php foreach($tags as $tag){ ?>
                <li>
                    <input type="checkbox" name="tags[]" id="tag_<?php echo $tag['name'];?>" value="<?php echo $tag['id'];?>">
                    <label for="tag_<?php echo $tag['name'];?>"><?php echo $tag['name'];?></label>
                </li>
                <?php } ?>
            </ul>
        </div>



        <div><input type="submit" class="form-control btn btn-primary" /></div>

    </div>
</form>