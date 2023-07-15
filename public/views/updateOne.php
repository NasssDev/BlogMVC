<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <div>
            <div>
                <h2>Update an article</h2>
            </div>
            <div style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/api">HOME</a></div>
            <form action="/updateOne/<?= $article->getId() ?>" method="post" style="display:grid; gap:20px" enctype="multipart/form-data">
                <div style="grid-row:2; ">
                    <label>New article title</label>
                    <input type="text" name="title" value="<?= $article->getTitle() ?>">
                </div>
                <div style="grid-row:3; grid-column:1">
                    <label>New description</label>
                    <input type="text" name="descript" value="<?= $article->getDescript() ?>">
                </div>
                <div style="grid-row:4; grid-column:1">

                    <label for="inputUpload">
                        Image <small>(jpg, png, jpeg or gif).</small>
                        <hr style="border-width: 0px;">
                        <input type="file" name="illustration" id="inputUpload" accept=".jpeg,.gif,.jpg,.png" hidden required>
                        <input type="hidden" name="oldFile" value="<?= $article->getIllustration() ?>">
                        <label for="inputUpload" class="fileUpdate">Parcourir... </label><span id="oldValue"><?= $article->getIllustration() ?></span>
                    </label>
                </div>
                <div style="grid-row:2; grid-column:2">
                    <label></label>
                    <label>
                        New content
                        <textarea name="content" rows="5" cols="33"><?= $article->getContent() ?></textarea>
                    </label>
                </div>

                <div style="grid-row:3; grid-column:2">
                    <label>New Statut</label>
                    <select name="statut">
                        <option value="1">public</option>
                        <option value="0">private</option>
                    </select>
                </div>

                <div style="grid-row:4; grid-column:2">
                    <label>New Category</label>
                    <select name="category" value="<?= $article->getcategory() ?>">
                        <option selected>Choice</option>
                        <option value="ecolo">écologie</option>
                    </select>
                </div>
                <button style="grid-row:5; grid-column:2" type="submit" name="update">Submit</button>
            </form>
        </div>
    </div>
</div>