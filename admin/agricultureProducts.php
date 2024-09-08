<div class="block block_tile-links">
    <div class="block block_community">
        <div class="bound-layout">
            <h3 style="align-text:center;font-size:2rem;color:rgb(0, 54, 99);">Agricultural products</h3>
            <div class="line" style="color:black; border: 2px solid black; width: 1500px; padding: 0; margin-left: -210px;"></div>
            <div class="intro">
                <h2 style="color: green;">Lists</h2>
            </div>
            <div class="people-quotes">
                <div class="slot slot-person">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project_db";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="tile person">';
                            echo '<a href="#" onclick="showPopup(\'' . $row["name"] . '\', ' . $row["price"] . ')">';
                            echo '<div class="tile-image">';
                            echo '<div class="image-auto" style="padding-bottom: 100%">';
                            echo '<img src="images/' . strtolower($row["name"]) . '.png" alt="' . $row["name"] . '">';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="text">';
                            echo '<h4>' . $row["name"] . '</h4>';
                            echo '<p>price: ' . $row["price"] . ' Rs per kgs</p>';
                            echo '</div>';
                            echo '</a>';
                            echo '<div class="buttons">';
                            echo '<button style="border:2px solid black;color:White;background-color:green;border-radius:5px;width:60px;height:25px;" onclick="buy(\'' . $row["name"] . '\', ' . $row["price"] . ')">Buy</button>';
                            echo '<div style="height:10px; width:15px;"></div>';
                            echo '<button style="color:White;background-color:green;border-radius:5px;width:60px;height:25px;" onclick="addToCart(\'' . $row["name"] . '\', ' . $row["price"] . ')">Add to Cart</button>';
                            echo '</div>';
                            echo '<div class="line" style="color:black; border: 2px solid black; width: 1100px;padding: 0; margin-left: 20px;"></div>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products available.";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="overlay" id="overlay"></div>
<script>
    function showPopup() {
        document.getElementById('productPopup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('productPopup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    function buy() {
        window.location.href = 'order.php';
    }

    function addToCart() {
        alert('Product added to cart!');
        hidePopup();
    }
    var productTiles = document.querySelectorAll('.tile.person');
    productTiles.forEach(function(tile) {
        tile.addEventListener('click', showPopup);
    });
    document.getElementById('overlay').addEventListener('click', hidePopup);
</script>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: white;
        border: 1px solid #ccc;
        z-index: 1000;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    hr.sep {
        margin: 30px 0
    }

    blockquote {
        border-left: 7px solid #f15e2f;
        padding: 10px 0 10px 30px;
        margin-left: 15px;
        overflow: hidden
    }

    blockquote cite {
        font-weight: 700;
        display: block
    }

    .accordion .accordion__item-content p:last-child,
    blockquote :last-child {
        margin-bottom: 0
    }

    .content b,
    .content strong {
        color: #111
    }

    .block_wysiwyg a,
    .content a,
    .wysiwyg a {
        color: #d92d26;
        text-decoration: none;
        border-bottom: 1px solid rgba(217, 45, 38, .2)
    }

    .content a:hover {
        border-bottom-color: #d92d26
    }

    @media (max-width:760px) {

        blockquote,
        h1,
        h2,
        h3,
        h4,
        hr,
        ol,
        p,
        ul {
            margin-bottom: 20px
        }

        h5,
        h6,
        li {
            margin-bottom: 10px
        }

        h1 {
            font-size: 36px
        }

        h2 {
            font-size: 30px
        }

        h3 {
            font-size: 24px
        }

        h4 {
            font-size: 18px
        }

        h5,
        h6 {
            font-size: 14px
        }

        blockquote {
            padding: 20px 0 20px 20px
        }
    }

    @media (max-width:479px) {

        body,
        html {
            font-size: 15px
        }

        blockquote,
        h1,
        h2,
        h3,
        h4,
        hr,
        ol,
        p,
        ul {
            margin-bottom: 15px
        }

        h5,
        h6,
        li {
            margin-bottom: 10px
        }

        h1 {
            font-size: 25px
        }

        h2 {
            font-size: 22px
        }

        h3 {
            font-size: 20px
        }

        h4 {
            font-size: 17px
        }

        h5,
        h6 {
            font-size: 13px
        }

        blockquote {
            padding: 10px 0 10px 15px
        }
    }

    #wholepage {
        padding: 0 0 60px
    }

    .bound-maximum,
    .bound-none {
        position: relative;
        margin: 0 auto
    }

    .bound-none {
        width: 100%
    }

    .bound-maximum {
        width: calc(100% - 60px)
    }

    @media (max-width:1200px) {
        .bound-maximum {
            width: calc(100% - 40px)
        }
    }

    @media (max-width:800px) {
        .bound-maximum {
            width: calc(100% - 30px)
        }
    }

    @media (max-width:349px) {
        .bound-maximum {
            width: calc(100% - 20px)
        }
    }

    .bound-header {
        position: relative;
        margin: 0 auto;
        width: calc(100% - 60px)
    }

    @media (max-width:1200px) {
        .bound-header {
            width: calc(100% - 40px)
        }
    }

    @media (max-width:800px) {
        .bound-header {
            width: calc(100% - 30px)
        }
    }

    @media (max-width:349px) {
        .bound-header {
            width: calc(100% - 20px)
        }
    }

    @media (max-width:1150px) {
        .bound-header {
            width: calc(100% - 20px)
        }
    }

    .bound-footer {
        position: relative;
        margin: 0 auto;
        width: calc(100% - 60px);
        max-width: 1080px
    }

    @media (max-width:1200px) {
        .bound-footer {
            width: calc(100% - 40px)
        }
    }

    @media (max-width:800px) {
        .bound-footer {
            width: calc(100% - 30px)
        }
    }

    @media (max-width:349px) {
        .bound-footer {
            width: calc(100% - 20px)
        }
    }

    .bound-layout {
        position: relative;
        margin: 0 auto;
        width: calc(100% - 165px);
        max-width: 1080px
    }

    @media (max-width:1365px) {
        .bound-layout {
            margin: 0 0 0 135px
        }
    }

    @media (max-width:1200px) {
        .bound-layout {
            margin: 0 0 0 152px;
            width: calc(100% - 155px)
        }
    }

    @media (max-width:1150px) {
        .bound-layout {
            margin: 0 0 0 95px;
            width: calc(100% - 110px)
        }
    }

    @media (max-width:599px) {
        .bound-layout {
            margin: 0 auto;
            width: calc(100% - 30px)
        }
    }

    .bound-wide {
        position: relative;
        margin: 0 0 0 122px;
        width: calc(100% - 122px)
    }

    @media (max-width:1150px) {
        .bound-wide {
            margin: 0 0 0 95px;
            width: calc(100% - 110px)
        }
    }

    @media (max-width:599px) {
        .bound-wide {
            margin: 0 auto;
            width: 100%
        }
    }

    .bound-narrow {
        position: relative;
        margin: 0 auto;
        max-width: 770px
    }

    @media (max-width:960px) {
        .bound-narrow {
            margin: 0 0 0 95px;
            width: calc(100% - 110px)
        }
    }

    @media (max-width:599px) {
        .bound-narrow {
            margin: 0 auto;
            width: calc(100% - 30px)
        }
    }

    #footer {
        /* background-color: var(--background); */
        /* background-color: #000; */
        background-color: var(--background);
        color: var(--text)
    }

    #footer h3,
    #footer h4,
    #footer h5,
    #footer h6,
    .block_grid-links .grid-wrap .grid-tile .text p,
    .dark .intro h2 {
        color: var(--green)
    }

    #footer .mailing-list {
        padding: 80px 0 40px;
        text-align: center
    }

    #footer .ft-blocks {
        padding: 50px 0;
        border-top: 5px solid #444;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    #footer .ft-blocks .ft-block {
        width: 25%;
        font-size: 13px;
        padding: 0 20px
    }

    #footer .ft-blocks .ft-block:first-child {
        padding-left: 0
    }

    #footer .ft-blocks .ft-block:last-child {
        padding-right: 0
    }

    #footer .cred nav a,
    #footer .ft-blocks .ft-block h5 {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.8px;
        font-size: 16px
    }

    #footer .ft-blocks .ft-block h5 {
        margin-bottom: 10px
    }

    #footer .cred nav,
    #footer .ft-blocks .social {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    #footer .ft-blocks .social a {
        fill: var(--orange);
        width: 32px;
        height: 32px
    }

    #footer .cred {
        text-align: center;
        /* margin-top: 150px; */
    }

    #footer .cred .four-star img {
        display: block;
        margin: 0 auto 20px;
        width: 200px;
        height: auto
    }

    #footer .cred nav {
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        margin-bottom: 15px
    }

    #footer .cred nav a {
        margin: 0 10px;
        font-family: 'Function Pro', sans-serif
    }

    #footer .cred p {
        font-size: 13px;
        margin-bottom: 0;
        padding-bottom: 40px
    }

    @media (max-width:1100px) {
        #footer .mailing-list {
            padding-top: 50px
        }
    }

    @media (max-width:900px) {
        #footer .ft-blocks {
            padding: 30px 0;
            -webkit-flex-wrap: wrap;
            -moz-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap
        }

        #footer .ft-blocks .ft-block {
            width: 50%
        }

        #footer .ft-blocks .ft-block:nth-child(n) {
            padding: 0 20px
        }
    }

    @media (max-width:599px) {
        #footer .mailing-list {
            padding: 30px 0
        }

        #footer .ft-blocks .ft-block {
            width: 100%;
            text-align: center;
            margin-bottom: 20px
        }

        #footer .ft-blocks .social {
            -webkit-box-pack: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center
        }

        #footer .cred nav {
            -webkit-flex-direction: column;
            -moz-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column
        }

        #footer .cred p {
            line-height: 15px
        }
    }

    html {
        padding-top: 120px
    }

    html.spaceless {
        padding-top: 0
    }

    #header {
        z-index: 8;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 90px;
        background: var(--background);
        /* border-bottom: 1px solid #e7e7e7 */
    }

    #logo,
    #nav {
        position: absolute
    }

    #logo {
        left: 0;
        width: 270.6px;
        height: 90.6px;
        top: 14.7px
    }

    #logo a,
    #logo svg,
    .block_awards .award-tile img,
    .block_featured-reporting .slideshow .slide .image img,
    .image-auto img,
    .tile .tile-image img,
    .topic-tile img {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%
    }

    #nav {
        right: 0;
        height: 48px;
        top: 36px
    }

    #social {
        position: fixed;
        top: 180px;
        left: 40px;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        -moz-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }

    #social a {
        display: block;
        width: 40px;
        height: 40px;
        margin-bottom: 2px;
        fill: #b21d1d
    }

    #social a:hover {
        fill: #712222
    }

    #social a i {
        position: relative;
        padding: 4px
    }

    #social a i,
    #social a svg {
        display: block;
        width: 100%;
        height: 100%
    }

    #navtoggle {
        display: none
    }

    @media (max-width:1150px) {
        html {
            padding-top: 90px
        }

        #header {
            height: 90px
        }

        #logo {
            width: 216.48px;
            height: 72.48px;
            top: 8.76px
        }

        #nav {
            height: 40px
        }

        #social {
            top: 120px;
            left: 10px
        }
    }

    @media (max-width:820px) {
        #social {
            left: 25px
        }
    }

    @media (max-width:599px) {
        html {
            padding-top: 70px
        }

        #header {
            height: 70px
        }

        #logo {
            width: 153.34px;
            height: 51.34px;
            top: 9.33px
        }

        #social {
            top: 70px;
            width: 100%;
            background: var(--green);
            border-bottom: 1px solid #ddd;
            transition: 250ms opacity;
            opacity: 0;
            left: 150%;
            -webkit-flex-direction: row;
            -moz-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center
        }

        #social.open {
            left: 0;
            opacity: 1
        }
    }

    @media (max-width:350px) {
        #logotext {
            display: none
        }
    }

    html.open {
        overflow-y: hidden
    }

    #nav,
    #nav ul {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    #nav {
        font-family: 'Function Pro', sans-serif
    }

    #nav a,
    #nav label {
        display: block;
        line-height: 48px
    }

    #nav ul {
        list-style: none
    }

    #nav li,
    #nav ul {
        margin: 0;
        padding: 0
    }

    #nav .level-one-ul {
        height: 84px
    }

    #nav #navtoggle,
    #nav .searchspecial {
        display: none
    }

    #nav .level-one-li,
    #nav .level-one-li>a,
    .topic-tile span {
        position: relative
    }

    #nav .level-one-li>a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 3px;
        background: #d92d26;
        transform: scale3d(0, 1, 1);
        transition: 200ms
    }

    #nav .level-two-ul {
        display: block;
        position: absolute;
        top: -9999px;
        left: -30px;
        background: #fff;
        width: 250px;
        padding: 10px 0;
        box-shadow: 0 3px 4px rgba(0, 0, 0, .2);
        transform: translate3d(0, -5px, 0);
        opacity: 0;
        transition: 200ms transform, 200ms opacity
    }

    @media (hover:hover) {
        #nav .level-one-li:hover .level-two-ul {
            top: 100%;
            transform: translate3d(0, 0, 0);
            opacity: 1
        }

        #nav .level-one-li:hover>a:after {
            transform: scale3d(1, 1, 1)
        }
    }

    @media (max-width:500px) {
        #nav .level-one-li:hover .level-two-ul {
            top: 0;
            transform: none;
            opacity: 1
        }

        #nav .level-one-li:hover>a:after {
            transform: none
        }
    }

    #nav .level-two-li,
    #nav .search i {
        width: 100%;
        position: relative
    }

    #nav .level-three-li .link,
    #nav .level-two-li .link {
        display: block;
        width: 100%;
        line-height: 20px;
        padding: 10px 30px;
        font-weight: 400
    }

    #nav .level-two-li .link:hover,
    #nav .level-two-li.arrow:hover .link.secondary {
        color: #fff;
        background: #f15e2f
    }

    #nav .level-two-li.arrow .link {
        padding: 10px 40px 10px 30px
    }

    #nav .level-two-li.arrow:after {
        display: block;
        position: absolute;
        content: "";
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-top: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-left: 5px solid #6a6765;
        transition: 150ms
    }

    #nav .level-two-li.arrow:hover:after {
        border-left: 4px solid #fff
    }

    #nav .level-three-ul {
        display: block;
        position: absolute;
        top: -1px;
        left: 250px;
        background: #fff;
        width: 250px;
        border: 1px solid rgba(0, 0, 0, .1);
        transform: translate3d(0, -5px, 0);
        opacity: 0;
        visibility: hidden;
        transition: 200ms transform, 200ms opacity
    }

    @media (hover:hover) {
        #nav .level-two-li:hover .level-three-ul {
            transform: translate3d(0, 0, 0);
            opacity: 1;
            visibility: visible
        }

        #nav .level-two-li:hover>a:after {
            transform: scale3d(1, 1, 1)
        }
    }

    @media (hover:none) {
        #nav .level-two-li:hover .level-three-ul {
            transform: none;
            opacity: 1;
            visibility: visible
        }

        #nav .level-two-li:hover>a:after {
            transform: none
        }
    }

    #nav .level-three-li {
        width: 100%
    }

    #nav .level-three-li .link:hover {
        color: #fff;
        background: #f15e2f
    }

    #nav .link,
    #nav .search {
        font-weight: 600;
        font-size: 16px;
        color: #1a1919;
        margin-right: 25px
    }

    #nav .search {
        color: #7f7f7f;
        fill: #7f7f7f
    }

    #nav .search i {
        top: 2px;
        display: inline-block;
        width: 14px;
        height: 14px
    }

    #nav .donate {
        background: var(--text);
        color: #fff;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 16px;
        margin-top: 60px;
        margin-left: -50px;
        padding: 10px 15px;
        height: 60px;
        width: 140px;
    }

    #nav .goback {
        background: var(--text);
        color: #fff;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 16px;
        margin-top: 60px;
        padding: 10px 15px;
        height: 60px;
        width: 140px;
    }

    @media (max-width:1250px) {
        #nav {
            -webkit-flex-wrap: wrap-reverse;
            -moz-flex-wrap: wrap-reverse;
            -ms-flex-wrap: wrap-reverse;
            flex-wrap: wrap-reverse;
            -webkit-box-pack: flex-end;
            -moz-box-pack: flex-end;
            -ms-flex-pack: end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end;
            max-width: 700px;
            top: 70px
        }

        #nav a,
        #nav label {
            line-height: 40px
        }

        #nav .link {
            margin-right: 20px;
            font-size: 15px
        }

        #nav .level-one-ul {
            height: 50px
        }

        #nav .donate {
            padding: 0 30px;
            margin-bottom: 10px;
            font-size: 15px
        }

        #nav .search {
            margin-right: 5px
        }
    }

    @media (max-width:1150px) {
        #nav {
            top: 49px
        }

        #nav .donate {
            height: 35px;
            line-height: 35px;
            margin-bottom: 5px
        }

        #nav .level-one-ul {
            height: 40px
        }

        #nav .level-two-ul {
            left: -20px
        }

        #nav .level-two-li .link {
            padding: 10px 20px
        }
    }

    @media (max-width:920px) {
        #nav {
            -webkit-flex-wrap: no-wrap;
            -moz-flex-wrap: no-wrap;
            -ms-flex-wrap: no-wrap;
            flex-wrap: no-wrap;
            -webkit-box-pack: flex-start;
            -moz-box-pack: flex-start;
            -ms-flex-pack: start;
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
            max-width: 350px;
            top: 25px
        }

        #nav #navtoggle {
            cursor: pointer;
            display: block;
            width: 40px;
            height: 40px;
            padding: 5px;
            margin-right: 10px;
            margin-left: 10px
        }

        #nav #navtoggle svg {
            width: 30px;
            height: 30px
        }

        #nav #navtoggle .x {
            display: none
        }

        #nav .donate {
            height: 40px;
            line-height: 40px;
            margin-bottom: 0
        }

        #nav .level-one-ul,
        #nav .primary-link-wrap {
            -webkit-flex-direction: column;
            -moz-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column
        }

        #nav .primary-link-wrap {
            position: fixed;
            -webkit-box-pack: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
            top: 90px;
            width: 100%;
            height: calc(100% - 90px);
            background: rgba(77, 63, 63, 0.95);
            transition: 250ms opacity;
            left: 100%;
            opacity: 0
        }

        #nav .level-one-ul {
            padding-left: 95px;
            height: 100%;
            overflow-y: scroll
        }

        #nav .level-one-li {
            border-left: 1px solid #ddd
        }

        #nav .level-one-li:not(:last-child) {
            border-bottom: 1px solid #ddd
        }

        #nav .level-one-li>a {
            padding: 0 0 0 15px
        }

        #nav .level-one-li>a:after {
            display: none !important
        }

        #nav .level-two-ul {
            opacity: 1;
            transform: none;
            top: 0;
            left: 0;
            width: 100%;
            position: relative;
            box-shadow: none;
            background: 0 0;
            padding: 0
        }

        #nav .level-two-ul:before {
            cursor: pointer;
            content: '';
            position: absolute;
            top: -40px;
            right: 0;
            width: 40px;
            height: 40px;
            display: block;
            background: url("data:image/svg+xml;utf8,<svg viewBox='0 0 1792 1792' xmlns='http://www.w3.org/2000/svg'><path fill='gray' d='M1683 808l-742 741q-19 19-45 19t-45-19l-742-741q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z'/></svg>");
            background-size: 30% 30%;
            background-position: center center;
            background-repeat: no-repeat
        }

        #nav .level-two-ul.subopen:before {
            transform: rotate(180deg)
        }

        #nav .level-two-li {
            height: 0;
            overflow: hidden
        }

        #nav .level-two-li>a {
            padding-left: 30px
        }

        #nav .level-two-li.arrow:after {
            display: none !important
        }

        #nav .subopen .level-three-li,
        #nav .subopen .level-two-li {
            border-top: 1px solid #ddd;
            height: auto
        }

        #nav .level-three-ul {
            opacity: 1;
            transform: none;
            top: 0;
            left: 0;
            width: 100%;
            position: relative;
            box-shadow: none;
            background: 0 0;
            visibility: visible;
            padding: 0
        }

        #nav .subopen .level-three-li .link {
            padding: 10px 40px
        }

        #nav .link {
            margin-right: 0
        }

        #nav.open #navtoggle .x {
            display: block
        }

        #nav.open #navtoggle .h {
            display: none
        }

        #nav.open .primary-link-wrap {
            opacity: 1;
            left: 0
        }
    }

    @media (max-width:599px) {
        #nav {
            top: 15px
        }

        #nav .search {
            display: none !important
        }

        #nav .searchspecial {
            display: block
        }

        #nav .primary-link-wrap {
            top: 113px;
            height: calc(100% - 113px)
        }

        #nav .level-one-ul {
            padding-left: 0
        }

        #nav .level-one-li {
            border-left: 0
        }
    }

    .image-auto,
    .popup-overlay-open {
        overflow: hidden
    }

    #popup-overlay {
        z-index: 2;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: fixed;
        background: rgba(255, 255, 255, .95);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 86px
    }

    #popup-content {
        max-height: 100%;
        overflow-y: auto
    }

    #popup-content .searchform {
        box-shadow: 0 0 20px rgba(0, 0, 0, .2)
    }

    .image-auto {
        position: relative;
        height: 0
    }

    .topic-tile-wrap {
        display: flex;
        flex-wrap: wrap
    }

    .topic-tile-wrap .topic-tile {
        margin: 0 4px 8px
    }

    .topic-tile {
        position: relative;
        width: calc(50% - 6px);
        margin-bottom: 12px
    }

    .topic-tile .img-wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        overflow: hidden;
        background: var(--background) bottom right;
        background-size: cover
    }

    .topic-tile .text,
    .topic-tile .text:before {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%
    }

    .topic-tile .text {
        display: flex;
        justify-content: flex-end;
        flex-direction: column;
        text-align: center;
        align-items: center
    }

    .topic-tile .text:before {
        z-index: 0;
        content: '';
        display: block;
        background: linear-gradient(to top, #01070f, transparent);
        opacity: 1;
        transition: 200ms
    }

    .topic-tile span {
        display: block;
        z-index: 2;
        font-family: 'Function Pro', sans-serif;
        font-weight: 600;
        color: #fff;
        line-height: 20px;
        padding: 5px
    }

    .topic-tile:hover .text:before {
        opacity: .5
    }

    .ctabutton {
        display: inline-block;
        padding: 15px 50px;
        line-height: 20px;
        /* background: #d92d26; */
        background-color: var(--background);
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 300ms
    }

    .ctabutton.orange {
        background: #f15e2f
    }

    .ctabutton:hover {
        background: #c32922
    }

    .ctabutton:hover.orange {
        background: #ef4c17
    }

    .email-signup-form {
        margin: 0 auto;
        width: 100%;
        max-width: 620px;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    .email-signup-form input {
        border: 0;
        margin: 0;
        -webkit-appearance: none;
        border-radius: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        height: 57px;
        padding: 0 15px
    }

    .email-signup-form [type=email] {
        width: 440px
    }

    .email-signup-form [type=submit] {
        width: 180px;
        background: #f15e2f;
        text-transform: uppercase;
        font-family: 'Function Pro', sans-serif;
        letter-spacing: 1.8px;
        color: #fff;
        font-weight: 700;
        font-size: 16px
    }

    @media (max-width:599px) {
        .email-signup-form input {
            height: 44px
        }

        .email-signup-form [type=submit] {
            font-size: 13px
        }
    }

    .fellow-wrap {
        display: flex;
        flex-wrap: wrap
    }

    .fellow-wrap .fellow-item {
        width: calc(20% - 10px);
        margin-right: 12.5px;
        margin-bottom: 15px;
        text-align: center
    }

    .fellow-wrap .fellow-item:nth-child(5n) {
        margin-right: 0
    }

    @media (max-width:1000px) {
        .fellow-wrap .fellow-item {
            width: calc(25% - 10px)
        }

        .fellow-wrap .fellow-item:nth-child(n) {
            margin-right: 13.33333333px
        }

        .fellow-wrap .fellow-item:nth-child(4n) {
            margin-right: 0
        }
    }

    @media (max-width:760px) {
        .fellow-wrap .fellow-item {
            width: calc(33.33% - 10px)
        }

        .fellow-wrap .fellow-item:nth-child(n) {
            margin-right: 15px
        }

        .fellow-wrap .fellow-item:nth-child(3n) {
            margin-right: 0
        }
    }

    @media (max-width:400px) {
        .fellow-wrap .fellow-item {
            width: calc(50% - 10px)
        }

        .fellow-wrap .fellow-item:nth-child(n) {
            margin-right: 20px
        }

        .fellow-wrap .fellow-item:nth-child(2n) {
            margin-right: 0
        }
    }

    .fellow-wrap .fellow-item .headshot {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 125%;
        overflow: hidden;
        margin-bottom: 5px;
        background: #d92d26 url(/wp-content/themes/nmc_iwmf/css/images/default-red.png) bottom right;
        background-size: cover
    }

    .fellow-wrap .fellow-item:nth-child(2n) .headshot {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/default-brick.png)
    }

    .fellow-wrap .fellow-item:nth-child(3n) .headshot {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/default-orange.png)
    }

    .fellow-wrap .fellow-item h6 {
        text-decoration: none;
        margin-bottom: 0
    }

    .filterset {
        margin-bottom: 30px
    }

    .filterset.active {
        margin-bottom: 0
    }

    .filterset .heading {
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    .filterset .heading input {
        height: 44px;
        width: 240px;
        padding: 0 10px
    }

    @media (max-width:760px) {
        .filterset .heading input {
            height: 40px
        }
    }

    @media (max-width:479px) {
        .filterset .heading {
            flex-wrap: wrap
        }

        .filterset .heading input {
            width: 100%;
            margin-bottom: 10px
        }
    }

    .filterset .filters {
        display: flex;
        flex-wrap: wrap;
        padding-top: 8px
    }

    @media (max-width:760px) {
        .filterset .filters {
            justify-content: flex-start
        }
    }

    .filterset .filters .filterbutton {
        order: 1;
        display: block;
        text-align: center;
        width: 20%;
        margin-left: 10px;
        height: 50px;
        line-height: 50px;
        font-family: 'Function Pro', sans-serif;
        background: #e7e7e7;
        font-weight: 600;
        font-size: 16px;
        fill: #1a1919
    }

    .filterset .filters .filterbutton svg {
        width: 12px;
        height: 12px
    }

    .filterset .filters .filterbutton.locations {
        padding: 0 20px;
        width: auto
    }

    @media (max-width:759px) {
        .filterset .filters .filterbutton.locations {
            padding: 0 10px
        }
    }

    .filterset .filters .filterbutton.all {
        background: #f15e2f;
        margin-left: 0;
        color: #fff;
        width: calc(20% - 40px)
    }

    .filterset .filters .filterbutton.active {
        background: #1a1919;
        color: #fff;
        fill: #fff
    }

    .filterset .filters .filterbutton.filter-resources {
        width: 17%
    }

    @media (max-width:960px) {
        .filterset .filters .filterbutton {
            font-size: 13px;
            font-weight: 400
        }

        .filterset .filters .filterbutton svg {
            width: 10px;
            height: 10px
        }
    }

    @media (max-width:760px) {
        .filterset .filters .filterbutton {
            height: 40px;
            line-height: 40px;
            width: auto !important;
            padding: 0 10px;
            margin-left: 0;
            margin-right: 10px;
            margin-bottom: 10px
        }
    }

    .filterset .filters .filterset {
        order: 2;
        display: none;
        background: #1a1919;
        padding: 30px;
        width: 100%;
        color: #fff;
        max-height: 470px;
        overflow-y: auto
    }

    .filterset .filters .filterset.active,
    .quote strong {
        display: block
    }

    @media (max-width:500px) {
        .filterset .filters .filterset {
            padding: 10px
        }
    }

    .filterset .filters .filterset h6 {
        color: #fff;
        margin-bottom: 5px
    }

    .filterset .filters .filterset .wrap:not(.full) {
        column-count: 3;
        column-gap: 20px
    }

    .filterset .filters .filterset .wrap.double {
        column-count: 2
    }

    .filterset .filters .filterset .topic-tile {
        width: calc(20% - 8px)
    }

    @media (max-width:960px) {
        .filterset .filters .filterset .topic-tile {
            width: calc(33.3% - 8px)
        }
    }

    @media (max-width:500px) {
        .filterset .filters .filterset .topic-tile {
            width: calc(50% - 8px)
        }
    }

    ul.filter__locations {
        list-style: none;
        margin: 0;
        padding: 0
    }

    @media (min-width:500px) {
        ul.filter__locations {
            display: flex;
            flex-wrap: wrap
        }
    }

    li.filter__location {
        line-height: 1.2;
        padding-right: 10px
    }

    @media (min-width:500px) and (max-width:679px) {
        li.filter__location {
            width: 50%
        }
    }

    @media (min-width:680px) and (max-width:959px) {
        li.filter__location {
            width: 33.33333333%
        }
    }

    @media (min-width:960px) {
        li.filter__location {
            width: 25%
        }
    }

    .intro {
        max-width: 700px;
        margin: 0 auto;
        text-align: center
    }

    .intro p {
        font-size: 16px;
        line-height: 1.5;
        color: #777
    }

    .dark .intro p {
        color: #aaa
    }

    @media (max-width:600px) {
        .intro {
            padding: 0 10px
        }

        .intro p {
            font-size: 15px;
            line-height: 1.4
        }
    }

    .imported-blog-image {
        max-width: 100%
    }

    .pagination {
        display: flex;
        justify-content: space-between;
        padding-top: 20px
    }

    .pagination .next {
        align-self: end;
        margin-left: auto
    }

    .quote {
        background: #1a1919;
        color: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        text-align: center;
        align-items: center;
        justify-content: center;
        padding: 30px
    }

    .quote blockquote:before {
        content: '“';
        display: block;
        margin: 0 auto 20px;
        color: #fff;
        font-size: 60px;
        line-height: 80px;
        height: 60px;
        width: 60px;
        font-weight: 700;
        border-radius: 100%;
        font-family: 'Source Sans', sans-serif
    }

    .quote blockquote {
        padding: 0;
        border: 0;
        color: rgba(255, 255, 255, .9);
        font-weight: 400;
        margin: 0 0 15px;
        font-family: 'Function Pro', sans-serif;
        line-height: 1.75
    }

    .quote cite {
        font-style: normal;
        line-height: 1.3
    }

    .quote strong:before {
        content: '-'
    }

    .quote span {
        color: rgba(255, 255, 255, .8);
        font-size: 90%;
        font-style: italic
    }

    .quote.large {
        background: #fff;
        color: #333
    }

    .quote.large blockquote {
        color: #333;
        font-size: 20px
    }

    .quote.large blockquote:before {
        background: #d92d26
    }

    .quote.large span {
        color: #555
    }

    @media (max-width:1000px) {
        .quote {
            padding: 20px
        }

        .quote blockquote:before {
            font-size: 48px;
            line-height: 65px;
            width: 50px;
            height: 50px
        }

        .quote blockquote {
            line-height: 1.5
        }

        .quote.large blockquote {
            font-size: 18px
        }
    }

    @media (max-width:900px) {
        .quote.large blockquote {
            font-size: 15px
        }
    }

    @media (max-width:760px) {

        .quote blockquote,
        .quote.large blockquote {
            font-size: 14px;
            line-height: 1.3
        }

        .quote blockquote:before {
            font-size: 32px;
            line-height: 42px;
            width: 30px;
            height: 30px;
            margin-bottom: 10px
        }
    }

    .tile {
        position: relative
    }

    .tile .tile-image {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        overflow: hidden;
        background: var(--background) url(/wp-content/themes/nmc_iwmf/css/images/default-red.png) bottom right;
        background-size: cover;
    }

    .tile:nth-child(2n) .tile-image {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/default-brick.png)
    }

    .tile:nth-child(3n) .tile-image {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/default-orange.png)
    }

    .tile.post .tile-image {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
        overflow: hidden
    }

    .tile.square .text {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, .3);
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center
    }

    .tile.square .centered {
        position: relative;
        padding: 0 40px
    }

    @media (max-width:900px) {
        .tile.square .centered {
            padding: 0 20px
        }
    }

    @media (max-width:480px) {
        .tile.square .centered {
            padding: 0 5px
        }
    }

    .tile.square .centered:after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: 50%;
        width: 70px;
        margin-left: -35px;
        height: 4px;
        background: #d92d26
    }

    @media (max-width:900px) {
        .tile.square .centered:after {
            bottom: -10px
        }
    }

    @media (max-width:480px) {
        .tile.square .centered:after {
            bottom: 0
        }
    }

    .tile.square h4 {
        position: relative;
        color: #fff;
        margin-bottom: 10px
    }

    @media (max-width:1150px) {
        .tile.square h4 {
            font-size: 24px
        }
    }

    @media (max-width:760px) {
        .tile.square h4 {
            font-size: 18px;
            padding: 0 10px
        }
    }

    @media (max-width:480px) {
        .tile.square h4 {
            font-size: 15px;
            line-height: 17px
        }
    }

    .tile.square p {
        color: #fff;
        line-height: 1.4;
        margin-bottom: 0
    }

    @media (max-width:760px) {
        .tile.square p {
            display: none
        }
    }

    .tile.square.i2 .centered:after,
    .tile.square:nth-child(2n) .centered:after {
        /* background: #7b2a31 */
        background: var(--background);
    }

    .block_awards .award-tile:nth-child(2n) .text h5:after,
    .tile.square.i3 .centered:after,
    .tile.square:nth-child(3n) .centered:after {
        background: #f15e2f
    }

    .tile.square a .text {
        transition: 500ms
    }

    .tile.person a h4,
    .tile.square a .centered {
        transition: 500ms;
        transform: translate3d(0, 0, 0)
    }

    .tile.person a .text:after,
    .tile.square a .centered:after {
        transition: 500ms;
        transform: scaleX(1)
    }

    .tile.square a:hover .text {
        background: rgba(0, 0, 0, .5)
    }

    .tile.square a:hover .centered {
        transform: translate3d(0, -4px, 0)
    }

    .tile.person a:hover .text:after,
    .tile.square a:hover .centered:after {
        transform: scaleX(1.2)
    }

    .tile.story {
        margin-bottom: 50px;
        border-bottom: 4px solid #d92d26
    }

    .tile.story .post-excerpt {
        order: 3
    }

    .tile.story .tile-image {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
        overflow: hidden
    }

    .tile.story:nth-child(2n) {
        border-bottom-color: #7b2a31
    }

    .tile.story:nth-child(3n) {
        border-bottom-color: #f15e2f
    }

    .tile.story .text {
        display: flex;
        flex-direction: column;
        padding: 30px 3px;
        color: #777
    }

    .tile.story.page .text {
        padding-top: 0
    }

    .tile.story h4 {
        order: 1;
        font-size: 24px;
        margin-bottom: 10px
    }

    .tile.story .meta {
        order: 2;
        margin-bottom: 8px;
        font-size: 13px
    }

    .tile.story .meta span {
        color: #d92d26;
        font-weight: 600
    }

    .tile.story p {
        order: 3;
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 0
    }

    .tile.person {
        padding-bottom: 20px
    }

    .tile.person .tile-image {
        margin-bottom: 20px
    }

    .tile.person .text {
        text-align: center;
        position: relative;
        padding-bottom: 20px
    }

    .tile.person .text:after {
        content: '';
        display: block;
        position: absolute;
        bottom: 0;
        left: 50%;
        margin-left: -35px;
        height: 4px;
        width: 70px;
        /* background: #d92d26 */
        background: var(--background);

    }

    .tile.board .text h4,
    .tile.person h4 {
        font-weight: 600;
        font-size: 24px;
        margin-bottom: 0
    }

    .tile.person a:hover h4 {
        transform: translate3d(0, -3px, 0)
    }

    @media (max-width:760px) {
        .tile.person {
            padding-bottom: 5px
        }

        .tile.person .tile-image {
            margin-bottom: 10px
        }

        .tile.person .text {
            padding-bottom: 15px
        }

        .tile.person h4 {
            font-size: 17px
        }
    }

    .tile.board {
        padding-bottom: 30px
    }

    .tile.board .headshot {
        max-width: 265px;
        margin: 0 auto 20px;
        background: #d92d26 url(/wp-content/themes/nmc_iwmf/css/images/default-red.png) bottom right;
        background-size: cover
    }

    .tile.board .text {
        text-align: center
    }

    .tile.board .text h4 {
        margin-bottom: 5px
    }

    .tile.board .text h6 {
        color: #999;
        text-transform: none
    }

    .tile.board .text h6 span:nth-child(2):before {
        content: ' | '
    }

    .tile-wrap {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-wrap: wrap;
        -moz-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center
    }

    .tile-wrap .tile {
        width: calc(33.33% - 20px);
        margin: 0 15px 30px 0
    }

    .tile-wrap .tile:nth-child(3n-1) {
        margin: 0 15px 30px
    }

    .tile-wrap .tile:nth-child(3n-0) {
        margin: 0 0 30px 15px
    }

    @media (max-width:960px) {
        .tile-wrap .tile {
            width: calc(33.33% - 15px);
            margin: 0 10px 20px 0
        }

        .tile-wrap .tile:nth-child(3n-1) {
            margin: 0 10px 20px
        }

        .tile-wrap .tile:nth-child(3n-0) {
            margin: 0 0 20px 10px
        }
    }

    @media (max-width:600px) {
        .tile-wrap .tile {
            width: calc(33.33% - 10px);
            margin: 0 5px 15px 0
        }

        .tile-wrap .tile:nth-child(3n-1) {
            margin: 0 5px 15px
        }

        .tile-wrap .tile:nth-child(3n-0) {
            margin: 0 0 15px 5px
        }
    }

    @media (max-width:350px) {
        .tile-wrap .tile {
            width: 100%
        }
    }

    .tile-wrap .tile.story {
        margin-bottom: 50px
    }

    @media (max-width:760px) {
        .tile-wrap .tile.story {
            width: calc(50% - 10px);
            margin-bottom: 30px
        }
    }

    @media (max-width:450px) {
        .tile-wrap .tile.story {
            width: 100%
        }
    }

    .accordion {
        display: grid;
        align-self: flex-start;
        gap: 10px
    }

    .accordion .accordion__item {
        border-radius: 10px;
        background-color: #faf2df
    }

    .accordion .accordion__item-title {
        margin: 0;
        font-family: 'Function Pro', sans-serif;
        font-size: 18px;
        font-weight: 700
    }

    .accordion .accordion__item-title button {
        all: inherit;
        border: 0;
        padding: 25px 20px;
        width: 100%;
        display: flex;
        align-items: center;
        cursor: pointer;
        gap: 20px
    }

    .accordion .accordion__item-title button svg {
        height: 1.5em;
        width: 1.5em;
        fill: #c6302b
    }

    .accordion .accordion__item-title button:focus svg {
        outline: 2px solid
    }

    .accordion .accordion__item-title [aria-expanded=true] .vert {
        display: none
    }

    .accordion .accordion__item-content {
        padding: 0 20px 35px
    }

    .brick-intro {
        position: relative;
        padding-top: 200px;
        background: #3b2129
    }

    .brick-intro .section-left {
        position: absolute;
        left: 0;
        top: 100px
    }

    .brick-intro .section-right {
        position: absolute;
        right: 0;
        top: 25px
    }

    .brick-intro .intro-content_title {
        margin: 0;
        font-size: 5.375rem;
        font-weight: 700;
        color: #ddd646;
        text-align: center
    }

    .brick-intro .intro-content_title:after {
        content: '';
        display: block;
        margin: 50px auto;
        width: 120px;
        height: 7px;
        background: #c6302b
    }

    .brick-intro .intro-content_description {
        margin: 0 auto;
        max-width: 650px;
        font-family: 'Function Pro', sans-serif;
        font-size: 1.5rem;
        line-height: 1.83333333;
        color: #fff;
        text-align: center
    }

    .brick-intro .intro-content_description.v2 {
        max-width: 435px
    }

    .brick-intro .intro-content_graphic {
        margin: 50px auto 1em;
        max-width: 470px
    }

    @media (max-width:1180px) {
        .brick-intro .section-left {
            top: 8.47457627vw;
            width: 24.15254237vw;
            height: auto
        }

        .brick-intro .section-right {
            top: 2.11864407vw;
            width: 25.08474576vw;
            height: auto
        }
    }

    @media (max-width:900px) {
        .brick-intro {
            padding-top: 100px
        }

        .brick-intro .intro-content_title {
            font-size: 3.75rem
        }
    }

    @media (max-width:600px) {
        .brick-intro {
            padding-top: 50px
        }

        .brick-intro .intro-content_title {
            font-size: 3rem
        }

        .brick-intro .intro-content_description {
            font-size: 1.125rem
        }
    }

    .block {
        margin-bottom: 50px;
        animation: 500ms fadeInDown both
    }

    @media (max-width:960px) {
        .block {
            margin-bottom: 35px
        }
    }

    @media (max-width:760px) {
        .block {
            margin-bottom: 20px
        }
    }

    .block:first-child {
        margin-top: 60px
    }

    @media (max-width:960px) {
        .block:first-child {
            margin-top: 30px
        }
    }

    .block:first-child.first-no-pad {
        margin-top: 0
    }

    .block:last-child.last-no-pad,
    .ir-2021-block--blockquote .blockquote-wrap.style-background .blockquote p:last-child {
        margin-bottom: 0
    }

    .block:nth-child(1) {
        animation-delay: 0ms
    }

    .block:nth-child(2) {
        animation-delay: 120ms
    }

    .block:nth-child(3) {
        animation-delay: 240ms
    }

    .block:nth-child(4) {
        animation-delay: 360ms
    }

    .block:nth-child(5) {
        animation-delay: 480ms
    }

    .block:nth-child(6) {
        animation-delay: 600ms
    }

    .block:nth-child(7) {
        animation-delay: 720ms
    }

    .block:nth-child(8) {
        animation-delay: 840ms
    }

    .block:nth-child(9) {
        animation-delay: 960ms
    }

    .block_awards .award-tiles {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap
    }

    .block_awards .award-tile {
        position: relative;
        display: block;
        width: calc(33.33% - 12px)
    }

    .block_awards .award-tile .image {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        overflow: hidden
    }

    .block_awards .award-tile .text {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, .3);
        font-weight: 700;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center
    }

    .block_awards .award-tile .text h5 {
        position: relative;
        font-size: 30px;
        padding: 0 40px;
        color: #fff;
        margin-bottom: 0
    }

    .block_awards .award-tile .text h5:after {
        content: '';
        position: absolute;
        display: block;
        bottom: -15px;
        left: 50%;
        width: 70px;
        margin-top: -5px;
        margin-left: -35px;
        height: 4px;
        background: #d92d26
    }

    .block_awards .award-tile:nth-child(3n) .text h5:after {
        background: #7b2a31
    }

    .block_community .cta {
        text-align: center;
        padding: 20px 0 0
    }

    .block_community .people-quotes {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between
    }

    .block_community .people-quotes.people-quotes__center {
        justify-content: center
    }

    .block_community .people-quotes.people-quotes__center .slot:not(:last-child) {
        margin-right: 25px
    }

    .block_community .people-quotes .slot {
        width: calc(25% - 20px);
        margin-bottom: 20px
    }

    .block_community .people-quotes .slot:nth-child(1) {
        order: 1
    }

    .block_community .people-quotes .slot:nth-child(2) {
        order: 2
    }

    .block_community .people-quotes .slot:nth-child(3) {
        order: 5
    }

    .block_community .people-quotes .slot:nth-child(4) {
        order: 6
    }

    .block_community .people-quotes .slot:nth-child(5) {
        order: 3
    }

    .block_community .people-quotes .slot:nth-child(6) {
        order: 4
    }

    .block_community .people-quotes .slot-quote {
        width: calc(50% - 13px)
    }

    .block_community .people-quotes .slot-quote:nth-child(5) .quote {
        background: #f15e2f
    }

    @media (max-width:1000px) {
        .block_community .people-quotes .slot {
            width: calc(25% - 10px)
        }

        .block_community .people-quotes .slot-quote {
            width: calc(50% - 7px)
        }
    }

    @media (max-width:760px) {
        .block_community .people-quotes.people-quotes__center .slot:not(:last-child) {
            margin-right: 0
        }

        .block_community .people-quotes .slot {
            width: calc(50% - 10px)
        }

        .block_community .people-quotes .slot-quote {
            width: 100%
        }

        .block_community .people-quotes .slot:nth-child(1) {
            order: 1
        }

        .block_community .people-quotes .slot:nth-child(2) {
            order: 2
        }

        .block_community .people-quotes .slot:nth-child(3) {
            order: 4
        }

        .block_community .people-quotes .slot:nth-child(4) {
            order: 5
        }

        .block_community .people-quotes .slot:nth-child(5) {
            order: 3
        }

        .block_community .people-quotes .slot:nth-child(6) {
            order: 6
        }
    }

    .faq-wrap .pair {
        padding-bottom: 20px;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd
    }

    .faq-wrap .q {
        margin-bottom: 0
    }

    .block_featured-reporting .slideshow {
        position: relative;
        overflow: hidden;
        visibility: hidden
    }

    .block_featured-reporting .slideshow .swipe-wrap {
        position: relative;
        overflow: hidden
    }

    .block_featured-reporting .slideshow .slide {
        position: relative;
        float: left;
        width: 100%;
        display: flex;
        flex-wrap: wrap
    }

    .block_featured-reporting .slideshow .slide .image {
        position: relative;
        width: 60%;
        height: 0;
        padding-bottom: 41.25%;
        overflow: hidden
    }

    @media (max-width:550px) {
        .block_featured-reporting .slideshow .slide .image {
            position: relative;
            width: 50%;
            height: 0;
            padding-bottom: 34.375%;
            overflow: hidden
        }
    }

    .block_featured-reporting .slideshow .slide .text {
        position: relative;
        width: 40%;
        background: #1a1919
    }

    @media (max-width:550px) {
        .block_featured-reporting .slideshow .slide .text {
            width: 50%
        }
    }

    .block_featured-reporting .slideshow .slide .text>a {
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: calc(100% - 80px);
        padding: 0 60px
    }

    @media (max-width:1350px) {
        .block_featured-reporting .slideshow .slide .text>a {
            padding: 0 25px;
            height: calc(100% - 60px)
        }
    }

    @media (max-width:900px) {
        .block_featured-reporting .slideshow .slide .text>a {
            padding: 0 15px;
            height: calc(100% - 40px)
        }
    }

    @media (max-width:550px) {
        .block_featured-reporting .slideshow .slide .text>a {
            height: 100%
        }
    }

    .block_featured-reporting .slideshow .slide .text>a h6 {
        font-size: 14px;
        letter-spacing: 2px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px
    }

    @media (max-width:900px) {
        .block_featured-reporting .slideshow .slide .text>a h6 {
            font-weight: 400;
            font-size: 13px
        }
    }

    @media (max-width:760px) {
        .block_featured-reporting .slideshow .slide .text>a h6 {
            display: none
        }
    }

    .block_featured-reporting .slideshow .slide .text>a h3 {
        color: #fff;
        margin-bottom: 10px;
        font-size: 40px;
        line-height: 1.1;
        font-weight: 400
    }

    @media (max-width:1400px) {
        .block_featured-reporting .slideshow .slide .text>a h3 {
            font-size: 30px
        }
    }

    @media (max-width:1250px) {
        .block_featured-reporting .slideshow .slide .text>a h3 {
            font-size: 25px
        }
    }

    @media (max-width:900px) {
        .block_featured-reporting .slideshow .slide .text>a h3 {
            font-size: 22px
        }
    }

    @media (max-width:760px) {
        .block_featured-reporting .slideshow .slide .text>a h3 {
            font-size: 18px
        }
    }

    @media (max-width:550px) {
        .block_featured-reporting .slideshow .slide .text>a h3 {
            font-size: 16px
        }
    }

    .block_featured-reporting .slideshow .slide .text>a .meta {
        color: #ccc;
        font-size: 13px;
        margin-bottom: 10px
    }

    @media (max-width:1100px) {
        .block_featured-reporting .slideshow .slide .text>a .meta {
            margin-bottom: 0
        }
    }

    @media (max-width:550px) {
        .block_featured-reporting .slideshow .slide .text>a .meta {
            display: none
        }
    }

    .block_featured-reporting .slideshow .slide .text>a p {
        margin-bottom: 0;
        font-size: 16px;
        color: #ddd;
        line-height: 26px
    }

    @media (max-width:1250px) {
        .block_featured-reporting .slideshow .slide .text>a p {
            font-size: 15px;
            line-height: 22px
        }
    }

    @media (max-width:1100px) {
        .block_featured-reporting .slideshow .slide .text>a p {
            display: none
        }
    }

    .block_featured-reporting .slideshow .slide .text nav {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px;
        border-top: 1px solid #666;
        display: flex;
        justify-content: center
    }

    .block_featured-reporting .slideshow .slide .text nav a {
        display: block;
        width: 50%;
        height: 80px;
        cursor: pointer;
        text-align: center
    }

    .block_featured-reporting .slideshow .slide .text nav a:first-child {
        border-right: 1px solid #666
    }

    .block_featured-reporting .slideshow .slide .text nav a svg {
        position: relative;
        top: 24px;
        display: inline-block;
        width: 30px;
        height: 30px;
        fill: #fff
    }

    @media (max-width:1350px) {

        .block_featured-reporting .slideshow .slide .text nav,
        .block_featured-reporting .slideshow .slide .text nav a {
            height: 60px
        }

        .block_featured-reporting .slideshow .slide .text nav a svg {
            width: 20px;
            height: 20px;
            top: 20px
        }
    }

    @media (max-width:900px) {

        .block_featured-reporting .slideshow .slide .text nav,
        .block_featured-reporting .slideshow .slide .text nav a {
            height: 40px
        }

        .block_featured-reporting .slideshow .slide .text nav a svg {
            width: 16px;
            height: 16px;
            top: 8px
        }
    }

    @media (max-width:550px) {
        .block_featured-reporting .slideshow .slide .text nav {
            display: none
        }
    }

    .block_grid-links .grid-wrap {
        display: flex;
        justify-content: space-between
    }

    .block_grid-links .grid-wrap .left,
    .block_grid-links .grid-wrap .right {
        width: calc(50% - 15px)
    }

    @media (max-width:900px) {

        .block_grid-links .grid-wrap .left,
        .block_grid-links .grid-wrap .right {
            width: calc(50% - 10px)
        }
    }

    @media (max-width:600px) {

        .block_grid-links .grid-wrap .left,
        .block_grid-links .grid-wrap .right {
            width: calc(50% - 6px)
        }
    }

    .block_grid-links .grid-wrap .right {
        display: flex;
        flex-direction: column;
        justify-content: space-between
    }

    .block_grid-links .grid-wrap .grid-tile,
    .block_grid-links .grid-wrap .grid-tile.big {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 50%;
        overflow: hidden
    }

    .block_grid-links .grid-wrap .grid-tile.big {
        padding-bottom: 100%
    }

    .block_grid-links .grid-wrap .grid-tile:not(.big):after {
        content: '';
        display: block;
        position: absolute;
        left: 0;
        height: 15px;
        width: 100%;
        background: #fff
    }

    @media (max-width:900px) {
        .block_grid-links .grid-wrap .grid-tile:not(.big):after {
            height: 10px
        }
    }

    @media (max-width:600px) {
        .block_grid-links .grid-wrap .grid-tile:not(.big):after {
            height: 6px
        }
    }

    .block_grid-links .grid-wrap .grid-tile:not(.big):first-child:after {
        bottom: 0
    }

    .block_grid-links .grid-wrap .grid-tile:not(.big):first-child .text h4 {
        margin: 0 0 15px
    }

    @media (max-width:900px) {
        .block_grid-links .grid-wrap .grid-tile:not(.big):first-child .text h4 {
            margin: 0 0 10px
        }
    }

    @media (max-width:600px) {
        .block_grid-links .grid-wrap .grid-tile:not(.big):first-child .text h4 {
            margin: 0 0 6px
        }
    }

    .block_grid-links .grid-wrap .grid-tile:not(.big):last-child:after {
        top: 0
    }

    .block_grid-links .grid-wrap .grid-tile:not(.big):last-child .text h4 {
        margin: 15px 0 0
    }

    @media (max-width:900px) {
        .block_grid-links .grid-wrap .grid-tile:not(.big):last-child .text h4 {
            margin: 10px 0 0
        }
    }

    @media (max-width:600px) {
        .block_grid-links .grid-wrap .grid-tile:not(.big):last-child .text h4 {
            margin: 6px 0 0
        }
    }

    .block_grid-links .grid-wrap .grid-tile .image,
    .block_grid-links .grid-wrap .grid-tile .text,
    .block_grid-links .grid-wrap .grid-tile img,
    .block_image-cta .image-cta-image:after {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%
    }

    .block_grid-links .grid-wrap .grid-tile a img {
        transition: 5s
    }

    .block_grid-links .grid-wrap .grid-tile a .text,
    .block_grid-links .grid-wrap .grid-tile a h4,
    .block_grid-links .grid-wrap .grid-tile a p {
        transition: 500ms
    }

    .block_grid-links .grid-wrap .grid-tile a:hover img {
        transform: scale(1.02)
    }

    .block_grid-links .grid-wrap .grid-tile a:hover .text {
        background: rgba(0, 0, 0, .5)
    }

    .block_grid-links .grid-wrap .grid-tile a:hover h4,
    .block_grid-links .grid-wrap .grid-tile a:hover p {
        transform: translate3d(0, -4px, 0)
    }

    .block_grid-links .grid-wrap .grid-tile .text {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        background: rgba(0, 0, 0, .3);
        padding: 0 30px
    }

    .block_grid-links .grid-wrap .grid-tile .text h4 {
        text-transform: uppercase;
        color: #fff;
        font-weight: 600;
        letter-spacing: 2px;
        margin-bottom: 15px
    }

    @media (max-width:900px) {
        .block_grid-links .grid-wrap .grid-tile .text {
            padding: 0 10px
        }

        .block_grid-links .grid-wrap .grid-tile .text h4 {
            font-size: 20px;
            margin-bottom: 8px
        }

        .block_grid-links .grid-wrap .grid-tile .text p {
            line-height: 1.3
        }
    }

    @media (max-width:600px) {
        .block_grid-links .grid-wrap .grid-tile .text h4 {
            font-size: 17px
        }

        .block_grid-links .grid-wrap .grid-tile .text p {
            display: none
        }
    }

    @media (max-width:350px) {
        .block_grid-links .grid-wrap .grid-tile .text h4 {
            font-size: 15px
        }
    }

    .block_homepage-masthead .notice {
        background: #1a1919;
        color: #fff;
        text-align: center;
        line-height: 60px;
        padding: 25px;
        font-weight: 300;
        margin-bottom: 0
    }

    .block_homepage-masthead .slideshow .slide .image,
    .block_homepage-masthead .slideshow-wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 42.85714286%;
        overflow: hidden
    }

    .block_homepage-masthead .slideshow {
        position: relative;
        overflow: hidden;
        visibility: hidden
    }

    .block_homepage-masthead .slideshow .swipe-wrap {
        position: relative;
        overflow: hidden
    }

    .block_homepage-masthead .slideshow .slide {
        position: relative;
        float: left;
        width: 100%
    }

    .block_homepage-masthead .slideshow .slide .image {
        background: #1a1919
    }

    .block_homepage-masthead .slideshow .slide .image img {
        display: block;
        margin-bottom: 0;
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        opacity: .6;
        transition: 8000ms linear;
        transform: scale(1)
    }

    .block_homepage-masthead .slideshow .slide.active .image img {
        transform: scale(1.07)
    }

    .block_homepage-masthead .slideshow .text {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #fff;
        text-align: center
    }

    .block_homepage-masthead .slideshow .text h2 {
        font-size: 60px;
        color: #fff
    }

    .block_homepage-masthead .slideshow .text p {
        font-family: 'Function Pro', sans-serif;
        font-weight: 600;
        font-size: 18px;
        opacity: .8
    }

    .block_homepage-masthead .slideshow .direct a span,
    .block_homepage-masthead .slideshow .text .button {
        position: relative;
        display: block;
        font-family: 'Function Pro', sans-serif;
        text-transform: uppercase;
        letter-spacing: 2px
    }

    .block_homepage-masthead .slideshow .text .button {
        border: 2px solid #fff;
        height: 50px;
        line-height: 50px;
        font-size: 17px;
        padding: 0 20px;
        overflow: hidden
    }

    .block_homepage-masthead .slideshow .text .button:before {
        transition: 300ms;
        transform: translate3d(-105%, 0, 0)
    }

    .block_grid-links .grid-wrap .grid-tile a h4,
    .block_grid-links .grid-wrap .grid-tile a p,
    .block_homepage-masthead .slideshow .text .button:hover:before {
        transform: translate3d(0, 0, 0)
    }

    .block_homepage-masthead .slideshow .text .button span {
        position: relative;
        z-index: 2
    }

    .block_homepage-masthead .slideshow .text .button svg {
        position: relative;
        top: 1px;
        fill: #fff;
        width: 14px;
        height: 14px;
        transform: translate3d(0, 0, 0);
        transition: 200ms
    }

    .block_homepage-masthead .slideshow .text .button:hover svg {
        transform: translate3d(2px, 0, 0)
    }

    .block_homepage-masthead .slideshow .direct {
        display: flex;
        justify-content: space-between;
        padding-top: 16px
    }

    .block_homepage-masthead .slideshow .direct a {
        position: relative;
        display: flex;
        width: calc(25% - 12px);
        text-align: center;
        background-size: cover;
        background-position: center center;
        height: 110px;
        padding: 25px;
        cursor: pointer;
        align-items: center;
        justify-content: center
    }

    .block_homepage-masthead .slideshow .direct a span {
        z-index: 2;
        text-align: center;
        line-height: 20px;
        color: #fff;
        font-weight: 600;
        font-size: 18px;
        transition: 250ms;
        transform: translate3d(0, 0, 0)
    }

    .block_homepage-masthead .slideshow .direct a:before,
    .block_homepage-masthead .slideshow .text .button:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, .3)
    }

    .block_homepage-masthead .slideshow .direct a:after {
        transition: 300ms;
        content: '';
        z-index: 1;
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%
    }

    .block_homepage-masthead .slideshow .direct a:hover span {
        transform: translate3d(0, -2px, 0)
    }

    .block_homepage-masthead .slideshow .direct a.active:after {
        background: linear-gradient(to right, #f15e2f, rgba(241, 94, 47, 0))
    }

    @media (max-width:1350px) {
        .block_homepage-masthead .notice {
            padding: 20px;
            line-height: 36px
        }

        .block_homepage-masthead .slideshow .text h2 {
            font-size: 48px
        }

        .block_homepage-masthead .slideshow .direct a {
            padding: 10px;
            height: 80px
        }

        .block_homepage-masthead .slideshow .direct a span {
            font-size: 15px;
            letter-spacing: 1.5px
        }
    }

    @media (max-width:1100px) {
        .block_homepage-masthead .notice {
            font-size: 25px
        }

        .block_homepage-masthead .slideshow .text h2 {
            font-size: 36px;
            margin-bottom: 10px
        }

        .block_homepage-masthead .slideshow .text p {
            margin-bottom: 10px;
            line-height: 1.3
        }
    }

    @media (max-width:900px) {
        .block_homepage-masthead .notice {
            padding: 15px;
            line-height: 30px;
            font-size: 20px
        }

        .block_homepage-masthead .slideshow .direct {
            padding-top: 12px;
            flex-wrap: wrap
        }

        .block_homepage-masthead .slideshow .direct a {
            width: calc(50% - 6px)
        }

        .block_homepage-masthead .slideshow .direct a:nth-child(1),
        .block_homepage-masthead .slideshow .direct a:nth-child(2) {
            margin-bottom: 12px
        }
    }

    @media (max-width:760px) {
        .block_homepage-masthead .notice {
            padding: 10px 15px;
            font-size: 16px;
            line-height: 22px
        }

        .block_homepage-masthead .slideshow .text {
            padding: 0 15px
        }

        .block_homepage-masthead .slideshow .text h2 {
            font-size: 25px;
            margin-bottom: 8px
        }

        .block_homepage-masthead .slideshow .text p {
            margin-bottom: 8px
        }
    }

    @media (max-width:500px) {
        .block_homepage-masthead .slideshow .text h2 {
            font-size: 20px
        }

        .block_homepage-masthead .slideshow .text p {
            font-size: 13px
        }

        .block_homepage-masthead .slideshow .text .button {
            line-height: 36px;
            height: 40px;
            text-transform: none;
            letter-spacing: 1px
        }
    }

    .block_image-and-quote .iaq-wrap {
        display: flex
    }

    .block_image-and-quote .image-side,
    .block_image-and-quote .quote-side {
        width: 50%
    }

    @media (max-width:1000px) {
        .block_image-and-quote .bound-none {
            max-width: 770px
        }

        .block_image-and-quote .iaq-wrap {
            flex-wrap: wrap
        }

        .block_image-and-quote .image-side,
        .block_image-and-quote .quote-side {
            width: 100%
        }
    }

    .block_image-cta {
        position: relative
    }

    .block_image-cta .image-cta-image:after {
        content: '';
        display: block
    }

    .block_image-cta.dark .image-cta-image:after {
        background: rgba(0, 0, 0, .3)
    }

    .block_image-cta.dark .intro p {
        color: #eee
    }

    .block_image-cta.light .intro p {
        color: #222
    }

    .block_image-cta.light .image-cta-image:after {
        background: rgba(255, 255, 255, .4)
    }

    .block_image-cta .text {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .block_image-cta .ctas {
        text-align: center
    }

    @media (max-width:760px) {
        .block_image-cta .text {
            position: relative;
            padding: 10px 0
        }

        .block_image-cta.dark .text {
            background: #111
        }
    }

    .block_image-cta-double .bound-none {
        display: flex
    }

    .block_image-cta-double .side {
        position: relative;
        width: 50%
    }

    .block_image-cta-double .image-cta-image {
        position: relative
    }

    .block_image-cta-double .text {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        display: flex;
        text-align: center;
        flex-direction: column;
        justify-content: center;
        align-items: center
    }

    .block_image-cta-double .text.dark {
        background: rgba(0, 0, 0, .3)
    }

    .block_image-cta-double .text.light {
        background: rgba(240, 240, 240, .3)
    }

    @media (max-width:1000px) {
        .block_image-cta-double .bound-none {
            max-width: 770px;
            flex-wrap: wrap
        }

        .block_image-cta-double .side {
            width: 100%
        }

        .block_image-cta-double .side:first-child {
            margin-bottom: 10px
        }
    }

    .image-row-wrap {
        overflow: hidden
    }

    .image-row-wrap .image-row-item {
        position: relative;
        float: left
    }

    .image-row-wrap .image-row-item:after,
    .image-row-wrap .image-row-item:before {
        z-index: 2;
        content: '';
        display: block;
        position: absolute;
        height: 100%;
        top: 0;
        background: #fff
    }

    .image-row-wrap .image-row-item:before {
        left: 0
    }

    .image-row-wrap .image-row-item:after {
        right: 0
    }

    .image-row-wrap .image-row-item:first-child:before {
        display: none
    }

    .image-row-wrap .image-row-item:last-child:after {
        display: none
    }

    .image-row-wrap .image-row-item:last-child .share-image {
        right: 0
    }

    .image-row-wrap .image-row-item:after,
    .image-row-wrap .image-row-item:before {
        width: 15px
    }

    .image-row-wrap .image-row-item:first-child img {
        left: -15px
    }

    .image-row-wrap .image-row-item:last-child img {
        left: 15px
    }

    .image-row-wrap .image-row-item:not(:last-child) .credit {
        right: 15px
    }

    .image-row-wrap .image-row-item .share-image {
        right: 15px
    }

    @media (max-width:960px) {

        .image-row-wrap .image-row-item:after,
        .image-row-wrap .image-row-item:before {
            width: 10px
        }

        .image-row-wrap .image-row-item:first-child img {
            left: -10px
        }

        .image-row-wrap .image-row-item:last-child img {
            left: 10px
        }

        .image-row-wrap .image-row-item:not(:last-child) .credit {
            right: 10px
        }

        .image-row-wrap .image-row-item .share-image {
            right: 10px
        }
    }

    @media (max-width:479px) {

        .image-row-wrap .image-row-item:after,
        .image-row-wrap .image-row-item:before {
            width: 7.5px
        }

        .image-row-wrap .image-row-item:first-child img {
            left: -7.5px
        }

        .image-row-wrap .image-row-item:last-child img {
            left: 7.5px
        }

        .image-row-wrap .image-row-item:not(:last-child) .credit {
            right: 7.5px
        }

        .image-row-wrap .image-row-item .share-image {
            right: 7.5px
        }
    }

    @media (max-width:349px) {

        .image-row-wrap .image-row-item:after,
        .image-row-wrap .image-row-item:before {
            width: 5px
        }

        .image-row-wrap .image-row-item:first-child img {
            left: -5px
        }

        .image-row-wrap .image-row-item:last-child img {
            left: 5px
        }

        .image-row-wrap .image-row-item:not(:last-child) .credit {
            right: 5px
        }

        .image-row-wrap .image-row-item .share-image {
            right: 5px
        }
    }

    .block_links-and-quotes .grid-wrap,
    .block_map .map-filters {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center
    }

    .block_links-and-quotes .grid-wrap .grid-item {
        width: calc(33.33% - 40px);
        margin: 20px
    }

    .block_links-and-quotes .grid-wrap .grid-item.large {
        width: calc(50% - 40px)
    }

    @media (max-width:1000px) {
        .block_links-and-quotes .grid-wrap .grid-item {
            width: calc(33.33% - 20px);
            margin: 10px
        }

        .block_links-and-quotes .grid-wrap .grid-item.large {
            width: calc(50% - 20px)
        }
    }

    @media (max-width:760px) {
        .block_links-and-quotes .grid-wrap .grid-item {
            width: calc(33.33% - 12px);
            margin: 6px
        }

        .block_links-and-quotes .grid-wrap .grid-item.large {
            width: calc(50% - 12px)
        }
    }

    @media (max-width:600px) {
        .block_links-and-quotes .grid-wrap .grid-item.large {
            width: 100%
        }
    }

    .block_map .map-filters {
        padding: 0 5%;
        margin-bottom: 50px
    }

    .block_map .map-filters .filter {
        background: #d9d9d9;
        display: block;
        width: calc(25% - 6px);
        height: 100%;
        text-align: center;
        line-height: 20px;
        padding: 15px 0;
        font-family: 'Function Pro', sans-serif
    }

    @media (max-width:760px) {
        .block_map .map-filters .filter {
            width: calc(50% - 6px);
            margin-bottom: 8px;
            font-size: 12px
        }

        .block_map .map-filters .filter:nth-child(3) {
            margin-left: 0 !important
        }
    }

    .block_map .map-filters .filter:not(:first-child) {
        margin-left: 8px
    }

    .block_map .map-filters .filter:hover {
        background: #bbb
    }

    .block_map .map-filters .filter.active {
        color: #fff
    }

    .block_map .map-filters .filter.active:nth-child(n) {
        background: #f15e2f
    }

    .block_map .map-filters .filter.active:nth-child(2),
    .block_masthead .ctas a:nth-child(2n) {
        background: #d92d26
    }

    .block_map .map-filters .filter.active:nth-child(3),
    .block_masthead .ctas a:nth-child(3n) {
        background: #7b2a31
    }

    .block_map .map-filters .filter.active:nth-child(4) {
        background: #000
    }

    .block_map .map-wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.66666667%;
        overflow: visible
    }

    .block_map .map-wrap .iconsets,
    .block_map .map-wrap img {
        z-index: 1;
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%
    }

    .block_map .map-wrap .iconsets {
        z-index: 2
    }

    .block_map .map-wrap .iconsets .iconset {
        opacity: 0;
        z-index: 0
    }

    .block_map .map-wrap .iconsets .iconset.active {
        opacity: 1;
        z-index: 1
    }

    .block_map .map-wrap .iconsets .iconset .disclaimer {
        position: absolute;
        top: -30px;
        width: 100%;
        text-align: center
    }

    .block_map .map-wrap .iconsets .iconset .disclaimer a {
        color: #d92d26;
        text-decoration: underline
    }

    @media (max-width:760px) {
        .block_map .map-wrap .iconsets .iconset .disclaimer {
            top: -40px;
            line-height: 20px;
            padding: 0 50px;
            font-size: 13px
        }
    }

    .block_map .map-wrap .iconsets .iconset .pin {
        position: absolute;
        display: block;
        width: 23.5px;
        height: 32px;
        margin: -32px 0 0 -99999px;
        transition: 400ms opacity, 400ms transform;
        opacity: 0;
        transform: translate3d(0, -20px, 0)
    }

    .block_map .map-wrap .iconsets .iconset .pin path {
        position: relative;
        cursor: pointer;
        z-index: 2
    }

    .block_map .map-wrap .iconsets .iconset .pin.nolink path {
        cursor: auto
    }

    @media (max-width:760px) {
        .block_map .map-wrap .iconsets .iconset .pin {
            width: 14.1px;
            height: 19.2px;
            margin: -19.2px 0 0 -99999px
        }
    }

    .block_map .map-wrap .iconsets .iconset.active .pin {
        margin-left: -11.75px;
        opacity: 1;
        transform: none
    }

    .block_map .map-wrap .iconsets .iconset:nth-child(n) .pin {
        fill: #f15e2f
    }

    .block_map .map-wrap .iconsets .iconset:nth-child(2) .pin {
        fill: #d92d26
    }

    .block_map .map-wrap .iconsets .iconset:nth-child(3) .pin {
        fill: #7b2a31
    }

    .block_map .map-wrap .iconsets .iconset:nth-child(4) .pin {
        fill: #000
    }

    .block_masthead .alert {
        background: #1a1919;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px
    }

    .block_masthead .alert.red {
        background: #d92d26
    }

    .block_masthead .alert a {
        display: block;
        color: #fff;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 15px;
        letter-spacing: 2px;
        margin-right: 3px
    }

    .block_masthead .alert svg {
        display: block;
        width: 14px;
        height: 14px;
        fill: #fff
    }

    .block_masthead .masthead-image {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 41.66666667%;
        overflow: hidden;
        background: black
    }

    .block_masthead .masthead-image img {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        opacity: .8
    }

    .block_masthead .masthead-image:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-image: linear-gradient(234deg, transparent, #01070f)
    }

    .block_masthead .text {
        z-index: 2;
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 65px
    }

    .block_masthead .text:not(:last-child) {
        padding-bottom: 105px
    }

    @media (max-width:1000px) {
        .block_masthead .text {
            padding: 40px
        }

        .block_masthead .text:not(:last-child) {
            padding-bottom: 90px
        }
    }

    @media (max-width:760px) {
        .block_masthead .text {
            padding: 15px
        }

        .block_masthead .text:not(:last-child) {
            padding-bottom: 60px
        }
    }

    .block_masthead .text h1,
    .block_masthead .text h5 {
        color: #fff;
        margin: 0;
        padding: 0
    }

    .block_masthead .ctas a,
    .block_masthead .text h5 {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px
    }

    .block_masthead .text h5 {
        line-height: 3;
        font-size: 16px;
        padding-left: 5px
    }

    @media (max-width:760px) {
        .block_masthead .text h5 {
            font-size: 14px;
            padding-left: 2px
        }
    }

    .block_masthead .text h1 {
        font-size: 77px;
        line-height: 1.1;
        font-weight: 400
    }

    @media (max-width:1360px) {
        .block_masthead .text h1 {
            font-size: 56px
        }
    }

    @media (max-width:1150px) {
        .block_masthead .text h1 {
            font-size: 48px
        }
    }

    @media (max-width:1000px) {
        .block_masthead .text h1 {
            font-size: 36px
        }
    }

    @media (max-width:900px) {
        .block_masthead .text h1 {
            font-size: 30px
        }
    }

    @media (max-width:760px) {
        .block_masthead .text h1 {
            font-size: 25px
        }
    }

    .block_masthead .ctas {
        z-index: 3;
        position: relative;
        height: 50px;
        display: flex
    }

    .block_masthead .ctas a {
        display: block;
        background: #f15e2f;
        color: #fff;
        line-height: 20px;
        padding: 15px 50px;
        font-size: 15px
    }

    @media (max-width:900px) {
        .block_masthead .ctas a {
            padding: 15px 20px;
            text-transform: none;
            font-weight: 400
        }
    }

    @media (max-width:760px) {
        .block_masthead .ctas a {
            text-align: center;
            padding: 15px 10px;
            font-size: 14px
        }
    }

    @media (max-width:500px) {
        .block_masthead .ctas {
            height: 40px
        }

        .block_masthead .ctas a {
            font-size: 12px;
            padding: 10px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            vertical-align: baseline
        }
    }

    .block_post-list .cta {
        text-align: center;
        padding: 20px 0 0
    }

    .block_sponsors .group {
        margin-bottom: 40px
    }

    .block_sponsors .group h4 {
        text-align: center;
        font-size: 24px;
        font-weight: 700
    }

    .block_sponsors .group .images {
        text-align: center
    }

    .block_sponsors .group .images img {
        max-width: 600px
    }

    .block_sponsors .group .list {
        border-bottom: 1px solid #ddd;
        padding-bottom: 30px;
        column-count: 4
    }

    .block_sponsors .group .list span {
        display: block;
        line-height: 1.3;
        margin-bottom: 10px
    }

    .block_sponsors .group .list.rough-0,
    .block_sponsors .group .list.rough-1 {
        text-align: center;
        column-count: 1
    }

    .block_sponsors .group .list.rough-0 span,
    .block_sponsors .group .list.rough-1 span {
        display: inline-block;
        margin: 0 20px
    }

    .block_sponsors .group .list.rough-2,
    .block_sponsors .group .list.rough-3 {
        column-count: 3
    }

    .block_sponsors .group:last-child .list {
        border-bottom: 0
    }

    @media (max-width:1000px) {
        .block_sponsors .group .list {
            column-count: 3
        }
    }

    @media (max-width:760px) {
        .block_sponsors .group .images img {
            max-width: 70%
        }

        .block_sponsors .group .list,
        .block_sponsors .group .list.rough-2,
        .block_sponsors .group .list.rough-3 {
            column-count: 2
        }
    }

    @media (max-width:500px) {
        .block_sponsors .group .images img {
            max-width: 100%
        }

        .block_sponsors .group .list {
            column-count: 1;
            text-align: center
        }

        .block_sponsors .group .list.rough-0,
        .block_sponsors .group .list.rough-1,
        .block_sponsors .group .list.rough-2,
        .block_sponsors .group .list.rough-3 {
            column-count: 1
        }

        .block_sponsors .group .list.rough-0 span,
        .block_sponsors .group .list.rough-1 span,
        .block_sponsors .group .list.rough-2 span,
        .block_sponsors .group .list.rough-3 span {
            display: block;
            margin-bottom: 10px
        }
    }

    .block_tile-links.dark,
    .block_timeline {
        background: #1a1919 url(/wp-content/themes/nmc_iwmf/css/images/background-map.jpg) center bottom;
        background-size: cover;
        padding: 80px 0
    }

    @media (max-width:1350px) {
        .block_tile-links.dark {
            padding: 60px 0
        }
    }

    @media (max-width:1150px) {
        .block_tile-links.dark {
            padding: 40px 0
        }
    }

    @media (max-width:760px) {
        .block_tile-links.dark {
            padding: 25px 0
        }
    }

    .block_timeline .slide {
        padding-left: 130px
    }

    @media (max-width:1350px) {
        .block_timeline {
            padding: 60px 0
        }
    }

    @media (max-width:1150px) {
        .block_timeline {
            padding: 40px 0
        }
    }

    @media (max-width:760px) {
        .block_timeline {
            padding: 25px 0
        }
    }

    .block_timeline .slideshow {
        visibility: hidden
    }

    .block_timeline .slideshow,
    .block_timeline .slideshow .swipe-wrap {
        position: relative;
        overflow: hidden
    }

    .block_timeline .slideshow .slide {
        position: relative;
        float: left;
        width: 100%;
        display: flex;
        flex-wrap: wrap
    }

    .block_timeline .slideshow.inactive .prevnext {
        opacity: 0
    }

    .block_timeline .slideshow .prevnext {
        position: absolute;
        opacity: 1;
        transition: 300ms;
        top: 0;
        left: 80px;
        width: 50px;
        height: 105px
    }

    .block_timeline .slideshow .prevnext a {
        cursor: pointer;
        display: block;
        width: 50px;
        height: 50px;
        border: 3px solid #ccc;
        fill: #ccc;
        padding: 16px;
        border-radius: 100%;
        margin-bottom: 5px
    }

    .block_timeline .slideshow .prevnext a.next svg {
        top: -2px
    }

    .block_timeline .slideshow .prevnext a svg {
        position: relative;
        top: -5px;
        transform: rotate(90deg)
    }

    .block_timeline .slideshow .prevnext a:hover {
        border-color: #fff;
        fill: #fff
    }

    .block_timeline .year {
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding-left: 30px
    }

    .block_timeline .year h6 {
        color: #fff;
        letter-spacing: 3px;
        margin-bottom: 7px
    }

    .block_timeline .year h3 {
        color: #fff;
        font-size: 56px
    }

    .block_timeline .year p {
        margin-top: -10px;
        color: #bbb;
        font-size: 15px
    }

    .block_timeline .year .button {
        cursor: pointer;
        display: inline-block;
        background: #f15e2f;
        line-height: 50px;
        padding: 0 50px;
        text-transform: uppercase;
        font-family: 'Function Pro', sans-serif;
        letter-spacing: 2px;
        font-weight: 600;
        color: #fff
    }

    .block_timeline .year .left {
        width: 40%
    }

    .block_timeline .year .right {
        position: relative;
        width: 55%
    }

    .block_timeline .year .triple-image .img1,
    .block_timeline .year .triple-image .img2,
    .block_timeline .year .triple-image .img3 {
        position: absolute;
        box-shadow: 0 0 20px #000
    }

    .block_timeline .year .triple-image .img1 {
        top: 0;
        right: 0;
        width: 65%
    }

    .block_timeline .year .triple-image .img2 {
        top: 60%;
        left: 0;
        width: 32%
    }

    .block_timeline .year .triple-image .img3 {
        top: 117%;
        left: 35%;
        width: 50%
    }

    .block_timeline .year .img .image-auto {
        box-shadow: 0 0 20px #000;
        margin-bottom: 15px
    }

    .block_timeline .year .img p {
        font-size: 14px;
        color: #ddd;
        padding-right: 30px
    }

    .block_timeline .award:not(:last-child) {
        margin-bottom: 30px
    }

    .block_timeline .award h5 {
        color: #eee;
        font-weight: 300;
        margin-bottom: 10px;
        font-size: 22px
    }

    .block_timeline .winner {
        display: block;
        color: #fff
    }

    .block_timeline .winner strong {
        font-weight: 600
    }

    .block_timeline .winner span {
        display: inline-block
    }

    .block_timeline .winner em {
        font-style: italic;
        font-weight: 400;
        color: #ccc;
        text-transform: lowercase
    }

    .block_timeline .winner i {
        display: inline-block;
        position: relative;
        top: 1px;
        width: 12px;
        height: 12px;
        transition: 250ms;
        transform: translate3d(2px, 0, 0);
        fill: #f15e2f
    }

    .block_timeline .winner:hover i {
        transform: translate3d(5px, 0, 0)
    }

    .block_timeline .incoming .year .left>*,
    .block_timeline .incoming .year .right {
        transform: translate3d(10px, 0, 0);
        opacity: 0
    }

    .block_timeline .active .year .left>* {
        transition: 300ms;
        transform: translate3d(0, 0, 0);
        opacity: 1
    }

    .block_timeline .active .year .left>:nth-child(1) {
        transition-delay: 100ms
    }

    .block_timeline .active .year .left>:nth-child(2) {
        transition-delay: 170ms
    }

    .block_timeline .active .year .left>:nth-child(3) {
        transition-delay: 240ms
    }

    .block_timeline .active .year .left>:nth-child(4) {
        transition-delay: 310ms
    }

    .block_timeline .active .year .right {
        transition: 300ms 500ms;
        transform: translate3d(0, 0, 0);
        opacity: 1
    }

    .block_timeline .outgoing .year {
        transition: 150ms;
        opacity: 0
    }

    @media (max-width:1360px) {
        .block_timeline .year h3 {
            font-size: 42px
        }
    }

    @media (max-width:1100px) {
        .block_timeline .year h3 {
            font-size: 32px
        }

        .block_timeline .year .triple-image .img3 {
            top: 80%
        }

        .block_timeline .year.overview .left {
            margin-left: -40px
        }
    }

    @media (max-width:900px) {
        .block_timeline .slideshow .prevnext {
            left: 50px
        }

        .block_timeline .slide {
            padding-left: 100px
        }

        .block_timeline .year .left {
            width: 52%
        }

        .block_timeline .year .right {
            width: 45%
        }
    }

    @media (max-width:820px) {
        .block_timeline .slideshow .prevnext {
            left: 65px;
            width: 40px
        }

        .block_timeline .slideshow .prevnext a {
            width: 40px;
            height: 40px;
            padding: 11px
        }

        .block_timeline .slide {
            padding-left: 90px
        }
    }

    @media (max-width:600px) {
        .block_timeline .slideshow .prevnext {
            left: 10px
        }

        .block_timeline .slide {
            padding-left: 30px
        }

        .block_timeline .year.overview .left {
            margin-left: -35px;
            width: 52%
        }

        .block_timeline .year.overview .right {
            width: 46%
        }

        .block_timeline .year.overview .button {
            padding: 0 20px
        }

        .block_timeline .year {
            flex-wrap: wrap
        }

        .block_timeline .year .left {
            width: 100%
        }

        .block_timeline .year .right {
            padding-top: 15px;
            width: 100%
        }
    }

    @media (max-width:500px) {
        .block_timeline .year h3 {
            font-size: 24px
        }

        .block_timeline .year.overview .right {
            display: none
        }

        .block_timeline .year.overview .left {
            width: 100%
        }

        .block_timeline .award h5 {
            font-size: 17px
        }
    }

    .block_title,
    .block_wysiwyg .welcome {
        text-align: center
    }

    .block_title h6 {
        margin-bottom: 10px;
        letter-spacing: 2px
    }

    .block_title h1 {
        font-size: 66px;
        font-weight: 400
    }

    @media (max-width:1150px) {
        .block_title h1 {
            font-size: 48px
        }
    }

    @media (max-width:1000px) {
        .block_title h1 {
            font-size: 36px
        }
    }

    @media (max-width:900px) {
        .block_title h1 {
            font-size: 30px
        }
    }

    @media (max-width:760px) {
        .block_title h1 {
            font-size: 25px
        }
    }

    .block_wysiwyg .welcome:not(.small) {
        padding: 40px 0
    }

    @media (max-width:760px) {
        .block_wysiwyg .welcome:not(.small) {
            padding: 25px 0
        }
    }

    @media (max-width:480px) {
        .block_wysiwyg .welcome:not(.small) {
            padding: 10px 0
        }
    }

    .block_wysiwyg .welcome h1 {
        font-size: 66px
    }

    @media (max-width:1350px) {
        .block_wysiwyg .welcome h1 {
            font-size: 48px
        }
    }

    @media (max-width:1150px) {
        .block_wysiwyg .welcome h1 {
            font-size: 36px
        }
    }

    @media (max-width:900px) {
        .block_wysiwyg .welcome h1 {
            font-size: 30px
        }
    }

    @media (max-width:760px) {
        .block_wysiwyg .welcome h1 {
            font-size: 25px
        }

        .block_wysiwyg .welcome p {
            margin-bottom: 0;
            font-size: 15px;
            line-height: 1.5
        }
    }

    .block_wysiwyg b,
    .block_wysiwyg strong,
    .wysiwyg b,
    .wysiwyg strong {
        color: #111
    }

    .block_wysiwyg a:hover,
    .wysiwyg a:hover {
        border-bottom-color: #d92d26
    }

    .block_wysiwyg img,
    .wysiwyg img {
        display: block;
        max-width: 100%;
        height: auto;
        margin-bottom: 25px
    }

    .block_wysiwyg .alignnone,
    .wysiwyg .alignnone {
        margin: 5px 20px 20px 0
    }

    .block_wysiwyg .aligncenter,
    .block_wysiwyg div.aligncenter,
    .wysiwyg .aligncenter,
    .wysiwyg div.aligncenter {
        display: block;
        margin: 5px auto
    }

    .block_wysiwyg .alignright,
    .block_wysiwyg a img.alignright,
    .wysiwyg .alignright,
    .wysiwyg a img.alignright {
        float: right;
        margin: 5px 0 20px 20px
    }

    .block_wysiwyg .wp-caption.alignleft,
    .block_wysiwyg .wp-caption.alignnone,
    .block_wysiwyg a img.alignnone,
    .wysiwyg .wp-caption.alignleft,
    .wysiwyg .wp-caption.alignnone,
    .wysiwyg a img.alignnone {
        margin: 5px 20px 20px 0
    }

    .block_wysiwyg .alignleft,
    .block_wysiwyg a img.alignleft,
    .wysiwyg .alignleft,
    .wysiwyg a img.alignleft {
        float: left;
        margin: 5px 20px 20px 0
    }

    .block_wysiwyg a img.aligncenter,
    .wysiwyg a img.aligncenter {
        display: block;
        margin-left: auto;
        margin-right: auto
    }

    .block_wysiwyg .wp-caption,
    .wysiwyg .wp-caption {
        background: #fff;
        border: 1px solid #f0f0f0;
        max-width: 96%;
        padding: 5px 3px 10px;
        text-align: center
    }

    .block_wysiwyg .wp-caption.alignright,
    .wysiwyg .wp-caption.alignright {
        margin: 5px 0 20px 20px
    }

    .block_wysiwyg .wp-caption img,
    .wysiwyg .wp-caption img {
        border: 0;
        height: auto;
        margin: 0;
        max-width: 98.5%;
        padding: 0;
        width: auto
    }

    .block_wysiwyg .wp-caption p.wp-caption-text,
    .wysiwyg .wp-caption p.wp-caption-text {
        font-size: 11px;
        line-height: 17px;
        margin: 0;
        padding: 0 4px 5px
    }

    .ir-block {
        --defaultPadding: 100px
    }

    @media (max-width:600px) {
        .ir-block {
            --defaultPadding: 50px
        }
    }

    .ir-block .bound--maximum,
    .ir-block .bound--none {
        position: relative;
        margin: 0 auto;
        width: 100%
    }

    .ir-block .bound--maximum {
        *zoom: 1;
        width: 94%
    }

    .ir-block .bound--maximum:after,
    .ir-block .bound--maximum:before {
        content: "";
        display: table
    }

    .ir-block .bound--maximum:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-block .bound--maximum {
            width: 88%
        }
    }

    .ir-block .bound--narrow {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 776px
    }

    .ir-block .bound--narrow:after,
    .ir-block .bound--narrow:before {
        content: "";
        display: table
    }

    .ir-block .bound--narrow:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-block .bound--narrow {
            width: 88%
        }
    }

    .ir-block .bound--layout {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 1080px
    }

    .ir-block .bound--layout:after,
    .ir-block .bound--layout:before {
        content: "";
        display: table
    }

    .ir-block .bound--layout:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-block .bound--layout {
            width: 88%
        }
    }

    .ir-block .bound--wide {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 1340px
    }

    .ir-block .bound--wide:after,
    .ir-block .bound--wide:before {
        content: "";
        display: table
    }

    .ir-block .bound--wide:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-block .bound--wide {
            width: 88%
        }
    }

    .ir-block .ir-content,
    .ir-block .ir-content h1,
    .ir-block .ir-content h2,
    .ir-block .ir-content h3,
    .ir-block .ir-content h4,
    .ir-block .ir-content h5,
    .ir-block .ir-content h6,
    .ir-block--wysiwyg.bg-black h1,
    .ir-block--wysiwyg.bg-black h2,
    .ir-block--wysiwyg.bg-black h3,
    .ir-block--wysiwyg.bg-black h4,
    .ir-block--wysiwyg.bg-black h5,
    .ir-block--wysiwyg.bg-black h6,
    .ir-block--wysiwyg.bg-brick h1,
    .ir-block--wysiwyg.bg-brick h2,
    .ir-block--wysiwyg.bg-brick h3,
    .ir-block--wysiwyg.bg-brick h4,
    .ir-block--wysiwyg.bg-brick h5,
    .ir-block--wysiwyg.bg-brick h6,
    .ir-block--wysiwyg.bg-red h1,
    .ir-block--wysiwyg.bg-red h2,
    .ir-block--wysiwyg.bg-red h3,
    .ir-block--wysiwyg.bg-red h4,
    .ir-block--wysiwyg.bg-red h5,
    .ir-block--wysiwyg.bg-red h6 {
        color: #fff
    }

    .ir-block .ir-content a {
        color: inherit;
        text-decoration: underline;
        transition: 200ms;
        font-weight: 700
    }

    .ir-block .ir-content a:hover,
    .ir-block--bacf .link a:hover img,
    .ir-block--wysiwyg a:hover {
        opacity: .5
    }

    .ir-2021-block img,
    .ir-2022-block img,
    .ir-block img {
        max-width: 100%;
        height: auto
    }

    .ir-block img.alignright {
        float: right;
        margin: 1em 0 1em 2em;
        max-width: 50%
    }

    .ir-block img.alignleft {
        float: left;
        margin: 1em 2em 1em 0;
        max-width: 50%
    }

    .ir-block img.aligncenter {
        display: block;
        margin: 1em auto;
        max-width: 100%
    }

    @media (max-width:600px) {
        .ir-block img.alignright {
            margin: 1em 0 1em 1em
        }

        .ir-block img.alignleft {
            margin: 1em 1em 1em 0
        }
    }

    .ir-block .nmc-carousel,
    .ir-block--bullets li {
        position: relative
    }

    .ir-block .nmc-carousel .image-row-wrap .image-row-item:after,
    .ir-block .nmc-carousel .image-row-wrap .image-row-item:before {
        background: #3b2129
    }

    .ir-block .nmc-carousel .carousel-scroller {
        z-index: 1;
        position: relative;
        overflow-x: hidden
    }

    .ir-block .nmc-carousel .caption {
        margin: 1em 0 0 15px;
        color: #fff
    }

    .ir-2021-block .nmc-carousel .carousel-nav button,
    .ir-2022-block .nmc-carousel .carousel-nav button,
    .ir-block .nmc-carousel .carousel-nav button {
        border: 0;
        -webkit-appearance: none;
        border-radius: 0;
        position: absolute;
        z-index: 2;
        top: 50%;
        width: 40px;
        height: 40px;
        margin: -20px 0 0;
        padding: 8px;
        background: rgba(0, 0, 0, .7);
        cursor: pointer
    }

    .ir-block .nmc-carousel .carousel-nav button svg {
        display: block;
        fill: #fff;
        width: 100%;
        height: 100%
    }

    .ir-block .nmc-carousel .carousel-nav button.carousel-nav_prev {
        left: 8px
    }

    .ir-block .nmc-carousel .carousel-nav button.carousel-nav_next {
        right: 8px
    }

    html.impact-report-2020,
    html.impact-report-2021 {
        scroll-behavior: smooth;
        scroll-padding: 60px 0 0
    }

    body.page-template-template-2020-impact-report {
        --headerHeight: 100px;
        --toggleSize: 40px;
        --toggleGap: 5px;
        --toggle-top-shift-y: 5px;
        --toggle-top-shift-x: -5px;
        padding-top: 100px
    }

    .scrolled body.page-template-template-2020-impact-report,
    .scrolled body.page-template-template-2021-impact-report,
    .scrolled body.page-template-template-2022-impact-report {
        --headerHeight: 60px
    }

    @media (max-width:600px) {
        body.page-template-template-2020-impact-report {
            --headerHeight: 60px;
            padding-top: 60px
        }
    }

    .ir-header {
        display: grid;
        justify-content: center;
        align-items: center;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 10;
        width: 100%;
        padding: 0 20px;
        height: var(--headerHeight);
        background: #c6302b;
        transition: 200ms height
    }

    .ir-header .ir-nav_toggle {
        display: none
    }

    .ir-header .ir-nav {
        font-family: 'Function Pro', sans-serif;
        font-size: 15px
    }

    .ir-header .ir-nav_ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px 20px;
        line-height: 1.2
    }

    .ir-header .ir-nav_li {
        margin: 0;
        text-align: center
    }

    .ir-header .ir-nav_a {
        font-weight: 700;
        color: #fff
    }

    .ir-header .ir-nav_a:focus {
        outline: 1px solid #fff
    }

    @media (max-width:900px) {
        .ir-header .ir-nav {
            font-size: 14px
        }

        .ir-header .ir-nav_a {
            font-weight: 400
        }
    }

    @media (max-width:600px) {
        .ir-header {
            justify-content: end
        }

        .ir-header .ir-nav {
            position: absolute;
            left: 0;
            top: 0;
            transform: translate3d(-100%, 0, 0);
            transition: 200ms;
            padding: 35px;
            width: calc(100% - 60px);
            max-width: 300px;
            background: #c6302b
        }

        .ir-header .ir-nav[aria-hidden=false] {
            transform: translate3d(0, 0, 0)
        }

        .ir-header .ir-nav_toggle {
            -webkit-appearance: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: var(--toggleGap);
            margin: 0;
            padding: 0;
            border: 0;
            background: 0 0;
            width: var(--toggleSize);
            height: var(--toggleSize);
            background: rgba(0, 0, 0, .2);
            z-index: 1;
            transition: 200ms
        }

        .ir-header .ir-nav_toggle span {
            display: block;
            width: 60%;
            height: 2px;
            background: #fff;
            transform: none;
            transition: 200ms
        }

        .ir-header .ir-nav_toggle span.m {
            transform-origin: 50% 50%
        }

        .ir-header .ir-nav_toggle:focus {
            outline: 1px solid #fff
        }

        .ir-header .ir-nav_toggle[aria-expanded=true] span.t {
            transform: rotate(-45deg) translate3d(var(--toggle-top-shift-x), var(--toggle-top-shift-y), 0)
        }

        .ir-header .ir-nav_toggle[aria-expanded=true] span.m {
            transform: rotate(45deg)
        }

        .ir-header .ir-nav_toggle[aria-expanded=true] span.b {
            opacity: 0
        }

        .ir-header .ir-nav_ul {
            display: grid;
            gap: 10px
        }

        .ir-header .ir-nav_li {
            text-align: left
        }
    }

    @media (max-width:400px) {
        .ir-header .ir-nav {
            padding: 35px 15px
        }
    }

    .ir-block--wysiwyg {
        padding: var(--defaultPadding) 0
    }

    .ir-block--wysiwyg.bg-black {
        color: #fff;
        background: #1b1517
    }

    .ir-block--wysiwyg.bg-red {
        color: #fff;
        background: #c6302b
    }

    .ir-block--wysiwyg.bg-red blockquote {
        border-left-color: #fff
    }

    .ir-block--wysiwyg.bg-brick {
        color: #fff;
        background: #3b2129
    }

    .ir-block--wysiwyg.bg-tan {
        color: #1b1517;
        background: #faf2df
    }

    .ir-block--wysiwyg.bg-green h1,
    .ir-block--wysiwyg.bg-green h2,
    .ir-block--wysiwyg.bg-green h3,
    .ir-block--wysiwyg.bg-green h4,
    .ir-block--wysiwyg.bg-green h5,
    .ir-block--wysiwyg.bg-green h6,
    .ir-block--wysiwyg.bg-tan h1,
    .ir-block--wysiwyg.bg-tan h2,
    .ir-block--wysiwyg.bg-tan h3,
    .ir-block--wysiwyg.bg-tan h4,
    .ir-block--wysiwyg.bg-tan h5,
    .ir-block--wysiwyg.bg-tan h6 {
        color: #1b1517
    }

    .ir-block--wysiwyg.bg-green {
        color: #1b1517;
        background: #a2cda5
    }

    .ir-2021-block--wysiwyg a,
    .ir-block--wysiwyg a {
        color: inherit;
        text-decoration: underline;
        transition: 200ms
    }

    .ir-block--wysiwyg blockquote {
        margin-left: 0;
        font-family: 'Function Pro', sans-serif;
        font-size: 28px;
        line-height: 1.42857143;
        font-weight: 400;
        border-left: 6px solid #c6302b
    }

    .ir-block--masthead {
        position: relative;
        background: #3b2129
    }

    .ir-block--masthead .masthead-upper-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        margin-top: 10vw;
        padding: 0 29vw;
        width: 100%
    }

    .ir-block--masthead .primary-image {
        width: 100%;
        max-width: 533px
    }

    .ir-block--masthead .page-title {
        margin: 28px 0 86px;
        font-size: 38px;
        color: #fff;
        text-align: center
    }

    .ir-block--masthead .iwmf-logo {
        width: 15vw;
        max-width: 166px
    }

    .ir-block--masthead .iwmf-logo .image-auto {
        overflow: visible
    }

    .ir-block--masthead .iwmf-logo img {
        filter: drop-shadow(1px 1px 1px rgba(0, 0, 0, .6))
    }

    .ir-block--masthead .masthead-content {
        margin-top: -25vw;
        padding: 0 0 100px;
        color: #fff;
        background: #1b1517
    }

    .ir-block--masthead .signature {
        margin-bottom: 1em
    }

    @media (max-width:1100px) {
        .ir-block--masthead .page-title {
            margin: 3vw 0 8vw;
            font-size: 3.5vw
        }
    }

    @media (max-width:700px) {
        .ir-block--masthead .masthead-upper-content {
            margin-top: 7vw;
            padding: 0 25vw
        }

        .ir-block--masthead .page-title {
            margin: 3vw 0 5vw;
            font-size: 5vw
        }
    }

    @media (max-width:600px) {
        .ir-block--masthead .signature img {
            display: block
        }
    }

    .ir-block--video {
        padding: 50px 0;
        background: #c6302b;
        overflow: hidden
    }

    .ir-block--video .block-title {
        color: #fff;
        text-align: center
    }

    .ir-block--video .video_wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.4%;
        overflow: hidden;
        background: #1b1517
    }

    .ir-block--video .video_wrap a {
        display: block;
        position: relative
    }

    .ir-2021-block--video .video_wrap a:after,
    .ir-block--iesj .video_wrap a:after,
    .ir-block--video .video_wrap a:after {
        content: '';
        cursor: pointer;
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
        background: rgba(0, 0, 0, .4);
        transition: 200ms
    }

    .ir-2021-block--video .video_wrap a:focus:after,
    .ir-2021-block--video .video_wrap a:hover:after,
    .ir-block--iesj .video_wrap a:focus:after,
    .ir-block--iesj .video_wrap a:hover:after,
    .ir-block--video .video_wrap a:focus:after,
    .ir-block--video .video_wrap a:hover:after {
        background: rgba(0, 0, 0, .3)
    }

    .ir-2021-block--video .video_wrap iframe,
    .ir-2022-block--video .video_wrap iframe,
    .ir-block--dedicated:before,
    .ir-block--iesj .video_wrap iframe,
    .ir-block--video .video_wrap iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0
    }

    .ir-block--video .play-icon {
        display: block;
        position: absolute;
        left: calc(50% - 59px);
        top: calc(50% - 59px);
        z-index: 1
    }

    @media (max-width:600px) {
        .ir-block--video .play-icon {
            transform: scale(.5);
            transform-origin: 50% 50%
        }
    }

    .ir-block--intro {
        padding: 100px 0;
        background: #faf2df
    }

    .ir-block--intro .intro-content {
        text-align: center
    }

    .ir-block--intro .intro-content_title {
        font-size: 4.125rem
    }

    .ir-block--intro .intro-content_description {
        margin: 0 auto;
        max-width: 650px;
        font-family: 'Function Pro', sans-serif;
        font-size: 2rem;
        color: #1b1517
    }

    .ir-block--intro .intro-content_description p {
        line-height: 1.375
    }

    .ir-block--intro .intro-key {
        margin: 0 auto;
        max-width: 557px
    }

    .ir-block--intro .intro-colunns {
        margin: 76px 0 50px
    }

    .ir-block--intro .columns-3 {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 35px
    }

    .ir-block--intro .columns-3>* {
        width: calc(33.333% - 35px)
    }

    @media (max-width:900px) {
        .ir-block--intro .columns-3>* {
            width: calc(50% - 17.5px)
        }
    }

    @media (max-width:600px) {
        .ir-block--intro .columns-3>* {
            width: 100%
        }
    }

    .ir-block--intro .icon-snippet_icon {
        margin: 0 auto;
        max-width: 100%;
        height: 200px
    }

    .ir-block--intro .icon-snippet_content {
        text-align: center
    }

    .ir-block--intro .icon-snippet_title {
        margin: 0 0 .5em;
        font-size: 18px;
        font-weight: 700
    }

    .ir-block--intro .intro-content_bottom-image {
        margin-top: 50px
    }

    @media (max-width:800px) {
        .ir-block--intro {
            padding: 60px 0
        }

        .ir-block--intro .intro-content_title {
            font-size: 2.5rem
        }

        .ir-block--intro .intro-content_description {
            font-size: 1.5rem
        }
    }

    @media (max-width:500px) {
        .ir-block--intro {
            padding: 40px 0
        }

        .ir-block--intro .intro-content_title {
            font-size: 2rem
        }

        .ir-block--intro .intro-content_description {
            font-size: 1.125rem
        }
    }

    .ir-block--safety_relief {
        position: relative;
        padding: 0 0 140px;
        background: #3b2129
    }

    .ir-block--safety_relief .sr-secondary {
        margin-top: 82px
    }

    .ir-block--safety_relief .sr-secondary_columns {
        display: grid;
        grid-template-columns: 1.25fr 1fr;
        gap: 10%
    }

    @media (max-width:900px) {
        .ir-block--safety_relief {
            padding: 0 0 100px
        }

        .ir-block--safety_relief .sr-secondary_columns {
            grid-template-columns: 1fr;
            gap: 50px;
            align-items: center
        }

        .ir-block--safety_relief .graphic-500 {
            justify-self: center;
            width: 100%;
            max-width: 548px
        }
    }

    @media (max-width:600px) {
        .ir-block--safety_relief {
            padding: 0 0 50px
        }
    }

    .ir-block--quotes_grid {
        padding: 70px 0 110px;
        background: #1b1517
    }

    .ir-block--quotes_grid .block-title {
        text-align: center;
        color: #fff
    }

    .ir-block--quotes_grid .quote,
    .ir-block--quotes_grid blockquote,
    .ir-block--quotes_grid blockquote:before {
        all: unset
    }

    .ir-block--quotes_grid .columns {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 35px
    }

    .ir-block--quotes_grid .columns>* {
        width: calc(33.333% - 35px)
    }

    @media (max-width:900px) {
        .ir-block--quotes_grid .columns>* {
            width: calc(50% - 17.5px)
        }
    }

    @media (max-width:600px) {
        .ir-block--quotes_grid .columns>* {
            width: 100%
        }
    }

    .ir-block--quotes_grid blockquote {
        display: block;
        position: relative;
        padding: 60px 10px 50px 60px;
        color: #fff;
        border: 1px solid #c6302b
    }

    .ir-block--quotes_grid blockquote:before,
    .ir-block--recovery .block-quote blockquote:before {
        content: '“';
        position: absolute;
        color: #fff;
        font-weight: 700;
        font-family: 'Source Sans', sans-serif
    }

    .ir-block--quotes_grid blockquote:before {
        display: flex;
        justify-content: center;
        align-items: center;
        left: 0;
        top: 0;
        padding-top: 14px;
        font-size: 45px;
        height: 34px;
        width: 48px;
        background: #c6302b
    }

    .ir-block--quotes_grid blockquote p {
        font-size: 15px
    }

    .ir-block--quotes_grid blockquote footer:before,
    .ir-block--recovery .block-quote blockquote footer:before {
        content: '- '
    }

    @media (max-width:600px) {
        .ir-block--quotes_grid {
            padding: 60px 0
        }
    }

    .ir-block--training {
        padding: 100px 0;
        background: #3b2129
    }

    .ir-block--training .block-intro {
        text-align: center;
        color: #fff
    }

    .ir-block--training .block-title {
        font-size: 2.625rem;
        color: #fff
    }

    .ir-block--training .block-description {
        font-family: 'Function Pro', sans-serif;
        font-size: 1.5rem;
        line-height: 1.83333333
    }

    .ir-block--training .icon-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 35px;
        margin-top: 60px
    }

    .ir-block--training .icon-grid>* {
        width: calc(33.333% - 35px)
    }

    @media (max-width:900px) {
        .ir-block--training .icon-grid>* {
            width: calc(50% - 17.5px)
        }
    }

    @media (max-width:600px) {
        .ir-block--training .icon-grid>* {
            width: 100%
        }
    }

    .ir-block--training .icon-snippet_icon {
        margin: 0 auto;
        max-width: 100%;
        height: 170px
    }

    .ir-block--training .icon-snippet_content {
        text-align: center;
        color: #fff
    }

    .ir-block--training .icon-snippet_content:after {
        content: '';
        display: block;
        margin: 24px auto 0;
        width: 120px;
        height: 7px;
        background: #c6302b
    }

    .ir-block--training .icon-snippet_title {
        margin: 0 0 .5em;
        font-size: 26px;
        font-weight: 700;
        color: #fff
    }

    .ir-block--training .half-image-content {
        margin-top: 90px
    }

    .ir-block--training .half-image-content_layout {
        display: grid;
        grid-template-columns: 1.23fr 1fr;
        gap: 35px;
        align-items: center
    }

    .ir-block--training .image-content-column {
        max-width: 520px;
        font-size: 1.5rem;
        line-height: 1.83333333;
        color: #fff
    }

    @media (max-width:900px) {
        .ir-block--training .block-description {
            font-size: 1.25rem
        }

        .ir-block--training .half-image-content_layout {
            grid-template-columns: 1fr
        }

        .ir-block--training .image-content-column {
            margin: 0 auto;
            text-align: center
        }
    }

    @media (max-width:600px) {
        .ir-block--training {
            padding: 60px 0
        }

        .ir-block--training .block-title {
            font-size: 2rem
        }

        .ir-block--training .block-description,
        .ir-block--training .image-content-column {
            font-size: 1.125rem
        }
    }

    .ir-block--banner_cta {
        padding: 80px 0
    }

    .ir-block--banner_cta .bound--layout {
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 960px;
        min-height: 140px
    }

    .ir-block--banner_cta.bg-red {
        color: #fff;
        background-color: #c6302b
    }

    .ir-block--banner_cta.bg-black a,
    .ir-block--banner_cta.bg-red a {
        font-weight: 700;
        border-bottom: 3px solid #ddd646
    }

    .ir-block--banner_cta.bg-red a:hover {
        opacity: .8
    }

    .ir-block--banner_cta.bg-green {
        color: #1b1517;
        background-color: #a2cda5
    }

    .ir-block--banner_cta.bg-black {
        color: #fff;
        background: #000
    }

    .ir-block--banner_cta[class*=pattern-] {
        padding: 140px 0;
        background-repeat: repeat;
        background-position: 50% 50%
    }

    .ir-block--banner_cta.pattern-people {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/bg-people.svg)
    }

    .ir-block--banner_cta.pattern-social {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/bg-social.svg)
    }

    .ir-block--banner_cta .top-image {
        margin: 0 auto 2em;
        max-width: 250px;
        width: 100%
    }

    .field-stories-single .related li,
    .ir-block--banner_cta p {
        margin: 0
    }

    .ir-block--banner_cta .cta-line {
        display: block;
        font-family: 'Function Pro', sans-serif;
        text-align: center;
        font-size: 1.75rem;
        line-height: 1.57142857
    }

    .ir-block--banner_cta .big-text {
        font-weight: 700;
        font-size: 4.75rem;
        line-height: 1.17105263
    }

    @media (max-width:900px) {
        .ir-block--banner_cta .cta-line {
            font-size: 1.5rem
        }

        .ir-block--banner_cta .big-text {
            font-size: 3.75rem
        }
    }

    @media (max-width:600px) {
        .ir-block--banner_cta .bound--layout {
            min-height: 0
        }

        .ir-block--banner_cta,
        .ir-block--banner_cta[class*=pattern-] {
            padding: 40px 0
        }

        .ir-block--banner_cta .cta-line {
            font-size: 1.125rem
        }

        .ir-block--banner_cta .big-text {
            font-size: 2.5rem
        }
    }

    @media (max-width:400px) {
        .ir-block--banner_cta .cta-line {
            font-size: 1rem
        }

        .ir-block--banner_cta .big-text {
            font-size: 1.75rem
        }
    }

    .ir-block--iesj {
        position: relative;
        padding: 0 0 140px;
        background: #3b2129
    }

    .ir-block--iesj .ir-content,
    .ir-block--iesj .ir-content h1,
    .ir-block--iesj .ir-content h2,
    .ir-block--iesj .ir-content h3,
    .ir-block--iesj .ir-content h4,
    .ir-block--iesj .ir-content h5,
    .ir-block--iesj .ir-content h6,
    .ir-block--iesj .video-content-column h1,
    .ir-block--iesj .video-content-column h2,
    .ir-block--iesj .video-content-column h3,
    .ir-block--iesj .video-content-column h4,
    .ir-block--iesj .video-content-column h5,
    .ir-block--iesj .video-content-column h6 {
        color: #fff
    }

    .ir-block--iesj .ir-content a,
    .ir-block--iesj .video-content-column a {
        color: #fff;
        font-weight: 700;
        text-decoration: underline
    }

    .ir-block--iesj .ir-content a:hover,
    .ir-block--iesj .video-content-column a:hover {
        opacity: .7
    }

    .ir-block--iesj .half-video-content {
        margin-top: 90px
    }

    .ir-block--iesj .half-video-content_layout {
        display: grid;
        grid-template-columns: 1fr 1.23fr;
        gap: 35px;
        align-items: center
    }

    .ir-block--iesj .video-column {
        grid-column: 2/3;
        grid-row: 1/2
    }

    .ir-block--iesj .video-content-column {
        grid-column: 1/2;
        grid-row: 1/2;
        max-width: 520px;
        color: #fff
    }

    .ir-block--iesj .video_wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.4%;
        overflow: hidden;
        background: #1b1517
    }

    .ir-block--bacf .link a,
    .ir-block--iesj .video_wrap a {
        display: block;
        position: relative
    }

    .ir-block--iesj .play-icon {
        display: block;
        position: absolute;
        left: calc(50% - 59px);
        top: calc(50% - 59px);
        z-index: 1
    }

    @media (max-width:900px) {
        .ir-block--iesj .block-description {
            font-size: 1.25rem
        }

        .ir-block--iesj .half-video-content_layout {
            display: block
        }

        .ir-block--iesj .video-column {
            margin-bottom: 35px
        }

        .ir-block--iesj .video-content-column {
            margin: 0 auto;
            text-align: center
        }
    }

    @media (max-width:600px) {
        .ir-block--iesj {
            padding: 60px 0
        }

        .ir-block--iesj .block-title {
            font-size: 2rem
        }

        .ir-block--iesj .block-description,
        .ir-block--iesj .video-content-column {
            font-size: 1.125rem
        }

        .ir-block--iesj .play-icon {
            transform: scale(.5);
            transform-origin: 50% 50%
        }
    }

    .ir-block--brick_content {
        padding: 75px;
        background: #3b2129
    }

    .ir-block--innovation {
        padding-bottom: 100px;
        background: #3b2129
    }

    .ir-block--innovation .column-links {
        margin: 50px 0
    }

    .ir-block--innovation .column-links-grid {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 35px
    }

    .ir-block--innovation .column-links-grid>* {
        width: calc(33.333% - 35px)
    }

    @media (max-width:900px) {
        .ir-block--innovation .column-links-grid>* {
            width: calc(50% - 17.5px)
        }
    }

    @media (max-width:600px) {
        .ir-block--innovation .column-links-grid>* {
            width: 100%
        }
    }

    .ir-block--innovation .column-link {
        border-bottom: 5px solid #ddd646
    }

    .ir-block--innovation .cl-image {
        margin: 0 0 35px
    }

    .ir-block--innovation .cl-title {
        font-size: 1.5rem;
        color: #fff
    }

    .ir-block--innovation .statistic {
        margin: 2em 0 3em
    }

    .ir-block--innovation .stat-element {
        display: flex;
        align-items: center;
        gap: 8%
    }

    .ir-block--innovation .stat-icon {
        width: 160px
    }

    .ir-block--innovation .stat-content {
        color: #fff
    }

    .ir-block--innovation .stat-content span,
    .ir-block--recovery .stat-content span {
        display: block;
        line-height: 1.2
    }

    .ir-block--innovation .stat-content:after,
    .ir-block--recovery .stat-content:after {
        content: '';
        display: block;
        margin-top: 1.2em;
        width: 120px;
        height: 7px;
        background: #c6302b
    }

    .ir-block--innovation .stat-middle-text {
        font-weight: 700;
        font-size: 4.75rem
    }

    .ir-block--innovation .snapshots {
        margin: 50px 0
    }

    @media (max-width:500px) {
        .ir-block--innovation .stat-element {
            align-items: flex-start
        }
    }

    .ir-block--recovery {
        padding: 0 0 100px;
        background: #3b2129
    }

    .ir-block--recovery .block-quote {
        margin: 3em 0
    }

    .ir-block--recovery .block-quote blockquote {
        position: relative;
        margin: 0;
        padding: 100px 90px 70px;
        text-align: center;
        color: #fff;
        border: 0;
        background: #c6302b
    }

    .ir-block--recovery .block-quote blockquote:before {
        display: block;
        left: 50%;
        top: 50px;
        transform: translate(-50%, 0);
        font-size: 75px;
        line-height: 1
    }

    .ir-block--recovery .block-quote blockquote p,
    .ir-block--tributes blockquote p {
        font-family: 'Function Pro', sans-serif;
        line-height: 1.75;
        font-weight: 400
    }

    .ir-block--recovery .block-quote blockquote footer {
        margin-top: 2em
    }

    .ir-block--recovery .statistic {
        margin: 2em 0 3em
    }

    .ir-block--recovery .stat-element {
        display: flex;
        align-items: center;
        flex-direction: row-reverse;
        gap: 8%
    }

    .ir-block--recovery .stat-icon {
        width: 160px
    }

    .ir-block--recovery .stat-content {
        flex-grow: 1;
        color: #fff
    }

    .ir-block--recovery .stat-middle-text {
        font-weight: 700;
        font-size: 4.75rem
    }

    .ir-block--recovery .snapshots {
        margin: 50px 0
    }

    @media (max-width:600px) {
        .ir-block--recovery .block-quote blockquote {
            padding: 60px 20px 40px
        }

        .ir-block--recovery .block-quote blockquote:before {
            top: 10px
        }
    }

    @media (max-width:500px) {
        .ir-block--recovery .stat-element {
            align-items: flex-start
        }
    }

    .ir-block--bullets {
        padding: 60px 0;
        color: #fff;
        background: #3b2129;
        border-top: 1px solid #1a0b10;
        border-bottom: 1px solid #1a0b10
    }

    .ir-block--bullets .columns {
        display: grid;
        grid-template-columns: .6fr 1fr;
        gap: 8%
    }

    .ir-2021-block--wysiwyg.bg-red h1,
    .ir-2021-block--wysiwyg.bg-red h2,
    .ir-2021-block--wysiwyg.bg-red h3,
    .ir-2021-block--wysiwyg.bg-red h4,
    .ir-2021-block--wysiwyg.bg-red h5,
    .ir-2021-block--wysiwyg.bg-red h6,
    .ir-2022-block--big_blockquote.bg-blue .bound--layout blockquote p strong,
    .ir-2022-block--big_blockquote.bg-cream .bound--layout blockquote p strong,
    .ir-block--bullets .block-title {
        color: #fff
    }

    .ir-block--bullets .block-content {
        font-size: 1.125rem
    }

    .ir-block--bullets ul {
        list-style-type: none
    }

    .ir-block--bullets li:before {
        content: '';
        position: absolute;
        left: -30px;
        top: 13px;
        width: 8px;
        height: 8px;
        transform: rotate(45deg);
        background: #ddd646
    }

    .ir-block--bullets li strong {
        color: #ddd646
    }

    @media (max-width:600px) {
        .ir-block--bullets .columns {
            grid-template-columns: auto
        }
    }

    .ir-block--tributes {
        padding-bottom: 100px;
        background: #3b2129
    }

    .ir-block--tributes blockquote {
        border-left-color: #ddd646
    }

    .ir-block--tributes blockquote p {
        font-size: 1.75rem;
        line-height: 1.42857143
    }

    .ir-block--tributes .slides {
        margin: 50px 0
    }

    .ir-block--bacf,
    .ir-block--logos {
        background: #3b2129;
        border-top: 1px solid #1a0b10
    }

    .ir-block--bacf {
        padding-bottom: 100px
    }

    .ir-block--bacf .column-links {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 35px;
        margin-top: 50px
    }

    .ir-block--bacf .column-links>* {
        width: calc(33.333% - 35px)
    }

    @media (max-width:900px) {
        .ir-block--bacf .column-links>* {
            width: calc(50% - 17.5px)
        }
    }

    @media (max-width:600px) {
        .ir-block--bacf .column-links>* {
            width: 100%
        }
    }

    .ir-block--bacf .link-image {
        background: #000
    }

    .ir-block--bacf .link-image img {
        opacity: .3;
        transition: 200ms
    }

    .ir-block--bacf .link-content {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 10%;
        text-align: center
    }

    .ir-block--bacf .link-content_title {
        margin: 0;
        font-size: 1.75rem;
        color: #fff
    }

    .ir-block--bacf .link-content_title:after {
        content: '';
        display: block;
        position: relative;
        top: 18px;
        margin: 0 auto;
        width: 80px;
        height: 5px;
        background: #ddd646
    }

    .ir-block--logos {
        padding: 60px 0;
        color: #fff;
        border-bottom: 1px solid #1a0b10
    }

    .ir-block--logos .block-title {
        margin: 0 0 2em;
        text-align: center;
        color: #fff
    }

    .ir-block--logos .logos {
        justify-content: center;
        flex-wrap: wrap
    }

    .ir-block--dedicated {
        position: relative;
        padding: 70px 0;
        color: #fff;
        background: #3b2129 url(/wp-content/themes/nmc_iwmf/css/images/bryan-bg-full.jpg) 0 0 no-repeat;
        background-size: auto 100%;
        background-blend-mode: luminosity
    }

    .ir-block--dedicated:before {
        content: '';
        background: #3b2129;
        opacity: .92
    }

    .ir-block--dedicated .block-layout,
    .ir-block--logos .logos {
        display: flex;
        align-items: center;
        gap: 35px
    }

    .ir-block--dedicated .block-image {
        width: 216px;
        flex-shrink: 0
    }

    .ir-block--dedicated .block-image img {
        border-radius: 50%
    }

    .ir-block--dedicated p {
        margin: 0;
        font-family: 'Function Pro', sans-serif;
        font-size: 1.5rem;
        line-height: 1.33333333
    }

    @media (max-width:600px) {
        .ir-block--dedicated {
            padding: 40px 0
        }

        .ir-block--dedicated .block-image {
            width: 150px
        }

        .ir-block--dedicated p {
            font-size: 1.125rem
        }
    }

    @media (max-width:400px) {
        .ir-block--dedicated .block-layout {
            gap: 20px
        }

        .ir-block--dedicated .block-image {
            width: 100px
        }

        .ir-block--dedicated p {
            font-size: 1rem
        }
    }

    body.page-template-template-2021-impact-report,
    html.impact-report-2021 {
        font-family: 'Montserrat', sans-serif;
        color: #1a1919;
        background-color: #fef9f3;
        font-size: 15px
    }

    .page-template-template-2021-impact-report h1,
    .page-template-template-2021-impact-report h2,
    .page-template-template-2021-impact-report h3,
    .page-template-template-2021-impact-report h4,
    .page-template-template-2021-impact-report h5,
    .page-template-template-2021-impact-report h6 {
        font-weight: 600
    }

    .ir2021-big-title {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 3em;
        text-align: center
    }

    .ir-2021-block--wysiwyg h2:last-child,
    .ir-2021-block--wysiwyg h3:last-child,
    .ir-2021-block--wysiwyg h4:last-child,
    .ir-2021-block--wysiwyg h5:last-child,
    .ir-2021-block--wysiwyg h6:last-child,
    .ir-2021-block--wysiwyg p:last-child,
    .ir2021-big-title:last-child {
        margin: 0
    }

    .ir2021-big-title .block-title {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0 50px;
        min-height: 78px;
        font-family: 'PlayfairDisplay', serif;
        line-height: 1;
        background-size: 100% 100%;
        background-position: 50% 0;
        background-repeat: no-repeat
    }

    @media (min-width:901px) {
        .ir2021-big-title .block-title {
            font-size: 50px
        }
    }

    @media (max-width:825px) {
        .ir2021-big-title .block-title {
            min-height: 50px
        }
    }

    [data-nmc-has-entered=true] .ir2021-big-title .block-title {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-title-highlight.png)
    }

    .ir-2021-block {
        --defaultPadding: 40px;
        --reducedPadding: 30px;
        padding: var(--defaultPadding) 0
    }

    @media (max-width:600px) {
        .ir-2021-block {
            --defaultPadding: 30px;
            --reducedPadding: 15px
        }
    }

    .ir-2021-block.bg-lighttan {
        background-color: #fef9f3
    }

    .ir-2021-block.bg-lighttan.bg-pattern {
        position: relative;
        padding-top: 15vw
    }

    .ir-2021-block.bg-lighttan.bg-pattern:after {
        width: 100%;
        height: 0;
        padding-bottom: 38.80803881%;
        overflow: hidden;
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        background-size: 100% auto;
        background-position: 50% 0;
        background-repeat: no-repeat
    }

    .ir-2021-block.bg-lighttan.bg-pattern div {
        z-index: 2
    }

    .ir-2021-block.bg-lighttan.bg-pattern[data-nmc-has-entered=true]:after {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-lighttan-pattern.svg)
    }

    .ir-2021-block.bg-tan {
        background-color: #f8e1c2;
        padding: var(--defaultPadding) 0
    }

    .ir-2021-block.bg-tan+.ir-2021-block.bg-tan {
        padding-top: 0
    }

    .ir-2021-block.bg-tan.bg-pattern {
        background-size: auto auto;
        background-position: 100% 100%;
        background-repeat: no-repeat
    }

    .ir-2021-block.bg-tan.bg-pattern[data-nmc-has-entered=true] {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-tan-pattern.svg)
    }

    .ir-2021-block.bg-red-faded {
        background-color: #ccb9b8
    }

    .ir-2021-block.bg-red+.ir-2021-block.bg-red,
    .ir-2021-block.bg-red-faded+.ir-2021-block.bg-red-faded {
        padding-top: 0
    }

    .ir-2021-block.bg-red-faded.bg-pattern {
        position: relative;
        z-index: 1;
        overflow: hidden
    }

    .ir-2021-block.bg-red-faded.bg-pattern:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        z-index: -1;
        width: 276px;
        height: 182px;
        background-size: cover
    }

    .ir-2021-block.bg-red-faded.bg-pattern:after {
        content: '';
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: -1;
        width: 179px;
        height: 326px;
        background-size: cover
    }

    .ir-2021-block.bg-red-faded.bg-pattern[data-nmc-has-entered=true]:before {
        background: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-red-faded-pattern-1.svg) 0 0 no-repeat
    }

    .ir-2021-block.bg-red-faded.bg-pattern[data-nmc-has-entered=true]:after {
        background: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-red-faded-pattern-2.svg) 0 0 no-repeat
    }

    .ir-2021-block.bg-red {
        color: #fff;
        background-color: #723033
    }

    .ir-2021-block .bound--maximum,
    .ir-2021-block .bound--none {
        position: relative;
        margin: 0 auto;
        width: 100%
    }

    .ir-2021-block .bound--maximum {
        *zoom: 1;
        width: 94%
    }

    .ir-2021-block .bound--maximum:after,
    .ir-2021-block .bound--maximum:before {
        content: "";
        display: table
    }

    .ir-2021-block .bound--maximum:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2021-block .bound--maximum {
            width: 88%
        }
    }

    .ir-2021-block .bound--narrow {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 776px
    }

    .ir-2021-block .bound--narrow:after,
    .ir-2021-block .bound--narrow:before {
        content: "";
        display: table
    }

    .ir-2021-block .bound--narrow:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2021-block .bound--narrow {
            width: 88%
        }
    }

    .ir-2021-block .bound--layout {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 1080px
    }

    .ir-2021-block .bound--layout:after,
    .ir-2021-block .bound--layout:before {
        content: "";
        display: table
    }

    .ir-2021-block .bound--layout:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2021-block .bound--layout {
            width: 88%
        }
    }

    .ir-2021-block .bound--wide {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 1340px
    }

    .ir-2021-block .bound--wide:after,
    .ir-2021-block .bound--wide:before {
        content: "";
        display: table
    }

    .ir-2021-block .bound--wide:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2021-block .bound--wide {
            width: 88%
        }
    }

    .ir-2021-block .bound--hang {
        *zoom: 1;
        position: relative;
        margin-left: auto;
        width: 100%;
        max-width: calc(((100vw - 1080px)/2) + 1080px)
    }

    .ir-2021-block .bound--hang:after,
    .ir-2021-block .bound--hang:before {
        content: "";
        display: table
    }

    .ir-2021-block .bound--hang:after {
        clear: both
    }

    @media (max-width:1148px) {
        .ir-2021-block .bound--hang {
            width: calc(100vw - 3%)
        }
    }

    @media (max-width:600px) {
        .ir-2021-block .bound--hang {
            width: calc(100vw - 6%)
        }
    }

    .ir-2021-block .ir-content a {
        color: inherit;
        text-decoration: underline;
        transition: 200ms;
        font-weight: 700
    }

    .ir-2021-block .ir-content a:hover {
        opacity: .5
    }

    .ir-2021-block img.alignright {
        float: right;
        margin: 1em 0 1em 2em;
        max-width: 50%
    }

    .ir-2021-block img.alignleft {
        float: left;
        margin: 1em 2em 1em 0;
        max-width: 50%
    }

    .ir-2021-block img.aligncenter {
        display: block;
        margin: 1em auto;
        max-width: 100%
    }

    @media (max-width:600px) {
        .ir-2021-block img.alignright {
            margin: 1em 0 1em 1em
        }

        .ir-2021-block img.alignleft {
            margin: 1em 1em 1em 0
        }
    }

    .ir-2021-block .nmc-carousel {
        position: relative
    }

    .ir-2021-block .nmc-carousel .image-row-wrap .image-row-item:after,
    .ir-2021-block .nmc-carousel .image-row-wrap .image-row-item:before {
        background: #3b2129
    }

    .ir-2021-block .nmc-carousel .carousel-scroller {
        z-index: 1;
        position: relative;
        overflow-x: hidden
    }

    .ir-2021-block .nmc-carousel .caption {
        margin: 1em 0 0 15px
    }

    .ir-2021-block .nmc-carousel .carousel-nav button svg,
    .ir-2022-block .nmc-carousel .carousel-nav button svg {
        display: block;
        width: 100%;
        height: 100%
    }

    .ir-2021-block .nmc-carousel .carousel-nav button.carousel-nav_prev {
        left: 8px
    }

    .ir-2021-block .nmc-carousel .carousel-nav button.carousel-nav_next {
        right: 8px
    }

    body.page-template-template-2021-impact-report {
        --headerHeight: calc((100 / 1440) * 100vw);
        --toggleSize: 40px;
        --toggleGap: 5px;
        --toggle-top-shift-y: 5px;
        --toggle-top-shift-x: -5px
    }

    @media (max-width:600px) {
        body.page-template-template-2021-impact-report {
            --headerHeight: 60px
        }
    }

    .ir-2021-header {
        display: grid;
        justify-content: center;
        align-items: flex-end;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 10;
        width: 100%;
        padding: 0 20px;
        height: var(--headerHeight);
        min-height: 70px
    }

    .scrolled .ir-2021-header {
        align-items: center;
        min-height: 0;
        background: #fef9f3
    }

    .ir-2021-header .ir-nav_toggle {
        display: none
    }

    .ir-2021-header .ir-nav_ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px 20px;
        line-height: 1.2
    }

    .ir-2021-header .ir-nav_li {
        margin: 0;
        text-align: center
    }

    .ir-2021-header .ir-nav_a {
        font-weight: 700;
        color: #000
    }

    .ir-2021-header .ir-nav_a:focus {
        outline: 1px solid #000
    }

    @media (max-width:900px) {
        .ir-2021-header .ir-nav {
            font-size: 14px
        }

        .ir-2021-header .ir-nav_a {
            font-weight: 400
        }
    }

    @media (max-width:600px) {
        .ir-2021-header {
            min-height: 0;
            justify-content: end
        }

        .ir-2021-header .ir-nav {
            position: absolute;
            left: 0;
            top: 0;
            transform: translate3d(-100%, 0, 0);
            transition: 200ms;
            padding: 35px;
            width: calc(100% - 60px);
            max-width: 300px;
            background: #723033
        }

        .ir-2021-header .ir-nav[aria-hidden=false] {
            transform: translate3d(0, 0, 0)
        }

        .ir-2021-header .ir-nav_toggle {
            -webkit-appearance: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: var(--toggleGap);
            margin: 0;
            padding: 0;
            border: 0;
            background: 0 0;
            width: var(--toggleSize);
            height: var(--toggleSize);
            background: rgba(0, 0, 0, .2);
            z-index: 1;
            transition: 200ms
        }

        .ir-2021-header .ir-nav_toggle span {
            display: block;
            width: 60%;
            height: 2px;
            background: #fff;
            transform: none;
            transition: 200ms
        }

        .ir-2021-header .ir-nav_toggle span.m {
            transform-origin: 50% 50%
        }

        .ir-2021-header .ir-nav_toggle:focus {
            outline: 1px solid #fff
        }

        .ir-2021-header .ir-nav_toggle[aria-expanded=true] span.t {
            transform: rotate(-45deg) translate3d(var(--toggle-top-shift-x), var(--toggle-top-shift-y), 0)
        }

        .ir-2021-header .ir-nav_toggle[aria-expanded=true] span.m {
            transform: rotate(45deg)
        }

        .ir-2021-header .ir-nav_toggle[aria-expanded=true] span.b {
            opacity: 0
        }

        .ir-2021-header .ir-nav_ul {
            display: grid;
            gap: 10px
        }

        .ir-2021-header .ir-nav_li {
            text-align: left
        }

        .ir-2021-header .ir-nav_a {
            color: #fff
        }
    }

    @media (max-width:400px) {
        .ir-2021-header .ir-nav {
            padding: 35px 15px
        }
    }

    .ir-2021-block--masthead {
        position: relative;
        padding: 0;
        background: #fef9f3
    }

    .ir-2021-block--masthead .masthead-upper-content {
        position: relative
    }

    .ir-2021-block--masthead .masthead-upper-content .image .image-auto {
        padding-top: 57.98611111%
    }

    .ir-2021-block--masthead .masthead-upper-content .text {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center
    }

    .ir-2021-block--masthead .page-title,
    .ir-2021-block--wysiwyg h1 {
        font-family: 'PlayfairDisplay', serif;
        font-size: 78px
    }

    .ir-2021-block--masthead .page-subtitle {
        font-size: 28px
    }

    .ir-2021-block--masthead .iwmf-logo {
        width: 314px
    }

    @media (max-width:1440px) {
        .ir-2021-block--masthead .page-title {
            font-size: max(36px, (78/1440)*100vw)
        }
    }

    @media (max-width:1000px) {
        .ir-2021-block--masthead .iwmf-logo {
            width: calc((314/1000)*100vw)
        }
    }

    @media (max-width:850px) {
        .ir-2021-block--masthead .text {
            padding: 40px 15vw 0
        }

        .ir-2021-block--masthead .page-title {
            font-size: max(36px, (78/1440)*100vw)
        }

        .ir-2021-block--masthead .page-subtitle {
            font-size: max(18px, (28/850)*100vw)
        }
    }

    @media (max-width:600px) {
        .ir-2021-block--masthead .masthead-upper-content .image .image-auto {
            padding-top: 80%
        }
    }

    .ir-2021-block--masthead .masthead-content {
        position: relative;
        margin-top: 1vw;
        padding-bottom: 8vw;
        background: #f8e1c2
    }

    .ir-2021-block--masthead .masthead-content .bound--narrow {
        padding-top: 50px
    }

    .ir-2021-block--masthead .masthead-content-top-graphic {
        display: block;
        position: absolute;
        left: 0;
        bottom: calc(100% - 15vw);
        width: 100%;
        height: auto
    }

    .ir-2021-block--video .video_wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.4%;
        overflow: hidden
    }

    .ir-2021-block--video .video_wrap a {
        display: block;
        position: relative
    }

    .ir-2021-block--video .play-icon {
        display: block;
        position: absolute;
        left: calc(50% - 59px);
        top: calc(50% - 59px);
        z-index: 1
    }

    .ir-2021-block--video .caption {
        margin-top: .5em;
        margin-bottom: 0;
        font-style: italic;
        text-align: right
    }

    @media (max-width:600px) {
        .ir-2021-block--video .play-icon {
            transform: scale(.5);
            transform-origin: 50% 50%
        }
    }

    .ir-2021-block--wysiwyg {
        padding: var(--reducedPadding) 0
    }

    .ir-2021-block--wysiwyg.bg-red {
        color: #fff;
        background: #c6302b
    }

    .ir-2021-block--wysiwyg.bg-red blockquote {
        border-left-color: #fff
    }

    .ir-2021-block--wysiwyg h1 {
        font-size: 58px
    }

    .ir-2021-block--wysiwyg h2,
    .ir-2021-block--wysiwyg h3,
    .ir-2021-block--wysiwyg h4,
    .ir-2021-block--wysiwyg h5,
    .ir-2021-block--wysiwyg h6 {
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700
    }

    .ir-2021-block--wysiwyg h2 {
        font-size: 36px
    }

    .ir-2021-block--wysiwyg h3 {
        font-size: 32px
    }

    .ir-2021-block--wysiwyg h4 {
        font-size: 28px
    }

    .ir-2021-block--wysiwyg h5 {
        font-size: 24px
    }

    .ir-2021-block--wysiwyg h6 {
        font-size: 18px
    }

    .ir-2021-block--wysiwyg a:hover {
        opacity: .5
    }

    .ir-2021-block--wysiwyg blockquote {
        margin-left: 0;
        font-family: 'Function Pro', sans-serif;
        font-size: 28px;
        line-height: 1.42857143;
        font-weight: 400;
        border-left: 6px solid #c6302b
    }

    .ir-2021-block--wysiwyg ul li::marker {
        color: #ee5e2f
    }

    .ir-2021-block--stats {
        text-align: center
    }

    .ir-2021-block--stats .block-title {
        margin-bottom: 2em;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-size: 18px;
        font-weight: 700
    }

    .ir-2021-block--stats .stats {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px 0
    }

    .ir-2021-block--stats .stat {
        flex-basis: 33.333%
    }

    .ir-2021-block--stats .stat__icon {
        margin: 0 auto;
        display: flex;
        align-items: flex-end
    }

    .ir-2021-block--stats .stat__icon .image-auto {
        width: 100%
    }

    .ir-2021-block--stats .stat__number {
        font-family: 'PlayfairDisplay', serif;
        font-size: 68px;
        line-height: 1.5em
    }

    @media (max-width:1000px) {
        .ir-2021-block--stats .stat {
            flex-basis: 50%
        }
    }

    .ir-2021-block--blockquote[data-nmc-has-entered=true] .blockquote-wrap.style-background {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-callout-bg-red.svg)
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-background,
    .ir-2021-block--callout .callout-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 279px;
        text-align: center;
        background-repeat: no-repeat;
        background-position: 50% 50%
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-background .blockquote {
        overflow: initial;
        font-weight: initial;
        border: 0;
        position: relative;
        margin: 0 auto;
        padding: 0 20px;
        max-width: 760px;
        max-height: 230px;
        color: #fff;
        background: #723033
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-background .blockquote p {
        margin-bottom: 1em;
        font-size: 20px;
        line-height: 1.5em;
        font-family: 'Karla', 'Montserrat', sans-serif
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-background .blockquote footer {
        margin: 1em 0 0
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-background .quotation-mark {
        position: absolute;
        left: 50%;
        bottom: calc(100% + 15px);
        transform: translate(-50%, 0)
    }

    @media (max-width:750px) {
        .ir-2021-block--blockquote .blockquote-wrap.style-background .blockquote-wrap {
            min-height: 0;
            background: 0 0
        }

        .ir-2021-block--blockquote .blockquote-wrap.style-background .blockquote {
            padding: 60px 20px 30px;
            max-height: none
        }

        .ir-2021-block--blockquote .blockquote-wrap.style-background .quotation-mark {
            top: 20px;
            bottom: auto
        }
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-bordered .blockquote {
        border-left: 10px solid #ffe1e1
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-bordered .blockquote p {
        font-size: 32px;
        line-height: 1.46875em;
        font-weight: 400
    }

    .ir-2021-block--blockquote .blockquote-wrap.style-bordered .blockquote footer {
        font-weight: 400
    }

    @media (max-width:750px) {
        .ir-2021-block--blockquote .blockquote-wrap.style-bordered .blockquote p {
            font-size: 28px
        }
    }

    @media (max-width:500px) {
        .ir-2021-block--blockquote .blockquote-wrap.style-bordered .blockquote p {
            font-size: 20px
        }
    }

    .ir-2021-block--callout .callout-wrap {
        position: relative
    }

    .ir-2021-block--callout[data-nmc-has-entered=true] .callout-wrap {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-callout-bg-red-faded.svg)
    }

    .ir-2021-block--callout .callout {
        margin: 0 auto;
        padding: 0 20px;
        max-width: 760px;
        background: #f9dac6
    }

    .ir-2021-block--callout .callout p {
        margin-bottom: 1em;
        font-size: 32px;
        line-height: 1.46875em
    }

    .ir-2021-block--callout .callout p:last-child,
    .ir-2022-block--wysiwyg ul:last-child {
        margin-bottom: 0
    }

    .ir-2021-block--callout .callout-wrap.style-text-only {
        min-height: 0;
        background-image: none
    }

    .ir-2021-block--callout .callout-wrap.style-text-only .callout {
        padding: 0;
        background: 0 0
    }

    .ir-2021-block--callout .callout-wrap.style-text-only .highlight {
        padding: 0 10px;
        background: #d8d7a3
    }

    @media (max-width:750px) {
        .ir-2021-block--callout .callout-wrap {
            min-height: 0;
            background: 0 0
        }

        .ir-2021-block--callout .callout {
            padding: 50px 20px
        }

        .ir-2021-block--callout .callout p {
            font-size: 28px
        }
    }

    @media (max-width:500px) {
        .ir-2021-block--callout .callout p {
            font-size: 20px
        }
    }

    @media (max-width:960px) {
        .ir-2021-block--tabs .tabs {
            grid-template-columns: 1fr 1.5fr
        }
    }

    @media (max-width:500px) {
        .ir-2021-block--tabs .tabs {
            grid-template-columns: 1fr
        }

        .ir-2021-block--tabs .tab {
            margin-top: 0
        }
    }

    @media (max-width:768px) {
        .ir-2021-block--caov_preview .content.has-image {
            grid-template-columns: 1fr;
            justify-items: center
        }

        .ir-2021-block--caov_preview .content.has-image .image {
            order: -1;
            width: 100%;
            max-width: 286px
        }
    }

    .ir-2022-block--masthead .masthead-content h3 {
        font-size: 28px
    }

    @media (max-width:1000px) {
        .ir-2021-block--highlights .highlight {
            font-size: 28px
        }
    }

    @media (max-width:500px) {
        .ir-2021-block--highlights .highlight {
            font-size: 22px
        }
    }

    .ir-2021-block--big_feature {
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding: 0 !important
    }

    .ir-2021-block--big_feature .image {
        order: -1;
        display: flex;
        align-items: center;
        background: #333
    }

    .ir-2021-block--big_feature .image .image-auto {
        width: 100%
    }

    .ir-2021-block--big_feature .text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        padding: 30px 30px 30px 0;
        background: #fae2e2
    }

    .ir-2021-block--big_feature .text:before {
        content: '';
        position: absolute;
        right: 100%;
        top: 0;
        z-index: 1;
        height: 100%;
        width: 100px;
        background-position: 0 50%;
        background-repeat: no-repeat;
        background-size: cover
    }

    .ir-2021-block--big_feature .text>* {
        max-width: 500px;
        width: 100%
    }

    .ir-2021-block--big_feature[data-nmc-has-entered=true] .text:before {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-big-feature-squiggle.png)
    }

    .ir-2021-block--big_feature .small-heading {
        order: -1;
        font-size: 18px
    }

    .ir-2021-block--big_feature .block-title,
    .ir-2021-block--big_feature .small-heading {
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700
    }

    .ir-2021-block--big_feature .button {
        position: relative;
        display: inline-flex;
        align-items: center;
        margin-left: 25px;
        padding: 0 15px;
        height: 40px;
        color: #fff;
        font-weight: 700;
        background: #723033
    }

    .ir-2021-block--big_feature .button svg,
    .ir-2021-block--footer .footer-top-title a svg {
        display: block
    }

    .ir-2021-block--big_feature .button span.left-paint {
        display: inline-flex;
        position: absolute;
        left: -24px;
        top: 0;
        width: 25px;
        height: 100%
    }

    .ir-2021-block--big_feature .button span.right-paint {
        display: inline-flex;
        position: absolute;
        right: -15px;
        top: 0;
        width: 16px;
        height: 100%
    }

    .ir-2021-block--big_feature .button:hover,
    .ir-2021-block--footer .footer-top-title a:hover {
        background: #f15e2f
    }

    .ir-2021-block--big_feature .button:hover svg path,
    .ir-2021-block--footer .footer-top-title a:hover svg path {
        fill: #f15e2f
    }

    @media (max-width:900px) {
        .ir-2021-block--big_feature {
            grid-template-columns: 1fr
        }

        .ir-2021-block--big_feature .text {
            padding: 30px
        }

        .ir-2021-block--big_feature .text>* {
            max-width: none
        }

        .ir-2021-block--big_feature .text:before {
            display: none
        }
    }

    .ir-2021-block--image .block-title {
        position: relative;
        z-index: 1;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700;
        text-align: center
    }

    .ir-2021-block--image .image {
        position: relative
    }

    .ir-2021-block--image .image .image-auto {
        z-index: 1
    }

    .ir-2021-block--image .burst {
        display: block;
        position: absolute;
        right: -65px;
        top: -96px
    }

    .ir-2021-block--image .caption {
        margin-top: 1em
    }

    @media (max-width:960px) {
        .ir-2021-block--image .burst {
            right: -10px;
            top: -80px
        }
    }

    .ir-2021-block--image_slider .block-title {
        position: relative;
        z-index: 1;
        max-width: 1080px;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700;
        text-align: center
    }

    .ir-2021-block--image_slider .nmc-slider {
        gap: 20px
    }

    .ir-2021-block--image_slider .nmc-slider.snaps .nmc-slide {
        width: 40vw
    }

    .ir-2021-block--image_slider .caption {
        margin-top: 1em
    }

    .ir-2021-block--image_slider .jumpbuttons {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px
    }

    .ir-2021-block--image_slider .jumpbutton {
        appearance: none;
        padding: 0;
        border: 0;
        background: 0 0;
        cursor: pointer;
        text-indent: -9999em;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #ccb9b8
    }

    .ir-2021-block--image_slider .jumpbutton.active {
        background: #723033
    }

    @media (max-width:800px) {
        .ir-2021-block--image_slider .nmc-slider.snaps .nmc-slide {
            width: calc(100% - 3vw)
        }
    }

    @media (max-width:600px) {
        .ir-2021-block--image_slider .nmc-slider.snaps .nmc-slide {
            width: calc(100% - 6vw)
        }
    }

    .ir-2021-block--half_and_half {
        padding-top: 110px
    }

    .ir-2021-block.bg-lighttan+.ir-2021-block--half_and_half.bg-lighttan {
        padding-top: 60px
    }

    .ir-2021-block--half_and_half .layout {
        display: flex;
        align-items: center;
        gap: 50px
    }

    .ir-2021-block--half_and_half .block-title {
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700
    }

    .ir-2021-block--half_and_half .image {
        position: relative;
        width: 40%
    }

    .ir-2021-block--half_and_half .image .image-auto {
        z-index: 1
    }

    .ir-2021-block--half_and_half .text {
        width: 60%
    }

    .ir-2021-block--half_and_half .burst {
        display: block;
        position: absolute;
        right: -65px;
        top: -96px
    }

    .ir-2021-block--half_and_half .layout.flip .image {
        order: -1
    }

    .ir-2021-block--half_and_half .layout.flip .burst {
        right: auto;
        top: -96px;
        left: -65px
    }

    @media (max-width:1260px) {
        .ir-2021-block--half_and_half .layout {
            align-items: initial
        }

        .ir-2021-block--half_and_half .burst {
            right: -10px;
            top: -80px
        }

        .ir-2021-block--half_and_half .layout.flip .burst {
            left: -10px;
            top: -80px
        }
    }

    @media (max-width:700px) {
        .ir-2021-block--half_and_half .layout {
            flex-wrap: wrap;
            gap: 30px
        }

        .ir-2021-block--half_and_half .image {
            order: -1;
            width: 100%
        }

        .ir-2021-block--half_and_half .text {
            width: 100%
        }
    }

    @media (max-width:600px) {
        .ir-2021-block--links .bound--layout {
            width: 100%
        }
    }

    .ir-2021-block--footer:last-child {
        padding-bottom: 0
    }

    .ir-2021-block--footer .footer-top {
        padding: 70px 0 18vw;
        text-align: center;
        background: #f8e1c2
    }

    .ir-2021-block--footer .small-heading {
        margin: 0 0 10px;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-size: 18px;
        font-weight: 700
    }

    .ir-2021-block--footer .footer-top-title {
        position: relative;
        z-index: 1;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-size: 36px;
        font-weight: 700
    }

    .ir-2021-block--footer .footer-top-title a {
        display: inline-flex;
        position: relative;
        height: 40px;
        background: #fff
    }

    .ir-2021-block--footer .footer-top-title a span.left-paint {
        display: inline-flex;
        position: absolute;
        left: -10px;
        top: 0;
        z-index: -1;
        width: 25px;
        height: 100%
    }

    .ir-2021-block--footer .footer-top-title a span.right-paint {
        display: inline-flex;
        position: absolute;
        right: -10px;
        top: 0;
        z-index: -1;
        width: 16px;
        height: 100%
    }

    .ir-2021-block--footer .footer-bottom {
        position: relative;
        padding: 2vw 0 50px;
        text-align: center
    }

    .ir-2021-block--footer .footer-bottom .bound--narrow {
        display: flex;
        flex-direction: column;
        align-items: center
    }

    .ir-2021-block--footer .curves {
        position: absolute;
        left: 0;
        bottom: calc(100% - 9vw);
        width: 100%
    }

    .ir-2021-block--footer .iwmf-logo {
        margin: 0 0 30px;
        width: 100%;
        max-width: 312px
    }

    .ir-2021-block--footer .footer-social {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px
    }

    .ir-2021-block--footer .footer-social a {
        width: 60px;
        height: 60px
    }

    .ir-2021-block--footer .footer-social svg path {
        fill: #df673e
    }

    html.impact-report-2022 {
        scroll-behavior: smooth;
        scroll-padding: 60px 0 0;
        overflow-x: hidden
    }

    body.page-template-template-2022-impact-report,
    html.impact-report-2022 {
        font-family: 'Inter', sans-serif;
        color: #1a1919;
        font-size: 16px
    }

    .page-template-template-2022-impact-report {
        overflow-x: hidden
    }

    .page-template-template-2022-impact-report h1,
    .page-template-template-2022-impact-report h2 {
        font-family: 'Magra', sans-serif
    }

    .page-template-template-2022-impact-report h3,
    .page-template-template-2022-impact-report h4,
    .page-template-template-2022-impact-report h5,
    .page-template-template-2022-impact-report h6 {
        font-family: 'Chivo', serif
    }

    .ir-2022-block {
        --defaultPadding: 40px;
        --reducedPadding: 30px;
        padding: var(--defaultPadding) 0
    }

    @media (max-width:600px) {
        .ir-2022-block {
            --defaultPadding: 30px;
            --reducedPadding: 15px
        }
    }

    .ir-2022-block a:not(.button) {
        text-decoration: none;
        transition: all .25s ease-in-out;
        font-weight: 400;
        border-bottom: 1px solid currentColor
    }

    .ir-2022-block a:not(.button):hover {
        color: #691f1b
    }

    .ir-2022-block.bg-cream {
        background: #faf3e7
    }

    .ir-2022-block.bottom-x2,
    .ir-2022-block.bottom-x2.ir-2022-block--masthead .masthead-content {
        padding-bottom: 150px
    }

    .ir-2022-block.bottom-x2.ir-2022-block--masthead,
    .ir-2022-block.bottom-x3.ir-2022-block--masthead {
        padding-bottom: 0
    }

    .ir-2022-block.bottom-x3,
    .ir-2022-block.bottom-x3.ir-2022-block--masthead .masthead-content {
        padding-bottom: 250px
    }

    .ir-2022-block.top-x2 {
        padding-top: 150px
    }

    .ir-2022-block.top-x3 {
        padding-top: 250px
    }

    .ir-2022-block.top-none {
        padding-top: 10px
    }

    .ir-2022-block.bottom-none {
        padding-bottom: 10px
    }

    .ir-2022-block h2 {
        font-weight: 700;
        position: relative
    }

    .ir-2022-block .block-button a.button {
        font-family: 'Chivo', serif;
        display: inline-block;
        background: #c7491f;
        color: #fff;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 17px;
        letter-spacing: 1px;
        padding: 16px;
        height: auto;
        line-height: 1;
        transition: all .25s ease-in-out
    }

    .ir-2022-block .block-button a.button:focus,
    .ir-2022-block .block-button a.button:hover {
        background: #691f1b
    }

    .ir-2022-block.bg-tan {
        background-color: #f8e1c2;
        padding: var(--defaultPadding) 0
    }

    .ir-2022-block.bg-tan+.ir-2021-block.bg-tan {
        padding-top: 0
    }

    .ir-2022-block.bg-tan.bg-pattern {
        background-size: auto auto;
        background-position: 100% 100%;
        background-repeat: no-repeat
    }

    .ir-2022-block.bg-tan.bg-pattern[data-nmc-has-entered=true] {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-tan-pattern.svg)
    }

    .ir-2022-block.bg-red-faded {
        background-color: #ccb9b8
    }

    .ir-2022-block.bg-red+.ir-2021-block.bg-red,
    .ir-2022-block.bg-red-faded+.ir-2021-block.bg-red-faded {
        padding-top: 0
    }

    .ir-2022-block.bg-red-faded.bg-pattern {
        position: relative;
        z-index: 1;
        overflow: hidden
    }

    .ir-2022-block.bg-red-faded.bg-pattern:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        z-index: -1;
        width: 276px;
        height: 182px;
        background-size: cover
    }

    .ir-2022-block.bg-red-faded.bg-pattern:after {
        content: '';
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: -1;
        width: 179px;
        height: 326px;
        background-size: cover
    }

    .ir-2022-block.bg-red-faded.bg-pattern[data-nmc-has-entered=true]:before {
        background: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-red-faded-pattern-1.svg) 0 0 no-repeat
    }

    .ir-2022-block.bg-red-faded.bg-pattern[data-nmc-has-entered=true]:after {
        background: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-bg-red-faded-pattern-2.svg) 0 0 no-repeat
    }

    .ir-2022-block.bg-red {
        color: #fff;
        background-color: #691f1b
    }

    .ir-2022-block.bg-blue {
        background-color: #aed8fb
    }

    .ir-2022-block .bound--maximum,
    .ir-2022-block .bound--none {
        position: relative;
        margin: 0 auto;
        width: 100%
    }

    .ir-2022-block .bound--maximum {
        *zoom: 1;
        width: 94%
    }

    .ir-2022-block .bound--maximum:after,
    .ir-2022-block .bound--maximum:before {
        content: "";
        display: table
    }

    .ir-2022-block .bound--maximum:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2022-block .bound--maximum {
            width: 88%
        }
    }

    .ir-2022-block .bound--narrow {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 776px
    }

    .ir-2022-block .bound--narrow:after,
    .ir-2022-block .bound--narrow:before {
        content: "";
        display: table
    }

    .ir-2022-block .bound--narrow:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2022-block .bound--narrow {
            width: 88%
        }
    }

    .ir-2022-block .bound--narrow2 {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 900px
    }

    .ir-2022-block .bound--narrow2:after,
    .ir-2022-block .bound--narrow2:before {
        content: "";
        display: table
    }

    .ir-2022-block .bound--narrow2:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2022-block .bound--narrow2 {
            width: 88%
        }
    }

    .ir-2022-block .bound--layout {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 1080px
    }

    .ir-2022-block .bound--layout:after,
    .ir-2022-block .bound--layout:before {
        content: "";
        display: table
    }

    .ir-2022-block .bound--layout:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2022-block .bound--layout {
            width: 88%
        }
    }

    .ir-2022-block .bound--wide {
        *zoom: 1;
        position: relative;
        margin: 0 auto;
        width: 94%;
        max-width: 1340px
    }

    .ir-2022-block .bound--wide:after,
    .ir-2022-block .bound--wide:before {
        content: "";
        display: table
    }

    .ir-2022-block .bound--wide:after {
        clear: both
    }

    @media (max-width:600px) {
        .ir-2022-block .bound--wide {
            width: 88%
        }
    }

    .ir-2022-block .bound--hang {
        *zoom: 1;
        position: relative;
        margin-left: auto;
        width: 100%;
        max-width: calc(((100vw - 1080px)/2) + 1080px)
    }

    .ir-2022-block .bound--hang:after,
    .ir-2022-block .bound--hang:before {
        content: "";
        display: table
    }

    .ir-2022-block .bound--hang:after {
        clear: both
    }

    @media (max-width:1148px) {
        .ir-2022-block .bound--hang {
            width: calc(100vw - 3%)
        }
    }

    @media (max-width:600px) {
        .ir-2022-block .bound--hang {
            width: calc(100vw - 6%)
        }
    }

    .ir-2022-block img.alignright {
        float: right;
        margin: 1em 0 1em 2em;
        max-width: 50%
    }

    .ir-2022-block img.alignleft {
        float: left;
        margin: 1em 2em 1em 0;
        max-width: 50%
    }

    .ir-2022-block img.aligncenter {
        display: block;
        margin: 1em auto;
        max-width: 100%
    }

    @media (max-width:600px) {
        .ir-2022-block img.alignright {
            margin: 1em 0 1em 1em
        }

        .ir-2022-block img.alignleft {
            margin: 1em 1em 1em 0
        }
    }

    .ir-2022-block .nmc-carousel,
    .ir-2022-block--big_blockquote blockquote p em,
    .ir-2022-block--stats.column .stat__number.accent-burst span.stat__number-numeral {
        position: relative
    }

    .ir-2022-block .nmc-carousel .image-row-wrap .image-row-item:after,
    .ir-2022-block .nmc-carousel .image-row-wrap .image-row-item:before {
        background: #3b2129
    }

    .ir-2022-block .nmc-carousel .carousel-scroller {
        z-index: 1;
        position: relative;
        overflow-x: hidden
    }

    .ir-2022-block .nmc-carousel .caption {
        margin: 1em 0 0 15px
    }

    .ir-2022-block .nmc-carousel .carousel-nav button.carousel-nav_prev {
        left: 8px
    }

    .ir-2022-block .nmc-carousel .carousel-nav button.carousel-nav_next {
        right: 8px
    }

    .ir-2022-block--section_heading.offset {
        margin-top: -140px
    }

    .ir-2022-block--section_heading .section-mast .bound--layout {
        text-align: center;
        min-height: 235px;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .ir-2022-block--section_heading .section-mast .head-brush {
        max-width: 100%;
        height: auto;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 50%;
        transform: translateY(-50%)
    }

    .ir-2022-block--section_heading .section-mast .head-text {
        position: relative;
        display: inline-block;
        z-index: 3
    }

    .ir-2022-block--section_heading .section-mast .head-text h2 {
        font-size: 78px;
        line-height: 1;
        margin: 0;
        position: Relative;
        z-index: 2
    }

    .ir-2022-block--section_heading .section-mast .head-text .head-bg {
        position: absolute;
        left: -40px;
        right: 0;
        margin: 0 auto;
        z-index: 1;
        width: calc(100% + 80px);
        height: calc(100% + 20px);
        top: -10px
    }

    .ir-2022-block--section_heading .section-mast.style-red h2 {
        color: #fef9f3
    }

    .ir-2022-block--section_heading .section-mast.style-red svg.dots {
        position: absolute;
        z-index: 2;
        top: 0;
        right: 3%
    }

    .ir-2022-block--section_heading .section-mast.style-red svg.pink-circle {
        position: absolute;
        left: 0;
        top: 0
    }

    .ir-2022-block--big_blockquote.bg-red .bound--layout blockquote strong,
    .ir-2022-block--section_heading .section-mast.style-pink h2 {
        color: #691f1b
    }

    .ir-2022-block--section_heading .section-mast.style-pink svg.crosses {
        position: absolute;
        left: 0;
        z-index: 2;
        bottom: 15%
    }

    .ir-2022-block--section_heading .section-mast.style-pink svg.cream-circle {
        position: absolute;
        right: 0;
        top: 0
    }

    .ir-2022-block--section_heading .section-mast.style-pink svg.head-bg path {
        fill: #aed8fb !important
    }

    .ir-2022-block--callout.bg-red svg.hatches path,
    .ir-2022-block--section_heading .section-mast.style-pink svg.head-brush path {
        fill: #bd94af !important
    }

    .ir-2022-block--section_heading .section-mast.style-blue h2 {
        color: #faf3e7
    }

    .ir-2022-block--section_heading .section-mast.style-blue svg.hatch-heading {
        position: absolute;
        right: 7%;
        z-index: 2;
        bottom: 20px
    }

    .ir-2022-block--section_heading .section-mast.style-blue svg.circle {
        position: absolute;
        left: 0;
        top: 0
    }

    .ir-2022-block--section_heading .section-mast.style-blue svg.circle path.circ {
        fill: #c7491f !important
    }

    .ir-2022-block--section_heading .section-mast.style-blue svg.head-bg path {
        fill: #691f1b !important
    }

    .ir-2022-block--section_heading .section-mast.style-blue svg.head-brush path {
        fill: #aed8fb !important
    }

    .ir-2022-block--intro_text .bound--narrow {
        text-align: center
    }

    .ir-2022-block--intro_text .bound--narrow p {
        font-size: 20px
    }

    @media (max-width:700px) {
        .ir-2022-block--intro_text .bound--narrow p {
            font-size: 18px
        }
    }

    .ir-2022-block--resource_links .block-title {
        text-align: center;
        padding-bottom: 10px
    }

    .ir-2022-block--resource_links .link-item:last-child .link {
        border-bottom: 1px solid #c6c6c6
    }

    .ir-2022-block--resource_links .link-item .link {
        display: flex;
        align-items: center;
        border-top: 1px solid #c6c6c6;
        padding: 12px 0;
        font-size: 20px;
        font-weight: 700;
        transition: all .25s ease-in-out
    }

    .ir-2022-block--resource_links .link-item .link .arrow {
        width: 28px;
        height: 20px;
        display: flex;
        align-items: center
    }

    .ir-2022-block--resource_links .link-item .link .arr {
        display: block;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 12px solid #c7491f;
        transition: all .25s ease-in-out
    }

    .ir-2022-block--resource_links .link-item .link:focus,
    .ir-2022-block--resource_links .link-item .link:hover {
        color: #c7491f
    }

    .ir-2022-block--resource_links .link-item .link:focus .arr,
    .ir-2022-block--resource_links .link-item .link:hover .arr {
        transform: translateX(8px)
    }

    @media (max-width:1100px) {
        .ir-2022-block--resource_links .link-item .link {
            font-size: 16px
        }

        .ir-2022-block--resource_links .link-item .link .arrow {
            width: 20px
        }

        .ir-2022-block--resource_links .link-item .link .arr {
            border-top-width: 6px;
            border-bottom-width: 6px;
            border-left-width: 10px
        }
    }

    body.page-template-template-2022-impact-report {
        --headerHeight: 70px;
        --toggleSize: 40px;
        --toggleGap: 5px;
        --toggle-top-shift-y: 5px;
        --toggle-top-shift-x: -5px
    }

    @media (max-width:600px) {
        body.page-template-template-2022-impact-report {
            --headerHeight: 60px
        }
    }

    .ir-2022-header {
        display: grid;
        justify-content: center;
        align-items: center;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 10;
        width: 100%;
        padding: 0 20px;
        height: 70px;
        min-height: 70px;
        transition: all .25s ease-in-out
    }

    .scrolled .ir-2022-header {
        min-height: 0;
        height: 50px;
        background: #691f1b
    }

    .ir-2022-block--big_feature .text svg.feature-border.mobile,
    .ir-2022-header .ir-nav_toggle {
        display: none
    }

    .ir-2022-header .ir-nav_ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 2.5vw;
        line-height: 1.2
    }

    .ir-2022-header .ir-nav_li {
        margin: 0;
        text-align: center
    }

    .ir-2022-header .ir-nav_a {
        color: #fff;
        font-family: 'Chivo', serif;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 17px;
        position: relative;
        transition: all .25s ease-in-out
    }

    .ir-2022-header .ir-nav_a:after {
        content: '';
        position: absolute;
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/menu-link-hover.png) center/100% 20px no-repeat;
        width: calc(100% + 20px);
        height: 100%;
        left: -10px;
        top: 0;
        z-index: -1;
        right: 0;
        margin: 0 auto;
        opacity: .8;
        transition: all .6s cubic-bezier(.85, 0, .15, 1);
        clip-path: inset(0 100% 0 0)
    }

    .ir-2022-header .ir-nav_a:focus:after,
    .ir-2022-header .ir-nav_a:hover:after {
        clip-path: inset(0)
    }

    @media (max-width:1100px) {
        .ir-2022-header .ir-nav_a {
            font-size: 15px
        }
    }

    @media (max-width:900px) {
        .ir-2022-header {
            min-height: 0;
            justify-content: end
        }

        .ir-2022-header .ir-nav {
            position: absolute;
            left: 0;
            top: 0;
            transform: translate3d(-100%, 0, 0);
            transition: 200ms;
            padding: 35px;
            width: calc(100% - 60px);
            max-width: 300px;
            background: #723033
        }

        .ir-2022-header .ir-nav[aria-hidden=false] {
            transform: translate3d(0, 0, 0)
        }

        .ir-2022-header .ir-nav_toggle {
            -webkit-appearance: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: var(--toggleGap);
            margin: 0;
            padding: 0;
            border: 0;
            background: 0 0;
            width: var(--toggleSize);
            height: var(--toggleSize);
            background: #aed8fb;
            z-index: 1;
            transition: 200ms;
            border-radius: 50%
        }

        .ir-2022-header .ir-nav_toggle span {
            display: block;
            width: 60%;
            height: 2px;
            background: #1b1517;
            transform: none;
            transition: 200ms
        }

        .ir-2022-header .ir-nav_toggle span.m {
            transform-origin: 50% 50%
        }

        .ir-2022-header .ir-nav_toggle:focus {
            outline: 1px solid #fff
        }

        .ir-2022-header .ir-nav_toggle[aria-expanded=true] span.t {
            transform: rotate(-45deg) translate3d(var(--toggle-top-shift-x), var(--toggle-top-shift-y), 0)
        }

        .ir-2022-header .ir-nav_toggle[aria-expanded=true] span.m {
            transform: rotate(45deg)
        }

        .ir-2022-header .ir-nav_toggle[aria-expanded=true] span.b {
            opacity: 0
        }

        .ir-2022-header .ir-nav_ul {
            display: grid;
            gap: 10px
        }

        .ir-2022-header .ir-nav_li {
            text-align: left
        }

        .ir-2022-header .ir-nav_a {
            color: #fff
        }
    }

    @media (max-width:400px) {
        .ir-2022-header .ir-nav {
            padding: 35px 15px
        }
    }

    .ir-2022-block--big_blockquote {
        background: 0 0 !important
    }

    .ir-2022-block--big_blockquote .blockquote-wrap {
        position: Relative
    }

    .ir-2022-block--big_blockquote .blockquote-wrap:after,
    .ir-2022-block--big_blockquote .blockquote-wrap:before {
        content: '';
        position: absolute;
        z-index: 1;
        width: 170px;
        height: 170px;
        opacity: .5
    }

    .ir-2022-block--big_blockquote .blockquote-wrap:before {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_quote1.png) center/contain no-repeat;
        top: 30px;
        left: 5%
    }

    .ir-2022-block--big_blockquote .blockquote-wrap:after {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_quote2.png) center/contain no-repeat;
        right: 5%;
        bottom: 30px
    }

    .ir-2022-block--big_blockquote .bound--layout.large .blockquote-inner {
        padding: 70px 30px 70px 140px
    }

    .ir-2022-block--big_blockquote .bound--layout.large blockquote {
        padding: 0;
        width: 70%
    }

    .ir-2022-block--big_blockquote .bound--layout.large blockquote p {
        margin-bottom: 0
    }

    .ir-2022-block--big_blockquote .bound--layout.large .extra-line {
        font-size: 68px;
        line-height: normal
    }

    .ir-2022-block--big_blockquote .bound--layout.large.with-img .blockquote-inner {
        display: flex
    }

    .ir-2022-block--big_blockquote .bound--layout.large.with-img .quote-image {
        width: 275px;
        height: 275px;
        margin-left: 10px;
        overflow: hidden;
        background: #fff;
        border-radius: 50%;
        padding-top: 10px;
        display: flex;
        align-items: flex-end
    }

    .ir-2022-block--big_blockquote .bound--layout.large.with-img .quote-image .image {
        width: 80%;
        margin: 0 auto -8px
    }

    .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote {
        flex: 1;
        width: unset
    }

    @media (max-width:1200px) {
        .ir-2022-block--big_blockquote .bound--layout.large blockquote {
            width: 75%
        }

        .ir-2022-block--big_blockquote .bound--layout.large .blockquote-inner {
            padding: 65px 25px 65px 80px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img .quote-image {
            width: 250px;
            height: 250px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote p {
            font-size: 25px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote p em:before {
            height: 35px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote p em:after {
            height: 33px;
            top: 1px
        }

        .ir-2022-block--big_blockquote .bound--layout.large .extra-line {
            font-size: 58px
        }
    }

    @media (max-width:900px) {
        .ir-2022-block--big_blockquote .bound--layout.large:not(.with-img) .blockquote-inner {
            padding: 50px
        }

        .ir-2022-block--big_blockquote .bound--layout.large:not(.with-img) blockquote {
            width: 100%
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img {
            margin-top: 45px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img .blockquote-inner {
            flex-direction: column-reverse;
            padding: 0 30px 30px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img .quote-image {
            width: 175px;
            height: 175px;
            margin: -40px 0 15px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote p {
            font-size: 22px;
            margin-bottom: 10px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote p em:before {
            height: 32px
        }

        .ir-2022-block--big_blockquote .bound--layout.large.with-img blockquote p em:after {
            height: 30px
        }

        .ir-2022-block--big_blockquote .bound--layout.large .extra-line {
            font-size: 28px;
            line-height: 1.2;
            margin-top: 5px
        }
    }

    @media (max-width:700px) {
        .ir-2022-block--big_blockquote .bound--layout.large:not(.with-img) .blockquote-inner {
            padding: 22px
        }
    }

    .ir-2022-block--big_blockquote .blockquote-inner {
        position: relative;
        z-index: 3
    }

    .ir-2022-block--big_blockquote blockquote {
        border: 0;
        margin: 0;
        overflow: visible;
        padding: 100px 140px
    }

    .ir-2022-block--big_blockquote blockquote footer,
    .ir-2022-block--big_blockquote blockquote p,
    .ir-2022-block--big_blockquote.bg-pink .bound--layout blockquote p strong {
        color: #1a1919
    }

    .ir-2022-block--big_blockquote blockquote p,
    .ir-2022-block--blockquote blockquote p {
        font-size: 30px;
        font-family: 'Chivo', serif;
        font-weight: 400;
        line-height: 1.6
    }

    .ir-2022-block--big_blockquote blockquote p em:after,
    .ir-2022-block--big_blockquote blockquote p em:before,
    .ir-2022-block--big_blockquote blockquote p strong:after,
    .ir-2022-block--big_blockquote blockquote p strong:before {
        content: '';
        position: absolute
    }

    .ir-2022-block--big_blockquote blockquote p em {
        font-style: normal;
        padding-left: 10px;
        padding-right: 10px
    }

    .ir-2022-block--big_blockquote blockquote p em:before {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_bracket-left.png) center/contain no-repeat;
        width: 19px;
        left: 0;
        height: 40px;
        top: 0
    }

    .ir-2022-block--big_blockquote blockquote p em:after {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_bracket-right.png) center/contain no-repeat;
        width: 15px;
        height: 37px;
        top: 2px;
        right: 0
    }

    .ir-2022-block--big_blockquote blockquote p strong {
        position: relative;
        margin-left: 5px;
        white-space: nowrap;
        margin-right: 3px
    }

    .ir-2022-block--big_blockquote blockquote p strong:before {
        width: calc(100% + 20px);
        left: -10px;
        height: 100%;
        top: 0;
        z-index: -1
    }

    .ir-2022-block--big_blockquote blockquote p span {
        text-decoration: none !important;
        border-bottom: 2px solid #de5428;
        padding-bottom: 1px
    }

    .ir-2022-block--big_blockquote blockquote footer {
        font-weight: 400;
        font-size: 18px;
        padding-top: 10px
    }

    .ir-2022-block--big_blockquote.bg-pink .bound--layout blockquote p strong:before,
    .ir-2022-block--big_blockquote.bg-red .bound--layout blockquote p strong:before {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/highlight-blue.png) center/100% auto no-repeat
    }

    .ir-2022-block--big_blockquote.bg-blue .bound--layout blockquote p strong:before,
    .ir-2022-block--big_blockquote.bg-cream .bound--layout blockquote p strong:before {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/highlight-red.png) center/100% auto no-repeat
    }

    .ir-2022-block--big_blockquote.bg-red .bound--layout.large.with-img .quote-image {
        background: #bd94af
    }

    .ir-2022-block--big_blockquote.bg-red .bound--layout {
        background: #691f1b
    }

    .ir-2022-block--big_blockquote.bg-red .bound--layout blockquote .extra-line,
    .ir-2022-block--big_blockquote.bg-red .bound--layout blockquote footer,
    .ir-2022-block--big_blockquote.bg-red .bound--layout blockquote p {
        color: #faf3e7
    }

    .ir-2022-block--big_blockquote.bg-blue .bound--layout.large.with-img .quote-image {
        background: #c7491f
    }

    .ir-2022-block--big_blockquote.bg-blue .bound--layout {
        background: #aed8fb
    }

    .ir-2022-block--big_blockquote.bg-pink .bound--layout {
        background: #bd94af
    }

    .ir-2022-block--big_blockquote.bg-pink .bound--layout blockquote p span {
        border-color: #aed8fb
    }

    .ir-2022-block--big_blockquote.bg-pink .bound--layout blockquote p em:before {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_bracket-left-blue.png) center/contain no-repeat
    }

    .ir-2022-block--big_blockquote.bg-pink .bound--layout blockquote p em:after {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_bracket-right-blue.png) center/contain no-repeat
    }

    .ir-2022-block--big_blockquote.bg-cream .bound--layout.large.with-img .quote-image {
        background: #691f1b
    }

    .ir-2022-block--big_blockquote.bg-cream .bound--layout {
        background: #c3b492
    }

    @media (max-width:1200px) {
        .ir-2022-block--big_blockquote .bound--layout blockquote {
            padding: 100px
        }
    }

    @media (max-width:900px) {

        .ir-2022-block--big_blockquote .blockquote-wrap:after,
        .ir-2022-block--big_blockquote .blockquote-wrap:before {
            width: 80px;
            height: 80px
        }

        .ir-2022-block--big_blockquote .blockquote-wrap:before {
            top: 20px
        }

        .ir-2022-block--big_blockquote .blockquote-wrap:after {
            bottom: 20px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote {
            padding: 50px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote p {
            font-size: 25px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote p em:before {
            height: 35px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote p em:after {
            height: 33px;
            top: 1px
        }
    }

    @media (max-width:700px) {
        .ir-2022-block--big_blockquote .bound--layout blockquote {
            padding: 22px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote footer {
            font-size: 16px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote p {
            font-size: 24px
        }

        .ir-2022-block--big_blockquote .bound--layout blockquote p span {
            padding-bottom: 0
        }
    }

    .ir-2022-block--big_blockquote+.ir-2022-block--big_blockquote {
        padding-top: 0
    }

    .ir-2022-block--masthead {
        position: relative;
        padding: 0;
        background: #691f1b
    }

    .ir-2022-block--masthead .masthead-upper-content {
        position: relative;
        min-height: clamp(800px, 70vh, 90vh);
        display: flex;
        align-items: center;
        justify-content: center
    }

    .ir-2022-block--masthead .masthead-upper-content .cutout.right-cutout {
        width: clamp(300px, 30vw, 480px);
        position: absolute;
        right: 0;
        z-index: 2;
        top: 60%;
        transform: translateY(-50%)
    }

    .ir-2022-block--masthead .masthead-upper-content .cutout.left-cutout {
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 2;
        width: 295px
    }

    .ir-2022-block--masthead .masthead-upper-content .cutout .cut-caption {
        color: #fff;
        font-size: 14px;
        position: absolute;
        z-index: 3;
        bottom: 10%;
        right: 15px;
        line-height: normal
    }

    .ir-2022-block--masthead .masthead-upper-content svg.mast-brush {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 45%;
        transform: translateY(-50%);
        z-index: 1
    }

    .ir-2022-block--masthead .masthead-upper-content .image .image-auto {
        padding-top: 57.98611111%
    }

    .ir-2022-block--masthead .masthead-upper-content .text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 100px 80px;
        z-index: 3;
        position: relative
    }

    .ir-2022-block--masthead .page-title {
        font-size: 88px;
        font-weight: 700;
        position: Relative;
        z-index: 2
    }

    .ir-2022-block--masthead .title-wrap {
        position: Relative;
        z-index: 4
    }

    .ir-2022-block--masthead .title-wrap svg.dots {
        position: absolute;
        top: -76%;
        right: -6%
    }

    .ir-2022-block--masthead .title-wrap svg.head-bg {
        position: absolute;
        left: -20px;
        right: 0;
        bottom: 0;
        z-index: 1;
        margin: 0 auto;
        width: calc(100% + 40px);
        height: auto
    }

    .ir-2022-block--masthead .page-subtitle,
    .ir-2022-block--masthead .page-title {
        color: #faf3e7
    }

    .ir-2022-block--masthead .page-subtitle {
        font-size: 32px;
        font-family: 'Chivo', serif;
        padding-top: 25px;
        position: relative;
        font-weight: 400;
        z-index: 3
    }

    .ir-2022-block--masthead .iwmf-logo {
        width: 220px;
        position: absolute;
        bottom: 15%
    }

    .ir-2022-block--masthead .masthead-content {
        position: relative;
        padding-bottom: 8vw;
        padding-top: 25px;
        background: #faf3e7
    }

    .ir-2022-block--masthead .masthead-content p.sig {
        margin-top: 10px
    }

    .ir-2022-block--masthead .masthead-content svg.hatches {
        position: absolute;
        right: 0;
        top: -9%
    }

    .ir-2022-block--masthead .masthead-content .bound--narrow {
        padding-top: 50px
    }

    @media (max-width:1400px) {
        .ir-2022-block--masthead .page-title {
            font-size: 78px
        }

        .ir-2022-block--masthead .page-subtitle {
            font-size: 28px
        }

        .ir-2022-block--masthead .masthead-upper-content svg.mast-brush {
            max-width: 100%;
            height: auto
        }
    }

    @media (max-width:1050px) {
        .ir-2022-block--masthead .iwmf-logo {
            width: 160px;
            bottom: 9%
        }

        .ir-2022-block--masthead .masthead-upper-content {
            min-height: clamp(600px, 50vh, 90vh)
        }

        .ir-2022-block--masthead .masthead-upper-content .cutout.left-cutout {
            width: 210px
        }

        .ir-2022-block--masthead .masthead-upper-content .cutout .cut-caption {
            font-size: 12px;
            bottom: 12%;
            right: 12px
        }

        .ir-2022-block--masthead .masthead-content svg.hatches {
            top: -10%;
            width: 12%
        }

        .ir-2022-block--masthead .title-wrap svg.head-bg {
            bottom: -10px
        }

        .ir-2022-block--masthead .page-title {
            font-size: 62px;
            margin-bottom: 5px
        }

        .ir-2022-block--masthead .page-subtitle {
            font-size: 24px
        }
    }

    @media (max-width:850px) {
        .ir-2022-block--masthead .masthead-content svg.hatches {
            top: -80px;
            width: 100px;
            height: auto
        }

        .ir-2022-block--masthead .masthead-upper-content .cutout.right-cutout {
            width: 260px;
            z-index: 3;
            top: 10px;
            transform: none
        }

        .ir-2022-block--masthead .masthead-upper-content .cutout.left-cutout {
            width: 170px
        }

        .ir-2022-block--masthead .masthead-upper-content .text {
            padding: 100px 20px
        }

        .ir-2022-block--masthead .title-wrap svg.dots {
            left: -12%;
            width: 45%;
            top: -120%;
            height: auto
        }

        .ir-2022-block--masthead .title-wrap svg.head-bg {
            bottom: -5px;
            width: calc(100% + 20px);
            left: -10px
        }

        .ir-2022-block--masthead .page-title {
            font-size: max(36px, (78/1440)*100vw)
        }

        .ir-2022-block--masthead .page-subtitle {
            font-size: max(18px, (28/850)*100vw)
        }

        .ir-2022-block--masthead .iwmf-logo {
            width: 130px;
            bottom: 6%
        }
    }

    .ir-2022-block--video .block-title {
        text-align: center;
        margin-bottom: 30px
    }

    @media (max-width:900px) {
        .ir-2022-block--video .block-title {
            margin-bottom: 20px
        }
    }

    .ir-2022-block--video .video_wrap {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.4%;
        overflow: hidden
    }

    .ir-2022-block--video .video_wrap a {
        display: block;
        position: relative
    }

    .ir-2022-block--video .video_wrap a:after {
        content: '';
        position: absolute;
        width: 100%;
        top: 0;
        right: 0;
        height: 100%;
        z-index: 1;
        transition: all .3s ease-in-out;
        background: rgba(0, 0, 0, .2)
    }

    .ir-2022-block--video .video_wrap a:focus:after,
    .ir-2022-block--video .video_wrap a:hover:after {
        background: rgba(0, 0, 0, .1)
    }

    .ir-2022-block--video .video_wrap a:focus .play-icon path.ring,
    .ir-2022-block--video .video_wrap a:hover .play-icon path.ring {
        transform: rotate(85deg)
    }

    .ir-2022-block--video .video_wrap a:focus .play-icon path.icon,
    .ir-2022-block--video .video_wrap a:hover .play-icon path.icon {
        fill: #691f1b !important
    }

    .ir-2022-block--video .play-icon {
        display: block;
        position: absolute;
        left: 0;
        top: 50%;
        z-index: 2;
        width: 150px;
        height: auto;
        right: 0;
        margin: 0 auto;
        transform: translateY(-50%)
    }

    .ir-2022-block--video .play-icon path.ring {
        transition: all .6s cubic-bezier(.85, 0, .15, 1);
        transform-origin: center
    }

    .ir-2022-block--video .play-icon path.icon {
        transition: all .35s ease-in-out
    }

    .ir-2022-block--video .caption {
        margin-top: .5em;
        margin-bottom: 0;
        font-style: italic;
        text-align: right
    }

    @media (max-width:600px) {
        .ir-2022-block--video .caption {
            font-size: 15px
        }

        .ir-2022-block--video .play-icon {
            width: 120px
        }
    }

    .ir-2022-block--wysiwyg {
        padding: var(--reducedPadding) 0
    }

    .ir-2022-block--wysiwyg h1 {
        font-size: 52px;
        font-weight: 700;
        margin-bottom: 20px
    }

    .ir-2022-block--wysiwyg h2 {
        font-size: 50px;
        font-weight: 400
    }

    .ir-2022-block--wysiwyg h3 {
        font-size: 32px;
        font-weight: 700
    }

    .ir-2022-block--wysiwyg h4 {
        font-size: 28px
    }

    .ir-2022-block--wysiwyg h5 {
        font-size: 24px;
        font-weight: 700
    }

    .ir-2022-block--wysiwyg h6 {
        font-size: 18px;
        text-transform: none
    }

    .ir-2022-block--wysiwyg a {
        color: inherit;
        transition: .25s ease-in-out
    }

    .ir-2022-block--wysiwyg a:hover {
        color: #691f1b
    }

    .ir-2022-block--wysiwyg p:last-child {
        margin: 0
    }

    .ir-2022-block--wysiwyg blockquote {
        margin-left: 0;
        font-family: 'Function Pro', sans-serif;
        font-size: 28px;
        line-height: 1.42857143;
        font-weight: 400;
        border-left: 6px solid #c6302b
    }

    .ir-2022-block--wysiwyg ul {
        list-style-type: none;
        padding-left: 10px
    }

    .ir-2022-block--wysiwyg ul li {
        list-style-type: none;
        position: relative;
        padding-left: 20px;
        margin-bottom: 8px
    }

    .ir-2022-block--wysiwyg ul li::marker {
        display: none
    }

    .ir-2022-block--wysiwyg ul li:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        left: 0;
        border-top: 6px solid transparent;
        border-bottom: 6px solid transparent;
        border-left: 7px solid #691f1b;
        top: 8px
    }

    @media (max-width:1200px) {
        .ir-2022-block--wysiwyg h1 {
            font-size: 45px;
            margin-bottom: 15px
        }

        .ir-2022-block--wysiwyg h2 {
            font-size: 40px
        }

        .ir-2022-block--wysiwyg h3 {
            font-size: 28px
        }

        .ir-2022-block--wysiwyg h4 {
            font-size: 24px
        }

        .ir-2022-block--wysiwyg h5 {
            font-size: 20px
        }

        .ir-2022-block--wysiwyg h6 {
            font-size: 17px
        }
    }

    @media (max-width:900px) {
        .ir-2022-block--wysiwyg h1 {
            font-size: 38px
        }

        .ir-2022-block--wysiwyg h2 {
            font-size: 36px
        }

        .ir-2022-block--wysiwyg h3 {
            font-size: 26px
        }

        .ir-2022-block--wysiwyg h4 {
            font-size: 22px
        }
    }

    .ir-2022-block--stats .stat-intro {
        text-align: center;
        padding-bottom: 20px
    }

    .ir-2022-block--stats .stat-intro .block-title {
        font-size: 24px;
        font-weight: 600
    }

    .ir-2022-block--stats .stat-intro .desc p {
        font-size: 17px
    }

    @media (max-width:900px) {
        .ir-2022-block--stats .stat-intro .desc p {
            font-size: 16px
        }
    }

    .ir-2022-block--stats.text .stats .stat {
        display: flex
    }

    .ir-2022-block--stats.text .stats .stat:not(:last-child) {
        margin-bottom: 27px
    }

    .ir-2022-block--stats.text .stats .stat .stat-arrow {
        flex-shrink: 0;
        margin-right: 12px
    }

    .ir-2022-block--stats.text .stats .stat .stat-arrow svg {
        margin-top: 8px
    }

    .ir-2022-block--stats.text .stats .stat .stat-text {
        flex: 1
    }

    .ir-2022-block--stats.text .stats .stat .stat-text p {
        margin: 0;
        font-size: 20px;
        line-height: 1.8
    }

    @media (max-width:900px) {
        .ir-2022-block--stats.text .stats .stat .stat-arrow {
            width: 50px
        }

        .ir-2022-block--stats.text .stats .stat .stat-arrow svg {
            width: 100%;
            height: auto
        }

        .ir-2022-block--stats.text .stats .stat .stat-text p {
            font-size: 17px
        }
    }

    .ir-2022-block--stats.column .stat__number,
    .ir-2022-block--stats.horizontal .stat__number {
        font-family: 'Magra', sans-serif;
        font-size: 78px;
        line-height: 1;
        font-weight: 700;
        color: #691f1b
    }

    @media (max-width:1200px) {

        .ir-2022-block--stats.column .stat__number,
        .ir-2022-block--stats.horizontal .stat__number {
            font-size: 58px
        }
    }

    @media (max-width:700px) {

        .ir-2022-block--stats.column .stat__number,
        .ir-2022-block--stats.horizontal .stat__number {
            font-size: 48px
        }
    }

    .ir-2022-block--stats.horizontal .stat {
        display: flex;
        align-items: flex-end;
        margin-bottom: 40px
    }

    .ir-2022-block--stats.horizontal .stat-arrow {
        margin-right: 15px
    }

    .ir-2022-block--stats.horizontal .stat-arrow svg {
        margin-bottom: 5px
    }

    .ir-2022-block--stats.horizontal .stat__label {
        font-size: 20px;
        padding-left: 15px;
        margin-bottom: 8px;
        font-family: 'Chivo', serif
    }

    @media (max-width:1200px) {

        .ir-2022-block--stats.horizontal .stat-arrow svg,
        .ir-2022-block--stats.horizontal .stat__label {
            margin-bottom: 0
        }
    }

    @media (max-width:900px) {
        .ir-2022-block--stats.horizontal .stat {
            flex-wrap: wrap
        }

        .ir-2022-block--stats.horizontal .stat-arrow {
            width: 100px
        }

        .ir-2022-block--stats.horizontal .stat-arrow svg {
            width: 100%;
            height: auto
        }

        .ir-2022-block--stats.horizontal .stat__label {
            flex-basis: 100%;
            padding-left: 115px;
            padding-top: 5px
        }
    }

    @media (max-width:700px) {
        .ir-2022-block--stats.horizontal .stat {
            flex-wrap: wrap
        }

        .ir-2022-block--stats.horizontal .stat-arrow {
            width: 80px
        }

        .ir-2022-block--stats.horizontal .stat__label {
            font-size: 17px;
            padding-left: 95px
        }
    }

    .ir-2022-block--stats.column .stat-intro {
        padding-bottom: 50px
    }

    .ir-2022-block--stats.column .stat__number {
        position: relative;
        display: inline-block
    }

    .ir-2022-block--stats.column .stat__number:after {
        content: '';
        position: absolute;
        z-index: -1
    }

    .ir-2022-block--stats.column .stat__number.accent-circle:after {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_stat-circle.png) center/contain no-repeat;
        width: calc(100% + 40px);
        height: calc(100% + 40px);
        left: -20px;
        top: -30px
    }

    .ir-2022-block--stats.column .stat__number.accent-underline:after {
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_stat-line.png) center/contain no-repeat;
        width: calc(100% + 30px);
        height: 40px;
        bottom: -25px;
        left: -15px
    }

    .ir-2022-block--stats.column .stat__number.accent-burst span.stat__number-numeral:after {
        content: '';
        position: absolute;
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_stat-burst.png) center/contain no-repeat;
        width: 27px;
        height: 21px;
        right: -30px;
        top: -10px
    }

    .ir-2022-block--stats.column .bound--maximum {
        border: 11px solid #c7491f;
        box-sizing: border-box;
        padding: 55px 6vw 70px
    }

    .ir-2022-block--stats.column .stats {
        display: flex;
        justify-content: center;
        gap: 30px 0
    }

    .ir-2022-block--stats.column .stat__label {
        font-size: 18px;
        padding-top: 25px
    }

    .ir-2022-block--stats.column .stat {
        flex: 1;
        padding: 0 50px;
        text-align: center
    }

    @media (max-width:1400px) {
        .ir-2022-block--stats.column .stat {
            padding: 0 30px
        }
    }

    @media (max-width:1200px) {
        .ir-2022-block--stats.column .bound--maximum {
            padding: 40px 4vw 50px
        }
    }

    @media (max-width:900px) {
        .ir-2022-block--stats.column .stats {
            gap: 50px 0;
            flex-direction: column
        }

        .ir-2022-block--stats.column .stats .stat {
            padding: 0
        }

        .ir-2022-block--stats.column .stat__label {
            font-size: 16px;
            padding-top: 17px
        }

        .ir-2022-block--stats.column .bound--maximum {
            padding: 30px 30px 35px;
            border-width: 8px
        }
    }

    .ir-2021-block--logos .block-title {
        margin-bottom: 2em;
        font-family: 'Montserrat', sans-serif;
        font-size: 24px;
        font-weight: 700;
        text-align: center
    }

    .ir-2021-block--logos .logos {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        gap: 30px
    }

    .ir-2021-block--logos .logos a:hover {
        opacity: .5
    }

    .ir-2021-block--logos .logos.tight {
        justify-content: center
    }

    .ir-2021-block--logos .logos.outlines {
        gap: 40px;
        align-items: initial
    }

    .ir-2021-block--logos .logos.outlines .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        outline: 2px solid #ee5e2f;
        outline-offset: 10px
    }

    .ir-2021-block--logos .logos.outlines .logo a {
        display: block;
        width: 100%
    }

    .ir-2021-block--logos .logos.outlines .logo .image-auto {
        width: 100%
    }

    .ir-2022-block--blockquote .blockquote-wrap {
        margin-top: 30px
    }

    .ir-2022-block--blockquote blockquote {
        border-left: 8px solid #c7491f;
        padding: 0 0 0 30px;
        margin-left: 0;
        overflow: visible;
        position: relative
    }

    .ir-2022-block--blockquote blockquote:before {
        content: '';
        position: absolute;
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_blockquote-burst.png) center/contain no-repeat;
        width: 26px;
        height: 20px;
        top: -25px;
        left: -22px
    }

    .ir-2022-block--blockquote blockquote footer {
        font-weight: 400;
        font-size: 18px
    }

    @media (max-width:900px) {
        .ir-2022-block--blockquote blockquote {
            border-left-width: 6px;
            padding: 0 0 0 20px
        }

        .ir-2022-block--blockquote blockquote:before {
            width: 20px;
            height: 20px;
            top: -22px;
            left: -17px
        }

        .ir-2022-block--blockquote blockquote p {
            font-size: 25px
        }

        .ir-2022-block--blockquote blockquote footer {
            font-size: 16px
        }
    }

    @media (max-width:400px) {
        .ir-2022-block--blockquote blockquote p {
            font-size: 22px
        }
    }

    .ir-2022-block--callout {
        position: relative;
        padding: 0;
        margin: 60px auto
    }

    .ir-2022-block--callout.bg-red svg.hatches {
        position: absolute;
        bottom: -50px;
        left: -50px;
        width: 200px;
        height: auto;
        z-index: 2
    }

    .ir-2022-block--callout.bg-blue svg.dots {
        top: -20px;
        right: -55px
    }

    .ir-2022-block--callout.bg-blue svg.circle {
        position: absolute;
        bottom: -60px;
        left: -80px;
        width: 250px;
        z-index: 2;
        height: auto
    }

    .ir-2022-block--callout.bg-blue svg.mast-brush path {
        fill: #a8d2f5 !important
    }

    .ir-2022-block--callout .callout-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        padding: 150px 0;
        text-align: center
    }

    .ir-2022-block--callout svg.mast-brush {
        position: absolute;
        z-index: 1;
        max-width: 90%;
        height: auto;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 50%;
        transform: translateY(-50%)
    }

    .ir-2022-block--callout svg.dots {
        position: absolute;
        width: 180px;
        height: auto;
        top: 50px;
        right: -70px;
        z-index: 2
    }

    .ir-2022-block--callout .callout {
        position: relative;
        z-index: 3;
        padding: 0 12%
    }

    .ir-2022-block--callout .callout p {
        margin-bottom: 1em;
        font-size: 28px;
        line-height: 1.67857143em
    }

    .ir-2022-block--callout .callout p:last-child {
        margin-bottom: 0
    }

    @media (max-width:1200px) {
        .ir-2022-block--callout.bg-red svg.hatches {
            bottom: -30px;
            width: 150px
        }
    }

    @media (max-width:900px) {
        .ir-2022-block--callout .callout-wrap {
            padding: 80px 0
        }

        .ir-2022-block--callout svg.dots {
            width: 120px;
            top: 20px;
            right: -80px
        }

        .ir-2022-block--callout.bg-red svg.hatches {
            width: 140px;
            opacity: .3
        }

        .ir-2022-block--callout.bg-blue svg.circle {
            bottom: -50px;
            left: -65px;
            width: 135px
        }

        .ir-2022-block--callout .callout {
            padding: 0
        }

        .ir-2022-block--callout .callout p {
            font-size: 22px
        }
    }

    .ir-2021-block--callout_banner .callout-banner-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 280px;
        text-align: center;
        font-size: 24px;
        font-family: 'Montserrat', sans-serif
    }

    .ir-2021-block--callout_banner .larger {
        font-size: 42px;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700
    }

    .ir-2021-block--tabs .tabs {
        display: grid;
        grid-template-columns: 340px auto;
        gap: 30px
    }

    .ir-2021-block--tabs .tabs__list {
        display: flex;
        flex-direction: column
    }

    .ir-2021-block--tabs .tab {
        appearance: none;
        margin-top: 30px;
        padding: 10px 0;
        text-align: left;
        border: 0;
        background: 0 0;
        cursor: pointer;
        position: relative;
        font-size: 18px;
        line-height: 1;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700;
        border-bottom: 2px solid #e7caa4
    }

    .ir-2021-block--tabs .tab[aria-selected=true] {
        padding-left: 20px
    }

    .ir-2021-block--tabs .tab[aria-selected=true]:before {
        content: '';
        position: absolute;
        left: 0;
        top: 12px;
        display: block;
        width: 0;
        height: 0;
        border-left: 10px solid #ee5e2f;
        border-top: 7px solid transparent;
        border-bottom: 7px solid transparent
    }

    .ir-2021-block--tabs .tab__panel {
        margin: 0 auto;
        max-width: 525px
    }

    .ir-2021-block--tabs .tab-image {
        margin-bottom: 1em
    }

    .ir-2021-block--tabs .tab-title {
        margin: 0 0 10px;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-size: 28px
    }

    @media (max-width:960px) {
        .ir-2021-block--tabs .tabs {
            grid-template-columns: 1fr 1.5fr
        }
    }

    @media (max-width:500px) {
        .ir-2021-block--tabs .tabs {
            grid-template-columns: 1fr
        }

        .ir-2021-block--tabs .tab {
            margin-top: 0
        }
    }

    .ir-2021-block--caov_preview .content.has-image {
        display: grid;
        grid-template-columns: 1fr .62fr;
        align-items: center;
        gap: 30px;
        width: 100%
    }

    @media (max-width:768px) {
        .ir-2021-block--caov_preview .content.has-image {
            grid-template-columns: 1fr;
            justify-items: center
        }

        .ir-2021-block--caov_preview .content.has-image .image {
            order: -1;
            width: 100%;
            max-width: 286px
        }
    }

    .ir-2021-block--caov_preview .block-text-link {
        display: inline-block;
        padding-top: 1.25em;
        max-width: 100%;
        padding-left: 10px;
        padding-right: 10px;
        font-weight: 700;
        color: #1a1919;
        border: 0;
        background: #d8d7a3;
        overflow-wrap: break-word
    }

    .ir-2021-block--caov_preview .block-text-link:hover {
        color: #fff;
        background: #723033
    }

    #searchtitle,
    .ir-2021-block--highlights {
        text-align: center
    }

    .ir-2021-block--highlights .block-title {
        font-size: 28px
    }

    .ir-2021-block--highlights .highlights {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px 0
    }

    .ir-2021-block--highlights .highlight {
        flex-basis: max(200px, 33.333%);
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        padding: 0 10px 30px;
        font-family: 'PlayfairDisplay', serif;
        font-size: 34px;
        line-height: 1.5em
    }

    .ir-2021-block--highlights .highlight svg {
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translate(-50%, 0)
    }

    @media (max-width:1000px) {
        .ir-2021-block--highlights .highlight {
            font-size: 28px
        }
    }

    @media (max-width:500px) {
        .ir-2021-block--highlights .highlight {
            font-size: 22px
        }
    }

    .ir-2022-block--big_feature {
        display: grid;
        grid-template-columns: 1fr 1fr;
        position: relative
    }

    .ir-2022-block--big_feature svg.dots {
        position: absolute;
        top: 20px;
        right: -60px;
        z-index: 2;
        width: 200px;
        height: auto
    }

    .ir-2022-block--big_feature .image {
        order: -1;
        display: flex;
        align-items: center;
        background: #333
    }

    .ir-2022-block--big_feature .image .image-auto {
        width: 100%
    }

    .ir-2022-block--big_feature .text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        padding: 30px 30px 30px 0;
        background: #691f1b
    }

    .ir-2022-block--big_feature .text:after {
        content: '';
        position: absolute;
        background: url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_big-feature-bg.png) center right/contain no-repeat;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1
    }

    .ir-2022-block--big_feature .text svg.feature-border:not(.mobile) {
        position: absolute;
        max-width: unset;
        width: auto;
        height: 100%;
        left: -20px;
        z-index: 2
    }

    .ir-2022-block--big_feature .text .block-title,
    .ir-2022-block--big_feature .text>* {
        color: #fff
    }

    .ir-2022-block--big_feature .text>* {
        max-width: 500px;
        position: relative;
        z-index: 2;
        width: 100%
    }

    .ir-2022-block--big_feature .small-heading {
        font-weight: 700;
        font-family: 'Chivo', serif;
        display: block;
        color: #aed8fb;
        font-size: 18px;
        margin-bottom: 18px
    }

    .ir-2022-block--big_feature .block-title {
        font-weight: 700;
        font-family: 'Chivo', serif;
        font-size: 34px;
        line-height: 1.3;
        margin-bottom: 18px
    }

    .ir-2022-block--big_feature .block-button {
        padding-top: 4px
    }

    .ir-2022-block--big_feature .block-button a.button:hover {
        background: #fff;
        color: #691f1b
    }

    @media (max-width:1200px) {
        .ir-2022-block--big_feature {
            grid-template-columns: 1fr 1.5fr
        }

        .ir-2022-block--big_feature .block-title {
            font-size: 30px;
            margin-bottom: 15px
        }

        .ir-2022-block--big_feature .small-heading {
            margin-bottom: 15px
        }

        .ir-2022-block--big_feature .text {
            padding: 40px 40px 40px 0
        }

        .ir-2022-block--big_feature .text>* {
            max-width: 88%
        }

        .ir-2022-block--big_feature svg.dots {
            top: 24px;
            right: -75px;
            z-index: 2;
            width: 150px
        }
    }

    @media (max-width:900px) {
        .ir-2022-block--big_feature {
            grid-template-columns: 1fr
        }

        .ir-2022-block--big_feature svg.dots {
            top: 15px
        }

        .ir-2022-block--big_feature .block-title {
            font-size: 28px
        }

        .ir-2022-block--big_feature .text {
            padding: 15px 30px 40px
        }

        .ir-2022-block--big_feature .text svg.feature-border:not(.mobile) {
            display: none
        }

        .ir-2022-block--big_feature .text svg.feature-border.mobile {
            display: block;
            position: absolute;
            top: -25px;
            width: 100%;
            height: auto
        }

        .ir-2022-block--big_feature .text>* {
            max-width: none
        }

        .ir-2022-block--big_feature .text:before {
            display: none
        }
    }

    .ir-2022-block--image svg.blue-circle {
        position: absolute;
        width: 200px;
        height: auto;
        z-index: -1;
        top: -60px;
        right: -70px
    }

    .ir-2022-block--image .block-title {
        position: relative;
        text-align: center;
        max-width: 90%;
        margin: 0 auto 30px
    }

    @media (max-width:900px) {
        .ir-2022-block--image .block-title {
            margin-bottom: 20px
        }
    }

    .ir-2022-block--image .image {
        position: relative
    }

    .ir-2022-block--image .image .image-auto {
        z-index: 1
    }

    .ir-2022-block--image .caption {
        margin-top: 1em
    }

    @media (max-width:960px) {
        .ir-2022-block--image svg.blue-circle {
            top: -16px;
            right: -35px
        }

        .ir-2022-block--image .caption {
            font-size: 15px;
            margin-top: .5em
        }

        .ir-2022-block--image .block-title {
            max-width: 100%
        }
    }

    .ir-2022-block--image_slider .bound--hang {
        padding: 20px 0 30px
    }

    .ir-2022-block--image_slider .block-title {
        position: relative;
        z-index: 1;
        max-width: 1080px;
        text-align: center
    }

    .ir-2022-block--image_slider .slide-pag {
        display: flex;
        align-items: center;
        gap: 12px
    }

    .ir-2022-block--image_slider .slide-pag button.next,
    .ir-2022-block--image_slider .slide-pag button.prev {
        background: #c7491f;
        border: 0;
        padding: 0;
        margin: 0;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all .25s ease-in-out
    }

    .ir-2022-block--image_slider .slide-pag button.next.prev,
    .ir-2022-block--image_slider .slide-pag button.prev.prev {
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1)
    }

    .ir-2022-block--image_slider .slide-pag button.next svg,
    .ir-2022-block--image_slider .slide-pag button.prev svg {
        fill: #fff;
        width: 12px;
        height: auto
    }

    .ir-2022-block--image_slider .slide-pag button.next:focus,
    .ir-2022-block--image_slider .slide-pag button.next:hover,
    .ir-2022-block--image_slider .slide-pag button.prev:focus,
    .ir-2022-block--image_slider .slide-pag button.prev:hover {
        background: #691f1b
    }

    .ir-2022-block--image_slider .nmc-slider {
        gap: 25px
    }

    .ir-2022-block--image_slider .nmc-slider.snaps .nmc-slide {
        width: 58%
    }

    .ir-2022-block--image_slider .caption {
        margin-top: 1em
    }

    .ir-2022-block--image_slider .jumpbuttons {
        display: flex;
        align-items: center;
        gap: 8px
    }

    .ir-2022-block--image_slider .jumpbutton {
        appearance: none;
        padding: 0;
        border: 0;
        background: 0 0;
        cursor: pointer;
        text-indent: -9999em;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        transition: all .25s ease-in-out;
        background: #d4d4d4
    }

    .ir-2022-block--image_slider .jumpbutton:hover {
        background: #c7491f
    }

    .ir-2022-block--image_slider .jumpbutton.active {
        background: #000
    }

    @media (max-width:800px) {
        .ir-2022-block--image_slider .nmc-slider {
            gap: 20px
        }

        .ir-2022-block--image_slider .nmc-slider.snaps .nmc-slide {
            width: calc(100% - 70px)
        }
    }

    @media (max-width:600px) {
        .ir-2022-block--image_slider .nmc-slider.snaps .nmc-slide {
            width: calc(100% - 50px)
        }
    }

    .ir-2022-block--half_and_half {
        padding-top: 95px
    }

    .ir-2022-block--half_and_half .layout {
        display: flex;
        gap: 50px;
        align-items: flex-start
    }

    .ir-2022-block--half_and_half .layout:not(.flip) .image svg.blue-circle {
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        right: -60px;
        left: auto
    }

    .ir-2022-block--half_and_half .img-shape {
        position: absolute;
        width: 0;
        height: 0;
        overflow: hidden
    }

    .ir-2022-block--half_and_half .img-wrap {
        width: 100%;
        height: 300px
    }

    .ir-2022-block--half_and_half .img-tag {
        object-fit: cover;
        width: 100%;
        height: 100%;
        -webkit-clip-path: url(#blob);
        clip-path: url(#blob)
    }

    .ir-2022-block--half_and_half .block-title {
        font-family: 'Chivo', serif;
        font-weight: 700;
        margin-bottom: 20px
    }

    .ir-2022-block--half_and_half .image {
        position: relative;
        width: 50%
    }

    .ir-2022-block--half_and_half .image svg.blue-circle {
        position: absolute;
        width: 150px;
        height: auto;
        top: -50px;
        left: -50px
    }

    .ir-2022-block--half_and_half .image svg.image-frame {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2
    }

    .ir-2022-block--half_and_half .image .image-auto {
        z-index: 1
    }

    .ir-2022-block--half_and_half .text {
        width: 50%
    }

    .ir-2022-block--half_and_half .layout.flip .image {
        order: -1
    }

    @media (max-width:900px) {
        .ir-2022-block--half_and_half {
            padding-top: 80px
        }

        .ir-2022-block--half_and_half .layout {
            flex-wrap: wrap;
            gap: 20px
        }

        .ir-2022-block--half_and_half .image {
            order: -1;
            width: 100%
        }

        .ir-2022-block--half_and_half .text {
            width: 100%
        }
    }

    .ir-2021-block--links .block-title {
        position: relative;
        z-index: 1;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-weight: 700;
        text-align: center
    }

    .ir-2021-block--links .links {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 30px
    }

    .ir-2021-block--links .link {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 40px;
        width: 100%;
        max-width: 338px;
        height: 205px;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-size: 28px;
        font-weight: 700;
        line-height: calc((32/28)*1em);
        text-align: center;
        color: #000;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-size: cover
    }

    .ir-2021-block--links[data-nmc-has-entered=true] .link {
        background-image: url(/wp-content/themes/nmc_iwmf/css/images/ir2021-link-bg.svg)
    }

    @media (max-width:600px) {
        .ir-2021-block--links .bound--layout {
            width: 100%
        }
    }

    .ir-2022-block--footer {
        background: #691f1b url(../wp-content/themes/nmc_iwmf/assets/ar22/ar22_footer-brush.png) center/cover no-repeat;
        position: Relative;
        padding: 0
    }

    .ir-2022-block--footer svg.dots {
        position: absolute;
        right: 0;
        top: -20px
    }

    .ir-2022-block--footer:last-child {
        padding-bottom: 0
    }

    .ir-2022-block--footer .footer-top {
        padding: 70px 0 18vw;
        text-align: center;
        background: #f8e1c2
    }

    .ir-2022-block--footer .small-heading {
        margin: 0 0 10px;
        font-family: 'Karla', 'Montserrat', sans-serif;
        font-size: 18px;
        font-weight: 700
    }

    .ir-2022-block--footer .footer-bottom {
        position: relative;
        padding: 82px 0 52px;
        text-align: center;
        overflow: hidden
    }

    .ir-2022-block--footer .footer-bottom svg.hatches {
        position: absolute;
        bottom: -3vw;
        left: -2vw
    }

    .ir-2022-block--footer .footer-bottom svg.hatches path {
        fill: #bd94af !important
    }

    .ir-2022-block--footer .footer-bottom .bound--narrow {
        display: flex;
        flex-direction: column;
        align-items: center
    }

    .ir-2022-block--footer .iwmf-logo {
        margin: 0 0 60px;
        width: 100%;
        max-width: 312px
    }

    .ir-2022-block--footer .iwmf-logo svg {
        width: 100%;
        height: auto
    }

    .ir-2022-block--footer .footer-social {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px
    }

    .ir-2022-block--footer .footer-social a {
        width: 40px;
        height: 40px;
        border: 0
    }

    .ir-2022-block--footer .footer-social a:hover svg path {
        fill: #fff
    }

    .ir-2022-block--footer .footer-social svg path {
        fill: #bd94af;
        transition: all .25s ease-in-out
    }

    @media (max-width:1200px) {
        .ir-2022-block--footer svg.dots {
            top: -12px;
            width: 150px;
            height: auto
        }

        .ir-2022-block--footer .iwmf-logo {
            margin: 0 0 40px;
            max-width: 250px
        }

        .ir-2022-block--footer .footer-bottom svg.hatches {
            width: 150px;
            height: auto
        }
    }

    @media (max-width:700px) {
        .ir-2022-block--footer svg.dots {
            top: -8px;
            width: 100px
        }

        .ir-2022-block--footer .footer-social {
            gap: 14px
        }

        .ir-2022-block--footer .iwmf-logo {
            margin: 0 0 20px;
            max-width: 170px
        }

        .ir-2022-block--footer .footer-bottom {
            padding: 30px 0 40px
        }

        .ir-2022-block--footer .footer-bottom svg.hatches {
            width: 130px;
            height: auto;
            bottom: -70px;
            left: -60px
        }
    }

    #searchform {
        background: red;
        width: 100%;
        max-width: 700px;
        height: 62px;
        border: 1px solid #ddd;
        margin: 0 auto
    }

    #searchform button,
    #searchform input {
        border: 0;
        margin: 0;
        -webkit-appearance: none;
        border-radius: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        float: left;
        height: 60px;
        background: #fff
    }

    #searchform button:focus,
    #searchform input:focus {
        outline: 0
    }

    #searchform input {
        width: calc(100% - 60px);
        padding: 0 0 0 10px
    }

    #searchform button {
        width: 60px;
        padding: 18px;
        fill: #999
    }

    #searchform button:hover {
        fill: #d92d26
    }

    .search-result-set:not(:last-child) {
        margin-bottom: 50px;
        padding-bottom: 60px;
        border-bottom: 1px solid #ddd
    }

    .headshot-author {
        width: 265px;
        float: right;
        margin: 0 0 20px 20px
    }

    .author-meta {
        display: flex;
        align-items: center;
        font-style: italic
    }

    .author-meta:empty {
        display: none
    }

    .author-meta a:not(:first-child):before {
        content: ' | ';
        margin: 0 4px;
        border-bottom: 0
    }

    .author-meta a {
        color: #1a1919;
        border-bottom: 0
    }

    .author-meta a.ind-social {
        display: inline-flex;
        align-items: center
    }

    .author-meta a.ind-social .icon {
        width: 20px;
        height: 20px
    }

    .author-meta a.ind-social svg {
        display: block;
        width: 100%;
        height: 100%
    }

    .sidebar-layout {
        display: flex;
        justify-content: space-between;
        padding: 70px 0
    }

    .sidebar-layout .main {
        width: calc(100% - 390px)
    }

    .sidebar-layout .sidebar {
        width: 340px
    }

    @media (max-width:1150px) {
        .sidebar-layout {
            padding: 45px 0
        }
    }

    @media (max-width:1080px) {
        .sidebar-layout .main {
            width: calc(100% - 270px)
        }

        .sidebar-layout .sidebar {
            width: 240px
        }
    }

    @media (max-width:820px) {
        .sidebar-layout .main {
            width: calc(100% - 200px)
        }

        .sidebar-layout .sidebar {
            width: 180px
        }
    }

    @media (max-width:760px) {
        .sidebar-layout {
            flex-direction: column
        }

        .sidebar-layout .main {
            width: 100%
        }

        .sidebar-layout .sidebar {
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid #e7e7e7;
            width: 100%
        }
    }

    .story-heading h6 {
        letter-spacing: 2px;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 14px
    }

    @media (max-width:760px) {
        .story-heading h6 {
            font-size: 12px
        }
    }

    .story-heading h1 {
        font-size: 46px;
        font-weight: 400
    }

    @media (max-width:760px) {
        .story-heading h1 {
            font-size: 25px
        }
    }

    .story-heading .meta {
        font-size: 14px;
        margin-bottom: 30px
    }

    .story-heading .meta a,
    .story-heading .meta span {
        font-weight: 700;
        color: #d92d26
    }

    .story-heading .meta strong {
        font-weight: 400;
        color: #d92d26
    }

    .sidebar-block {
        margin-bottom: 35px;
        padding-bottom: 30px;
        border-bottom: 1px solid #e7e7e7
    }

    .sidebar-block :last-child {
        margin-bottom: 0
    }

    .sidebar-block:last-child {
        border-bottom: 0
    }

    .sidebar-block h6 {
        letter-spacing: 2px;
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 14px
    }

    .sidebar-author .bio {
        display: flex;
        justify-content: space-between
    }

    .sidebar-author .bio:not(:last-child) {
        margin-bottom: 15px
    }

    .sidebar-author .bio .headshot {
        width: 85px;
        height: 85px;
        background: #d92d26 url(/wp-content/themes/nmc_iwmf/css/images/default-red.png) bottom right;
        background-size: cover
    }

    .sidebar-author .bio .text {
        width: calc(100% - 105px)
    }

    .sidebar-author .bio .text h4 {
        font-size: 22px;
        margin-bottom: 10px
    }

    .sidebar-author .bio .text p {
        font-size: 13px;
        line-height: 1.7;
        color: #787878
    }

    .sidebar-author .bio .text p a {
        color: #555;
        text-decoration: underline
    }

    @media (max-width:1080px) {
        .sidebar-author .bio {
            flex-direction: column
        }

        .sidebar-author .bio .headshot {
            margin-bottom: 10px
        }

        .sidebar-author .bio .text {
            width: 100%
        }
    }

    @media (max-width:760px) {
        .sidebar-author .bio {
            flex-direction: row
        }

        .sidebar-author .bio .text {
            width: calc(100% - 105px)
        }
    }

    @media (max-width:350px) {
        .sidebar-author .bio {
            flex-direction: column
        }

        .sidebar-author .bio .text {
            width: 100%
        }
    }

    .sidebar-posts a,
    .sidebar-publication span {
        font-size: 18px;
        font-family: 'Function Pro', sans-serif
    }

    .sidebar-publication span {
        font-weight: 600
    }

    .sidebar-publication span img {
        position: relative;
        top: 2px;
        margin-right: 2px
    }

    .sidebar-posts a {
        position: relative;
        display: block;
        margin-bottom: 25px;
        padding-bottom: 18px;
        line-height: 1.5;
        color: #1a1919
    }

    .sidebar-posts a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 70px;
        height: 4px;
        background: #d92d26
    }

    .sidebar-posts a:nth-child(2n):after {
        background: #7b2a31
    }

    .sidebar-posts a:nth-child(3n):after {
        background: #f15e2f
    }

    .sidebar-posts a.all:after {
        display: none
    }

    .sidebar-posts a.all svg {
        width: 10px;
        height: 10px;
        fill: #1a1919
    }
</style>