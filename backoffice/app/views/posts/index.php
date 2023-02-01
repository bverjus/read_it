<h2>Liste des posts</h2>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) : ?>
            <tr>
                <th scope="row"><?php echo $post['id']; ?></th>
                <td><?php echo $post['title']; ?></td>
                <td>
                    <a href="posts/edit/<?php echo $post['id']; ?>" class="btn btn-primary mr-2">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="posts/delete/<?php echo $post['id']; ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>



    </tbody>
</table>