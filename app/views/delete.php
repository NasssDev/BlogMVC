
<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
        <div>
            <div><h2>Delete an article</h2></div>
            <div style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/">HOME</a></div>
                    <form action="/delete" method="post" >
                        <label >Choice an article to delete :</label>
                        <select name="choice" required>
                        <option selected>choice</option>
                        <?php
                            foreach($articles as $article): 
                            ?>
                            <option value="<?=$article->getId()?>"><?=$article->getTitle()?></option>
                            <?php endforeach; ?>
                    </select>
                        
                        <button type="submit" name="delete">Delete</button>
                    </form>

        </div>
    </div> 
</div>
