<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <div>
            <div><h2>Update an article</h2></div>
            <div style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/">HOME</a></div>
            <form action="/update" method="post" style="display:grid; gap:20px">
                <div>
                <div style="grid-row:1; " >
                    <label >Choice an article to update :</label>
                    <select name="choice" required>
                    <option value="">choice</option>
                    <?php
                            foreach($articles as $article): 
                            ?>
                            <option value="<?=$article->getId()?>"><?=$article->getTitle()?></option>
                            <?php endforeach; ?>
                    </select>
            </div>
                </div>
                <button style="grid-row:4; grid-column:2"  type="submit" name="update">Submit</button>
            </form>
        </div>
    </div>
</div>
