<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tidy Together</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/landing.css"/>
</head>

<body>

<div class="text-half">
<header class="header">
    <h1 class="header_branding">
        <img src="public/logo.png" alt="TidyTogether" class="header_logo">
        <span class="header_text">TidyTogether</span>
    </h1>

    <nav class="header_nav">
        <ul class="header_ul">
            <li class="header_li">
                <a href="https://github.com/lefcos/TidyTogether" target="_blank" class="header_a header_a--github">
                    <?php require 'view/components/svg/githubSvg.php'; ?>
                </a></li>
            <li class="header_li">
                <button id="open">      
                    <span class="header_a header_a--linkedin">
                        <?php require 'view/components/svg/linkedinSvg.php'; ?>
                    </span>
                </button>

                <div class="modal-container" id = "modal_container">
                    <div class="linkedin-modal">
                        <span>Connect with us:</span>
                        <ul class="linkedin-profiles">
                            <li class="linkedin-profile">
                                <a href="https://www.linkedin.com/in/petrubraha/" target="_blank" class="linkedin-link">Brahă Petru</a>
                            </li>
                            <li class="linkedin-profile">
                                <a href="https://www.linkedin.com/in/leftercosmin/" target="_blank" class="linkedin-link">Lefter Cosmin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>

<main class="landingpage">
    <div class="content">
        <h1 class="content_title">
            Caring for
            <span class="textwithbackground"> your city</span><br>
            Uniting the community
        </h1>

        <div class="content-bottom">
            <div class="description">
            <p class="description-line">A web application that helps you find recycling spots</p>
            <p class="description-line">and streamlines collaboration between citizens and official waste managers.</p>
            </div>
            <form method="POST" action="index.php" class="content-buttons">
                <button type="submit" name="whatPage" value="Signup" class="body-buttons">Sign up</button>
                <button type="submit" name="whatPage" value="Login" class="body-buttons">Log In</button>
            </form>
        </div>

    </div>
</main>
</div>
    <div class="image-half">
        <img src="public/building.jpg" alt="CITY+GREEN">
    </div>

</body>

</html>

<script>
    const open = document.getElementById("open");
    const modalcontainer = document.getElementById("modal_container");
    
    open.addEventListener('click', () => {
        modalcontainer.classList.toggle('show');
    })

    // open.addEventListener('click', () => {
    //     if (open.contains(e.target) && modalcontainer.contains(e.target)) {
    //         modalcontainer.classList.remove('show');
    //     }
    // })

    window.addEventListener('click', (e) => {
        if (!open.contains(e.target) && !modalcontainer.contains(e.target)) {
            modalcontainer.classList.remove('show');
        }
    });

</script>