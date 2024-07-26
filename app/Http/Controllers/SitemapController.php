<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        // Create a new sitemap
        $sitemap = Sitemap::create();

        // Add URLs to the sitemap
        $sitemap->add(Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));

        $urls = [
            'ckeditor/upload' => 'post',
            '/blog' => 'get',
            '/singleblog/{id}' => 'get',
            '/addreservationhome' => 'post',
            '/addcart/{id}' => 'post',
            '/showcart/{id}' => 'get',
            '/remove/{id}' => 'get',
            '/orderconfirm' => 'post',
            '/stripe/{totalprice}' => ['get', 'post'],
            '/create-checkout-session' => 'post',
            '/success' => 'get',
            '/cancel' => 'get',
            '/commentsstore' => 'post',
            '/redirect' => 'get',
            '/userdata' => 'get',
            '/deleteuser/{id}' => 'get',
            '/edituser/{id}' => 'get',
            '/updateuser/{id}' => 'post',
            '/adminmenu' => 'get',
            '/addmenu' => 'post',
            '/destroymenu/{id}' => 'get',
            '/editmenu/{id}' => 'get',
            '/updatemenu/{id}' => 'post',
            '/adminreservation' => 'get',
            '/addreservation' => 'post',
            '/destroyreservation/{id}' => 'get',
            '/editreservation/{id}' => 'get',
            '/updatereservation/{id}' => 'post',
            '/adminchief' => 'get',
            '/addchief' => 'post',
            '/destroychief/{id}' => 'get',
            '/editchief/{id}' => 'get',
            '/updatechief/{id}' => 'post',
            '/adminorder' => 'get',
            '/addorder' => 'post',
            '/destroyorder/{id}' => 'get',
            '/editorder/{id}' => 'get',
            '/updateorder/{id}' => 'post',
            '/search' => 'get',
            '/post' => 'get',
            '/admin/poststore' => 'post',
            '/admin/deletepost/{id}' => 'get',
            '/editpost/{id}' => 'get',
            '/updatepost/{id}' => 'post',
            '/categories' => 'get',
            '/admin/addcategoriesstore' => 'post',
            '/admin/deletecategories/{id}' => 'get',
            '/admin/editcategories/{id}' => 'get',
            '/admin/updatecategories/{id}' => 'post',
            '/tag' => 'get',
            '/admin/tagstore' => 'post',
            '/admin/deletetag/{id}' => 'get',
            '/admin/edittag/{id}' => 'get',
            '/admin/updatetag/{id}' => 'post'
        ];

        foreach ($urls as $url => $method) {
            if (is_array($method)) {
                foreach ($method as $m) {
                    $sitemap->add(Url::create($url)
                        ->setLastModificationDate(now())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8));
                }
            } else {
                $sitemap->add(Url::create($url)
                    ->setLastModificationDate(now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8));
            }
        }

        // Save the sitemap to a file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return response()->json(['message' => 'Sitemap generated successfully.']);
    }
}
