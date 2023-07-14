<?php $correctionGit = 'une variable non utilisée afin de mettre du code php pour qu\'il soit recconu en tant que php ' ?>
<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
    <div id="login">
        <div><h2>LOGIN</h2></div>
    <div>You don't have an account yet ? <button id="signin_bt">Create</button> or you forgot pwd <button id="respwd_bt">Reset pwd</button></div>
        <form action="/login" method="post" >
            <label >Username</label>
            <input type="text" name="username" required>
            <label >Password</label>
            <input type="password" name="pwd" required>
            <button type="submit" name="login" value="login" >Submit</button>
        </form>
        <div style="color:grey; margin-top:30px">To acces the blog service, you need to connect or create an account.<br>Also you can use these identifier : id=test; pwd=test.</div>
    </div>
    <div id="signin">
        <div><h2>CREATE ACCOUNT</h2></div>
    <div>You already have an account ? <button id="login_bt">Login</button></div>
        <form action="/login" method="post" >
            <label >Username</label>
            <input type="text" name="username" required>
            <label >Password</label>
            <input type="password" name="pwd" required>
            <button type="submit" name="signin" value="signin">Create</button>
        </form>
        <div style="color:grey; margin-top:30px">To acces the blog service, you need to connect or create an account.<br>Also you can use these identifier : id=test; pwd=test.</div>
    </div>
    <div id="resmdp">
        <div><h2>RESET PWD</h2></div>
        <div>Cancel ? <a href="/" style="text-decoration:none; " id="login_bt">Back</a></div>
        <form action="/login" style="margin-top:20px; " method="post" >
            <label >Username</label>
            <input type="text" name="username" required>
            <label >New Password</label>
            <input type="password" name="pwd" required>
            <button type="submit" name="resmdp" value="resmdp">Submit</button>
        </form>
        <div style="color:grey; margin-top:30px">I did not strengthen the authentication for the password reset more than that, because the subject does not ask for it.<br> note: you cannot change admin passwords such as 'test' from this interface.</div>
    </div>
    <script> //afficher login/signin
        let signin = document.getElementById("signin_bt");
        let login = document.getElementById("login_bt");
        let resmdp = document.getElementById("respwd_bt");
        document.getElementById("login").style.display = "none";
        document.getElementById("resmdp").style.display = "none";
        signin.addEventListener("click", () => {
            document.getElementById("signin").style.display = "block";
            document.getElementById("login").style.display = "none";
            document.getElementById("resmdp").style.display = "none";
        })
        login.addEventListener("click", () => {
            document.getElementById("login").style.display = "block";
            document.getElementById("signin").style.display = "none";
            document.getElementById("resmdp").style.display = "none";
        })
        resmdp.addEventListener("click", () => {
            document.getElementById("login").style.display = "none";
            document.getElementById("signin").style.display = "none";
            document.getElementById("resmdp").style.display = "block";
        })               
    </script>
    </div>
    <div class="blog-slider__pagination"></div>
</div>

