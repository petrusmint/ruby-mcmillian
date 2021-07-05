<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

    /**
     * @var int Excerpt page ID
     */
    private $excerptsPageId = 15;

    public function orderFields()
    {
        $result = get_post_meta($this->excerptsPageId, 'order_fields', true);

        if (!empty($result)) {
            return $result[0];
        }
    }

    public function bookReviews()
    {
        $args = [
          'posts_per_page'   => 10,
          'offset'           => 0,
          'orderby'          => 'date',
          'order'            => 'DESC',
          'post_type'        => 'book_reviews',
          'post_status'      => 'publish',
          'suppress_filters' => true,
        ];

        $posts = get_posts($args);

        $data = [];
        foreach ($posts as $post) {
            $data[] = [
              'title'   => $post->post_title,
              'content' => $post->post_content,
              'address' => get_post_meta($post->ID, 'address', true),
            ];
        }

        return $data;
    }
}