    <header style="background-image: url('<?php echo base_url("img/post-bg.jpg") ?>')" class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <?php $data = current($data) ?>
                        <h1><?php echo $data['title'] ?></h1>
                        <h2 class="subheading"><?php echo $data['slug'] ?></h2>
                        <span class="meta">Posted by <a href="#"><?php echo $data['username'] ?></a> on <?php echo $data['created_at'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php echo $data['content'] ?>
                </div>
            </div>
        </div>
    </article>

    <hr>