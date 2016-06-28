<?php
$blog = new Blog();
?>
<div class="parallax overflow-hidden page-section bg-cyan-300">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media media-grid v-middle">
            <div class="media-left">
                <span class="icon-block half bg-cyan-500 text-white"><i class="fa fa-file-text-o correctBug"></i></span>
            </div>
            <div class="media-body">
                <h3 class="text-display-2 text-white margin-none">Blog</h3>
                <p class="text-white text-subhead">Ask our awesome community</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="page-section">

        <div class="row">
            <div class="col-md-8 col-lg-9">        
                <?= $blog->listeArticles() ?>



                <ul class="pagination margin-top-none">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>

                <br/>

            </div>
            <div class="col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group form-control-material">
                            <input id="forumSearch" type="text" class="form-control" placeholder="Type to search"/>
                            <label for="forumSearch">Search ...</label>
                        </div>
                        <a href="#" class="btn btn-inverse paper-shadow relative" data-z="0.5" data-hover-z="1">Search</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Categories</h4>
                    </div>
                    <ul class="list-group list-group-menu">
                        <li class="list-group-item active">
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