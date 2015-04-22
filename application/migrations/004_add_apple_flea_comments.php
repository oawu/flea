<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2015 OA Wu Design
 */

class Migration_Add_apple_flea_comments extends CI_Migration {
  public function up () {
    $this->db->query (
      "CREATE TABLE `apple_flea_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11) NOT NULL,
        `apple_flea_id` int(11) NOT NULL,

        `content` text COMMENT '內容',

        `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',
        `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "',

        PRIMARY KEY (`id`),
        KEY `user_index` (`user_id`),
        KEY `apple_flea_index` (`apple_flea_id`),
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
        FOREIGN KEY (`apple_flea_id`) REFERENCES `apple_flea` (`id`) ON DELETE CASCADE
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"
    );
  }
  public function down () {
    $this->db->query (
      "DROP TABLE `apple_flea_comments`;"
    );
  }
}