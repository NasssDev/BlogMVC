<?php $correctionGit = 'une variable non utilisée afin de mettre du code php pour qu\'il soit recconu en tant que php ' ?>
<div class="blog-slider">
    <form action="/crud" method="post">
        <div><h1>WHAT DO YOU WANT TO DO ?</h1></div><br>
        <button name="create_bt"  class="blog-slider__button">Create</button>
        <button name="read_bt"  class="blog-slider__button">Read</button>
        <button name="update_bt"  class="blog-slider__button">Update</button>
        <button name="delete_bt"  class="blog-slider__button">Delete</button>
        <p>
        <div style="color:grey; ">
            Your are on the main menu : <br>
            -Create = create and publish an article on this blog. <br>
            -Read = choose from all the articles on the blog the one you want to read.<br>
            -Update = modify one of the articles that belong to you.<br>
            -Delete = delete an article among those that belong to you.
        </div>
        </p>
    </form>
    <div class="blog-slider__pagination"></div>
</div>