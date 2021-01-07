<?php

namespace App\Http\Controllers;

use App\Events\LinkClicked;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::query()->get();

        return view('links.index')
            ->with('links', $links);
    }

    public function stats()
    {
        $links = Link::query()->get();

        return view('links.stats')
            ->with('links', $links);
    }

    public function click($uuid): RedirectResponse
    {
        $link = Link::query()->where('uuid', $uuid)->first();

        $link->clicks_count += 1;

        $link->save();

        event($event = new LinkClicked($link->uuid, $link->url, $link->updated_at));

        session()->put('uuid', $uuid);

        return redirect()->route('register')->withCookie(cookie('lastEvent',json_encode($event),60*24*30));
    }
}
