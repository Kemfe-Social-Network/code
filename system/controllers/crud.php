<?php

class Crud extends Controller
{
    public function delete_post($var = null)
    {
        $success = array();
        $error = array();
        $data = array();
        $poster_user_id = (int) my_decrypt($_COOKIE['auth'], KEY);
        $post_id = (int) $var;
        $delete_post = delete_by_user("espals_community_post", "id", $post_id, "post_author", $poster_user_id);


        if ($delete_post > 0) {
            $success["msg"] = "Deleted successfully";
            $data["Ok"] = true;
            $data["msg"] = $success["msg"];
        } else {
            $error["msg"] = "Unknown error has occurred. Try again later.";
            $error["who"] = "login_error";
            $data["error"] = $error;
        }


        echo json_encode($data);
    }


    public function get_post_title($var = null)
    {

        $data = array();

        $post_id = (int) $var;
        $get_post = Post::findById($post_id);


        if ($get_post->post_type == "youtube" ||  $get_post->post_type == "url") {
            $data["title"] = $get_post->mySay;
            $data["Ok"] = true;
        } else {
            $data["title"] = $get_post->post_title;
            $data["Ok"] = true;
        }



        echo json_encode($data);
    }


    public function save_edit_post()
    {
        $data = array();
        $poster_user_id = (int) my_decrypt($_COOKIE['auth'], KEY);
        $post_id = (int) $_POST['editPostId'];
        $get_post = Post::findById($post_id);
        if ($get_post->post_author == $poster_user_id) {



            if ($get_post->post_type == "youtube" ||  $get_post->post_type == "url") {
                $get_post->mySay = $_POST['editPostTitle'];
                $get_post->save();
                $data["Ok"] = true;
            } else {
                $get_post->post_title = $_POST['editPostTitle'];
                $get_post->save();
                $data["Ok"] = true;
            }
        }
        echo json_encode($data);
    }

    public function save_report_post()
    {
        $data = array();
        $repoter_user_id = (int) my_decrypt($_COOKIE['auth'], KEY);

        $report_post = new Report();
        $report_post->reporter = $repoter_user_id;
        $report_post->post_id = $_POST['reportPostId'];
        $report_post->report_reason = $_POST['reportPostTitle'];
        $report_post->type = "post";

        if ($report_post->save()) {
            $data["Ok"] = true;
        } else {
            $data["Ok"] = false;
        }

        echo json_encode($data);
    }
}
