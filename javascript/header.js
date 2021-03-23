function header() {
    var html = "";
    html += '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
    html += '<a class="navbar-brand" href="#">';
    html += '<p class="d-md-none">';
    html += 'ハムずブログ';
    html += '</p>';
    html += '</a>';
    html += '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
    html += '<span class="navbar-toggler-icon">';
    html += '</span>';
    html += '</button>';
    html += '<div class="collapse navbar-collapse links" id="navbarSupportedContent">';
    html += '<ul class="navbar-nav mr-auto">';
    html += '<li class="nav-item"><a class="nav-link" href="/index.html">ホーム</a></li>';
    html += '<li class="nav-item"><a class="nav-link" href="/trip/index.html">旅行記</a></li>';
    html += '<li class="nav-item"><a class="nav-link" href="/world_heritage_sites/index.html">世界遺産リスト</a></li>';
    html += '<li class="nav-item"><a class="nav-link" href="/bucket_list/index.html">バケットリスト</a></li>';
    html += '<li class="nav-item"><a class="nav-link" href="/goal/index.html">今年の目標</a></li>';
    html += '<li class="nav-item"><a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeaEsjgy9NbKu4nk4YpKFwXNVSM2ul9YdWl1Kuoi_0lbXPRnQ/viewform?usp=sf_link">お問い合わせ</a></li>';
    html += '<li class="nav-item"><a class="nav-link" href="/webapp/index.php">WebApp</a></li>';
    html += '</ul>';
    html += '</div>';
    html += '</nav>';
    document.write(html);
}