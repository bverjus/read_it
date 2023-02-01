<!-- FORM LOGIN -->
<div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Connection</h3>
    <form action="verify" class="p-5 bg-light" method="post">
        <?php if(isset($_GET['login']) && $_GET['login'] == "error") {
            ?><div><strong>Le login ou le mot de passe est incorrect</strong></div><?php }?>
        <div class="form-group">
            <label for="login">Login *</label>
            <input name="login" type="text" class="form-control" id="login" required>
        </div>
        <div class="form-group">
            <label for="password">Password *</label>
            <input name="password" type="password" name="" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn py-3 px-4 btn-primary">
        </div>
    </form>
</div>