<?php


namespace App\Controller;


class CommentManager extends BaseController
{

    public function getComments($postId)
    {
        $db = parent::connect();
        $comments = $db->prepare('SELECT id, author, comment FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = parent::connect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }



}