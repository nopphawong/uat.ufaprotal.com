<?php

namespace App\Controllers\serv;

use App\Libraries\Apiv1;
use App\Libraries\Base64fileUploads;

class Banner extends BaseController
{
    public function list()
    {
        $body = $this->getPost();
        $api = new Apiv1($this->session->agent->secret);

        $body->agent = $this->session->agent->key;
        $banners = $api->banner_list($body);
        if (!$banners->status) return $this->response(null, $banners->message, false);
        return $this->response($banners->data);
    }

    public function add()
    {
        $body = $this->getPost();
        $api = new Apiv1($this->session->agent->secret);
        $file = new Base64fileUploads();

        if (!empty($body->image_upload)) {
            $this->unlink_image($body->image);
            $image = $file->du_uploads($body->image_upload, "images", "{$this->session->agent->key}banner_" . uniqid());
            $this->resize_image($image->file_path, 1000, 480);
            $body->image = site_url($image->file_path);
        }

        $body->agent = $this->session->agent->key;
        $body->add_by = $this->session->username;
        $banner = $api->banner_add($body);
        if (!$banner->status) return $this->response(null, $banner->message, false);
        return $this->response($banner->data);
    }

    public function info()
    {
        $body = $this->getPost();
        $api = new Apiv1($this->session->agent->secret);

        $body->agent = $this->session->agent->key;
        $banner = $api->banner_info($body);
        if (!$banner->status) return $this->response(null, $banner->message, false);
        return $this->response($banner->data);
    }

    public function info_update()
    {
        $body = $this->getPost();
        $api = new Apiv1($this->session->agent->secret);
        $file = new Base64fileUploads();

        if (!empty($body->image_upload)) {
            $this->unlink_image($body->image);
            $image = $file->du_uploads($body->image_upload, "images", "{$this->session->agent->key}banner_" . uniqid());
            $this->resize_image($image->file_path, 1000, 480);
            $body->image = site_url($image->file_path);
        }

        $body->agent = $this->session->agent->key;
        $body->edit_by = $this->session->username;
        $banner = $api->banner_info_update($body);
        if (!$banner->status) return $this->response(null, $banner->message, false);
        return $this->response($banner->data);
    }

    public function remove()
    {
        $body = $this->getPost();
        $api = new Apiv1($this->session->agent->secret);

        $body->agent = $this->session->agent->key;
        $body->edit_by = $this->session->username;
        $banner = $api->banner_remove($body);
        if (!$banner->status) return $this->response(null, $banner->message, false);
        return $this->response($banner->data);
    }

    public function reuse()
    {
        $body = $this->getPost();
        $api = new Apiv1($this->session->agent->secret);

        $body->agent = $this->session->agent->key;
        $body->edit_by = $this->session->username;
        $banner = $api->banner_reuse($body);
        if (!$banner->status) return $this->response(null, $banner->message, false);
        return $this->response($banner->data);
    }
}
