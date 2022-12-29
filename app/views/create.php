<?php $correctionGit = 'une variable non utilisée afin de mettre du code php pour qu\'il soit recconu en tant que php ' ?>
<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
    <div>
        <div><h2>Create an article</h2></div>
        <div  style="margin:20px">You want cancel ? <a id="login_bt" style="text-decoration:none;" href="/">HOME</a></div>
            <form action="/create" method="post" style="display:grid; gap:20px" enctype="multipart/form-data">
                <div style="grid-row:1; " >
                <label >Title of article</label>
                <input type="text"  value="<?php if (isset($_POST['title'])) echo $_POST['title'] ?>" name="title" required>
                </div>
                <div style="grid-row:2; grid-column:1" >
                <label >Description</label>
                <input type="text" value="<?php if (isset($_POST['descript'])) echo($_POST['descript']) ?>" name="descript" required>
                </div>
                <div style="grid-row:3; grid-column:1" >
                <label >Image <small>(jpg, png, jpeg or gif).</small></label>

                <input type="file" name="illustration" accept=".jpeg,.gif,.jpg,.png" required>
                </div>
                <div style="grid-row:1; grid-column:2" >
                <label >content</label>
                <textarea name="content" rows="5" cols="33" required><?php if (isset($_POST['content'])) echo($_POST['content']) ?></textarea>
                </div>
                <div style="grid-row:2; grid-column:2" >
                <label >Category</label>
                <select name="category" required>
                    <option selected>Choice</option>
                    <option value="ecolo">écologie</option>
                </select>
                </div>
                <button style="grid-row:3; grid-column:2"  type="submit" name="create">Submit</button>
            </form>
        </div>
    </div>
</div>
