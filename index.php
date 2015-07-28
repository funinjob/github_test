develop
<!DOCTYPE html>
<html dir="ltr" lang="zh-TW" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Git, 版本控制，甘特圖，燃盡圖，專案管理，subversion,貝格樂">
    <meta name="description" content="6.解決合併的衝突【教學1 使用分支】  | 歡迎來到超級簡單的Git入門指南，讓我們一起學習如何使用Git版本控制系統吧！">
    <title>6.解決合併的衝突【教學1 使用分支】  | 連猴子都能懂的Git入門指南  | 貝格樂（Backlog）</title>
    <meta property="og:title" content="6.解決合併的衝突【教學1 使用分支】  | 連猴子都能懂的Git入門指南  | 貝格樂（Backlog）">
    <meta property="og:description" content="6.解決合併的衝突【教學1 使用分支】  | 歡迎來到超級簡單的Git入門指南，讓我們一起學習如何使用Git版本控制系統吧！">
    <meta property="og:url" content="http://backlogtool.com/git-guide/tw/stepup/stepup2_7.html">
    <meta property="og:image" content="http://backlogtool.com/git-guide/tw/ogp_dft.png">
    <meta property="og:type" content="article">
    <meta property="fb:app_id" content="417292271624387">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" media="all" href="./../style.css">
</head>
<body>

<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-C9J9"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-C9J9');</script>
<!-- End Google Tag Manager -->
<div id="container">

    <header id="header" role="banner">
        <div class="Inner">
            <h1><a href="../">連猴子都能懂的Git入門指南</a></h1>
            <a class="btn-contents" href="../contents/"><span>目錄</span><span class="Bg"></span></a>
            <ul id="socials" class="Socials Cf">
                <!-- #socials -->
            </ul>

            <nav id="nav">
                <ul class="Cf">
                    <li><a href="../intro/intro1_1.html">入門篇</a></li>
                    <li><a href="../stepup/stepup1_1.html">進階篇</a></li>
                    <li><a href="../reference/">Git命令快速參考</a></li>
                </ul>
            </nav>
        </div>
        <!-- #header -->
    </header>

    <div id="content">
        <div id="main" role="main">
            <article class="Post">
                <header class="Entry-header">
                    <p class="Category-ttl">教學1 使用分支</p>
                    <h1 class="Entry-ttl">6. 解決合併的衝突</h1>

                    <!-- .Entry-header -->
                </header>

                <div class="Entry-content">
                    <p>把 issue2 分支和 issue3 分支的修改合併到 master。</p>
                    <p>切換到 master 分支後，合併 issue2 分支。</p>
                        <pre class="Mg-b30">$ <b>git checkout master</b>
Switched to branch 'master'
$ <b>git merge issue2</b>
Updating b2b23c4..8f7aa27
Fast-forward
 myfile.txt |    2 ++
 1 files changed, 2 insertions(+), 0 deletions(-)</pre>
                    <p>執行 fast-forward（快轉）合併。</p>
                    <p class="Mg-b30"><img src="../img/post/stepup/capture_stepup2_7_1.png" alt="目前的歷史記錄"></p>
                    <p>接著合併 issue3 分支。</p>
                        <pre class="Mg-b15">$ <b>git merge issue3</b>
Auto-merging myfile.txt
CONFLICT (content): Merge conflict in myfile.txt
Automatic merge failed; fix conflicts and then commit the result.</pre>
                    <p>自動合併失敗。由於在同一行文字進行了修改，所以產生衝突。這時myfile.txt的內容如下：</p>
                        <pre class="Mg-b30">連猴子都懂的Git命令
add 修改加入索引
&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD
commit 記錄索引的狀態
=======
pull 取得遠端數據庫的內容
&gt;&gt;&gt;&gt;&gt;&gt;&gt; issue3</pre>
                    <p class="Align-right Mg-b0"><img class="Align-bottom" src="../img/post/img_modified_mascot.png" alt="請修改"></p>
                    <p class="Mg-t40">在發生衝突的地方插入 Git 找到差異的部分，請做以下的修改：</p>
                        <pre class="Mg-b15 Clear">連猴子都懂的Git命令
add 修改加入索引
<b>commit 記錄索引的狀態
    pull 取得遠端數據庫的內容</b></pre>
                    <p>衝突的部分已經修改，請再次提交。</p>
                        <pre class="Mg-b15">$ <b>git add myfile.txt</b>
$ <b>git commit -m "合併issue3"</b>
# On branch master
nothing to commit (working directory clean)</pre>
                    <p>歷史記錄如下圖所示。因為在這次的合併產生了衝突，必須修改衝突的部分，所以會建立新的提交記錄表示修改的合併提交。這樣，master的HEAD就移動到這裡了。這種合併不是fast-forward合併，而是non fast-forward合併。</p>
                    <p class="Mg-b60"><img src="../img/post/stepup/capture_stepup2_7_2.png" alt="目前的歷史記錄"></p>

                    <!-- .Entry-content -->
                </div>


                <footer class="Paging Cf">
                    <div class="Nav-prev">
                        <a href="../stepup/stepup2_6.html">
                            <span class="Bg"></span>
                            <span><b>上一頁</b></span>

                        </a>
                    </div>
                    <div class="Nav-next">
                        <a href="../stepup/stepup2_8.html">
                            <span class="Bg"></span>
                            <span><b>下一頁</b></span>
                        </a>
                    </div>
                    <!-- .Paging -->
                </footer>

            </article>
            <!-- #main -->
        </div>
        <div id="sub" role="complementary">
            <aside class="Side-menu s_sideMenu">
                <section>
                    <h1>分支</h1>
                    <ul>
                        <li><a href="./stepup1_1.html">什麼是分支？</a></li>
                        <li><a href="./stepup1_2.html">分支的運用</a></li>
                        <li><a href="./stepup1_3.html">分支的切換</a></li>
                        <li><a href="./stepup1_4.html">分支的合併</a></li>
                        <li><a href="./stepup1_5.html">Topic分支和integration分支的運用實例</a></li>
                        <!--<li><a class="Large" href="./stepup1_6.html">コラム<br />「A successful Git branching model」</a></li>-->
                    </ul>
                </section>
                <section>
                    <h1>教學1 使用分支</h1>
                    <ul>
                        <li><a href="./stepup2_1.html">0. 事前準備</a></li>
                        <li><a href="./stepup2_2.html">1. 建立分支</a></li>
                        <li><a href="./stepup2_3.html">2. 切換分支</a></li>
                        <li><a href="./stepup2_4.html">3. 合併分支</a></li>
                        <li><a href="./stepup2_5.html">4. 刪除分支</a></li>
                        <li><a href="./stepup2_6.html">5. 平行操作</a></li>
                        <li><a href="./stepup2_7.html">6. 解決合併的衝突</a></li>
                        <li><a href="./stepup2_8.html">7. 用rebase合併</a></li>
                    </ul>
                </section>

                <section>
                    <h1>遠端數據庫</h1>
                    <ul>
                        <li><a href="./stepup3_1.html">Pull</a></li>
                        <li><a href="./stepup3_2.html">Fetch</a></li>
                        <li><a href="./stepup3_3.html">Push</a></li>
                    </ul>
                </section>
                <section>
                    <h1>標籤</h1>
                    <ul>
                        <li><a href="./stepup4_1.html">標籤</a></li>
                    </ul>
                </section>
                <section>
                    <h1>教學2 使用標籤</h1>
                    <ul>
                        <li><a href="./stepup5_1.html">0. 事前準備</a></li>
                        <li><a href="./stepup5_2.html">1. 添加輕量標籤</a></li>
                        <li><a href="./stepup5_3.html">2. 添加標示標籤</a></li>
                        <li><a href="./stepup5_4.html">3. 刪除標籤</a></li>
                    </ul>
                </section>
                <section>
                    <h1>改寫提交</h1>
                    <ul>
                        <li><a href="./stepup6_1.html">修改最近的提交</a></li>
                        <li><a href="./stepup6_2.html">取消過去的提交</a></li>
                        <li><a href="./stepup6_3.html">放棄提交</a></li>
                        <li><a href="./stepup6_4.html">提取提交</a></li>
                        <li><a href="./stepup6_5.html">改寫提交的記錄</a></li>
                        <li><a href="./stepup6_6.html">匯合分支上的提交一同合併</a></li>
                    </ul>
                </section>
                <section>
                    <h1>教學3 改寫提交</h1>
                    <ul>
                        <li><a href="./stepup7_1.html">1. Commit <span class="Hyphen">--</span>amend</a></li>
                        <li><a href="./stepup7_2.html">2. Revert</a></li>
                        <li><a href="./stepup7_3.html">3. Reset</a></li>
                        <li><a href="./stepup7_4.html">4. Cherry-pick</a></li>
                        <li><a href="./stepup7_5.html">5. 使用 rebase -i 合併提交</a></li>
                        <li><a href="./stepup7_6.html">6. 使用 rebase -i 修改提交</a></li>
                        <li><a href="./stepup7_7.html">7. Merge <span class="Hyphen">--</span>squash</a></li>
                    </ul>
                </section>
            </aside>
            <!-- #sub -->
        </div>
        <!-- #content -->
    </div>


    <footer id="footer" role="contentinfo">
        <div class="Row">
            <div class="Col Right">
                <div class="Languages">
                    <div class="Languages-inner Clearfix">
                        <span class="Pick-language">繁體中文</span>
                        <span class="Pick-down"></span>
                        <select id="languageMenu" name="languageMenu" class="Language-menu" onchange="selectLanguage(this)">
                            <option value="http://backlogtool.com/git-guide/en/">English</option>
                            <option value="http://www.backlog.jp/git-guide/">日本語</option>
                            <option value="http://backlogtool.com/git-guide/cn/">简体中文</option>
                            <option selected value="http://backlogtool.com/git-guide/tw/">繁體中文</option>
                            <option value="http://backlogtool.com/git-guide/kr/">한국어</option>
                            <option value="http://backlogtool.com/git-guide/vn/">Tiếng Việt</option>
                        </select>
                    </div>
                </div>
                <!-- .Languages-area -->
                <ul class="Social-icon">
                    <li><a href="https://www.facebook.com/BacklogTW" target="_blank">
                            <img src="../img/common/icon/ico_facebook.png" srcset="../img/common/icon/ico_facebook.png 1x, ../img/common/icon/ico_facebook@2x.png 2x" width="36" height="36" alt="Facebook"></a></li><li><a href="https://twitter.com/BacklogTaiwan" target="_blank"><img src="../img/common/icon/ico_twitter.png"
                                                                                                                                                                                                                                                                                          srcset="../img/common/icon/ico_twitter.png 1x, ../img/common/icon/ico_twitter@2x.png 2x" width="36" height="36" alt="twitter"></a></li>
                </ul>
            </div>
            <div class="Col Left">
                <div class="Powered">Powered by<br>
                    <a href="http://backlogtool.com/tw/" target="_blank" title="貝格樂">
                        <img src="../img/common/logo_backlog_tw.png" srcset="../img/common/logo_backlog_tw.png 1x, ../img/common/logo_backlog_tw@2x.png 2x" width="122" height="44" alt="貝格樂 - 所有團隊成員的專案管理工具"></a>
                </div>
                <p class="Nulab">Copyright &copy; 2004-2015 Nulab Inc. All rights reserved. </p>
            </div>
        </div>
        <!-- #footer -->
    </footer>

    <div class="Top-link"><a id="topLink" href="#">UP</a></div>
    <div id="showUserVoicePopupTab" data-uv-trigger="smartvote">
        <a href="http://feedback.backlogtool.com/forums/277856" title="">Git入門的反饋</a>
    </div>

    <!-- #container -->
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/lib/jquery.js"><\/script>')</script>
<script type="text/javascript" src="../js/jquery.config.js"></script>
<script type="text/javascript">
    function selectLanguage(lang) {
        window.location.href = lang.options[lang.selectedIndex].value;
    }
</script>
<script>(function(){
        var uv=document.createElement('script');
        uv.type='text/javascript';
        uv.async=true;
        uv.src='//widget.uservoice.com/Yox3591xmDUTIQiafbmDQA.js';
        var s=document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(uv,s);
        uv.onload = uv.onreadystatechange = function(){
            var state = uv.readyState;
            if(!state || /complete|loaded/.test(state)){
                UserVoice.push(['set', {
                    forum_id: '277856'
                }]);
                uv.onload = uv.onreadystatechange = null;
            }
        }
    })();</script>
<script type="text/javascript">
    var tweetBtn, googleBtn, likeBtn;
    tweetBtn =
        '<li class="Twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://backlogtool.com/git-guide/tw/" data-text="連猴子都能懂的Git入門指南 | 貝格樂（Backlog）" data-via="BacklogTaiwan" data-lang="zh-tw">推文</a>'
        + '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");<\/script></li>';
    likeBtn =
        '<li class="Facebook"><div id="fb-root"></div>'
        +'<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.async = true; js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=417292271624387&version=v2.0"; fjs.parentNode.insertBefore(js, fjs); }(document, "script", "facebook-jssdk"));<\/script>'
        +'<div class="fb-like" data-href="http://backlogtool.com/git-guide/tw/" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false"></div></li>';
    googleBtn =
        '<li class="Google"><g:plusone size="medium" href="http://backlogtool.com/git-guide/tw/"></g:plusone>'
        +'<script type="text/javascript"> window.___gcfg = {lang: "zh-TW"}; (function() { var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/plusone.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s); })(); <\/script></li>';

    setTimeout(function() {
        $('#socials').append(tweetBtn + likeBtn + googleBtn);
    },1000);
</script>
<script>
    var _gaq=[['_setAccount','UA-19793637-1'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>
