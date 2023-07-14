<div class="blog-slider-a">
    <div class="blog-slider__wrp swiper-wrapper">
        <div style="display:grid">

            <!-- USERS -->
                <div style="margin-bottom:30px">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="4"> Manage users </th>
                            </tr>
                            <tr>
                                <td>id</td>
                                <td>username</td>
                                <td>role</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tabRoles = array('hight','low');

                            foreach($users as $user):
                            ?>
                                <tr>
                                    <td><?=$user->getId()?></td>
                                    <td><?=$user->getUsername()?></td>

                                    <td><form action='/admin' method='post'>
                                            <?php if ($user->getUsername() !== 'test') {  ?>
                                            <select type='hidden' name='rol' >
                                                <?php foreach($tabRoles as $eachRole): ?>
                                                <option value='<?=$eachRole?>' <?php echo ($user->getRol() == $eachRole) ? 'selected' : '' ?> ><?=$eachRole?></option>
                                                <?php endforeach; ?>
                                            </select> <input type='hidden' name='usernamehidden' value='<?=$user->getUsername()?>'> <input type='submit' value='OK'></form></td>
                                    <?php } else {
                                                echo '<div style="text-align: center;">X</div>'; }
                                    ?>

                                    <?php
                                    if($user->getUsername() != $sessionUsername){
                                        echo "<td><form action='/admin' method='post'><input type='hidden' name='user_id' value='".$user->getUsername()."'><button id='del_btn_a' type='submit'><span class='material-symbols-outlined' id='del_btn_a'>delete</span></button></form></td>";
                                    }else{
                                        echo "<td style='text-align: center;'>X</td>";
                                    }
                                    ?>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>

            <!-- ARTICLES -->
                <div style="margin-bottom:30px">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="5">Manage articles</th>
                            <tr>
                                <td>id</td>
                                <td>Title</td>
                                <td>Author</td>
                                <td>PubDate</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($articles as $article):
                            ?>
                                <tr>
                                    <td><?=$article->getId()?></td>
                                    <td><?=$article->getTitle()?></td>
                                    <td><?=$article->getAuthor()?></td>
                                    <td><?=$article->getPubdate()?></td>
                                    <td><form action='/admin' method='post'><input type='hidden' name='article_id' value='<?=$article->getId()?>'><button id='del_btn_a' type='submit'><span class='material-symbols-outlined' id='del_btn_a'>delete</span></button></form></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>

            <!-- COMMENTS -->
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="7">Manage comments</th>
                                <tr>
                                    <td>id</td>
                                    <td>->p</td>
                                    <td>Content</td>
                                    <td>Article</td>
                                    <td>Author</td>
                                    <td>PubDate</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($comments as $comment):
                                ?>
                                    <tr>
                                        <td><?=$comment->getId()?></td>
                                        <td><?=$comment->getId_parent_comment()?></td>
                                        <td><?=$comment->getContent()?></td>
                                        <td><?=$comment->getId_article()?></td>
                                        <td><?=$comment->getAuthor()?></td>
                                        <td><?=$comment->getPubdate()?></td>
                                        <td><form action='/admin' method='post'><input type='hidden' name='comment_id' value='<?=$comment->getId()?>'><button id='del_btn_a' type='submit'><span class='material-symbols-outlined' id='del_btn_a'>delete</span></button></form></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>


        </div>
    </div>
</div>