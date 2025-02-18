<?php
    function output_article_list($articles) { ?>
        <section id="news">
            <?php foreach($articles as $article) output_article($article); ?>
        </section>
    <?php }

    function output_article($article) { ?>
        <article>
            <h2><?=htmlspecialchars($article['title'])?></h2>
            <p>By <?=htmlspecialchars($article['name'])?> on <?=date('F j', $article['published'])?></p>
            <p><?=htmlspecialchars($article['introduction'])?></p>
            <a href="article.php?id=<?=$article['id']?>">Read more</a>
        </article>
    <?php }

    function output_full_article($article, $comments) { ?>
        <article>
            <h1><?=htmlspecialchars($article['title'])?></h1>
            <p>By <?=htmlspecialchars($article['name'])?> on <?=date('F j', $article['published'])?></p>
            <p><?=htmlspecialchars($article['introduction'])?></p>
            <p><?=htmlspecialchars($article['fulltext'])?></p>
            <?php output_comments($comments); ?>
        </article>
    <?php }

    function output_comments($comments) { ?>
        <section id="comments">
            <h2>Comments</h2>
            <?php if ($comments) {
                foreach ($comments as $comment) { ?>
                    <p><strong><?=htmlspecialchars($comment['name'])?>:</strong> <?=htmlspecialchars($comment['text'])?></p>
                <?php }
            } else { ?>
                <p>No comments yet.</p>
            <?php } ?>
        </section>
    <?php }
?>