<div class="parallax overflow-hidden page-section bg-cyan-300">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media media-grid v-middle">
            <div class="media-left">
                <span class="icon-block half bg-cyan-500 text-white"><i class="fa fa-file-text-o correctBug"></i></span>
            </div>
            <div class="media-body">
                <?= $article->getHeader() ?>
                <p class="text-white text-subhead">Le blog</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="page-section">

        <div class="row">
            <div class="col-md-8 col-lg-9">

                <?= $article->afficherArticle() ?>

                <h5 class="text-subhead-2 text-light">Commentaires</h5>

                <?= $article->canComm() ?>

                <?= $article->afficherCommentaires() ?>

            </div>
            <div class="col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Categories</h4>
                    </div>
                    <ul class="list-group list-group-menu">
                        <li class="list-group-item">
                            <a href="website-blog.html"><i class="fa fa-chevron-right fa-fw"></i> All</a>
                        </li>
                        <li class="list-group-item">
                            <a href="website-blog.html"><i class="fa fa-chevron-right fa-fw"></i> General</a>
                        </li>
                        <li class="list-group-item">
                            <a href="website-blog.html"><i class="fa fa-chevron-right fa-fw"></i> Lessons</a>
                        </li>
                        <li class="list-group-item">
                            <a href="website-blog.html"><i class="fa fa-chevron-right fa-fw"></i> Support</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>