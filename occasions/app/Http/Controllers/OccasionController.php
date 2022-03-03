<?php

namespace App\Http\Controllers;

use App\Jobs\AllOccasionsJob;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Jobs\TodaysOccasionsJob;


class OccasionController extends BaseController
{
    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $job = (new AllOccasionsJob())->onQueue('cron');
        $data = dispatch($job);
        dump($data);


        return view('views', [
            'occasions' => $data
        ]);
    }
}
